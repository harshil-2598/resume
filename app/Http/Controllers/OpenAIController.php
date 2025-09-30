<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Session;

class OpenAIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function generateResumeObjective(Request $request)
    {
        // Validate the incoming request data
        $profession = $request->profession;
        // Construct the prompt with user-provided data
        $prompt = "You are a professional resume writer. Generate a concise, single-sentence resume objective for a {$profession} with experience. Use a professional and action-oriented tone.";

        try {
            // Make the API call using the completions endpoint
            // $response = OpenAI::completions()->create([
            //     'model' => 'gpt-3.5-turbo-instruct', // or a newer model like 'gpt-4'
            //     'prompt' => $prompt,
            //     'max_tokens' => 100, // Adjust as needed to get a concise response
            //     'temperature' => 0.7, // A good balance between creativity and consistency
            // ]);

            $result = OpenAI::chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => $prompt,
            ]);

            dd($result);

            $generatedObjective = trim($result['choices'][0]['text']);

            return response()->json([
                'objective' => $generatedObjective,
            ]);

        } catch (\Exception $e) {
            // Handle any API errors
            return response()->json(['error' => 'Failed to generate resume objective. Please try again.'], 500);
        }
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
