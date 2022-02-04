<?php

namespace App\Http\Controllers;
use App\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function index()
    {
        $periods = Period::latest()->paginate(5);
  
        return view('periods.index',compact('periods'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('periods.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
  
        Period::create($request->all());
   
        return redirect()->route('periods.index')
                        ->with('success','Period created successfully.');
    }

    public function edit(Period $period)
    {
        return view('periods.edit',compact('period'));
    }

    public function update(Request $request, Period $period)
    {
        $request->validate([
            'name' => 'required',
        ]);
  
        $period->update($request->all());
  
        return redirect()->route('periods.index')
                        ->with('success','Period updated successfully');
    }
    public function destroy(Period $period)
    {
        $period->delete();
  
        return redirect()->route('periods.index')
                        ->with('success','Period deleted successfully');
    }
}
