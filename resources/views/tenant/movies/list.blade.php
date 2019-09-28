<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div>
    <p>User : {{ auth()->user()->name }}</p>
    <p><a href="{{ route('user.logout') }}">Logout</a></p>
</div>

<div>
    <form action="{{ route('tenant.movies.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Movie Title">
        <input type="number" min="1800" max="{{ date('Y') }}" placeholder="Movie Year" name="year">
        <button type="submit">Add Movie</button>
    </form>
</div>

<table>
    <thead>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Year</td>
    </tr>
    </thead>
    @if($movies)
        @foreach($movies as $movie)
            <tr>
                <td>{{ $movie->id }}</td>
                <td>{{ $movie->name }}</td>
                <td>{{ $movie->year }}</td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="3">No Movies</td>
        </tr>
    @endif
</table>
</body>
</html>
