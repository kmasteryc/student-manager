<?php

namespace App\Console\Commands;

use App\Models\MarkLayer\MarkType;
use Illuminate\Console\Command;

class SeedMarkType extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:mark-type';

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
	    $markTypes = [
		    [
			    'mark_type_name'=>'Kiểm tra miệng',
			    'mark_type_multiple'=>10
		    ],
		    [
			    'mark_type_name'=>'Kiểm tra 15 phút',
			    'mark_type_multiple'=>15
		    ],
		    [
			    'mark_type_name'=>'Kiểm tra 1 tiết',
			    'mark_type_multiple'=>25
		    ],
		    [
			    'mark_type_name'=>'Kiểm tra cuối kì',
			    'mark_type_multiple'=>50
		    ],
	    ];

	    foreach($markTypes as $markType){
		    MarkType::create($markType);
	    }
    }
}
