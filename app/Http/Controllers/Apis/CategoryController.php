<?php
namespace App\Http\Controllers\Apis;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoriesResourse;
class CategoryController extends Controller
{
    function index(Request $request){
        $categories= Category::latest('id')->active()->get();
        $data= CategoriesResourse::collection($categories);
        return response()->json(['status'=>200,'data'=>$data]);
    }
}

