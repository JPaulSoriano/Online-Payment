<?php

namespace App\Http\Controllers;
use App\Payment;
use App\Course;
use App\Period;
use App\Semester;
use App\Year;
use App\Method;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentSuccess;
use App\Mail\PaymentVerified;

class PaymentController extends Controller
{


    public function index()
    {
        $payments = Payment::latest()->paginate(5);
        return view('payments.index',compact('payments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $courses = Course::all();
        $periods = Period::all();
        $semesters = Semester::all();
        $years = Year::all();
        $methods = method::all();
        return view('payments.create', compact('courses', 'periods', 'semesters', 'years', 'methods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:payments,email',
            'stud_no' => 'required',
            'period_id' => 'required',
            'semester_id' => 'required',
            'course_id' => 'required',
            'year_id' => 'required',
            'method_id' => 'required',
            'payment_ref' => 'required|unique:payments,payment_ref',
            'image' => 'required',
            'for' => 'required',
            'amount' => 'required',
            'auth_firstname' => 'nullable',
            'auth_lastname' => 'nullable',
            'auth_middlename' => 'nullable'
        ]);
  
        $input = $request->all();

        if ($image = $request->file('image')) {
            $image = $request->image->store('images', 'public');
            $input['image'] = "$image";
        }

        do{
            $ref = mt_rand(1000000000, 9999999999);
            $exists = Payment::where('ref_no', $ref)->exists();
         }while($exists);

         $input['ref_no'] = $ref;

         $payment = Payment::create($input);

         Mail::to($request->email)->send(new PaymentSuccess($payment));
   
        return redirect()->route('payments.show', $payment)
                        ->with('success','Success');
    }

    public function show(Payment $payment){
        return view('payments.show', compact('payment'));
    }


    public function unverify(Payment $payment)
    {
        $payment->status = '0';
        $payment->save();

        return redirect()->route('payments.index');
    }

    public function verify(Payment $payment)
    {
        $payment->status = '1';
        $payment->save();

        Mail::to($payment->email)->send(new PaymentVerified($payment));

        return redirect()->route('payments.index');
    }

    public function status(Request $request){
        // Get the search value from the request
        $search = $request->input('status');
    
        // Search in the title and body columns from the posts table
        $payments = Payment::query()
            ->where('ref_no', '=', "{$search}")
            ->get();
    
        // Return the search view with the resluts compacted
        return view('payments.status', compact('payments'));
    }
}
