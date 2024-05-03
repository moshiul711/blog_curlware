<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use function Laravel\Prompts\select;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static $user, $image, $directory, $imageName, $imageUrl;
    public static function registerUserInfo($request)
    {
        self::$user = new User();
        self::$user->name = $request->name;
        self::$user->email = $request->email;
        self::$user->profession = $request->profession;
        self::$user->password = bcrypt($request->name);
        self::$user->image = self::storeUserImage($request);
        self::$user->save();
        return self::$user;
    }
    public static function storeUserImage($request)
    {
        self::$image = $request->file('image');
        self::$imageName     = self::$image->getClientOriginalName();
        self::$directory     = 'upload/user-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }
}
