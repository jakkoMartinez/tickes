@extends('errors::illustrated-layout')

@section('code', '404')
@section('title', __('Page Not Found'))

@section('image')
<div 
    style="background-image: url('{{ asset('theme') }}/image/404.png');" 
    class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('Lo sentimos, la página que estás buscando no se pudo encontrar.'))
