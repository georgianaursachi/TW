<title>ConDr</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!--[if lte IE 8]><script src="/js/ie/html5shiv.js"></script><![endif]-->
<link rel="stylesheet" href="/css/main.css" />
<!--[if lte IE 8]><link rel="stylesheet" href="/css/ie8.css" /><![endif]-->
<!--[if lte IE 9]><link rel="stylesheet" href="/css/ie9.css" /><![endif]-->

<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('favicon.ico') }}">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('favicon.ico') }}">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('favicon.ico') }}">
<link rel="apple-touch-icon-precomposed" href="{{ asset('favicon.ico') }}">
