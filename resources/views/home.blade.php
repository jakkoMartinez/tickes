@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Ya estas logueado pero no tienes credenciales solicita al administrador credenciales de usuario!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('home')
<script src="{{ asset('js/app.js') }}" defer></script>
    
@endsection