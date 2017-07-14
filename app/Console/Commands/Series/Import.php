<?php

namespace App\Console\Commands\Series;

use App\Jobs\Series\Import as ImportJob;
use File;
use Illuminate\Console\Command;

class Import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:series';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import series from The Movie Database and send to queue';

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
        $path = database_path('import/series');

        if (!File::exists($path)) {
            $this->error('File not found: ' . $path);
            return false;
        }

        $series = explode("\n", File::get($path));

        $bar = $this->output->createProgressBar(count($series));

        foreach ($series as $json) {
            $tv = json_decode($json);

            dispatch(new ImportJob($tv));

            $bar->advance();
        }

        $bar->finish();
    }
}
