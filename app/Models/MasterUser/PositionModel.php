<?php

namespace App\Models\MasterUser;

use Illuminate\Database\Eloquent\Model;

class PositionModel extends Model
{
    protected $table = 'position';
    protected $fillable = [
        'id_position',
        'name',
    ];
    private static function _query($dataFilter)
    {
        $data= self::select(
            'id_position',
            'name',
        );

        $result = $data;
        return $result;
    }
    public static function getData($dataFilter, $settings)
    {
        return self::_query($dataFilter)->offset($settings['start'])
            ->limit($settings['limit'])
            ->orderBy('created_at', 'desc')
            ->get();
    }
    public static function countData($dataFilter)
    {
        return self::_query($dataFilter)->get()->count();
    }

}
