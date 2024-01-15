@extends('layouts.app')
<?php
    use App\Models\User;
?>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h5">Post from {{User::find($post->user_id)->name}}</div>
                <div class="card-body">
                    {{$post->content}}
                </div>
                <div class="card-footer">
                    <div style="float: right">
                        Number of views so far: {{$post->num_views}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection