<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class jsonApiController extends Controller
{

    function getJSon (Request $request){
        return Info::all();
    }

    function bulkupload(Request $request) {



        $dataItems = $request->all();



        foreach ($dataItems as $row) {
            // dump($row);
            // dump($row['id']);
            $resultInfo = Info::updateOrInsert(['id' => $row['id']], $row);
        }

        return response()->json([
            'data'=> $dataItems,
            'status' => true,
            'message' => 'CSV file uploaded successfully.'
            // 'record' => $request->all()
        ]);
    }

    function add (Request $request){

          $post = Info::create($request->all());

       return response()->json([

           'status' => true,
           'record' => $post

       ]);

    }


   public function dataupdate(Request $request, Info $id){

        $id->update($request->all());
        return response()->json($id, 200);
    }

    public function datadelete( Info $id){

        $id->delete();
        return response()->json(null, 204);
    }
}
