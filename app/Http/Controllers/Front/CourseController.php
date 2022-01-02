<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Http\Resources\CoursesResourse;
class CourseController extends Controller
{
    function index(Request $request){
        $data['courses']=Course::latest('id')->active()->paginate(18);
        $data['categories']= Category::latest('id')->active()->get();
        return view('front.index',$data);
    }
    function render(Request $request){
        $courses=Course::latest('id')->active();
        if($request->has('category_id'))
            $courses=$courses->where('category_id',$request->category_id);
        if($request->has('rating'))
            $courses=$courses->where('rating',$request->rating);
        if($request->has('levels')){
            $levels= explode(',', $request->levels);
            $courses=$courses->whereIn('levels',$levels);
        }
        if($request->has('time')){
            if($request->time==0)
                $courses=$courses->where('hours','<',4);
            elseif($request->time==1)
                $courses=$courses->where('hours','>',4)->where('hours','<',8);
            elseif($request->time==2)
               $courses=$courses->where('hours','>',8);
         
        }
        if($request->has('search')){
             $courses=$courses->where(function($query)use($request)
                {
                    $query->where('name', 'LIKE', '%'.$request->search.'%')
                    ->orWhere('description', 'LIKE', '%'.$request->search.'%');

                });
        }
        $data['courses']=$courses->paginate(18);
        return view('front.courses.render',$data);
    }
}