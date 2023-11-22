<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;
    protected $table = 'tbl_HoaDon';
    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'NgayNhap',
        //'NgayNhanHang',
        'TongSoLuong',
        'TongTien',
        'isGroup',
        'idTrangThai',
        'idNhanVien',
        'idKhachHang'
    ];
}
