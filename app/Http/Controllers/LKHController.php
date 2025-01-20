<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\LKHmodel;
use Illuminate\Http\Request;
use App\Models\iDempiereModel;

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
    public function get_customer(Request $request)
    {
        $search = $request->input('search');
        $page = $request->input("page");
        $idCats = $request->input('catsProd');
        $adOrg = $request->input('adOrg');

        $query = iDempiereModel::fromWarehouse()->select(
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
        } catch (\Exception $e) {
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

        $monitor = LKHmodel::query();
        $isFilter = false;
        if ($request->has('date') && !empty($request->date)) {
            $monitor->whereDate('prod_date', $request->date);
            $isFilter = true;
        }

        // Filter berdasarkan shift
        if ($request->has('shift') && !empty($request->shift)) {
            $monitor->where('shift', $request->shift);
            $isFilter = true;
        }

        // Filter berdasarkan line
        if ($request->has('line') && !empty($request->line)) {
            $monitor->where('line', $request->line);
            $isFilter = true;
        }

        $records = $isFilter ? $monitor->get() :  collect();
        return view('lkh.monitor', $dataPage, compact('records'));
    }
}
