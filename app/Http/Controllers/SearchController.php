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

        $results = DB::table('jobs')
            ->select('jobs.title', 'jobs.description', 'jobs.location', 'jobs.created_at', 'jobs.email', 'jobs.id')
            ->join('job_tag', 'jobs.id', '=', 'job_tag.job_id')
            ->join('tags', 'job_tag.tag_id', '=', 'tags.id')
            ->where('tags.title', 'LIKE', "%$keyword%")
            ->where('deleted_at', '=', null)
            ->get();

        return view('backend.partials.search.results')->with('searchResults', $results)->with('keyword', $keyword);
    }
}
