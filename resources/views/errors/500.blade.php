
@extends('errors::illustrated-layout')

@section('code', '500')
@section('title', __('Server Error'))

@section('image')
<div 
    style="background-image: url('{{ asset('theme') }}/image/500.jpg');" 
    class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('Upss.. Problemas Tecnicos..!! Disculpa lo estamos solucionando.'))