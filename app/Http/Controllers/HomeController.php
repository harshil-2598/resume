<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Experience;
use App\Models\Eduction;
use App\Models\ResumeTemplate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function home()
    {
        return view('step1'); 
    }

    // public function validateStep1(Request $request)
    // {
    //     // dd($request->all()); 
    //     // $validator = Validator::make($request->all(), [
    //     //     'title' => 'required|unique:posts|max:255',
    //     //     'body' => 'required',
    //     // ]);

    //     $validatedData = $request->validate([
    //         'fname' => 'required',
    //         'lname' => 'required',
    //         'contact' => 'required',
    //         'Profession' => 'required',
    //         'city' => 'required',
    //         'country' => 'required',
    //         'pincode' => 'required',
    //         'email' => 'required|email',
    //     ], [
    //         'fname.required' => 'Please Enter your first name.',
    //         'email.required' => 'Please Enter your Email.',
    //         'lname.required' => 'Please Enter your last name.',
    //         'contact.required' => 'Please Enter your contact number.',
    //         'Profession.required' => 'Please Enter your profession.',
    //         'city.required' => 'Please Enter your city.',
    //         'country.required' => 'Please Enter your country.',
    //         'pincode.required' => 'Please Enter your pincode.',
    //     ]);

    //     // ✅ Make sure $data is an array
    //     $data = $request->session()->get('data', []);

    //     // ✅ Append validated data
    //     $data = $request->all();

    //     // ✅ Put back into session
    //     $request->session()->put('data', $data);

    //     // ✅ Debug or redirect
    //     // dd(session('data.fname'));
    //     // return redirect()->back()->with('success', 'Step 1 completed and data stored in session!');
    //     return redirect()->route('step2');
    // }

    public function validateStep1(Request $request)
    {
        // 1️⃣ Validate only required fields
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'contact' => 'required',
            'Profession' => 'required',
            'city' => 'required',
            'country' => 'required',
            'pincode' => 'required',
            'email' => 'required|email',
        ], [
            'fname.required' => 'Please Enter your first name.',
            'email.required' => 'Please Enter your Email.',
            'lname.required' => 'Please Enter your last name.',
            'contact.required' => 'Please Enter your contact number.',
            'Profession.required' => 'Please Enter your profession.',
            'city.required' => 'Please Enter your city.',
            'country.required' => 'Please Enter your country.',
            'pincode.required' => 'Please Enter your pincode.',
        ]);

        // 2️⃣ Get all fields from request
        $allData = $request->all();
        // dd($allData);
        // store image in storage folder
        // if ($request->hasFile('profile_image')) {
        //     $tempPath = $request->file('profile_image')->store('temp', 'public');
        //     $allData['profile_image'] = $tempPath;
        // }

        if ($request->hasFile('profile_image')) {
            // Store in public/uploads/temp
            $filename = $request->file('profile_image')->getClientOriginalName();
            $path = $request->file('profile_image')->move(public_path('user/temp'), $filename);
            $allData['profile_image'] = 'user/temp/' . $filename;
        }

        // 3️⃣ Merge with existing session data (if multi-step form)
        $data = $request->session()->get('data', []);
        $data = array_merge($data, $allData);

        // 4️⃣ Store back into session
        $request->session()->put('data', $data);

        return redirect()->route('step2');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function step2()
    {
        return view('eduction');
    }

    public function step3()
    {
        return view('experience');
    }

    public function validateStep2(Request $request)
    {
        $validatedData = $request->validate([
            'eduction.*.school_name' => 'required',
            'eduction.*.school_location' => 'required',
            'eduction.*.degree' => 'required',
            'eduction.*.study' => 'required',
            'eduction.*.passing_year' => ['required', 'regex:/^(0[1-9]|1[0-2])\/\d{4}$/'],
        ], [
            'eduction.*.school_name.required' => 'Please enter your school name.',
            'eduction.*.school_location.required' => 'Please enter your school location.',
            'eduction.*.degree.required' => 'Please enter your degree.',
            'eduction.*.study.required' => 'Please enter your field of study.',
            'eduction.*.passing_year.required' => 'Please enter your passing year.',
            'eduction.*.passing_year.regex' => 'Passing year must be in MM/YYYY format.',
        ]);

        // Convert MM/YYYY to proper date format
        $educationData = collect($validatedData['eduction'])->map(function ($item) {
            $item['passing_year'] = \Carbon\Carbon::createFromFormat('m/Y', $item['passing_year'])->startOfMonth();
            return $item;
        });

        // Get old data from session and merge
        $oldEducationData = $request->session()->get('edu', collect());
        $mergedEducation = $oldEducationData->merge($educationData);

        $request->session()->put('edu', $mergedEducation);

        return redirect()->route('displayEduction')->with('success', 'Education added successfully.');
    }


    public function displayEduction()
    {
        $education = session('edu', collect());
        // dd($education);
        return view('display.sessioneduction', compact('education'));
    }

    public function deleteEduItem(Request $request)
    {
        $index = $request->input('index');

        $education = session('edu', collect());

        // Remove the selected item by index
        $education->forget($index);

        // Re-index the collection and update session
        $education = $education->values();
        session(['edu' => $education]);

        return redirect()->back()->with('success', 'Education entry deleted.');
    }

    public function validateStep3(Request $request)
    {
        // Run validation, but it won’t strip other fields
        $request->validate([
            'expe.*.job_title' => 'required',
            'expe.*.employer' => 'required',
            'expe.*.location' => 'required',
            'expe.*.start_date' => 'required',
        ], [
            'expe.*.job_title.required' => 'Please enter your Job Title.',
            'expe.*.employer.required' => 'Please enter your Employer Name.',
            'expe.*.location.required' => 'Please enter your location.',
            'expe.*.start_date.required' => 'Please enter your start date.',
        ]);

        // Fetch old session data
        $oldExperienceData = collect(session()->get('expe', []));

        // Take ALL submitted `expe` data (including description etc.)
        $newExperienceData = collect($request->input('expe'));

        // Merge with old
        $mergedExperienceData = $oldExperienceData->merge($newExperienceData)->values();

        session()->put('expe', $mergedExperienceData->all());

        return redirect()->route('displayExperience')->with('success', 'Experience added successfully.');
    }



    public function displayExperience()
    {
        $expe = session('expe', collect());
        // dd($expe);
        return view('display.sessiondisplayExperience', compact('expe'));
    }

    public function directsaveData(Request $request)
    {
        dd(Session::all());
        if ($request->saveBtn = 1) {
            return redirect()->routes('saveData');
        }
    }

    public function step4()
    {
        return view('objective');
    }


    public function create(Request $request)
    {
        $session_data = $request->session()->all(); // Correct way to get all session data

        // dd($session_data);
        // session()->forget(['data', 'edu', 'expe']);
        DB::beginTransaction();

        try {
            $sessionData = session()->all();
            // dd($sessionData);
            $sessionId = Session::getId();
            // 1. Move image from temp to permanent folder
            // if (!empty($sessionData['data']['profile_image'])) {
            //     $tempPath = $sessionData['data']['profile_image'];
            //     $newPath = str_replace('temp/', 'user/profile_images/', $tempPath);

            //     // Move file in storage/app/public
            //     Storage::disk('public')->move($tempPath, $newPath);

            //     $sessionData['data']['profile_image'] = $newPath;
            // }

            if (!empty($sessionData['data']['profile_image'])) {
                $tempPath = $sessionData['data']['profile_image'];
                $filename = basename($tempPath);
                $newPath = 'user/profile_images/' . $filename;

                // Ensure the target directory exists
                if (!file_exists(public_path('user/profile_images'))) {
                    mkdir(public_path('user/profile_images'), 0777, true);
                }

                // Move file from public/uploads/temp to public/uploads/profile_images
                rename(public_path($tempPath), public_path($newPath));

                // Update path in session data
                $sessionData['data']['profile_image'] = $newPath;
            }

            if (Auth::check()) {
                $sessionId = Auth::user()->id;
            } else {
                $sessionId = Str::random(60);
            }

            // 1. Save User or Resume Profile (adjust to your actual model)
            $user = User::create([
                'name' => $sessionData['data']['fname'] . " " . $sessionData['data']['lname'],
                'email' => $sessionData['data']['email'],
                'session_id' => $sessionId,
                'contact_no' => $sessionData['data']['contact'],
                'profession' => $sessionData['data']['Profession'],
                'city' => $sessionData['data']['city'],
                'country' => $sessionData['data']['country'],
                'pincode' => $sessionData['data']['pincode'],
                'linked_in' => $sessionData['data']['linked_in'],
                'website' => $sessionData['data']['website'],
                'marital_status' => $sessionData['data']['marital_status'],
                'birth_date' => Carbon::parse($sessionData['data']['birth_date']),
                'gender' => $sessionData['data']['gender'],
                'profile_pic' => $sessionData['data']['profile_image'] ?? null,
                'summary'     => $sessionData['summary'][0] ?? null,
                'profile_pic' => $sessionData['data']['profile_image'] ?? null,
                'skill'      => json_encode(array_values(array_unique($sessionData['skills'] ?? []))),
            ]);

            // 2. Save Education
            foreach ($sessionData['edu'] as $education) {
                Eduction::create([
                    'user_id' => $user->id,
                    'school_name' => $education['school_name'],
                    'school_location' => $education['school_location'],
                    'degree' => $education['degree'],
                    'study_field' => $education['study'],
                    'passing_year' => Carbon::parse($education['passing_year']),
                ]);
            }
            // dd($user->id);
            // 3. Save Experience
            foreach ($sessionData['expe'] as $experience) {
                Experience::create([
                    'user_id' => $user->id,
                    'job_title' => $experience['job_title'],
                    'employer' => $experience['employer'],
                    'job_location' => $experience['location'],
                    'job_description' => $experience['job_description'],
                    'start_date' => Carbon::parse($experience['start_date']),
                    'end_date' => Carbon::parse($experience['working_end_date']),
                ]);
            }

            DB::commit();

            if (Auth::user()) {
                session()->put('user_id', Auth::user()->id);
            } else {
                session()->put(['last_created_user_id' => $user->id, 'session_id' => $sessionId]);
            }

            session()->forget(['data', 'edu', 'expe', 'skills', 'summary']);
            return response()->json(['success' => 'Data Saved', 'user_id' => $user->id]);
        } catch (\Exception $e) {
            DB::rollBack();
            session()->forget(['data', 'edu', 'expe', 'skills', 'summary']);
            Log::error('Create failed', ['error' => $e->getMessage()]);
            return response()->json(['errors' => 'Failed to save data.', 'exception' => $e->getMessage()], 500);
        }
    }

    public function chooseTemplate()
    {

        $getTepmpate = ResumeTemplate::where('is_active', 1)->get();

        return view('chooseTemplate', compact(['getTepmpate']));
    }

    public function showTemplate($id)
    {
        $user_id = session()->get('last_created_user_id');
        $getUser = User::where('id', $user_id)->first();
        // dd($getUser);
        $getEduction = Eduction::where('user_id', $user_id)->get();
        $getExperience = Experience::where('user_id', $user_id)->get();
        $template = ResumeTemplate::findOrFail($id);
        $viewPath = 'templates.' . $template->name;

        if (!view()->exists($viewPath)) {
            abort(404, 'Template not found');
        }
        $otherTemplate = ResumeTemplate::where('is_active', 1)->whereNotIn('id', [$id])->get();
        // dd($template->name);
        return view("ShowTemplates", compact(['getUser', 'getExperience', 'getEduction', 'otherTemplate', 'template']));
        // return view($viewPath, compact(['getUser', 'getExperience', 'getEduction']));
    }

    public function objective_page()
    {
        return view('objective');
    }

    public function addSummary(Request $request)
    {
        // Get old session values (or empty arrays)
        $oldSkills  = collect(session()->get('skills', []));
        $oldSummary = collect(session()->get('summary', []));

        // New input values
        $newSkill   = collect($request->input('skills', []))->filter(); // remove null/empty
        $summaryVal = $request->input('summary');

        // Only add summary if it's not null or empty
        $newSummary = collect([]);
        if (!empty($summaryVal)) {
            $newSummary = collect([$summaryVal]);
        }

        // Merge with old ones only if new data exists
        if ($newSummary->isNotEmpty()) {
            $oldSummary = $oldSummary->merge($newSummary)->values();
            session()->put('summary', $oldSummary->all());
        }

        if ($newSkill->isNotEmpty()) {
            $oldSkills = $oldSkills->merge($newSkill)->values();
            session()->put('skills', $oldSkills->all());
        }

        return redirect()->route('displaySkillsAndObjective');
    }

    public function displaySkillsAndObjective()
    {
        $skills = session('skills', collect());
        $summary = session('summary', collect());
        // dd($expe);
        return view('display.sessiondisplayObjective', compact(['summary', 'skills']));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
