@extends('layouts.app')


@section('content')

    <div class="content">   
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        @if (session('password_status'))
        <div class="alert alert-success" role="alert">
            {{ session('password_status') }}
        </div>
        @endif
        <div class="container-fluid mt--7">
            
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
            <div class="col-md-6">
                <div class="card shadow">                   
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Confirmacion Entrega de Ticket') }}</h3>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                
                                <div class="pull-right">
                                    <a class="btn btn-primary" href="{{ route('tickets.index') }}"> Atras</a>
                                </div>
                            </div>
                        </div>
                    </div>             
                    <div class="card-body">                                    
                        <div class="col-25">
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div> 
                            {!! Form::model($registro, ['method' => 'PATCH','route' => ['tickets.update', $registro->id]]) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                            <div class="form-group">
                                                <strong>Nro Registro:</strong>
                                                <label class="badge badge-success"> {{ str_pad ($registro->id, 7, '0', STR_PAD_LEFT) }}</label>
                                            </div>                                        
                                       
                                        <strong>Nombre:</strong>
                                        {!! Form::text('nombre', null, array('placeholder' => 'Nombre','class' => 'form-control', 'readonly'=>"readonly")) !!}
                                        <strong>Apellido:</strong>
                                        {!! Form::text('apellido', null, array('placeholder' => 'Apellido','class' => 'form-control','readonly'=>"readonly")) !!}
                                        <strong>Cedula:</strong>
                                        {!! Form::text('cedula', null, array('placeholder' => 'Cedula','class' => 'form-control')) !!}
                                        <strong>Ciudad:</strong>
                                        {!! Form::text('provincia', null, array('placeholder' => 'Ciudad','class' => 'form-control','readonly'=>"readonly")) !!}
                                        
                                        <strong>Discapacidad:</strong>   
                                        {!! Form::text('discapacidad', null, array('placeholder' => 'Discapacidad','class' => 'form-control','readonly'=>"readonly")) !!}
                                        
                                        {{--!   {!!Form::select('discapacidad',['SI' => 'SI', 'NO' => 'NO'], $registro->discapacidad,["class" => "form-control","placeholder" =>   $registro->discapacidad])!!}                                                                            
                                        <div class="form-group">
                                            {{ Form::label('zonas_id', 'Zonas :')}}
                                            {!! Form::select('ticketzona_id', $zonas, null, ['class' => 'form-control']) !!}                
                                        </div>       !--}}       
                                        </div>              
                                    </div>
                                </div>
                               
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>                
            </div>
        </div>


@endsection
@section('script')
<script src="{{ asset('theme/plugins/common/common.min.js')}}"></script>
    <script src="{{ asset('theme/js/custom.min.js')}}"></script>
    <script src="{{ asset('theme/js/settings.js')}}"></script>
    <script src="{{ asset('theme/js/gleek.js')}}"></script>
    <script src="{{ asset('theme/js/styleSwitcher.js')}}"></script>

    <link href="css/style.css" rel="stylesheet">
    @endsection