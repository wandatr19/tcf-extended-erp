<?php

namespace App\Http\Controllers\MasterUser;

use App\Http\Controllers\Controller;
use App\Models\MasterUser\OrganizationModel;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        $dataPage = [
            'page' => 'master-user-organization'
        ];
        return view('master_user.organization', $dataPage);

    }
    public function datatable(Request $request)
    {
        $columns = array(
            0 => 'name',
            1 => 'address',
        );

        $totalData = OrganizationModel::count();
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


        $org = OrganizationModel::getData($dataFilter, $settings);
        $totalFiltered = OrganizationModel::countData($dataFilter);

        $dataTable = [];

        if (!empty($org)) {
            $no = $start;
            foreach ($org as $data) {
                $no++;
                $nestedData['no'] = $no;
                $nestedData['name'] = $data->name;
                $nestedData['address'] = $data->address;
               
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
    public function get_organization(Request $request)
    {
        $search = $request->input('search');

        $query = OrganizationModel::select(
            'id_org',
            'name',
        );

        if (!empty($search)) {
            $query->where(function ($dat) use ($search) {
                $dat->where('id_org', 'ILIKE', "%{$search}%")
                    ->orWhere('name', 'ILIKE', "%{$search}%");
            });
        }

        $data = $query->simplePaginate(10);

        $morePages = true;
        $pagination_obj = json_encode($data);
        if (empty($data->nextPageUrl())) {
            $morePages = false;
        }

        foreach ($data->items() as $org) {
            $dataUser[] = [
                'id' => $org->id_org,
                'text' => $org->name
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

    public function store()
    {

    }
    public function update()
    {
        
    }

}
