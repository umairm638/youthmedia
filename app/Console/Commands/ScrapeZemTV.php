<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\ScrapeController;
class ScrapeZemTV extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:zemtv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape Zem TV Videos with URL, Image, Title etc';

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
        $obj = new ScrapeController;
        $obj->saveZemtv();
    }
}
