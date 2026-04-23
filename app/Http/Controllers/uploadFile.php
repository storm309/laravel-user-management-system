<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class uploadFile extends Controller
{
    public function showUploadForm()
    {
        return view('fileUpload');
    }

    public function uploadFile(Request $request)
    {
        // Validate file
        $request->validate([
            'file' => 'required|file|mimes:jpg,png,pdf,doc,docx|max:2048'
        ]);

        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $filename);

        return "File uploaded successfully!";
    }
}
