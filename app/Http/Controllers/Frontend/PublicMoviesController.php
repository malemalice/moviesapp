<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables, URL;
use App\Models\Movies;

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
                $html = '<div class="btn-group">
                        <a href='.URL::to('/movies/lend').' class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Lend !</a>
                </div>';
                return $html;
            })
            ->make(true);
    }
}
