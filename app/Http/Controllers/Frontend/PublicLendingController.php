<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables, URL;
use App\Utils;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Movies;
use App\Models\Lending;

class PublicLendingController extends Controller
{
    /**
     * Show the application front.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.lending.index');
    }

    public function data()
    {
        $query = Lending::all()->where('member_id',Auth::user()->id);
        return datatables()->of($query)
            ->addColumn('movies', function($query) {
                return $query->movies->name;
            })
            ->addColumn('action',function($query){
                $html = '';
                if(!$query->date_returned_actual){
                    $html = '<div class="btn-group"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-form" onClick="setMovies('.$query->id.')">
                                Return Movies
                              </button></div>';
                }
                return $html;
            })
            ->make(true);
    }

    public function store(Request $request){
        $today = Carbon::now()->timezone('UTC')->format('Y-m-d');
        $store = Lending::find($request->id)->update(['date_returned_actual'=>$today]);
        if($store){
            flash()->success('successfully submitted');
        }
        return redirect(URL::to('/').'/lending');
    }
}
