<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectEvaluation;
use App\Models\Student;
use App\Models\SubmitProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function teacherEvaluation()
    {
        $projects = Project::all();
        $students = Student::all();
        return view('dashboard.teacher.evaluation.teacher_evaluation', compact('projects', 'students'));
    }
    public function studentEvaluation()
    {
        $projects = Project::all();
        return view('dashboard.student.evaluation.student_evaluation', compact('projects'));
    }
    public function teacherEvaluationSubmit(Request $request)
    {
        // return $request;
        $projectEvaluation = ProjectEvaluation::create([
            'message'              => $request->message,
            'submit_project_id'    => $request->submitProjectId,
            'development_points'   => "none"
        ]);
        if ($projectEvaluation) {
            foreach ($request->competencies as $key => $val) {
                DB::table('project_evaluation_competency')->insert([
                    'project_evaluation_id' => $projectEvaluation->id,
                    'competency_id'           => $key,
                    'status'                  => $val
                ]);
            }
        }
        return [
            'projectEvaluation' => $projectEvaluation
        ];
    }
    public function studentEvaluationSubmit(Request $request)
    {
        // return $request;
        $submittedProject = SubmitProject::create([
            'message'       => $request->message,
            'student_id'    => auth()->user()->id,
            'project_id'    => $request->project_id
        ]);
        if ($submittedProject) {
            foreach ($request->urls as $url) {
                if ($url) {
                    DB::table('submit_project_link')->insert([
                        'url'               => $url,
                        'link_name'         => 'none',
                        'submit_project_id' => $submittedProject->id
                    ]);
                }
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function StudentSelectProject($id)
    {
        $selectedProject                    =  Project::findOrFail($id);
        $selectedProject ? $studentSubmit   =  SubmitProject::where('project_id', $selectedProject->id)
            ->where('student_id', auth()->user()->id)->first() : $studentSubmit =  null;
        $studentSubmit   ? $links           =  DB::table('submit_project_link')->where('submit_project_id', $studentSubmit->id)->get() : $links = null;
        $studentSubmit   ? $evaluation      =  ProjectEvaluation::where('submit_project_id', $studentSubmit->id)->first() : $evaluation   =  null;
        $evaluation   ? $evaluatedCompetencies      = $evaluation->competencies : $evaluatedCompetencies = null;


        return [
            'selectedProject'   => $selectedProject,
            'studentSubmit'     => $studentSubmit,
            'urls'              => $links,
            'evaluation'        => $evaluation,
            'evaluatedCompetencies' => $evaluatedCompetencies

        ];
    }
    public function TeacherSelectStudent(Request $request, $id)
    {
        // return ['id' => $id];
        // return $request;
        $currentStudent                     =  Student::findOrFail($request->student_id);
        $selectedProject                    =  Project::findOrFail($id);
        $selectedProject ? $studentSubmit   =  SubmitProject::where('project_id', $selectedProject->id)
            ->where('student_id', $request->student_id)->first() : $studentSubmit =  null;
        $studentSubmit   ? $links           =  DB::table('submit_project_link')->where('submit_project_id', $studentSubmit->id)->get() : $links = null;
        $studentSubmit   ? $evaluation      =  ProjectEvaluation::where('submit_project_id', $studentSubmit->id)->first() : $evaluation   =  null;
        $selectedProject ? $competenciesForProject  = $selectedProject->competencies : $competenciesForProject  =  null;
        // $evaluation   ? $evaluatedCompetencies      =  DB::table('project_evaluation_competency')->where('project_evaluation_id ', $evaluation->id)->get() : $evaluatedCompetencies = null;
        $evaluation   ? $evaluatedCompetencies      = $evaluation->competencies : $evaluatedCompetencies = null;
        return [
            'selectedProject'       => $selectedProject,
            'studentSubmit'         => $studentSubmit,
            'urls'                  => $links,
            'evaluation'            => $evaluation,
            'currentStudent'        => $currentStudent,
            'competencies'          => $competenciesForProject,
            'evaluatedCompetencies' => $evaluatedCompetencies
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectEvaluation  $projectEvaluation
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectEvaluation $projectEvaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectEvaluation  $projectEvaluation
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectEvaluation $projectEvaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectEvaluation  $projectEvaluation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectEvaluation $projectEvaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectEvaluation  $projectEvaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectEvaluation $projectEvaluation)
    {
        //
    }
}
