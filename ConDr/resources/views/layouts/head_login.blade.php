<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ConDr</title>

<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

<!-- CSS -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/form-elements.css">
<link rel="stylesheet" href="/css/style.css">

<!-- Favicon and touch icons -->
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('favicon.ico') }}">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('favicon.ico') }}">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('favicon.ico') }}">
<link rel="apple-touch-icon-precomposed" href="{{ asset('favicon.ico') }}">