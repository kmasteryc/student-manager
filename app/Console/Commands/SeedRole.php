<?php

namespace App\Console\Commands;

use App\Models\UserLayer\Role;
use Illuminate\Console\Command;

class SeedRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:role';

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
        $roles = [
	      'Học sinh','Phụ huynh','Giáo viên','Hiệu trưởng'
        ];
	    foreach ($roles as $role){
		    Role::create([
			    'role_name' => $role
		    ]);
	    }
    }
}
