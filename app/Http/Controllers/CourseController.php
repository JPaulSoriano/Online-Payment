<?php

namespace App\Http\Controllers;
use App\Department;
use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->paginate(5);
  
        return view('courses.index',compact('courses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $departments = Department::all();
        return view('courses.create', compact('departments'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'department_id' => 'required'
        ]);
  
        Course::create($request->all());
   
        return redirect()->route('courses.index')
                        ->with('success','Course created successfully.');
    }

    public function edit(Course $course)
    {
        $departments = Department::all();
        return view('courses.edit',compact('course', 'departments'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required',
            'department_id' => 'required'
        ]);
  
        $course->update($request->all());
  
        return redirect()->route('courses.index')
                        ->with('success','Course updated successfully');
    }
    public function destroy(Course $course)
    {
        $course->delete();
  
        return redirect()->route('courses.index')
                        ->with('success','Course deleted successfully');
    }
}
