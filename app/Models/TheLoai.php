<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    use HasFactory;
    protected $table = 'tbl_TheLoai';
    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = ['id', 'name'];
}
