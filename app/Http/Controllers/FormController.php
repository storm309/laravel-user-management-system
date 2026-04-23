<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    // Show Form
    public function showForm()
    {
        return view('form');
    }

    // Handle Form Submission
    public function submitForm(Request $request)
    {
        // Validate data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        // Get data
        $name = $request->input('name');
        $email = $request->input('email');

        // Process (for now just return response)
        return "Form submitted successfully! Name: $name, Email: $email";
    }
}
