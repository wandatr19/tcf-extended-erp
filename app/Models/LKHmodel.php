<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LKHmodel extends Model
{
    use HasFactory;
    protected $table = 'lkh';
    protected $fillable = [
        'line',
        'shift',
        'customer',
        'part_no',
        'prod_date',
        'hole_ta',
        'hole_tembus',
        'hole_mencuat',
        'hole_geser',
        'hole_doubleprc',
        'hole_mengecil',
        'neck',
        'crack_p',
        'glmbg_krpt',
        'trim_over',
        'trim_min',
        'trim_mencuat',
        'bend_min',
        'bend_over',
        'emb_geser',
        'double_emb',
        'penyok_defom',
        'krg_stamp',
        'material_s',
        'baret_scratch',
        'dent',
        'others',
        'dies_process',
        'time_start',
        'time_finish',
        'sampling',
        'total_prod',
        'part_ok',
        'part_repair',
        'part_reject',
        'verifikasi',
    ];
}
