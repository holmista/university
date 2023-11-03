<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Task1\Homework;
use Faker\Generator as Faker;
use Throwable;

class CreateRandomHomeworks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-random-homeworks {amount}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates random homeworks';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        for ($i = 0; $i < $this->argument('amount'); $i++) {
            $randomHomework = Homework::createRandom();
            $this->save($randomHomework);
        }
    }

    public function save(Homework $homework): void
    {
        try{
            $fp = fopen('todos.log', 'a');
            fwrite($fp, $homework->toString());
        }
        catch(Throwable $e){
            echo $e->getMessage();
        }
        finally{
            fclose($fp);
        }
    }
}
