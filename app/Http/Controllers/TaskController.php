<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;
use App\Tasks;

class TaskController extends Controller
{

    public function create($id)
    {
        $project_id = $id;
        return view('tasks.create', compact('project_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        
        $file_name = '';

        if($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = date('YmdHis').'.'.$file->getClientOriginalExtension();
            $file->move(public_path() . '/files',$file_name);
        }

        $task = new \App\Tasks;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->project_id = $request->project_id;
        $task->status_id = 1;
        $task->file = $file_name;
        $task->save();

        return Redirect::to('projects/'.$request->project_id)
        ->with('success','Greate! task created successfully.');
    }

    public function edit($id)
    {   
        $where = array('id' => $id);
        $data['task_info'] = Tasks::where($where)->first();
        $data['task_statuses'] = DB::table('task_status')->get();
        
        return view('tasks.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        
        $update = ['title' => $request->title, 'description' => $request->description, 'status_id' => $request->task_status];
        Tasks::where('id',$id)->update($update);
        $task = Tasks::where('id',$id)->first();
        return Redirect::to('projects/'.$task->project_id)->with('success','Great! tasks updated successfully');
    }

    public function destroy($id)
    {
        $task = Tasks::where('id',$id)->first();
        $path = $task->file;
        if($path != '')
        {
            unlink(public_path('files/'.$path));
        }
        
        Tasks::where('id',$id)->delete();
        
        return Redirect::to('projects/'.$task->project_id)->with('success','Task deleted successfully');
    }

    public function show($id) {
        $task = Tasks::find($id);
        return view('tasks.show', compact('task'));
    }

    public function download($file) {
        return response()->download(public_path('files/'.$file));
    }
}
