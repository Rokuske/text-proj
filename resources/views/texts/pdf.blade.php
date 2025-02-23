<!DOCTYPE html>
<html>
<head>
    <title>Text Export</title>
</head>
<body>
    <h1>Text #{{ $text->id }}</h1>
    <p>Created: {{ $text->created_at->format('Y-m-d H:i') }}</p>
    <hr>
    <pre style="font-family: Arial; font-size: 14px;">{{ $text->content }}</pre>
</body>
</html>