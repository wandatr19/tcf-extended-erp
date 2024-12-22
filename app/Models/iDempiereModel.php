<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class iDempiereModel extends Model
{
    //
    use HasFactory;
    protected $connection = 'idempiere';
    protected $table = 'c_bpartner';
}
