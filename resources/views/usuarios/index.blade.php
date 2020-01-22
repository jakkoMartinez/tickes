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
                                <a href="{{ route('users.create'),Auth::user()->id }}" class="btn btn-sm btn-primary">{{ __('+ Usuario') }}</a>
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
                                    <th scope="col">{{ __('Apellidos') }}</th>
                                    <th scope="col">{{ __('Cedula') }}</th>
                                    <th scope="col">{{ __('Email') }}</th>
                                    <th scope="col">{{ __('Rol') }}</th>
                                    <th scope="col">{{ __('Registrado el') }}</th>
                                    <th scope="col">{{ __('Accion') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $user)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->lastname }}</td>
                                        <td>{{ $user->idcard }}</td>
                                        <td>
                                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                        </td>

                                        <td>
                                            @if(!empty($user->getRoleNames()))
                                                @foreach($user->getRoleNames() as $v)
                                                    <label class="badge badge-success">{{ $v }}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Mostrar</a>
                                            @can('roles-editar')
                                                <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Editar</a>
                                            @endcan
                                            @can('users-borrar')
                                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
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
                            {!! $data->render() !!}
                                
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scrusers')
<script src="{{ asset('js/app.js') }}" defer></script>
    
@endsection