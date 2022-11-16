<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Milestone;
use Auth;
use DataTables;

class homeController extends Controller
{
    public function index(){
        return view('manager/pages/home');
    }

    public function login(){
        return view('manager/components/login');
    }

    public function authentication(request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/managers/dashboard');
        }else{
            return back()->with('error-message', 'Invalid Credentials...');
        }
    }

    public function logout(){
        try{
            Auth::logout();
            return redirect('/managers/login');
        }catch (\Exception $e) {
            return ($e->getMessage());
        }
    }

    public function getProjects(request $request){
        if ($request->ajax()) {
            $data = Project::with('milestones')->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a class="nav-link btn-sm more btn btn-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bars"></i>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="'. route("/edit-projects", $row->id) .'">
                        <i class="fa fa-edit"></i>
                        Edit
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-trash"></i>
                        Delete
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-eye"></i>
                        View Milestones
                    </a>
                  </div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('manager/pages/projects');
    }
    public function projects(){
        try{
            return view('manager/pages/projects');
        }catch (\Exception $e) {
            return ($e->getMessage());
        }
    }

    public function addProjects(){
        try{
            return view('manager/pages/addProjects');
        }catch (\Exception $e) {
            return ($e->getMessage());
        }
    }

    public function insertProjects(request $request){
        try{
            $project = [
                'name' => $request->name,
                'initiataion_date' => isset($request->initiataion_date) ? date('Y-m-d', strtotime($request->initiataion_date)) : Null,
                'technologies_used' => $request->technologies_used,
                'developers_assigned' => $request->developers_assigned,
                'client_info' => $request->client_info,
                'due_date' => isset($request->due_date) ? date('Y-m-d', strtotime($request->due_date)) : Null,
            ];

            Project::create($project);

            $lastInsertedProject = Project::orderBy('id', 'DESC')->select('id')->first();

            if(isset($request->milestones)){
                foreach ($request->milestones as $key => $milestones) {
                    
                    $dateRange = isset($milestones['date_range']) ? str_replace(' ', '', explode("-",$milestones['date_range'])) : [];
                    $from = isset($dateRange[0]) ? date('Y-m-d', strtotime($dateRange[0])) : Null;
                    $to = isset($dateRange[1]) ? date('Y-m-d', strtotime($dateRange[1])) : Null;
                    $title = $milestones['title'];
                    $project_id = $lastInsertedProject->id;

                    $milestone = [
                        'project_id' => $project_id,
                        'title' => $title,
                        'from' => $from,
                        'to' => $to
                    ];
                    Milestone::create($milestone);
                }
            }
        
            return redirect('/managers/projects')->with('success-message', 'Project Created Successfully...');
        }catch(\Exception $e){
            return ($e->getMessage());
        }
    }

    public function editProjects($id){
        try{
            $project = Project::with('milestones')->find($id);
            $project->initiataion_date = date('m/d/Y', strtotime($project->initiataion_date));
            $project->due_date = date('m/d/Y', strtotime($project->due_date));
            if($project->milestones != ''){
                foreach ($project->milestones as $key => $value) {
                    
                    $project->milestones[$key]['date_range'] = date('m/d/Y', strtotime($value->from)). ' - ' . date('m/d/Y', strtotime($value->to));
                }
            }
            return view('manager/pages/editProjects', compact('project'));
        }catch(\Exception $e){
            return ($e->getMessage());
        }
    }

    public function updateProjects($id, request $request){
        try{
            Milestone::where('project_id', $id)->delete();
            $project = [
                'name' => $request->name,
                'initiataion_date' => isset($request->initiataion_date) ? date('Y-m-d', strtotime($request->initiataion_date)) : Null,
                'technologies_used' => $request->technologies_used,
                'developers_assigned' => $request->developers_assigned,
                'client_info' => $request->client_info,
                'due_date' => isset($request->due_date) ? date('Y-m-d', strtotime($request->due_date)) : Null,
            ];

            Project::find($id)->update($project);

            if(isset($request->milestones)){
                foreach ($request->milestones as $key => $milestones) {
                    
                    $dateRange = isset($milestones['date_range']) ? str_replace(' ', '', explode("-",$milestones['date_range'])) : [];
                    $from = isset($dateRange[0]) ? date('Y-m-d', strtotime($dateRange[0])) : Null;
                    $to = isset($dateRange[1]) ? date('Y-m-d', strtotime($dateRange[1])) : Null;
                    $title = $milestones['title'];
                    $project_id = $id;

                    $milestone = [
                        'project_id' => $id,
                        'title' => $title,
                        'from' => $from,
                        'to' => $to
                    ];
                    if($title != Null){
                        Milestone::create($milestone);
                    }
                }
            }
        
            return redirect('/managers/projects')->with('success-message', 'Project Updated Successfully...');
        }catch(\Exception $e){
            return ($e->getMessage());
        }
    }
}
