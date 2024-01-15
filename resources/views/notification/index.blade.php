@extends('layouts.app')
<?php
    use App\Models\User;
?>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('List of Unread Notifications') }}</div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Viewer</th>
                                <th>Content</th>
                                <th></th>
                            </tr>
                            @foreach ($unreadNotifications as $notification)
                                <tr id={{$notification->id}}>
                                    <td>{{User::find(($notification->data)['viewer_id'])->name}}</td>
                                    <td>{{($notification->data)['post_content']}}</td>
                                    <td><button type="button" class="btn btn-info read">Mark as Read</button></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div style="text-align: center; margin:20px">
                        <button type="button" class="btn btn-primary readall">Mark as all Read</button></a>
                    </div>
                </div>
                <div class="card" style="margin-top:20px">
                    <div class="card-header">{{ __('List of Read Notifications') }}</div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Viewer</th>
                                <th>Content</th>
                            </tr>
                            @foreach ($readNotifications as $notification)
                                <tr>
                                    <td>{{User::find(($notification->data)['viewer_id'])->name}}</td>
                                    <td>{{($notification->data)['post_content']}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script>
    $(".read").click(function(){
        var id = $(this).parent().parent().attr('id');
        console.log(id);
        $.ajax({
            type: 'post',
            url: 'notif/read/'+id,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            traditional: true,
            success: function (data) {
                console.log(data)
            }
        });
    });
    $(".readall").click(function(){
        $.ajax({
            type: 'post',
            url: 'notif/readall',
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            traditional: true,
            success: function (data) {
                console.log(data)
            }
        });
    });
</script>
@endsection
