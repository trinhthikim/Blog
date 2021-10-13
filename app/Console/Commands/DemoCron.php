<?php

namespace App\Console\Commands;

use App\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete inactive post after 7 day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $limit = Carbon::now()->subDay(7);
        $inactive_post = Post::where('updated_at', '<', $limit)->get();
        foreach ($inactive_post as $post) {
            $post->delete();
        }
    }
}
