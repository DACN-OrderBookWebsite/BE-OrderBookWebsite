<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    use HasFactory;

    protected $table = 'tbl_NguoiDung';
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
        'Disabled'
    ];
}
