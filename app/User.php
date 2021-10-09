<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'email', 'password',
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
     * Return the user attributes.

     * @return array
     */
    public static function getAuthor($id)
    {
        $user = self::find($id);
        return [
            'id'     => $user->id,
            'first_name'   => $user->first_name,
            'last_name'   => $user->last_name,
            'phone'   => $user->phone,
            'email'  => $user->email,
            'url'    => '',  // Optional
            'avatar' => 'placehold',  // Default avatar
            'admin'  => $user->role === 1, // bool
        ];
    }    

    public function getAvatarAttribute()
    {
        return $this->attributes['avatar'] = 'https://placehold.it/80x80/00a65a/ffffff/&text='.$this->name[0];
    }
}
