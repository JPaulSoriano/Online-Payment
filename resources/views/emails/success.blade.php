@component('mail::message')
# COLEGIO DE DAGUPAN - ONLINE PAYMENT

Hi {{ $student->full_name }}, Yout Payment is has been sent!<br>

Please wait for your payment to be verified or go to the link below to check your status.

@component('mail::button', ['url' => $url])
View Payment Status
@endcomponent

@component('mail::panel')
Your reference number is <b>{{ $student->ref_no }}</b> <br>
Payment For <b>{{ $student->for }}</b> <br>
Amount <b>{{ $student->amount }}</b>
@endcomponent

<i>This is an automated message - please do not reply to this email. For further inquiries, please email us at [info@cdd.edu.ph](info@cdd.edu.ph)</i>

Regards,<br>
Colegio de Dagupan
@endcomponent
