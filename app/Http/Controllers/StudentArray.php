<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentArray extends Controller
{
    public function index()
    {
        $students = [
            [
                'id' => 1,
                'name' => 'Shivam',
                'email' => 'shivam@example.com',
                'grade' => 'A'
            ],
            [
                'id' => 2,
                'name' => 'Rahul',
                'email' => 'rahul@example.com',
                'grade' => 'B'
            ],
            [
                'id' => 3,
                'name' => 'Mohan',
                'email' => 'mike@example.com',
                'grade' => 'A'
            ]
        ];

        return view('students.index', ['students' => $students]);
    }

    public function printNames()
    {
        $students = [
            [
                'id' => 1,
                'name' => 'Shivam',
                'email' => 'shivam@example.com',
                'grade' => 'A'
            ],
            [
                'id' => 2,
                'name' => 'Rahul',
                'email' => 'rahul@example.com',
                'grade' => 'B'
            ],
            [
                'id' => 3,
                'name' => 'Mohan',
                'email' => 'mike@example.com',
                'grade' => 'A'
            ]
        ];

        // Print all names using foreach
        echo "Student Names:\n";
        foreach ($students as $student) {
            echo $student['name'] . "\n";
        }
    }

    public function listStudents()
    {
        $students = [
            [
                'id' => 1,
                'name' => 'Shivam',
                'email' => 'shivam@example.com',
                'grade' => 'A'
            ],
            [
                'id' => 2,
                'name' => 'Rahul',
                'email' => 'rahul@example.com',
                'grade' => 'B'
            ],
            [
                'id' => 3,
                'name' => 'Mohan',
                'email' => 'mike@example.com',
                'grade' => 'A'
            ]
        ];

        return view('StudentList', ['students' => collect($students)]);
    }
}
