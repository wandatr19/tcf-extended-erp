<?php

namespace App\Http\Controllers\Checksheet;

use Illuminate\Http\Request;
use App\Models\iDempiereModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ChecksheetOP\ChecksheetOPLineModel;
use App\Models\ChecksheetOP\ChecksheetOPPointModel;
use App\Models\ChecksheetOP\ChecksheetOPHeaderModel;
use App\Models\ChecksheetOP\ChecksheetOPGroupShiftModel;

class ChecksheetOPDataController extends Controller
{
    public function list_data ()
    {
        $dataPage = [
            'page' => 'checksheet-op-data'
        ];
        return view('checksheet_operator.data', $dataPage);

    }
    public function store(Request $request)
    {
        $machineName = iDempiereModel::fromMachine()->select('name')->where('m_product_id', $request->machine_add)->first()->name;
        $lineName = iDempiereModel::fromHomeLine()->select('name')->where('tcf_homeline_id', $request->line_add)->first()->name;
        DB::beginTransaction();
        try {
            $header = ChecksheetOPHeaderModel::create([
                'doc_number' => 'CSOP/' . date('Y') . '/' . date('m') . '/' . str_pad(ChecksheetOPHeaderModel::max('id_cs_op_header') + 1, 3, '0', STR_PAD_LEFT),
                'org_id' => 1000001,
                'shift' => $request->shift_add,
                'prod_date' => $request->prod_date,
                'issued_at' => now(),
                'idem_homeline_id' => $request->line_add,
                'nama_homeline' => $lineName,
                'idem_mesin_id' => $request->machine_add,
                'nama_mesin' => $machineName,
                'status_doc' => 'DRAFTED',
                'nama_karyawan' => auth()->user()->name,
            ]);

            $pointspv = ChecksheetOPPointModel::pluck('id_cs_op_pointspv');

            $shift = $request->input('shift_add');
            $csGroupShifts = ChecksheetOPGroupShiftModel::where('group_name', $shift)->get();
    
            $count = 1;
            foreach ($csGroupShifts as $csGroup) {
                $groupCount = ChecksheetOPPointModel::where('group', $csGroup->group_shift)->count();
    
                if ($groupCount > 0) {
                    for ($i = 0; $i < $groupCount; $i++) {
                        ChecksheetOPLineModel::create([
                            'cs_op_header_id' => $header->id_cs_op_header,
                            'cs_op_pointspv_id' => $count, 
                            'cs_op_group_shift_id' => $csGroup->id_cs_op_group_shift,
                            'org_id' => 1000001,
                        ]);
                        $count++;
                    }
                }

            }
            
            DB::commit();
            return response()->json([
                'message' => 'Data berhasil disimpan',
                'data' => $header->id_cs_op_header 
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        } 
    }

    public function datatable(Request $request)
    {
        $columns = array(
            0 => 'doc_number',
            1 => 'shift',
            2 => 'nama_mesin',
            3 => 'nama_karyawan',
            4 => 'status',
            5 => 'issued_at',

        );

        $totalData = ChecksheetOPHeaderModel::count();
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


        $checksheet = ChecksheetOPHeaderModel::getData($dataFilter, $settings);
        $totalFiltered = ChecksheetOPHeaderModel::countData($dataFilter);

        $dataTable = [];

        if (!empty($checksheet)) {
            foreach ($checksheet as $data) {
                $nestedData['doc_number'] = $data->doc_number;
                if ($data->shift == 'A1') {
                    $nestedData['shift'] = 'Shift 1 (Waktu 3)';
                } elseif ($data->shift == 'A2') {
                    $nestedData['shift'] = 'Shift 2 (Waktu 3)';
                } elseif ($data->shift == 'A3') {
                    $nestedData['shift'] = 'Shift 3 (Waktu 3)';
                } elseif ($data->shift == 'B1') {
                    $nestedData['shift'] = 'Shift 1 (Waktu 2)';
                } elseif ($data->shift == 'B2') {
                    $nestedData['shift'] = 'Shift 2 (Waktu 2)';
                } else {
                    $nestedData['shift'] = $data->shift;
                }
                $nestedData['nama_mesin'] = $data->nama_mesin;
                $nestedData['nama_karyawan'] = $data->nama_karyawan;
                if ($data->status_doc == 'DRAFTED') {
                    $nestedData['status'] = '<span class="badge badge-pill badge-warning">DRAFTED</span>';
                } elseif ($data->status_doc == 'COMPLETED') {
                    $nestedData['status'] = '<span class="badge badge-pill badge-info">COMPLETED</span>';
                } elseif ($data->status_doc == 'APPROVED') {
                    $nestedData['status'] = '<span class="badge badge-pill badge-success">APPROVED</span>';
                } else {
                    $nestedData['status'] = $data->status_doc;
                }
                $nestedData['issued_at'] = $data->prod_date;
                $nestedData['action'] = 
                        '<a href="' . route('checksheet-op-edit', $data->id_cs_op_header) . '" class="waves-effect waves-light btn btn-success"><i class="fa fa-pencil-square-o"></i></a>';
               
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

    public function edit($id)
    {
        $csHeader = ChecksheetOPHeaderModel::findOrFail($id);
        $csLine = ChecksheetOPLineModel::where('cs_op_header_id', $id)->get();
        $dataPage = [
            'page' => 'checksheet-op-form',
            'csHeader' => $csHeader,
            'csLine' => $csLine,
        ];

        return view ('checksheet_operator.form2', $dataPage);

    }
    public function update(Request $request) 
    {
        DB::beginTransaction();
        try {
            $csLine = ChecksheetOPLineModel::findOrFail($request->id);
            if ($request->has('status')) {
                $csLine->status = $request->status;
            }

            if ($request->has('description')) {
                $csLine->description = $request->description;
            
            }
            $csLine->checked_at = now();
            $csLine->update();

            DB::commit();
            return response()->json([
                'success' => true, 
                'message' => 'Data updated successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
    public function complete($id)
    {
        DB::beginTransaction();
        try {
            $csHeader = ChecksheetOPHeaderModel::findOrFail($id);
            $incompleteLines = ChecksheetOPLineModel::where('cs_op_header_id', $id)
                ->whereNull('status')
                ->count();

            if ($incompleteLines > 0) {
            return response()->json([
                'status' => 'error', 
                'message' => 'Checksheet Not Been Filled Yet'
            ], 400);
            } 
            $csHeader->status_doc = 'COMPLETED'; 
            $csHeader->save(); 

            DB::commit();
            return response()->json([
                'success' => true, 
                'message' => 'Checksheet updated successfully'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
            'status' => 'error',
            'message' => $e->getMessage()
            ]);
        }
    }

}
