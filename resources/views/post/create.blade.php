@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create a Post') }}</div>
                    <div class="card-body">
                        <form action="{{route('post.store')}}" method="POST">
                            @csrf
                            <textarea class="form-control col-12" id="postContent" name="postContent" placeholder="Write your post here"></textarea>
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            @endif
                            <button type="submit">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
        
