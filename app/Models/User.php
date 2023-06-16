<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    protected $fillable = [
        'name',
        'user_name',
        'mobile',
        'email',
        'phone',
        'photo',
        'is_admin',
        'status',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function saveImage($file)
    {
        if ($file) {
            $name = time() . rand(1000, 1000000) . '.' . $file->extension(); //jpg,jpeg,png
            $smallImage = Image::make($file->getRealPath());  //get path
            $bigImage = Image::make($file->getRealPath());
            $smallImage->resize(256, 256, function ($constraint) {  //constraint -> محدودیت
                $constraint->aspectRatio(); //نسبت و اندازه عکس ثابت نگه داره
            });
            Storage::disk('local')->put('admin/images/users/small/' . $name, (string)$smallImage->encode('png', 90));
            Storage::disk('local')->put('admin/images/users/big/' . $name, (string)$bigImage->encode('png', 90));
            return $name;

        } else {
            return '';
        }
    }

}
