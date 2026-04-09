@extends('layout')

@section('content')
<div class="container">
    <h1>Student List</h1>

    @if($students->count() > 0)
        <ul class="student-list">
            @foreach($students as $student)
                <li class="student-item">
                    <strong>{{ $student['name'] }}</strong>
                    <span class="email">{{ $student['email'] }}</span>
                    <span class="grade">Grade: {{ $student['grade'] }}</span>
                </li>
            @endforeach
        </ul>
    @else
        <p>No students found.</p>
    @endif
</div>

<style>
    .container {
        padding: 20px;
    }

    .student-list {
        list-style: none;
        padding: 0;
    }

    .student-item {
        padding: 15px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 5px;
        background: #f9f9f9;
    }

    .student-item strong {
        display: block;
        font-size: 18px;
        color: #333;
    }

    .student-item .email {
        display: block;
        color: #666;
        font-size: 14px;
        margin-top: 5px;
    }

    .student-item .grade {
        display: block;
        color: #0066cc;
        font-weight: bold;
        margin-top: 5px;
    }
</style>
@endsection
