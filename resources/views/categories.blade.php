<!-- resources/views/categories.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>
<body>
    <h1>Categories</h1>
    <a href="{{url('fetch-data-api')}}">Sync Data From API</a>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category ID</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->category_id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
               
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>

    </script>
</body>
</html>