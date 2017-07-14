<?php

namespace App\Console\Commands\Film;

use App\Jobs\Film\Import as ImportJob;
use File;
use Illuminate\Console\Command;

class Import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:film';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import film list from The Movie Database and send to queue';

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
        $path = database_path('import/movies');

        if (!File::exists($path)) {
            $this->error('File not found: ' . $path);
            return false;
        }

        $films = explode("\n", File::get($path));

        $bar = $this->output->createProgressBar(count($films));

        foreach ($films as $json) {
            $film = json_decode($json);

            dispatch(new ImportJob($film));

            $bar->advance();
        }

        $bar->finish();
    }
}
