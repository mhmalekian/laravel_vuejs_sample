<?php

namespace App\Http\Controllers\API;

use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\JWT;


class FacultyController extends Controller
{

    //
    public function index(){
        $faculties=Faculty::with(['fields:id,faculty_id,title','students'])->get(); //we make fields limit for use it in with and show some of fileds (not all)
        $faculties->makeHidden(['created_at','updated_at']); //make hidden some fields
        return $faculties;


    }
}
