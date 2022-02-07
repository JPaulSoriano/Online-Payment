<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $payments = Payment::count();
        $unclaimed = Payment::where('claim', '=', '0')->count();
        $unverified = Payment::where('status', '=', '0')->count();
        return view('home', compact('unclaimed', 'unverified', 'payments'));
    }

    public function unclaimed()
    {
        $unclaimed = Payment::where('claim', '=', '0')->get();
        return view('payments.unclaimed', compact('unclaimed'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function unverified()
    {
        $unverified = Payment::where('status', '=', '0')->get();
        return view('payments.unverified', compact('unverified'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

}
