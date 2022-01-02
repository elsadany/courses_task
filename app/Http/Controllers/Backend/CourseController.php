<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller {

    function index(Request $request) {

        if ($request->ajax()) {
            $data = Course::latest();
            return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($row) {

                                $btn = '<a href="' . route('courses.active', ['course' => $row->id]) . '" class="col-1"><i title="Active barcode"';
                                if ($row->active)
                                    $btn .= 'class="fa fa-times text-danger"';
                                else
                                    $btn .= 'class="fa fa-check text-success"';
                                $btn .= '></i></a>';
                                $btn .= '<a href="' . route('courses.edit', ['course' => $row->id]) . '" class="col-1" title="Edit Course"><i class="fa fa-pencil text-info" aria-hidden="true"></i></a>';

                                $btn .= '<a href="' . route('courses.destroy', ['course' => $row->id]) . '" class="delete col-1"><i class="fa fa-trash text-danger" title="Delete"></i></a>';

                                return $btn;
                            })
                            ->addColumn('Name', function($row) {
                                return $row->name;
                            })
                            ->addColumn('Description', function($row) {
                                return $row->description;
                            })
                            ->addColumn('Category', function($row) {
                                return $row->category->name;
                            })
                            ->addColumn('Views', function($row) {
                                return $row->views;
                            })
                            ->addColumn('Hours', function($row) {
                                return $row->hours;
                            })
                            ->addColumn('Rating', function($row) {
                                return $row->rating;
                            })
                            ->addColumn('Level', function($row) {
                                return $row->levels;
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
        $data['courses'] = Course::latest('id')->take(20)->get();
        return view('backend.courses.index', $data);
    }

    function create(Request $request) {
        $data['course'] = new Course();
        $data['categories'] = \App\Models\Category::all();

        return view('backend.courses.create', $data);
    }

    function store(Request $request) {
        return $this->save($request, new Course());
    }

    function edit(Request $request, Course $course) {

        $data['course'] = $course;

        $data['categories'] = \App\Models\Category::all();


        return view('backend.courses.edit', $data);
    }

    function active(Course $course) {
        if ($course->active == 1)
            $course->active = 0;
        else
            $course->active = 1;
        $course->save();
        return redirect()->back()->withSuccess('Updated Successfully');
    }

    function update(Request $request, Course $course) {
        return $this->save($request, $course);
    }

    function save($request, $object) {

        /**
         * Object
         */
        $rules = [
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
            'hours' => 'required|numeric',
            'views' => 'required|numeric',
            'level' => 'required',
            'rating' => 'required|numeric|min:1|max:5',
            'active' => 'required|boolean'
        ];

        $request->validate($rules);

        $object->name = $request->name;
        $object->category_id = $request->category_id;
        $object->description = $request->description;
        $object->hours = $request->hours;
        $object->views = $request->views;
        $object->levels = $request->level;
        $object->rating = $request->rating;
        $object->active = $request->active;


        $object->save();


        return redirect('backend/courses')->with('success', 'Course Saved Successfully');
    }

    function destroy(Course $course) {


        $course->delete();
        return response()->json(['status' => true, 'code' => 200, 'message' => 'Course Deleted Successfully']);
    }

}
