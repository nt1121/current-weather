<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Region;

class RegionController extends Controller
{
    public function getAll()
    {
        $regions = Region::orderBy('id', 'asc')->get();
        $data = [];
        foreach ($regions as $region) {
            $data[] = ['id' => $region->id, 'name' => $region->name];
        }
        return response()->json($data);
    }

    public function findById($id)
    {
        $region = Region::find($id);
        if (empty($region)) {
            abort(400);
        }
        $data = [];
        $data['regionName'] = $region->name;
        $data['prefectures'] = [];
        $prefectures = $region->prefectures()->orderBy('id', 'asc')->get();
        foreach ($prefectures as $prefecture) {
            $data['prefectures'][] = ['id' => $prefecture->id, 'name' => $prefecture->name];
        }
        return response()->json($data);
    }
}
