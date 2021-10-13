<?php

namespace App\Listeners;

use App\Events\EditPost;
use App\Jobs\ProcessLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveLog
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EditPost  $event
     * @return void
     */
    public function handle(EditPost $event)
    {
        $userId = $event->postLog->user_id;
        $postId = $event->postLog->post_id;
        $type = $event->postLog->type;
        ProcessLog::dispatch($userId, $postId, $type);
    }
}
