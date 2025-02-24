<?php

namespace App\Models\ChecksheetOP;

use Illuminate\Database\Eloquent\Model;

class ChecksheetOPHeaderModel extends Model
{
    protected $table = 'cs_op_header';
    protected $primaryKey = 'id_cs_op_header';
    protected $fillable = [
        'org_id',
        'doc_number',
        'karyawan_id',
        'nama_karyawan',
        'shift',
        'issued_at',
        'prod_date',
        'idem_mesin_id',
        'nama_mesin',
        'idem_homeline_id',
        'nama_homeline',
        'status_doc',
        'checked_at',
        'checked_by',
    ];

    private static function _query ($dataFilter)
    {
        $data = self::select(
            'id_cs_op_header',
            'org_id',
            'doc_number',
            'karyawan_id',
            'nama_karyawan',
            'shift',
            'issued_at',
            'prod_date',
            'idem_mesin_id',
            'nama_mesin',
            'idem_homeline_id',
            'nama_homeline',
            'status_doc',
            'checked_at',
            'checked_by',
        );

        if (!empty($dataFilter['filter_date'])) {
            $data->whereDate('prod_date', $dataFilter['filter_date']);
        }
        if (!empty($dataFilter['filter_machine'])) {
            $data->where('idem_mesin_id', $dataFilter['filter_machine']);
        }
        if (!empty($dataFilter['filter_shift'])) {
            $data->where('shift', $dataFilter['filter_shift']);
        }

        if (isset($dataFilter['search'])) {
            $search = $dataFilter['search'];
            $data->where(function ($query) use ($search) {
                $query->where('nama_karyawan', 'ILIKE', "%{$search}%")
                    ->orWhere('nama_mesin', 'ILIKE', "%{$search}%");
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
