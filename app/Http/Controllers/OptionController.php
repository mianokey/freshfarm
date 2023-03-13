<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OptionController extends Controller
{


    public function chooseOption(Request $request){
        if($request->optionselect==='animal'){
            return redirect('user/cat/animal/create');
        }
        elseif($request->optionselect==='crop'){
            return redirect('user/cat/crop/create');
        }

    }
}
