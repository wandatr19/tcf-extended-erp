<?php

namespace App\Http\Controllers\Checksheet;

use Illuminate\Http\Request;
use App\Models\iDempiereModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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

    public function index_approve(){
        $dataPage = [
            'page' => 'checksheet-op-approve'
        ];
        return view('checksheet_operator.approve', $dataPage);
    }

    public function datatable_approve (Request $request)
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
                        '<button type="button" class="waves-effect waves-light btn btn-success btnApprove" data-id="' . $data->id_cs_op_header . '"><i class="fa fa-check-square"></i></button>';
               
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
    public function approved_checksheet($id)
    {
        DB::beginTransaction();
        try {
            $csHeader = ChecksheetOPHeaderModel::findOrFail($id);

            if ($csHeader->status_doc == 'APPROVED') {
            return response()->json([
                'success' => false,
                'message' => 'Checksheet Already Approved'
            ], 400);
            }

            if ($csHeader->status_doc == 'DRAFTED') {
            return response()->json([
                'success' => false,
                'message' => 'Checksheet has not been completed'
            ], 400);
            }

            $csHeader->status_doc = 'APPROVED';
            $csHeader->checked_at = now();
            $csHeader->checked_by = auth()->user()->name;
            $csHeader->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Checksheet approved successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while approving the checksheet'
            ], 500);
        }
    }

}
