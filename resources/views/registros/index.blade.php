@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="row align-items-center">
            <div class="col-8">
                <strong>Total:</strong>
                <label class="badge badge-primary">{{$total}}</label>                   
            </div> 
            <div class="col-8">
                <strong>Entregados:</strong>
                <label class="badge badge-success">{{$entregados}}</label>                   
            </div>
            <div class="col-8">
                <strong>Entregados por Mi:</strong>
                <label class="badge badge-warning">{{$pormi}}</label>                   
            </div>   
            <div class="col-8">
                <strong>Faltantes:</strong>
                <label class="badge badge-danger">{{$faltantes}}</label>                   
            </div>                               
        </div>                
        <div class="col-md-12">
            <div class="page-header">
                <h1>
                    Busqueda de Datos
                    {{ Form::open(['route' => 'tickets.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                        <div class="form-group">
                            {{ Form::text('cedula', null, ['class' => 'form-control', 'placeholder' => 'Cedula']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::text('apellido', null, ['class' => 'form-control', 'placeholder' => 'Apellido']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::text('provincia', null, ['class' => 'form-control', 'placeholder' => 'Ciudad']) }}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary">Buscar</button>                            
                        </div>
                       
                    {{ Form::close() }}
                </h1>
                {{--! 
                     <div class="col-12 text-right">
                    @can('registros-crear')
                        <a href="{{ route('tickets.create') }}" class="btn btn-sm btn-primary">{{ __('+ Nuevo Ticket') }}</a>
                    @endcan
                </div>
                    !--}}
               
            </div>
        </div>       
           
                      
        <div class="card shadow">                   
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">{{ __('Datos') }}</h3>
                    </div>                            
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-12 margin-tb">                    
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('tickets.index') }}"> Atras</a>
                        </div>                    
                    </div>
                   
                </div>
            </div>  
                                 
            
            <div class="card-body">                                    
                <div class="col-12">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('Nombres') }}</th>
                                <th scope="col">{{ __('Cedula') }}</th>
                                <th scope="col">{{ __('Ciudad') }}</th>
                                <th scope="col">{{ __('Discapacidad') }}</th> 
                                <th scope="col">{{ __('Ticket Entregado') }}</th> 
                                <th scope="col">{{ __('Fecha Registro') }}</th> 
                                <th scope="col">{{ __('Accion') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registros as $key => $registro)
                            <tr>
                                <td>{{ $registro->nombre." ".$registro->apellido}}</td>
                                <td>{{ $registro->cedula }}</td>
                                <td>{{ $registro->provincia }}</td>
                                <td>
                                    @if($registro->discapacidad=='SI')
                                    <label class="badge badge-danger">Si</label>
                                    @else
                                    <label class="badge badge-success">No</label>
                                    @endif
                                    
                                </td>
                                <td>
                                    @if($registro->ticket==true)
                                    <label class="badge badge-success">Si</label>
                                    @else
                                    <label class="badge badge-danger">No</label>
                                    @endif
                                    
                                </td>
                                <td>{{ $registro->created_at }}</td>
                               
                                <td class="text-right">
                                    <form method="post">
                                        @csrf   
                                        <span>
                                            <a class="btn btn-primary" href="{{ route('tickets.edit',$registro->id) }}">Entregar Ticket</a>
                                            
                                        </span>
                                    </form>                                            
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">{{ __('Nombres') }}</th>
                                <th scope="col">{{ __('Cedula') }}</th>
                                <th scope="col">{{ __('Provincia') }}</th>
                                <th scope="col">{{ __('Discapacidad') }}</th> 
                                <th scope="col">{{ __('Ticket Entregado') }}</th> 
                                <th scope="col">{{ __('Fecha Registro') }}</th> 
                                <th scope="col">{{ __('Accion') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer py-4">
                    {{ $registros->render() }}
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