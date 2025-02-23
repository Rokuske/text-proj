<!DOCTYPE html>
<html>
<head>
    <title>Text App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Add Text</h1>
        
        <!-- Форма -->
        <form method="POST" action="{{ route('texts.store') }}">
            @csrf
            <div class="mb-3">
                <textarea class="form-control" name="content" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

        <!-- Список текстов -->
        <h2 class="mt-5">Saved Texts</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($texts as $text)
                <tr>
                    <td>{{ $text->id }}</td>
                    <td>{{ $text->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <a href="{{ route('texts.pdf', $text->id) }}" 
                           class="btn btn-sm btn-success">
                            Export PDF
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>