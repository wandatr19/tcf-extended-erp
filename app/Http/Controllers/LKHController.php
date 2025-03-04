<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\LKHmodel;
use Illuminate\Http\Request;
use App\Models\iDempiereModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LKHController extends Controller
{
    public function index(){
        $dataPage = [
            'page' => 'lkh-index'
        ];
        return view('lkh.index', $dataPage);
    }
    public function login2(){
        return view('auth.login2');
    }
    public function home(){
        $dataPage = [
            'page' => 'main_dashboard'
        ];

        return view('index', $dataPage);
    }
    public function input(){
        $dataPage = [
            'page' => 'lkh-input'
        ];
        $customer = iDempiereModel::all();

        return view('lkh.input', $dataPage, compact('customer'));
    }
    public function get_partner(Request $request)
    {
        $search = $request->input('search');
        $page = $request->input("page");
        $idCats = $request->input('catsProd');
        $adOrg = $request->input('adOrg');

        $query = iDempiereModel::fromPartner()->select(
            'c_bpartner_id',
            'name',
        );

        if (!empty($search)) {
            $query->where(function ($dat) use ($search) {
                $dat->where('c_bpartner_id', 'ILIKE', "%{$search}%")
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
                'id' => $customer->c_bpartner_id,
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
    public function get_part(Request $request)
    {
        $search = $request->input('search');
        $page = $request->input("page");
        $idCats = $request->input('catsProd');
        $adOrg = $request->input('adOrg');

        $query = iDempiereModel::fromPart()->select(
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
    public function input_lkh(Request $request) 
    {
        $dataValidate = [
            'line'=> 'required|integer',
            'shift'=> 'required|integer',
            'customer'=> 'required',
            'part_no'=> 'required',
            'prod_date'=> 'required|date',
            'hole_ta' => 'nullable|integer',
            'hole_tembus' => 'nullable|integer',
            'hole_geser' => 'nullable|integer',
            'hole_mencuat' => 'nullable|integer',
            'hole_doubleprc' => 'nullable|integer',
            'hole_mengecil' => 'nullable|integer',
            'neck' => 'nullable|integer',
            'crack_p' => 'nullable|integer',
            'glmbg_krpt' => 'nullable|integer',
            'trim_over' => 'nullable|integer',
            'trim_min' => 'nullable|integer',
            'trim_mencuat' => 'nullable|integer',
            'bend_min' => 'nullable|integer',
            'bend_over' => 'nullable|integer',
            'emb_geser' => 'nullable|integer',
            'double_emb' => 'nullable|integer',
            'penyok_defom' => 'nullable|integer',
            'krg_stamp' => 'nullable|integer',
            'material_s' => 'nullable|integer',
            'baret_scratch' => 'nullable|integer',
            'dent' => 'nullable|integer',
            'others' => 'nullable|integer',
            'dies_process' => 'required|string',
            'time_start' => 'required',
            'time_finish' => 'required',
            'sampling' => 'required|integer',
            'total_prod' => 'required|integer',
            'part_ok' => 'required|integer',
            'part_repair' => 'required|integer',
            'part_reject' => 'required|integer',
            'verifikasi' => 'required|integer',
        ];
        $validator = Validator::make(request()->all(), $dataValidate);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json(['message' => $errors], 402);
        }
        $customer_name = iDempiereModel::fromPartner()->select('name')->where('c_bpartner_id', $request->customer)->first()->name;
        $part_name = iDempiereModel::fromPart()->select('name')->where('m_product_id', $request->part_no)->first()->name;
        
        try {
            DB::beginTransaction();
            $dataLKH = LKHmodel::create([
                'line' => $request->line,
                'shift' => $request->shift,
                'customer_id' => $request->customer,
                'customer' => $customer_name,
                'part_no' => $part_name,
                'prod_date' => $request->prod_date,
                'hole_ta' => $request->hole_ta,
                'hole_tembus' => $request->hole_tembus,
                'hole_geser' => $request->hole_geser,
                'hole_mencuat' => $request->hole_mencuat,
                'hole_doubleprc' => $request->hole_doubleprc,
                'hole_mengecil' => $request->hole_mengecil,
                'neck' => $request->neck,
                'crack_p' => $request->crack_p,
                'glmbg_krpt' => $request->glmbg_krpt,
                'trim_over' => $request->trim_over,
                'trim_min' => $request->trim_min,
                'trim_mencuat' => $request->trim_mencuat,
                'bend_min' => $request->bend_min,
                'bend_over' => $request->bend_over,
                'emb_geser' => $request->emb_geser,
                'double_emb' => $request->double_emb,
                'penyok_defom' => $request->penyok_defom,
                'krg_stamp' => $request->krg_stamp,
                'material_s' => $request->material_s,
                'baret_scratch' => $request->baret_scratch,
                'dent' => $request->dent,
                'others' => $request->others,
                'dies_process' => $request->dies_process,
                'time_start' => $request->time_start,
                'time_finish' => $request->time_finish,
                'sampling' => $request->sampling,
                'total_prod' => $request->total_prod,
                'part_ok' => $request->part_ok,
                'part_repair' => $request->part_repair,
                'part_reject' => $request->part_reject,
                'verifikasi' => $request->verifikasi,
            ]);
            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Data Berhasil Disimpan!',
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false, 
                'message' => 'Terjadi kesalahan saat input data:' . $e->getMessage(),
            ], 500);
        }
    }
    public function monitor(Request $request){
        $dataPage = [
            'page' => 'lkh-monitor'
        ];

        return view('lkh.monitor', $dataPage);
    }
    public function datatable(Request $request)
    {
        $columns = array(
            0 => 'part_no',
            1 => 'customer',
            // 2 => 'hole_ta',
            // 3 => 'hole_tembus',
            // 4 => 'hole_mencuat',
            // 5 => 'hole_geser',
            // 6 => 'hole_doubleprc',
            // 7 => 'hole_mengecil',
            // 8 => 'neck',
            // 9 => 'crack_p',
            // 10 => 'glmbg_krpt',
            // 11 => 'trim_over',
            // 12 => 'trim_min',
            // 13 => 'trim_mencuat',
            // 14 => 'bend_min',
            // 15 => 'bend_over',
            // 16 => 'emb_geser',
            // 17 => 'double_emb',
            // 18 => 'penyok_defom',
            // 19 => 'krg_stamp',
            // 20 => 'material_s',
            // 21 => 'baret_scratch',
            // 22 => 'dent',
            // 23 => 'others',
            2 => 'dies_process',
            3 => 'time_start',
            4 => 'time_finish',
            5 => 'sampling',
            6 => 'total_prod',
            7 => 'part_ok',
            8 => 'part_repair',
            9 => 'part_reject',
            10 => 'verifikasi',
        );

        $totalData = LKHmodel::count();
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

        $checksheet = LKHmodel::getData($dataFilter, $settings);
        $totalFiltered = LKHmodel::countData($dataFilter);

        $dataTable = [];

        if (!empty($checksheet)) {
            foreach ($checksheet as $data) {
                $nestedData['part_no'] = $data->part_no;
                $nestedData['customer'] = $data->customer;
                // $nestedData['hole_ta'] = $data->hole_ta;
                // $nestedData['hole_tembus'] = $data->hole_tembus;
                // $nestedData['hole_mencuat'] = $data->hole_mencuat;
                // $nestedData['hole_geser'] = $data->hole_geser;
                // $nestedData['hole_doubleprc'] = $data->hole_doubleprc;
                // $nestedData['hole_mengecil'] = $data->hole_mengecil;
                // $nestedData['neck'] = $data->neck;
                // $nestedData['crack_p'] = $data->crack_p;
                // $nestedData['glmbg_krpt'] = $data->glmbg_krpt;
                // $nestedData['trim_over'] = $data->trim_over;
                // $nestedData['trim_min'] = $data->trim_min;
                // $nestedData['trim_mencuat'] = $data->trim_mencuat;
                // $nestedData['bend_min'] = $data->bend_min;
                // $nestedData['bend_over'] = $data->bend_over;
                // $nestedData['emb_geser'] = $data->emb_geser;
                // $nestedData['double_emb'] = $data->double_emb;
                // $nestedData['penyok_defom'] = $data->penyok_defom;
                // $nestedData['krg_stamp'] = $data->krg_stamp;
                // $nestedData['material_s'] = $data->material_s;
                // $nestedData['baret_scratch'] = $data->baret_scratch;
                // $nestedData['dent'] = $data->dent;
                // $nestedData['others'] = $data->others;
                $nestedData['dies_process'] = $data->dies_process;
                $nestedData['time_start'] = \Carbon\Carbon::parse($data->time_start)->format('H:i');
                $nestedData['time_finish'] = \Carbon\Carbon::parse($data->time_finish)->format('H:i');
                $nestedData['sampling'] = $data->sampling;
                $nestedData['total_prod'] = $data->total_prod;
                $nestedData['part_ok'] = $data->part_ok;
                $nestedData['part_repair'] = $data->part_repair;
                $nestedData['part_reject'] = '<button type="button" class="waves-effect waves-light btn btn-success mb-5 btnDetail"><i class="mdi mdi-magnify"></i>' . $data->part_reject . '</button>';
                
                $nestedData['verifikasi'] = $data->verifikasi;
               
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
}
