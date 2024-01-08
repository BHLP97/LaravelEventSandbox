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
                <th>Name</th>
                <th>Number of Views</th>
            </tr>
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->name}}</td>
                <td>{{$post->num_views}}</td>
            </tr>
        </table>
    </body>
</html>