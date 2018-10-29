<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use DB;

class cronPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'publish:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'publish posts where status = 3 every 9:00 am';

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
        $publish = DB::table('posts')->where('status', 3)->update(['status'=>4]);
    }

}
