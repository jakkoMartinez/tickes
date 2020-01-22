@extends('errors::illustrated-layout')

@section('code', 'Unauthorized')
@section('title', __('Unauthorized'))

@section('image')
<div 
    style="background-image: url('{{ asset('theme') }}/image/401.jpg');" 
    class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('No..no..no. ¡¡ No Tienes Credenciales !!.'))