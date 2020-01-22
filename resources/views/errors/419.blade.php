@extends('errors::illustrated-layout')

@section('code', '419')
@section('title', __('Page Expired'))

@section('image')
<div 
    style="background-image: url('{{ asset('theme') }}/image/419.jpg');" 
    class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('Sesion Caducada!!.. Ingresa Tus Credenciales.'))