@extends('template.header')
@if(auth()->check())
    @include('template.navbar')
@endif
@yield('content')
@extends('template.footer')
