<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {
	
	const TBL = "permissions";
	
	protected $table = self::TBL;
	
    public function users()
    {
	   
    }
    
}
