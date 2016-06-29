<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Tag;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index(){
        $jobs = Job::all();

        return view('backend.partials.dashboard')->with('jobs', $jobs);
    }

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

        try{
            $skills = $request->get('skills');
            $arrSkills = [];
            $arrSkills = explode(',', $skills);

            $tagIds = [];
            foreach($arrSkills as $index => $value){
                $tag = new Tag;
                $tag->title = $value;
                $tag->save();

                $tagIds[] = $tag->id;
            }

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
            $job->token = str_random(20);
            $job->save();

            $job->tags()->sync($tagIds);
        }catch(\Exception $e){
            \Log::error($e->getMessage());
        }

        $emailData = [
            'token'         => route('job.edit', [$job->token]),
            'title'      => $job->title,
            'description'   => $job->description
        ];

        try{
            Mail::send(
                'backend.partials.emails.job-added',
                $emailData,
                function ($message) use ($job){
                    $message->to($job->email)
                        ->from('no-reply@job-board.com')
                        ->subject('Congratz! Your latest job was successfully added.');
                }
            );
            \Log::info('Message successfully sent!');
        }catch (\Exception $e){
            \Log::error($e->getMessage());
        }

        return redirect('/job')->withStatus('success')->withMessage('Job successfully added!');
    }

    public function show($id)
    {
        $job = Job::where('id', '=', $id)->first();

        if ($job) {
            return view('backend.partials.jobs.single')->with('job', $job);
        }else{
            return redirect('/job');
        }
    }

    public function edit($token)
    {
        $job = Job::where('token', '=', $token)->first();

        if($job){
            return view('backend.partials.jobs.edit')->with('job', $job);
        }else{
            return redirect('/job')->withStatus('error')->withMessage('Job with this token was not found :(');
        }
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
        $job = Job::find($id);

        try{
            $input = $request->except('_token');
            $job->fill($input)->save();

            return redirect(route('job.index'))->withStatus('success')->withMessage('Job was successfully updated.');
        }catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Job::destroy($id);

        return redirect('/job')->withStatus('success')->withMessage('Job was successfully deleted.');
    }
}
