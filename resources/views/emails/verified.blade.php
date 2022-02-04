@component('mail::message')
# COLEGIO DE DAGUPAN - ONLINE PAYMENT

Dear {{ $student->full_name}},

YOUR PAYMENT HAS BEEN VERIFIED! 
@component('mail::panel')
Student Name: <b>{{ $student->full_name }}</b><br>
Student Number: <b>{{ $student->stud_no }}</b><br>
Payment Via: <b>{{ $student->method->name }}</b><br>
Payment Ref No: <b>{{ $student->payment_ref }}</b><br>
Payment For: <b>{{ $student->for }}</b><br>
Amount: <b>{{ $student->amount }}</b>
@endcomponent

Best regards,<br>

Colegio de Dagupan
@endcomponent
