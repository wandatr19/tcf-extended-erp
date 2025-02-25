<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LPPKmodel extends Model
{
    protected $table = "lppk";
    protected $primaryKey = 'id_lppk';
    protected $fillable = [
        'no_lppk',
        'part_id',
        'part_code',
        'part_name',
        'part_desc',
        'issued_by',
        'partner_id',
        'partner_name',
        'issued_date',
        'deadline_date',
        'problem_type',
        'problem_desc',
        'material',
        'lot_material',
        'quantity',
        'status_doc',
        'approval_doc',
        'repair_desc',
        'action_status',
        'analyze_why',
        'temp_action',
        'perm_action',
    ];

    private static function _query($dataFilter)
    {
        $data = self::select(
            'id_lppk',
            'no_lppk',
            'part_code',
            'part_name',
            'part_desc',
            'issued_by',
            'partner_id',
            'partner_name',
            'issued_date',
            'deadline_date',
            'problem_type',
            'problem_desc',
            'material',
            'lot_material',
            'quantity',
            'status_doc',
            'approval_doc',
            'repair_desc',
            'action_status',
            'analyze_why',
            'temp_action',
            'perm_action',
        );

        // $data->leftJoin('lppk_image', 'lppk.id_lppk', '=', 'lppk_image.lppk_id');
        //     ->addSelect('lppk_image.image_path as image_path')
        //     ->addSelect('lppk_image.image_name as image_name');

        if (isset($dataFilter['search'])) {
            $search = $dataFilter['search'];
            $data->where(function ($query) use ($search) {
                $query->where('part_code', 'ILIKE', "%{$search}%")
                    ->orWhere('part_name', 'ILIKE', "%{$search}%")
                    ->orWhere('partner', 'ILIKE', "%{$search}%")
                    ->orWhere('no_lppk', 'ILIKE', "%{$search}%")
                    ->orWhere('problem_desc', 'ILIKE', "%{$search}%");
            });
        }

        $result = $data;
        return $result;

    }

    public static function getData($dataFilter, $settings)
    {
        return self::_query($dataFilter)->offset($settings['start'])
            ->limit($settings['limit'])
            ->orderBy($settings['order'], $settings['dir'])
            ->get();
    }
    public static function countData($dataFilter)
    {
        return self::_query($dataFilter)->get()->count();
    }
}
