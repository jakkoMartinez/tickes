@extends('errors::illustrated-layout')

@section('code', '403')
@section('title', __('Forbidden'))

@section('image')
<div 
    style="background-image: url({{ asset('theme') }}/image/403.jpg');" 
    class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('Ups!..Acceso No Autorizado.'))
