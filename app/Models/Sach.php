<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    use HasFactory;
    protected $table = 'tbl_Sach';
    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'idTheLoai',
        'idNhaXuatBan',
        'idTacGia',
        'DonGia',
        'SoLuongTon',
        'Sach',
        'Disabled'
    ];
}
