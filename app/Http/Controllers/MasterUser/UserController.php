<?php

namespace App\Http\Controllers\MasterUser;

use Throwable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\MasterUser\SectionModel;
use App\Models\MasterUser\DivisionModel;
use App\Models\MasterUser\PositionModel;
use Illuminate\Support\Facades\Validator;
use App\Models\MasterUser\DepartmentModel;
use App\Models\MasterUser\OrganizationModel;


class UserController extends Controller
{
    public function index()
    {
        $dataPage = [
            'page' => 'master-user-index'
        ];
        return view('master_user.index', $dataPage);

    }
    public function datatable(Request $request)
    {
        $columns = array(
            0 => 'name',
            1 => 'nik',
            2 => 'email',
            3 => 'organization',
            4 => 'division',
            5 => 'department',
            6 => 'section',
            7 => 'position',
        );

        $totalData = User::count();
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


        $checksheet = User::getData($dataFilter, $settings);
        $totalFiltered = User::countData($dataFilter);

        $dataTable = [];

        if (!empty($checksheet)) {
            foreach ($checksheet as $data) {
                $nestedData['name'] = $data->employee_name;
                $nestedData['nik'] = $data->nik;
                $nestedData['email'] = $data->email;
                $nestedData['organization'] = $data->org_name;
                $nestedData['division'] = $data->div_name;
                $nestedData['department'] = $data->dept_name;
                $nestedData['section'] = $data->section_name;
                $nestedData['position'] = $data->position_name;
                $nestedData['action'] = '
                <div class="btn-group">
                    <button type="button" class="waves-effect waves-light btn btn-info btnEdit" data-id="'.$data->id.'" data-user-name="'.$data->employee_name.'" data-user-email="'.$data->email.'" data-user-nik="'.$data->nik.'"><i class="fa fa-pencil-square-o"></i></button>
                    <button type="button" class="waves-effect waves-light btn btn-danger btnDelete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></button>
                </div>
                ';

               
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
    public function store(Request $request)
    {
        $dataValidate = [
            'user_name' => ['required'],
        ];
    
        $validator = Validator::make(request()->all(), $dataValidate);
    
        if ($validator->fails()) {
            return response()->json(['message' => 'Fill your input correctly!'], 402);
        }
    
        DB::beginTransaction();
        try{
            $user = User::create([
                'name' => $request->input('user_name'),
                'email' => $request->input('email_add'),
                'password' => $request->input('password_add'),
                'nik' => $request->input('nik_add'),
                'org_id' => $request->input('org_add'),
                'div_id' => $request->input('div_add'),
                'dept_id' => $request->input('dept_add'),
                'section_id' => $request->input('section_add'),
                'position_id' => $request->input('position_add'),
            ]);

            DB::commit();
            return response()->json(['message' => 'User Ditambahkan!'],200);
        } catch(Throwable $error){
            return response()->json(['message' => $error->getMessage()], 500);
        }
    }

    
}
