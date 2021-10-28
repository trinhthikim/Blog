<?php

namespace App\Jobs;

use App\PostLog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessLog implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user_id;
    protected $post_id;
    protected $type;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_id, $post_id, $type)
    {
        $this->user_id = $user_id;
        $this->post_id = $post_id;
        $this->type = $type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        echo 'Start send log';
        $log = new PostLog([
            'user_id' => $this->user_id,
            'post_id' => $this->post_id,
            'type' => $this->type
        ]);
        $log->save();
        echo 'End send log';
    }
}
