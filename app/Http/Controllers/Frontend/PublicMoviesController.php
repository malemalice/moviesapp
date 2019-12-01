<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables, URL;
use Illuminate\Support\Facades\Auth;

use App\Models\Movies;
use App\Models\Lending;

class PublicMoviesController extends Controller
{
    /**
     * Show the application front.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.movies');
    }

    public function data()
    {
        $query = Movies::all();
        return datatables()->of($query)
            ->addColumn('genre', function($query) {
                return $query->genre->name;
            })
            ->addColumn('action',function($query){
                $action = '';
                if(Auth::check()){
                    $action = URL::to('/movies/lend');
                    $action = '<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-form" onClick="setMovies('.$query->id.')">
                                Lend
                              </button>';
                }else{
                    $action = '<a href='.URL::to('/login').' class="btn btn-info btn-sm">Lend</a>';
                }

                $html = '<div class="btn-group">
                        '.$action.'
                </div>';
                return $html;
            })
            ->make(true);
    }

    public function store(Request $request){
        $data = array_merge([
            'member_id'=>Auth::user()->id
        ],$request->all());
        $store = Lending::create($data);
        if($store){
            flash()->success('successfully submitted');
        }
        return redirect(URL::to('/').'/movies');
    }
}
