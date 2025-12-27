<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ImportController extends Controller
{
    public function create(){
        return view('welcome', [
            'infos' => Info::all()
        ]);
    }


    public function store(Request $request){


        $inputs=     request()->validate([


            'object'=> 'required',
            'spn'=> 'required',
            'description'=> 'required',
            'square-meter' => 'required',
            'floor'=> 'required',
            'spaces'=> 'required',
            'bathroom'=> 'required',
            'street'=> 'required',
            'homenumber'=> 'required',
            'zip'=> 'required',
            'city'=> 'required',
            'country'=> 'required',
            'managementtype'=> 'required',
'            coldrent'=> 'required',
            'deposit'=> 'required',
             'heatingcost'=> 'required',
            'aclsp'=> 'required',
            'clspo' => 'required',
            'builddate'=> 'required',
             'kitchen' => 'required',
             'balcon' => 'required',
             'guest-toilt' => 'required',
             'garden'=> 'required',
             'cellar'=> 'required',
             'parking'=> 'required',
             'disabledaccess'=> 'required',
             'animals'=> 'required',
              'quantityequipment',
             'buildingstyle' => 'required',
             'lastrenovation' => 'required',

        ]);

        Info::create($inputs);
        dd($inputs);

    }


}
