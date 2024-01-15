@extends('layouts.app')
<?php
    use App\Models\User;
?>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="d-flex justify-content-between card-header">
                        {{ __('List of Posts') }}
                        <a href="{{route('post.create')}}"><button class="btn btn-primary">Create a new post</button></a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Name</th>
                                <th>Views</th>
                                <th></th>
                            </tr>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{User::find($post->user_id)->name}}</td>
                                    <td>{{$post->content}}</td>
                                    <td style="text-align: center">{{$post->num_views}}</td>
                                    <td><a href="{{route('post.show', $post->id)}}"><button type="button" class="btn btn-info">Show</button></a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
        
