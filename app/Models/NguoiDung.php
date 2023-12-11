<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class NguoiDung extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tbl_nguoidung';
    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'TenDangNhap',
        'MatKhau',
        //'NgaySinh',
        'SDT',
        'DiaChi',
        'Email',
        'NgayTao',
        'NgayThayDoi',
        'idChucVu',
        'GioiTinh',
        'Anh',
        'Disabled',
    ];
    protected $hidden = [
        'remember_token',
    ];
    public function findForPassport($username)
    {
        return $this->where('TenDangNhap', $username)->first();
    }

    public function getAuthPassword()
    {
        return $this->MatKhau;
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
