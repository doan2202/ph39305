<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List</title>
</head>
<body>
    <h1>Categories List</h1>
    <table border="1">
        <tr>
            <th>#ID</th>
            <th>Name</th>
            <th><a href="">Add new</a></th>
        </tr>
        @foreach ( $categories as $c )
        <tr>
            <td>{{$c->id}}</td>
            <td>{{$c->name}}</td>
            <td>Edit
                Delete
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
