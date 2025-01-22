<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\LPPKmodel;
use Illuminate\Http\Request;
use App\Models\LPPKImageModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LPPKController extends Controller
{
    public function index()
    {
        $dataPage = [
            'page' => 'lppk-index'
        ];
        return view('lppk.index', $dataPage);
    }
    public function input()
    {
        $dataPage = [
            'page' => 'lppk-input'
        ];
        return view('lppk.input', $dataPage);
    }
    public function monitor()
    {
        $dataPage = [
            'page' => 'lppk-monitor'
        ];
        return view('lppk.monitor', $dataPage);
    }
    public function logbook()
    {
        $dataPage = [
            'page' => 'lppk-logbook'
        ];
        return view('lppk.logbook', $dataPage);
    }
    public function store_request_lppk(Request $request)
    {
        $dataValidate = [
            'no_lppk' => 'required',
            'part_code' => 'nullable',
            'part_name' => 'nullable',
            'part_type' => 'nullable',
            'partner' => 'nullable',
            'issued_date' => 'required',
            'target_close' => 'required',
            'problem_type' => 'nullable',
            'problem_desc' => 'nullable',
            'image1' => 'nullable',
            'image2' => 'nullable',
            'image3' => 'nullable',
        ];
        $validator = Validator::make(request()->all(), $dataValidate);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json(['message' => $errors], 402);
        }

        try {
            DB::beginTransaction();
            $dataLPPK = LPPKmodel::create([
                'no_lppk' => $request->no_lppk,
                'part_code' => $request->part_code,
                'part_name' => $request->part_name,
                'part_type' => $request->part_type,
                'partner' => $request->partner,
                'issued_date' => $request->issued_date,
                'deadline_date' => $request->target_close,
                'problem_type' => $request->problem_type,
                'problem_desc' => $request->problem_desc,
                'issue_by' => Auth()->User()->name,
                'status_doc' => 'OPEN',
            ]);

            $images = [$request->image1, $request->image2, $request->image3];
            foreach ($images as $image) {
                if ($image) {
                    LPPKImageModel::create([
                        'lppk_id' => $dataLPPK->id_lppk,
                        'image_path' => $image,
                    ]);
                }
            }

            DB::commit();
            return response()->json(['message' => 'Data successfully saved'], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Failed to save data', 'error' => $e->getMessage()], 500);
        }
    }
    public function logbook_datatable(Request $request)
    {
        $columns = array(
            0 => 'part_name',
            1 => 'problem_desc',
            2 => 'no_lppk',
            3 => 'issued_date',
            4 => 'deadline_date',
            5 => 'status_doc',

        );

        $totalData = LPPKmodel::count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = (!empty($request->input('order.0.column'))) ? $columns[$request->input('order.0.column')] : $columns[0];
        $dir = (!empty($request->input('order.0.dir'))) ? $request->input('order.0.dir') : "DESC";

        $settings['start'] = $start;
        $settings['limit'] = $limit;
        $settings['dir'] = $dir;
        $settings['order'] = $order;

        $dataFilter = [];
        $search = $request->input('search.value');
        if (!empty($search)) {
            $dataFilter['search'] = $search;
        }

        $sto = LPPKmodel::getData($dataFilter, $settings);
        $totalFiltered = LPPKmodel::countData($dataFilter);

        $dataTable = [];

        if (!empty($sto)) {
            foreach ($sto as $data) {
                $nestedData['part_name'] = $data->part_code;
                $nestedData['problem_desc'] = $data->problem_desc;
                $nestedData['no_lppk'] = $data->no_lppk;
                $nestedData['issued_date'] = $data->issued_date;
                $nestedData['deadline_date'] = $data->deadline_date;
                $nestedData['status_doc'] = $data->status_doc;
                $nestedData['action'] = '<div class="btn-group">
                        <button type="button" class="waves-effect waves-light btn btn-success btnOpen" data-id="' . $data->id_lppk . '"><i class="fa fa-folder-open-o"></i></button>                    
                        <button type="button" class="waves-effect waves-light btn btn-danger btnDelete" data-id="' . $data->id_lppk . '"><i class="fa fa-trash-o"></i></button>
                </div>';
                $dataTable[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $dataTable,
            "order" => $order,
            "statusFilter" => !empty($dataFilter['statusFilter']) ? $dataFilter['statusFilter'] : "Kosong",
            "dir" => $dir,
        );

        return response()->json($json_data, 200);   
    }
    public function input_progress_repair($id)
    {
        // $dataPage = [
        //     'page' => 'lppk-input-progress',
        //     'id' => $id
        // ];
        // return view('lppk.input-progress', $dataPage);
    }
}
