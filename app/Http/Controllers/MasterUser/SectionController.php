<?php

namespace App\Http\Controllers\MasterUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MasterUser\SectionModel;

class SectionController extends Controller
{
    public function index()
    {
        $dataPage = [
            'page' => 'master-user-section'
        ];
        return view('master_user.section', $dataPage);

    }
    public function datatable(Request $request)
    {
        $columns = array(
            0 => 'name',
            1 => 'address',
        );

        $totalData = SectionModel::count();
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


        $dept = SectionModel::getData($dataFilter, $settings);
        $totalFiltered = SectionModel::countData($dataFilter);

        $dataTable = [];

        if (!empty($dept)) {
            $no = $start;
            foreach ($dept as $data) {
                $no++;
                $nestedData['no'] = $no;
                $nestedData['name'] = $data->name;
               
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
    public function get_section(Request $request)
    {
        $search = $request->input('search');

        $query = SectionModel::select(
            'id_section',
            'name',
        );

        if (!empty($search)) {
            $query->where(function ($dat) use ($search) {
                $dat->where('id_section', 'ILIKE', "%{$search}%")
                    ->orWhere('name', 'ILIKE', "%{$search}%");
            });
        }

        $data = $query->simplePaginate(10);

        $morePages = true;
        $pagination_obj = json_encode($data);
        if (empty($data->nextPageUrl())) {
            $morePages = false;
        }

        foreach ($data->items() as $dept) {
            $dataUser[] = [
                'id' => $dept->id_section,
                'text' => $dept->name
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
