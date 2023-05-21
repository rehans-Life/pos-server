<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function addUser($data)
    {
        // This returns a boolean as to weather the data
        // has been inserted or not.
        $result = DB::table('users')->insert($data);
        return $result;
    }


    public function getUserWithEmail($email)
    {
        $result = DB::table('users')->where("email", "=", $email)->get();
        return $result;
    }

    public function getUser($credentails)
    {
        $result = DB::table('users')
            ->where("email", "=", $credentails['email'])
            ->where("password", "=", $credentails['password'])
            ->get();
        return $result;
    }

}