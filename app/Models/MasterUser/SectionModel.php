<?php

namespace App\Models\MasterUser;

use Illuminate\Database\Eloquent\Model;

class SectionModel extends Model
{
    protected $table = 'section';
    protected $fillable = [
        'id_section',
        'department_id',
        'name',
    ];
    private static function _query($dataFilter)
    {
        $data= self::select(
            'id_section',
            'name',
        );

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
