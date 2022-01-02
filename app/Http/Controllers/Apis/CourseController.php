<?php
namespace App\Http\Controllers\Apis;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Resources\CoursesResourse;
class CourseController extends Controller
{
    function index(Request $request){
        $categories= Course::latest('id')->active()->get();
        $data=CoursesResourse::collection($categories);
        return response()->json(['status'=>200,'data'=>$data]);
    }
}