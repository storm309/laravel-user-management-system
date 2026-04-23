<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>

    <h2>Upload File</h2>

    <form method="POST" action="/upload" enctype="multipart/form-data">
        @csrf

        <label>Select File:</label>
        <input type="file" name="file">
        @error('file')
            <div style="color:red">{{ $message }}</div>
        @enderror
        <br><br>

        <button type="submit">Upload</button>
    </form>

</body>
</html>
