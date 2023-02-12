<title>{{ config('chatify.name') }}</title>

{{-- Meta tags --}}
  {{-- BMG meta tags --}}
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="keywords" content="">

  {{-- Chatify meta tags --}}
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="id" content="{{ $id }}">
  <meta name="type" content="{{ $type }}">
  <meta name="messenger-color" content="{{ $messengerColor }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="url" content="{{ url('').'/'.config('chatify.routes.prefix') }}" data-user="{{ Auth::user()->id }}">

{{-- scripts --}}
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/chatify/font.awesome.min.js') }}"></script>
<script src="{{ asset('js/chatify/autosize.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>

<!-- BMG Fonts -->
<script src="https://kit.fontawesome.com/d1faa25a2e.js" crossorigin="anonymous"></script>

{{-- styles --}}
  {{-- BMG styles --}}
                            
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/griffe.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/griffe.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/griffe.png') }}">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

  {{-- Chatify styles --}}
  <link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css'/>
  <link href="{{ asset('css/chatify/style.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/chatify/'.$dark_mode.'.mode.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

{{-- Messenger Color Style--}}
@include('Chatify::layouts.messengerColor')
