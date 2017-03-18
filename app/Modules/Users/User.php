<?php

namespace BB\Modules\Users;

use BB\Modules\Companies\Company;
use BB\Modules\Roles\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{
    use Notifiable;
    static public $user;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar','company_id','role_id'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function company(){

        return $this->belongsTo(Company::class);
    }

    public function role(){

        return $this->belongsTo(Role::class);
    }

    public function isAdmin(){

        if($this->role){
            return $this->role->name === "administrator" ? true : false;
        }

        return false;

    }

    public function isManager(){
        if($this->role) {
            return ($this->role->name === "manager") ? true : false;
        }

        return false;
    }

    public function isAdminOrManager(){

        return $this->isAdmin() || $this->isManager();
    }

    public function isApplicant(){
        if($this->role) {
            return $this->role->name === "applicant" ? true : false;
        }

        return false;
    }
}
