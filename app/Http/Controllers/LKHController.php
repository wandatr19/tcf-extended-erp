<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\LKHmodel;
use Illuminate\Http\Request;
use App\Models\iDempiereModel;
use Illuminate\Support\Facades\DB;

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
        $validated = $request->validate([
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
        ]);
        
        try {
            DB::beginTransaction();
            LKHmodel::create($validated);
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
            3 => 'hole_ta',
            4 => 'hole_tembus',
            5 => 'hole_mencuat',
            6 => 'hole_geser',
            7 => 'hole_doubleprc',
            8 => 'hole_mengecil',
            9 => 'neck',
            10 => 'crack_p',
            11 => 'glmbg_krpt',
            12 => 'trim_over',
            13 => 'trim_min',
            14 => 'trim_mencuat',
            15 => 'bend_min',
            16 => 'bend_over',
            17 => 'emb_geser',
            18 => 'double_emb',
            19 => 'penyok_defom',
            20 => 'krg_stamp',
            21 => 'material_s',
            22 => 'baret_scratch',
            23 => 'dent',
            24 => 'others',
            25 => 'dies_process',
            26 => 'time_start',
            27 => 'time_finish',
            28 => 'sampling',
            29 => 'total_prod',
            30 => 'part_ok',
            31 => 'part_repair',
            32 => 'part_reject',
            33 => 'verifikasi',
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
                $nestedData['hole_ta'] = $data->hole_ta;
                $nestedData['hole_tembus'] = $data->hole_tembus;
                $nestedData['hole_mencuat'] = $data->hole_mencuat;
                $nestedData['hole_geser'] = $data->hole_geser;
                $nestedData['hole_doubleprc'] = $data->hole_doubleprc;
                $nestedData['hole_mengecil'] = $data->hole_mengecil;
                $nestedData['neck'] = $data->neck;
                $nestedData['crack_p'] = $data->crack_p;
                $nestedData['glmbg_krpt'] = $data->glmbg_krpt;
                $nestedData['trim_over'] = $data->trim_over;
                $nestedData['trim_min'] = $data->trim_min;
                $nestedData['trim_mencuat'] = $data->trim_mencuat;
                $nestedData['bend_min'] = $data->bend_min;
                $nestedData['bend_over'] = $data->bend_over;
                $nestedData['emb_geser'] = $data->emb_geser;
                $nestedData['double_emb'] = $data->double_emb;
                $nestedData['penyok_defom'] = $data->penyok_defom;
                $nestedData['krg_stamp'] = $data->krg_stamp;
                $nestedData['material_s'] = $data->material_s;
                $nestedData['baret_scratch'] = $data->baret_scratch;
                $nestedData['dent'] = $data->dent;
                $nestedData['others'] = $data->others;
                $nestedData['dies_process'] = $data->dies_process;
                $nestedData['time_start'] = date('i:s', strtotime($data->time_start));
                $nestedData['time_finish'] = date('i:s', strtotime($data->time_finish));
                $nestedData['sampling'] = $data->sampling;
                $nestedData['total_prod'] = $data->total_prod;
                $nestedData['part_ok'] = $data->part_ok;
                $nestedData['part_repair'] = $data->part_repair;
                $nestedData['part_reject'] = $data->part_reject;
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
