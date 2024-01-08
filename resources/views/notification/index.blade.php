<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body class="antialiased">
        <table>
            <tr>
                <th>ID</th>
                <th>Content</th>
                <th>Created at</th>
            </tr>
            @foreach ($notifications as $notification)
                <tr>
                    <td>{{$notification->id}}</td>
                    <td>{{$notification->content}}</td>
                    <td>{{$notification->created_at}}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>