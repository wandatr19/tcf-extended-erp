<?php

namespace App\Http\Controllers\Checksheet;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\iDempiereModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ChecksheetOP\ChecksheetOPLineModel;
use App\Models\ChecksheetOP\ChecksheetOPPointModel;
use App\Models\ChecksheetOP\ChecksheetOPHeaderModel;

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
            'tcf_homeline.name as line_name',
            'm_product.name as machine_name',
        );

        if (!empty($search)) {
            $query->where(function ($dat) use ($search) {
                $dat->where('tcf_homeline_id', 'ILIKE', "%{$search}%")
                    ->orWhere('line_name', 'ILIKE', "%{$search}%");
            });
        }

        $data = $query->simplePaginate(10);

        $morePages = true;
        $pagination_obj = json_encode($data);
        if (empty($data->nextPageUrl())) {
            $morePages = false;
        }

        foreach ($data->items() as $line) {
            $dataUser[] = [
                'id' => $line->tcf_homeline_id,
                'text' => $line->line_name . ' (' . $line->machine_name . ')',
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
    public function get_operator(Request $request)
    {
        $search = $request->input('search');

        $query = User::select(
            'id',
            'employee_name',
        );

        if (!empty($search)) {
            $query->where(function ($dat) use ($search) {
                $dat->where('id', 'ILIKE', "%{$search}%")
                    ->orWhere('employee_name', 'ILIKE', "%{$search}%");
            });
        }

        $data = $query->simplePaginate(10);

        $morePages = true;
        $pagination_obj = json_encode($data);
        if (empty($data->nextPageUrl())) {
            $morePages = false;
        }

        foreach ($data->items() as $operator) {
            $dataUser[] = [
                'id' => $operator->id,
                'text' => $operator->employee_name
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

    public function get_mesin(string $id)
    {
        $part = iDempiereModel::getPart($id);

        if ($part) {
            return response()->json([
                'value' => $part->value,
                'name' => $part->name,
                'description' => $part->description,
            ]);
        } else {
            return response()->json(['error' => 'Part not found.'], 404);
        }
    }

    

}
