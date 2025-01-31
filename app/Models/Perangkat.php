<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perangkat extends Model
{
    use HasFactory;
    protected $table = 'listperangkat';

    protected $fillable = [
        'WDM', 'kode_region', 'kode_site', 'no_rack', 'kode_pkt', 'pkt_ke', 'kode_brand', 'type', 'uawal', 'uakhir',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class, 'kode_region', 'kode_region');
    }

    public function site()
    {
        return $this->belongsTo(Region::class, 'kode_site', 'kode_site');
    }
}
