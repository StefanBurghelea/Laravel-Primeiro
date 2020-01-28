<?php

namespace App\Console\Commands;

use App\Company;
use Illuminate\Console\Command;

class AddCompanyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contact:company';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds new Company';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('Whats is the company name ?');
        $phone = $this->ask('Whats is the Company phone number ?');

        if($this->confirm('Are you ready to insert '. $name.'?')){

        $company = Company::create([
            'name' => $name,
            'phone' => $phone,
        ]); 

        }
        $this->info('Muito bem '.$company->name);
    }
}
