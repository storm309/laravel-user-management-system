<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function studentProfile($id, Request $request)
    {
        // Get URL parameter
        $studentId = $id;

        // Sample student data
        $student = [
            'id' => $studentId,
            'name' => 'Shivam',
            'email' => 'shivam@example.com',
            'phone' => '8252980774',
            'course' => 'Computer Science'
        ];

        // Global variable
        $appName = 'Student Management System';

        // Create custom header
        $response = response()->view('student.profile', [
            'student' => $student,
            'appName' => $appName,
            'headerData' => [
                'title' => 'Student Profile',
                'description' => 'View your profile information'
            ],
            'cookieData' => $request->cookie('username') ?? 'Guest'
        ]);

        // Set cookie
        $response->cookie('student_id', $studentId, 60);
        $response->header('X-Student-ID', $studentId);
        $response->header('X-Custom-Header', 'Student Portal');

        return $response;
    }

    public function index()
    {
        return "User Index";
    }

    public function students()
    {
        // Get all students
        $students = [
            [
                'id' => 1,
                'name' => 'Shivam',
                'email' => 'shivam@example.com',
                'course' => 'Computer Science'
            ],
            [
                'id' => 2,
                'name' => 'Raj',
                'email' => 'raj@example.com',
                'course' => 'Information Technology'
            ],
            [
                'id' => 3,
                'name' => 'Priya',
                'email' => 'priya@example.com',
                'course' => 'Electronics'
            ]
        ];

        return view('student.index', ['students' => $students]);
    }
}
