<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Models\Milestonecomments;
use Illuminate\Http\Request;
use App\Models\Milestone;
use App\Models\Project;
use DataTables;
use Auth;


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
            $data = Project::get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function(Project $project){
                    $btn = '<a class="nav-link btn-sm more btn btn-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bars"></i>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="'. route("/edit-projects", $project->id) .'">
                        <i class="fa fa-edit"></i>
                        Edit
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-trash"></i>
                        Delete
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript::void(0)" data-toggle="modal" data-target="#modal-lg" id="test'.$project->id.'" data-id="'. $project->name .'" onclick="milestones('. $project->id .')">
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
            $existing_milestones_id = Milestone::where('project_id', $id)->pluck('id');
            foreach ($existing_milestones_id as $key => $value) {
                $existing_milestones_id[$value] = false;
                unset($existing_milestones_id[$key]);
            }

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
                        // Updating the data if existing
                        if(!isset($milestones['milestone_id'])){
                            Milestone::create($milestone);
                        }else{
                            Milestone::find($milestones['milestone_id'])->update($milestone);
                            $existing_milestones_id[$milestones['milestone_id']] = true;

                            // For Comment Section
                            if(isset($milestones['reason'])){
                                if($milestones['reason'] != ''){
                                    $previous_milest_data = Milestone::find($milestones['milestone_id']);
                                    
                                    $milestone_id = $milestones['milestone_id'];
                                    $updated_date = date('Y-m-d');
                                    $changes_from = $previous_milest_data->from . ' - ' . $previous_milest_data->to;
                                    $changes_to = $from . ' - ' . $to;
                                    $reason = $milestones['reason'];

                                    $milestonecomments = new Milestonecomments;
                                    $milestonecomments->milestone_id = $milestone_id;
                                    $milestonecomments->updated_date = $updated_date;
                                    $milestonecomments->changes_from = $changes_from;
                                    $milestonecomments->changes_to = $changes_to;
                                    $milestonecomments->reason = $reason;
                                    $milestonecomments->save();
                                }
                            }
                        }
                    }
                }
            }

            foreach ($existing_milestones_id as $key => $value) {
                if($value == false){
                    Milestone::find($key)->delete();
                }
            }
            return redirect('/managers/projects')->with('success-message', 'Project Updated Successfully...');
        }catch(\Exception $e){
            return ($e->getMessage());
        }
    }

    public function getMilestones($id, request $request){
        try{
            if ($request->ajax()) {
                $data = Milestone::where('project_id', $id)->get();
                return Datatables::of($data)->addIndexColumn()
                            ->addColumn('action', function(Milestone $milestone){
                                $btn = '<a class="nav-link btn-sm more btn btn-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bars"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="javascript::void(0)" data-toggle="modal" data-target="#modal-default" id="test'.$milestone->id.'" data-id="'. $milestone->name .'">
                                    <i class="fa fa-eye"></i>
                                    View Comments
                                </a>
                            </div>';
                                return $btn;
                            })
                            ->rawColumns(['action'])
                    ->make(true);
            }
            return view('manager/pages/projects');

        }catch(\Exception $e){
            return ($e->getMessage());
        }
    }
}
