<?php

namespace App\Listeners;

use App\Events\PostViewed;
use App\Models\Notification;
use App\Models\User;
use App\Notifications\ViewPost;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\alert;

class SendPostNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostViewed $event): void
    {
        $postAuthor = User::find($event->post->user_id);
        if($postAuthor->id != Auth::id()){
            $postAuthor->notify(new ViewPost($event->viewer, $event->post));
        }
        $event->post->increment('num_views');
    }
}
