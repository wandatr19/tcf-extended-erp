<?php

namespace App\Models\ChecksheetOP;

use Illuminate\Database\Eloquent\Model;

class ChecksheetOPPointModel extends Model
{
    protected $table = 'cs_op_pointspv';
    protected $primaryKey = 'id_cs_op_pointspv';
    protected $fillable = [
        'org_id',
        'order_no',
        'name',
        'group',
    ];
}
