<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Prefecture;

class PrefectureController extends Controller
{
    public function findById($id)
    {
        $prefecture = Prefecture::find($id);
        if (empty($prefecture)) {
            abort(400);
        }
        $region = $prefecture->region;
        if (empty($region)) {
            abort(400);
        } 
        $data = [];
        $data['regionId'] = $region->id;
        $data['regionName'] = $region->name;
        $data['prefectureName'] = $prefecture->name;
        $data['locations'] = [];
        $locations = $prefecture->locations()->orderBy('id', 'asc')->get();
        foreach ($locations as $location) {
            $data['locations'][] = ['id' => $location->id, 'name' => $location->name];
        }
        return response()->json($data);
    }
}
