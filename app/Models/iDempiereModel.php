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
                    ->where('isactive', 'Y')
                    ->where('ad_client_id', '1000000')
                    ->where('iscustomer', 'Y');
    }
    public function scopeFromPart($query)
    {
        return $query->from('m_product')
                    ->where('isactive', 'Y')
                    ->where('ad_client_id', '1000000');
    }
    public static function getPart($part_id)
    {
        $query = self::fromPart()->select(
            'm_product.m_product_id',
            'm_product.name',
            'm_product.value',
            'm_product.description',
        );

        $query->where('m_product.m_product_id', $part_id);

        return $query->first();

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
                //  ->leftJoin('m_product', 'tcf_homeline.m_product_id', '=', 'm_product.m_product_id');
    }

    
}
