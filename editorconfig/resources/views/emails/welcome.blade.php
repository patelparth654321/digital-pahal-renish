@component('mail::message')
Welcome to digitalpahal.com
      
Name: {{ $mailData['name'] }}<br/>
Email: {{ $mailData['email'] }}<br/>
Phone: {{ $mailData['phone'] }}<br/>
Password: {{ $mailData['password'] }}
      
Thanks,<br/>
{{ config('app.name') }}
@endcomponent