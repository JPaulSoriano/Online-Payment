<?php

namespace App\Http\Controllers;
use App\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    public function index()
    {
        $years = Year::latest()->paginate(5);
  
        return view('years.index',compact('years'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('years.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
  
        Year::create($request->all());
   
        return redirect()->route('years.index')
                        ->with('success','Year created successfully.');
    }

    public function edit(Year $year)
    {
        return view('years.edit',compact('year'));
    }

    public function update(Request $request, Year $year)
    {
        $request->validate([
            'name' => 'required',
        ]);
  
        $year->update($request->all());
  
        return redirect()->route('years.index')
                        ->with('success','Year updated successfully');
    }
    public function destroy(Year $year)
    {
        $year->delete();
  
        return redirect()->route('years.index')
                        ->with('success','Year deleted successfully');
    }
}
