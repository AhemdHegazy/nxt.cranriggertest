<?php

namespace App\Console\Commands;

use App\Package;
use App\Post;
use App\Question;
use App\Subject;
use Illuminate\Console\Command;

class SeedApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:app';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $this->askForFactory('Subject Count', Subject::class);
        $this->askForFactory('Questions With Options Count', Question::class);
        $this->askForFactory('Package Count', Package::class);
        $this->askForFactory('Post Count', Post::class);
    }

    private function askForFactory($question, $class)
    {
        $count = (int) $this->ask($question, 5);
        factory($class, $count)->create();
    }
}
