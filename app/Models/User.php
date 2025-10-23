<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


namespace App\Models;

class User 
{
    private static $dataAkun = [
        [
            'nama'=> 'Administrator A',
            'username' => 'admin',
            'password' => '123',
            'email' => 'admin@gmail.com',
            'no_hp' => '08231010333'
        ],
        [
            'nama'=> 'Petani',
            'username' => 'Wildan',
            'password' => '123',
            'email' => 'petani@gmail.com',
            'no_hp' => '08123456789'
        ],
    ];

    public static function all()
    {
        return self::$dataAkun;
    }

    public static function findByUsername($username)
    {
        foreach (self::$dataAkun as $user) {
            if ($user['username'] === $username) {
                return $user;
            }
        }
        return null;
    }
}
