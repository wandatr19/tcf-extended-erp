<?php

namespace App\Http\Controllers;

use App\Models\iDempiereModel;
use Illuminate\Http\Request;
use App\Models\LKHmodel;

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

        LKHmodel::create($validated);

        return response()->json([
            'message' => 'Data Berhasil Disimpan!',
            'redirect_url' => url()->previous()// Replace '/form' with your desired redirect URL
        ]);
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
