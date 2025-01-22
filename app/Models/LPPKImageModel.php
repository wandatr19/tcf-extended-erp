<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LPPKImageModel extends Model
{
    protected $table = "lppk_image";
    protected $primaryKey = 'id_lppk_image';
    protected $fillable = [
        'lppk_id',
        'image_path',
    ];

    public function lppk()
    {
        return $this->belongsTo(LPPKmodel::class, 'lppk_id', 'id_lppk');
    }
}
