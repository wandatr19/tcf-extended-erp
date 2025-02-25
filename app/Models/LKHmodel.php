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
    private static function _query ($dataFilter)
    {
        $data = self::select(
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
            );

        // if (!empty($dataFilter['filter_date'])) {
        //     $data->whereDate('prod_date', $dataFilter['filter_date']);
        // }

        if (isset($dataFilter['search'])) {
            $search = $dataFilter['search'];
            $data->where(function ($query) use ($search) {
                $query->where('part_no', 'ILIKE', "%{$search}%")
                    ->orWhere('customer', 'ILIKE', "%{$search}%");
            });
        }


        $result = $data;
        return $result;
    }
    public static function getData($dataFilter, $settings)
    {
        return self::_query($dataFilter)->offset($settings['start'])
            ->limit($settings['limit'])
            ->orderBy('created_at', 'DESC')
            ->get();
    }
    public static function countData($dataFilter)
    {
        return self::_query($dataFilter)->get()->count();
    }

}
