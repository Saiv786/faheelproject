<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use MichaelGrimshaw\MailTracker\traits\TrackableTrait;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable,TrackableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id', 'image_url','contact_no','address', 'email_counts','emails_sent'
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
        'role_id' => 'integer',
        'image_url' => 'string',
        'contact_no' => 'string',
        'address' => 'string',
        'email_counts' => 'integer',
        'emails_sent' => 'integer',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }
    public function isAdmin()
    {
        $role = \App\Role::where('name', 'Admin')->first();
        return $role->id == $this->role_id;
    }
}
