<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller {

    function index(Request $request) {

        if ($request->ajax()) {
            $data = Category::latest('id');
            return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($row) {

                                $btn = '<a href="' . route('categories.active', ['category' => $row->id]) . '" class="col-1"><i title="Active barcode"';
                                if ($row->active)
                                    $btn .= 'class="fa fa-times text-danger"';
                                else
                                    $btn .= 'class="fa fa-check text-success"';
                                $btn .= '></i></a>';
                                $btn .= '<a href="' . route('categories.edit', ['category' => $row->id]) . '" class="col-1" title="Edit Category"><i class="fa fa-pencil text-info" aria-hidden="true"></i></a>';

                                $btn .= '<a href="' . route('categories.destroy', ['category' => $row->id]) . '" class="delete col-1"><i class="fa fa-trash text-danger" title="Delete"></i></a>';

                                return $btn;
                            })
                            ->addColumn('Name', function($row) {
                                return $row->name;
                            })
                            ->addColumn('ID', function($row) {
                                return $row->id;
                            })
                            ->addColumn('Activation', function($row) {
                                return $row->active ? "Yes" : 'No';
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
        $data['categories'] = Category::latest('id')->take(20)->get();
        return view('backend.categories.index', $data);
    }

    function create(Request $request) {
        $data['category'] = new Category();


        return view('backend.categories.create', $data);
    }

    function store(Request $request) {
        return $this->save($request, new Category());
    }

    function edit(Request $request, Category $category) {

        $data['category'] = $category ;

       

        return view('backend.categories.edit', $data);
    }
    function active(Category $category){
        if($category->active==1)
            $category->active=0;
        else
            $category->active=1;
        $category->save();
        return redirect()->back()->withSuccess('Updated Successfully');
    }
            function update(Request $request, Category $category){
         return $this->save($request, $category);
    }
            function save($request, $object) {

        /**
         * Object
         */
        $rules = [
            'name' => 'required',
        ];

        $request->validate($rules);

        $object->name = $request->name;
        $object->active = $request->active;


        $object->save();


        return redirect('backend/categories')->with('success', 'Category Saved Successfully');
    }

    function destroy(Category $category) {
      

               $category->delete();
        return response()->json(['status'=>true,'code'=>200,'message'=>'Category Deleted Successfully']);
    }

}
