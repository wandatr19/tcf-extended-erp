<?php

namespace App\Http\Controllers\MasterUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MasterUser\PositionModel;

class PositionController extends Controller
{
    public function get_position(Request $request)
    {
        $search = $request->input('search');

        $query = PositionModel::select(
            'id_position',
            'name',
        );

        if (!empty($search)) {
            $query->where(function ($dat) use ($search) {
                $dat->where('id_position', 'ILIKE', "%{$search}%")
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
                'id' => $dept->id_position,
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
