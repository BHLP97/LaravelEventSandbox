<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $notifications = Notification::where('notifiable_id', $user->id)->get();
        return view("notification.index",["unreadNotifications"=>Auth::user()->unreadnotifications, 
            "readNotifications"=>Auth::user()->notifications->whereNotNull('read_at')]);
    }

    /**
     * Read an unread notification
     */
    public function read($id)
    {
        $notification = Auth::user()->notifications->where('id', $id)->markAsRead();
        return redirect()->route("notification.index");
    }

    /**
     * Read all notifications
     */
    public function readAll()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->route("notification.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
