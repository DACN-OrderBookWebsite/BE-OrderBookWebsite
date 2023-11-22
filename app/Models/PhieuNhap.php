<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuNhap extends Model
{
    use HasFactory;
    protected $table = 'tbl_PhieuNhap';
    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'NgayNhap',
        'NgayNhanHang',
        'TongSoLuong',
        'TongTien',
        'idTrangThai',
        'idNhanVien',
        'idNhaCungCap'
    ];
}
