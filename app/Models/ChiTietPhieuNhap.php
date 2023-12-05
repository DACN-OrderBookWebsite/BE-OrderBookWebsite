<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietPhieuNhap extends Model
{
    use HasFactory;
    protected $table = 'tbl_ChiTietPhieuNhap';
    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'idSanPham',
        'idPhieuNhap',
        'SoLuong',
        'DonGiaNhap'
    ];
}
