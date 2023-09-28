@extends('web-layout')

@section('content')

        <h1>Nothing to see here</h1>

        @php

            Mail::send('blank-email', [], function ($message) {
                $message->to("user@example.com");
                $message->subject("Test of email weirdness");
            });

        @endphp

        <h2>Completed render.</h2>

@endsection

