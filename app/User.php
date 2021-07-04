<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Establecer la relacion roles
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_role');
    }
    
    // Funcion que sirve para comprobar si el usuario posee los roles que se especifican en el parametro
    public function hasRoles(array $roles)
    {
        foreach ($this->roles as $userRole) {
            foreach ($roles as $role) {
                if ($userRole->name == $role) {
                    return true;
                }
            }
        }
        return false;
    }
}
