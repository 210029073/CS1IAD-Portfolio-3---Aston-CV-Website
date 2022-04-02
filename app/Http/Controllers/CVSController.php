<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cvs;
use Illuminate\Support\Facades\DB;

class CVSController extends Controller
{
    //this will find a specific ID
    public function show($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        //This will therefore find the corresponding
        //cvs details for that user based on their ID.
        $cv = cvs::find($id);
        //return the instance of view
        return view('/cv', array('cvs' => $cv));
    }

    public function showAll(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        return view('/cv_collections', array('cvCollections' => cvs::all()));
    }

    public function querySearch(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $input = $request->input('search');


            $cvCollections = DB::table('cvs')
                ->Where('name', 'LIKE', '%' . $input . '%')
                ->orWhere('email', 'LIKE', '%' . $input . '%')
                ->orWhere('keyprogramming', 'LIKE', '%' . $input . '%')
                ->simplePaginate(3);
//                ->get();

            return view('cv_collections', compact('cvCollections'));


    }
}
