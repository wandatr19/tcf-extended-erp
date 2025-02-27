<?php

namespace App\Http\Controllers\Checksheet;

use Illuminate\Http\Request;
use App\Models\iDempiereModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ChecksheetOP\ChecksheetOPPointModel;
use App\Models\ChecksheetOP\ChecksheetOPHeaderModel;
use App\Models\ChecksheetOP\ChecksheetOPLineModel;

class ChecksheetOpController extends Controller
{
    public function index(){
        $dataPage = [
            'page' => 'checksheet-op-form'
        ];
        return view('checksheet_operator.form', $dataPage);
    }
    public function get_machine(Request $request)
    {
        $search = $request->input('search');

        $query = iDempiereModel::fromMachine()->select(
            'm_product_id',
            'name',
        );

        if (!empty($search)) {
            $query->where(function ($dat) use ($search) {
                $dat->where('m_product_id', 'ILIKE', "%{$search}%")
                    ->orWhere('name', 'ILIKE', "%{$search}%");
            });
        }

        $data = $query->simplePaginate(10);

        $morePages = true;
        $pagination_obj = json_encode($data);
        if (empty($data->nextPageUrl())) {
            $morePages = false;
        }

        foreach ($data->items() as $customer) {
            $dataUser[] = [
                'id' => $customer->m_product_id,
                'text' => $customer->name
            ];
        }

        $results = array(
            "results" => $dataUser,
            "pagination" => array(
                "more" => $morePages
            )
        );
        return response()->json($results);
    }
    public function get_homeline(Request $request)
    {
        $search = $request->input('search');

        $query = iDempiereModel::fromHomeLine()->select(
            'tcf_homeline_id',
            'name',
        );

        if (!empty($search)) {
            $query->where(function ($dat) use ($search) {
                $dat->where('tcf_homeline_id', 'ILIKE', "%{$search}%")
                    ->orWhere('name', 'ILIKE', "%{$search}%");
            });
        }

        $data = $query->simplePaginate(10);

        $morePages = true;
        $pagination_obj = json_encode($data);
        if (empty($data->nextPageUrl())) {
            $morePages = false;
        }

        foreach ($data->items() as $customer) {
            $dataUser[] = [
                'id' => $customer->tcf_homeline_id,
                'text' => $customer->name
            ];
        }

        $results = array(
            "results" => $dataUser,
            "pagination" => array(
                "more" => $morePages
            )
        );
        return response()->json($results);
    }

    

}
