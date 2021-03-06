<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        <meta http-equiv="Content-Type" content="text/html charset=utf-8">
        <meta name="description" content="SME - simple mvc engine">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/x-icon" href="{{asset('ico/ico.ico')}}">
		<link rel="icon" type="image/png" sizes="16x16" href="{{asset('ico/16x16.png')}}">
		<link rel="icon" type="image/png" sizes="32x32" href="{{asset('ico/32x32.png')}}">
		<link rel="icon" type="image/png" sizes="96x96" href="{{asset('ico/96x96.png')}}">
		<link rel="apple-touch-icon" sizes="57x57" href="{{asset('ico/57x57.png')}}">
		<link rel="apple-touch-icon" sizes="60x60" href="{{asset('ico/60x60.png')}}">
		<link rel="apple-touch-icon" sizes="72x72" href="{{asset('ico/72x72.png')}}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{asset('ico/76x76.png')}}">
		<link rel="apple-touch-icon" sizes="114x114" href="{{asset('ico/114x114.png')}}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{asset('ico/120x120.png')}}">
		<link rel="apple-touch-icon" sizes="144x144" href="{{asset('ico/144x144.png')}}">
		<link rel="apple-touch-icon" sizes="152x152" href="{{asset('ico/152x152.png')}}">
		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
		<script src="{{asset('js/bootstrap.bundle.min.js')}}" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
		<script src="{{asset('js/jquery.js')}}"></script>
		<script src="{{asset('js/main.js')}}"></script>
		<style>@yield("style")</style>
    </head>
    <body>
		@yield('content')
	</body>
</html>