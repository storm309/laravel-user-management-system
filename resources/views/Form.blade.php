<!DOCTYPE html>
<html>
<head>
    <title>Laravel Form</title>
</head>
<body>

    <h2>Simple Form</h2>

    <form method="POST" action="/form-submit">
        @csrf

        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
            <div style="color:red">{{ $message }}</div>
        @enderror
        <br><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')
            <div style="color:red">{{ $message }}</div>
        @enderror
        <br><br>

        <button type="submit">Submit</button>
    </form>

</body>
</html>
