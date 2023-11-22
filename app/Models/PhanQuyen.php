<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanQuyen extends Model
{
    use HasFactory;
    protected $table = 'tbl_PhanQuyen';
    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = ['id', 'idQuyen','idNhom'];
}
