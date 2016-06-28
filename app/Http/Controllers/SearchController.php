<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    public function findJob(){
        $keyword = Input::get('query');

        //$results = Job::where('title', 'LIKE', '%$results%')->get();

        $results = DB::table('jobs')
            ->where('title', 'LIKE', "%$keyword%")
            ->where('deleted_at', '=', null)
            ->get();

        return view('backend.partials.search.results')->with('searchResults', $results)->with('keyword', $keyword);
    }
}
