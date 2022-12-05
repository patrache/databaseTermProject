<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>userList</title>
    </head>
    <body>
        <div><a href="/">main</a></div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table>
            <thead>
                <th>id</th>
                <th>name</th>
                <th>nickname</th>
                <th>email</th>
                <th>password</th>
                <th>tel</th>
            </thead>
            <tbody>
            @foreach ( $userlist as $user )
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->nickname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->tel }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>    
    </body>
</html>