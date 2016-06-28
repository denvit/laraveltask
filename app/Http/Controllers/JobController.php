<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Tag;
use Illuminate\Support\Facades\Input;

class JobController extends Controller
{
    public function create()
    {
        return view('backend.partials.jobs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email'         => 'required',
            'title'         => 'required|min:4',
            'description'   => 'required',
            'skills'        => 'required'
        ]);

        $skills = $request->get('skills');

        $arrSkills = [];
        $arrSkills = explode(',', $skills);

        dd($arrSkills);

        /*
        $location = Input::has('remote') ? true : false;

        $job = new Job;
        $job->email = $request->get('email');
        $job->title = $request->get('title');
        $job->description = $request->get('description');
        if($location == true){
            $job->location = 'remote';
        }else{
            $job->location = $request->get('location');
        }
        $job->save();
*/

        $tag = new Tag;
        $tag->title = $request->get('skills');

        return redirect('/')->withStatus('success')->withMessage('Job successfully added!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
