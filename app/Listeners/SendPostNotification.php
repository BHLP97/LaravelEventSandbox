<?php

namespace App\Listeners;

use App\Events\PostViewed;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        $post = $event->post;

        $notification = new Notification();
        $notification->content = "Đã có người xem bài viết của bạn";
        $notification->save();
        $post->increment('num_views');
    }
}
