<?php

namespace App\Models\ChecksheetOP;

use Illuminate\Database\Eloquent\Model;

class ChecksheetOPLineModel extends Model
{
    protected $table = 'cs_op_line';
    protected $primaryKey = 'id_cs_op_line';
    protected $fillable = [
        'cs_op_header_id',
        'cs_op_pointspv_id',
        'cs_op_group_shift_id',
        'org_id',
        'status',
        'checked_at',
        'description',
    ];

    public function header()
    {
        return $this->belongsTo(ChecksheetOPHeaderModel::class, 'cs_op_header_id', 'id_cs_op_header');
    }
    public function pointspv()
    {
        return $this->belongsTo(ChecksheetOPPointModel::class, 'cs_op_pointspv_id', 'id_cs_op_pointspv')
        ->orderBy('order_no', 'asc');
    }
    public function group_shift()
    {
        return $this->belongsTo(ChecksheetOPGroupShiftModel::class, 'cs_op_group_shift_id', 'id_cs_op_group_shift');
    }
}
