<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? config('app.name') }}</title>

@php
    $favicon = $userinterface?->image_logo
        ? asset('storage/' . $userinterface->image_logo)
        : asset('images/LogoUmb.png');
@endphp

<link rel="icon" href="{{ $favicon }}">
<link rel="apple-touch-icon" href="{{ $favicon }}">

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance
