<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();

        return $projects;
    }

    public function show($slug){
        
        try {
            $project = Project::where('slug', $slug)->with('type')->firstOrFail();
            return $project;  
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response([
                'error' => '404 Project Not Found',
            ], 404);
        }

        return $project;
    }
}
