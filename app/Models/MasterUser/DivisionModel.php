<?php

namespace App\Models\MasterUser;

use Illuminate\Database\Eloquent\Model;

class DivisionModel extends Model
{
    protected $table = 'division';
    protected $fillable = [
        'id_division',
        'name',
    ];
    private static function _query($dataFilter)
    {
        $data= self::select(
            'id_division',
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
