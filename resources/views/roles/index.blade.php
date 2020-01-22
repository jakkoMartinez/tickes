@extends('layouts.app')


@section('content')
<div class="content">
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Usuarios') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                @can('users-crear')
                                <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary">{{ __('+ Rol') }}</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                   
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

                    <div class="table-responsive table-hover table-bordered">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('N°') }}</th>
                                    <th scope="col">{{ __('Nombres') }}</th>
                                    <th scope="col">{{ __('Creado') }}</th>
                                    <th scope="col">{{ __('Accion') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->created_at }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Mostrar</a>
                                        @can('roles-editar')
                                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                                        @endcan
                                        @can('roles-borrar')
                                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        {!! $roles->render() !!}                                 
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scrroles')
<script src="{{ asset('js/app.js') }}" defer></script>
    
@endsection