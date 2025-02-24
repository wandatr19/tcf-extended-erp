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

    public function scopeFromPartner($query)
    {
        return $query->from('c_bpartner')
                    // ->whereIn('ad_org_id', [1000001, 1000002])
                    ->where('isactive', 'Y')
                    ->where('iscustomer', 'Y');
    }
    public function scopeFromPart($query)
    {
        return $query->from('m_product')
                    ->where('isactive', 'Y');
    }

    public function scopeFromMachine($query)
    {
        return $query->from('m_product')
                    ->where('m_product_category_id', '1000024')
                    ->where('isactive', 'Y');
    }

    public function scopeFromHomeLine($query)
    {
        return $query->from('tcf_homeline');
    }

    
}
