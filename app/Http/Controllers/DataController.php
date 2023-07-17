<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
class DataController extends Controller
{
    public function index()
    {
    
        $data = Data::latest()->paginate(10);

        return view('data.Index',compact('data')) ->with('num1', (request()->input('page', 1) - 1) * 10);;
    }
 
 
    public function create()
    {
        $projects = Project::all();
        // dd($projects);
        return view('data.create',compact('projects'));
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'time' => 'required',
        ]);
 
       $data = new Data;
       $data->time = $request->time;
       $data->user_id =Auth::user()->user_id;
    //    $data->project_id = '1';
       $data->project_id = intval($request->project_id); 
       $data->save();
        return redirect()->route('data.index')
                        ->with('success','Employee created successfully.');
 
    }
 
    public function show(Data $employee)
    {
        return view('data.show',compact('employee'));
    }
 
 
    // public function edit(Data $data)
    // {
    //     $projects = Project::all();
    //     return view('data.edit',compact('data','projects'));
    // }

    public function edit($id)
    {
        $data = Data::find($id);
        $projects = Project::all();
        // dd($projects);
        return view('data.edit',compact('data','projects'));
    }
 
 
    public function update(Request $request,$id)
    {
        $request->validate([
            'time' => 'required',
        ]);
 
        $data = Data::find($id);
        $data->time = $request->time;
        $data->project_id = intval($request->project_id); 
        $data->save();
        
 
        return redirect()->route('data.index')
                        ->with('success','Employee updated successfully');
 
    }
 
    public function destroy(Data $employee,$id)
    {
        data::destroy($id);
 
        return redirect()->route('data.index')
                        ->with('success','Employee deleted successfully');
 
    }
}
