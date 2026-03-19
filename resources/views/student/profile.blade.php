<!DOCTYPE html>
<html>
<head>
    <title>{{ $headerData['title'] }}</title>
</head>
<body>
    <div class="container">
        <h1>{{ $appName }}</h1>

        <!-- Header Data Section -->
        <div class="section">
            <h2>{{ $headerData['title'] }}</h2>
            <p>{{ $headerData['description'] }}</p>
        </div>

        <!-- Student Data Section -->
        <div class="section">
            <h3>Student Information</h3>
            <table>
                <tr>
                    <td>ID:</td>
                    <td>{{ $student['id'] }}</td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td>{{ $student['name'] }}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>{{ $student['email'] }}</td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td>{{ $student['phone'] }}</td>
                </tr>
                <tr>
                    <td>Course:</td>
                    <td>{{ $student['course'] }}</td>
                </tr>
            </table>
        </div>

        <!-- Cookie/Session Data Section -->
        <div class="section">
            <h3>Session Information</h3>
            <p><strong>Logged in as:</strong> {{ $cookieData }}</p>
        </div>

        <!-- Back Link -->
        <div class="back-link">
            <a href="/">Back to Home</a>
        </div>
    </div>
</body>
</html>
