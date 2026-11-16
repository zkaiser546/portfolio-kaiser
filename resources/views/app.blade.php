<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('portfolio.owner.name') }} — Portfolio</title>
    <meta name="description" content="Portfolio of {{ config('portfolio.owner.name') }}, {{ config('portfolio.owner.role') }}.">
    <meta name="theme-color" content="#161616">
    <link rel="canonical" href="{{ url('/') }}">
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="apple-touch-icon" href="/favicon.png">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ config('portfolio.owner.name') }}">
    <meta property="og:title" content="{{ config('portfolio.owner.name') }} — Portfolio">
    <meta property="og:description" content="Portfolio of {{ config('portfolio.owner.name') }}, {{ config('portfolio.owner.role') }}.">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:image" content="{{ url('/images/kaiser.png') }}">
    <meta property="og:locale" content="en_US">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ config('portfolio.owner.name') }} — Portfolio">
    <meta name="twitter:description" content="Portfolio of {{ config('portfolio.owner.name') }}, {{ config('portfolio.owner.role') }}.">
    <meta name="twitter:image" content="{{ url('/images/kaiser.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600&family=IBM+Plex+Mono:wght@400;500&family=IBM+Plex+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/portfolio.css', 'resources/js/app.js'])
</head>
<body>
    <div id="app" data-portfolio-url="{{ route('portfolio.data') }}"></div>
</body>
</html>
