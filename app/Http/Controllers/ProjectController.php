<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Redirect;
use App\Projects;
use App\Tasks;

class ProjectController extends Controller
{
    public function index()
    {
        $data['projects'] = Projects::where('user_id', Auth::id())->orderBy('id','desc')->paginate(6);

        return view('projects.index',$data);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $project = new \App\Projects;
        $project->title = $request->title;
        $project->description = $request->description;
        $project->user_id = Auth::id();
        $project->save();

        return Redirect::to('projects')->with('success','Greate! Project created successfully.');
    }

    public function edit($id)
    {   
        $where = array('id' => $id);
        $data['project_info'] = Projects::where($where)->first();

        return view('projects.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $update = ['title' => $request->title, 'description' => $request->description];
        Projects::where('id',$id)->update($update);

        return Redirect::to('projects')->with('success','Great! Project updated successfully');
    }

    public function destroy($id)
    {
        Projects::where('id',$id)->delete();

        return Redirect::to('projects')->with('success','Project deleted successfully');
    }

    public function show($id) {
    	$project = Projects::find($id);
        $tasks = Tasks::where('project_id', $id)->orderBy('id','desc')->paginate(10);

        $tasks_new = Tasks::where('project_id', $id)->where('status_id', 1)->orderBy('id','desc')->take(2)->get();
        $tasks_in_progress = Tasks::where('project_id', $id)->where('status_id', 2)->orderBy('id','desc')->take(2)->get();
        $tasks_done = Tasks::where('project_id', $id)->where('status_id', 3)->orderBy('id','desc')->take(2)->get();

        return view('projects.show', compact('project', 'tasks','tasks_new', 'tasks_in_progress', 'tasks_done'));
    }

    public function new($id) {
        $project = Projects::find($id);
        $status = DB::table('task_status')->where('id', 1)->first();
        $tasks = Tasks::where('project_id', $id)->where('status_id', 1)->orderBy('id','desc')->paginate(10);
        return view('projects.status', compact('project', 'tasks', 'status'));
    }

    public function in_progress($id) {
        $project = Projects::find($id);
        $status = DB::table('task_status')->where('id', 2)->first();
        $tasks = Tasks::where('project_id', $id)->where('status_id', 2)->orderBy('id','desc')->paginate(10);
        return view('projects.status', compact('project', 'tasks', 'status'));
    }

    public function done($id) {
        $project = Projects::find($id);
        $status = DB::table('task_status')->where('id', 3)->first();
        $tasks = Tasks::where('project_id', $id)->where('status_id', 3)->orderBy('id','desc')->paginate(10);
        return view('projects.status', compact('project', 'tasks', 'status'));
    }
}
