<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
</head>
<body>
    <h1>User List</h1>
    <table border="10">
        <tr>
            <td>ID</td>
            <td>Name</td>   
            <td>Email</td>
        </tr>
        @foreach ($users as $user)
        <tr> 
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
