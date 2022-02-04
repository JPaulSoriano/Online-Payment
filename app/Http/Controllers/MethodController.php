<?php

namespace App\Http\Controllers;
use App\Method;
use Illuminate\Http\Request;

class MethodController extends Controller
{
    public function index()
    {
        $methods = Method::latest()->paginate(5);
  
        return view('methods.index',compact('methods'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('methods.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
  
        Method::create($request->all());
   
        return redirect()->route('methods.index')
                        ->with('success','Method created successfully.');
    }

    public function edit(Method $method)
    {
        return view('methods.edit',compact('method'));
    }

    public function update(Request $request, Method $method)
    {
        $request->validate([
            'name' => 'required',
        ]);
  
        $method->update($request->all());
  
        return redirect()->route('methods.index')
                        ->with('success','Method updated successfully');
    }
    public function destroy(Method $method)
    {
        $method->delete();
  
        return redirect()->route('methods.index')
                        ->with('success','Method deleted successfully');
    }
}
