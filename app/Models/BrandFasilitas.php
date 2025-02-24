<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BrandFasilitas extends Model
{
    use HasFactory;
    protected $table = 'brandfasilitas';
    protected $primaryKey = 'kode_brand';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_brand',
        'nama_brand'
    ];

    public $timestamps = false;
}
