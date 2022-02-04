<?php

namespace App\Http\Controllers;
use App\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = Semester::latest()->paginate(5);
  
        return view('semesters.index',compact('semesters'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('semesters.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
  
        Semester::create($request->all());
   
        return redirect()->route('semesters.index')
                        ->with('success','Semester created successfully.');
    }

    public function edit(Semester $semester)
    {
        return view('semesters.edit',compact('semester'));
    }

    public function update(Request $request, Semester $semester)
    {
        $request->validate([
            'name' => 'required',
        ]);
  
        $semester->update($request->all());
  
        return redirect()->route('semesters.index')
                        ->with('success','Semester updated successfully');
    }
    public function destroy(Semester $semester)
    {
        $semester->delete();
  
        return redirect()->route('semesters.index')
                        ->with('success','Semester deleted successfully');
    }
}
