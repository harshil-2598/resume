<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\ViewErrorBag;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\returnCallback;

class AuthenticationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'CnfPass' => 'required|same:password|min:6'
        ], [
            'name.required' => 'Name is required',
            'name.max' => 'Name must be less than 255 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
            'CnfPass.required' => 'Confirm Password is required',
            'CnfPass.same' => 'Confirm Password must be same as Password',
            'CnfPass.min' => 'Confirm Password must be at least 6 characters',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('form_type', 'register'); // 👈 Important for frontend toggle
        }

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($data);
        return redirect("home")->withSuccess('Great! You have Successfully loggedin');
    }

    public function checkLogin(Request $request)
    {
        $credentials = $request->validate([
            'login_email' => 'required|email',
            'login_password' => 'required',
        ], [
            'login_email.required' => 'Email is required',
            'login_email.email' => 'Email is invalid',
            'login_password.required' => 'Password is required',
        ]);

        // Auth check
        if (Auth::attempt([
            'email' => $credentials['login_email'],
            'password' => $credentials['login_password'],
        ])) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

       return back()
            ->withErrors([
                'login_email' => 'The provided credentials do not match our records.',
            ])
            ->withInput()
            ->with('form_type', 'login'); // 👈 Still login side
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
