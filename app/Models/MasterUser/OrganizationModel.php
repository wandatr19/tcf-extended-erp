<?php

namespace App\Models\MasterUser;

use Illuminate\Database\Eloquent\Model;

class OrganizationModel extends Model
{
    protected $table = 'organization';
    protected $fillable = [
        'name',
        'address',
    ];

    private static function _query($dataFilter)
    {
        $data= self::select(
            'id_org',
            'name',
            'address',
        );

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
