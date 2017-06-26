<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App
 * @property Collection permissions
 * @property string asd
 */
class User extends Authenticatable {
	
    use  HasApiTokens, Notifiable;
	//use Notifiable;
	
    const TBL = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $table = self::TBL;
    
    public function permissions()
    {
	    return $this->belongsToMany('App\Permission', 'user_permissions', 'user_id', 'permission_id');
    }
    
}
