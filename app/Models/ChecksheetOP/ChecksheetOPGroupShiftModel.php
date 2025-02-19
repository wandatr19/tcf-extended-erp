<?php

namespace App\Models\ChecksheetOP;

use Illuminate\Database\Eloquent\Model;

class ChecksheetOPGroupShiftModel extends Model
{
    protected $table = 'cs_op_group_shift';
    protected $primaryKey = 'id_cs_op_group_shift';
    protected $fillable = [
        'org_id',
        'time',
        'group_name',
        'group_shift',
    ];
}
