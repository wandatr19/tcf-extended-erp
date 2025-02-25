<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\LPPKmodel;
use Illuminate\Http\Request;
use App\Models\iDempiereModel;
use App\Models\LPPKImageModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
            'part_desc' => 'nullable',
            'partner' => 'nullable',
            'issued_date' => 'required',
            'target_close' => 'required',
            'problem_type' => 'nullable',
            'problem_desc' => 'nullable',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
                'part_id' => $request->part_id,
                'part_code' => $request->part_code,
                'part_name' => $request->part_name,
                'part_desc' => $request->part_desc,
                'partner_name' => $request->partner,
                'issued_date' => $request->issued_date,
                'deadline_date' => $request->target_close,
                'material' => $request->material,
                'lot_material' => $request->lot_material,
                'quantity' => $request->quantity,
                'problem_type' => $request->problem_type,
                'problem_desc' => $request->problem_desc,
                'issued_by' => auth()->user()->name,
                'status_doc' => 'OPEN',
            ]);
            $images = array_filter([$request->file('image1'), $request->file('image2'), $request->file('image3')]);
            foreach ($images as $image) {
                $imagePath = $image->store('lppk_image', 'public');
                LPPKImageModel::create([
                    'lppk_id' => $dataLPPK->id_lppk,
                    'image_path' => $imagePath,
                    'image_name' => $image->getClientOriginalName(),
                ]);
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
            6 => 'issued_by',
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
                $nestedData['part_name'] = $data->part_name;
                $nestedData['problem_desc'] = $data->problem_desc;
                $nestedData['no_lppk'] = $data->no_lppk;
                $nestedData['issued_date'] = $data->issued_date;
                $nestedData['deadline_date'] = $data->deadline_date;
                if ($data->status_doc == 'OPEN') {
                    $nestedData['status_doc'] = '<span class="badge badge-pill badge-danger font-weight-bolder">OPEN</span>';
                } elseif ($data->status_doc == 'CLOSED') {
                    $nestedData['status_doc'] = '<span class="badge badge-pill badge-success font-weight-bolder">CLOSED</span>';
                } else {
                    $nestedData['status_doc'] = $data->status_doc;
                }
                $nestedData['issued_by'] = $data->issued_by;
                $nestedData['action'] = '<div class="btn-group" style="text-align: center;">
                        <button type="button" class="waves-effect waves-light btn btn-success btnOpen" 
                            data-id="' . $data->id_lppk . '"
                            data-no-lppk="' . $data->no_lppk . '"
                            data-part-code="' . $data->part_code . '"
                            data-part-name="' . $data->part_name . '"
                            data-part-desc="' . $data->part_desc . '"
                            data-problem-desc="' . $data->problem_desc . '"
                            data-problem-type="' . $data->problem_type . '"
                            data-quantity="' . $data->quantity . '"
                            data-image-path="' . $data->image_path . '"
                            data-image-name="' . $data->image_name . '"
                            ><i class="fa fa-folder-open-o"></i></button>                    
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
    public function input_repair(Request $request, string $id)
    {
        $dataValidate = [

        ];

        $validator = Validator::make(request()->all(), $dataValidate);
        if ($validator->fails()) {
            return response()->json(['message' => 'Fill your input correctly!'], 402);
        }

        $lppk = LPPKmodel::find($id);
    }
    public function getLastNoLppk(Request $request)
    {
        try {
            $lastLppk = DB::table('lppk')->orderBy('id_lppk', 'desc')->first();
            $lastNumber = $lastLppk ? $lastLppk->no_lppk : 0;

            return response()->json(['last_number' => $lastNumber], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Failed to retrieve last LPPK number', 'error' => $e->getMessage()], 500);
        }
    }
    public function get_part(Request $request)
    {
        $search = $request->input('search');

        $query = iDempiereModel::fromPart()->select(
            'm_product_id',
            'value',
            'name',
            'description',
        );

        // $query->where('isactive', 'Y')->where('ad_client_id', 1000000);

        if (!empty($search)) {
            $query->where(function ($dat) use ($search) {
                $dat->where('name', 'ILIKE', "%{$search}%")
                    ->orWhere('value', 'ILIKE', "%{$search}%")
                    ->orWhere('m_product_id', 'ILIKE', "%{$search}%")
                    ->orWhere('description', 'ILIKE', "%{$search}%");
            });
        }

        $data = $query->simplePaginate(10);

        $morePages = true;
        $pagination_obj = json_encode($data);
        if (empty($data->nextPageUrl())) {
            $morePages = false;
        }

        foreach ($data->items() as $part) {
            $dataUser[] = [
                'id' => $part->m_product_id,
                'text' => $part->value . ' - ' . $part->name . ' - ' . $part->description,
                'name' => $part->name,
                'description' => $part->description
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
    public function get_all_part($id)
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
