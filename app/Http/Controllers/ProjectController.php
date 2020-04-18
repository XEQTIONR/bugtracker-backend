<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use Illuminate\Support\Facades\Auth;
use Exception;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Project::where('creator_id', Auth::id())->get();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

        try{

            $project = new Project();

            $project->name = $request->name;
            $project->abbr = $request->abbr;
            $project->description = $request->description;
            $project->creator_id = Auth::id();

            $project->save();

            $res = array();

            $res['status'] = 'success';
            $res['message'] = 'Project saved successfully';
            $res['data'] = $project;

            return $res;

        }catch(Exception $e){

            $res = array();

            $res['status'] = 'error';
            $res['message'] = $e->getMessage();
            //$res['data'] = $project;

            return $res;
        }

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        return $project;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
