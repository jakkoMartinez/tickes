@extends('layouts.app')


@section('content')
<div class="content">
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Confirmacion de Entrega</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('tickets.index') }}"> Atras</a>
                </div>
            </div>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Hubo algunos problemas con su entrada.<br><br>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        {!! Form::model($registro, ['method' => 'PATCH','route' => ['tickets.update', $registro->id]]) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    {!! Form::text('nombre', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
                    <strong>Apellido:</strong>
                    {!! Form::text('apellido', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
                    <strong>Cedula:</strong>
                    {!! Form::text('cedula', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
                    <strong>Provincia:</strong>
                    {!! Form::text('provincia', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
                    <strong>Direccion:</strong>
                    {!! Form::text('direccion', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
                   
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permiso:</strong>
                    <br/>
                   
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection