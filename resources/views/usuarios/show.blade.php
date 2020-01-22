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
        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{ asset('quix')}}/images/damir-bosnjak.jpg" alt="..." width="380" height="180">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                    @if ($user->userphoto==='s/f')
                                    <img class="avatar border-gray" src= "{{ asset('quix') }}/images/user/form-user.png" alt="...">
                                
                                    @endif                                                                
                            </a>
                            <p class="description">
                                    {{ $user->name}}                          
                            </p>
                            <p class="description">
                                    {{ $user->email}}                           
                            </p>
                            
                           
                        </div>                                               
                    </div>
                
                    <div class="card-footer">
                        <hr>
                        <div class="button-container">
                            <div class="row">
                                <div class="col-lg-4 col-md-5 col-6 ml-auto">
                                    <h5>{{ __('99999') }}
                                       <small>{{ __('Lecturas') }}</small>
                                    </h5>
                                </div>
                                <div class="col-lg-4 col-md-5 col-6 ml-auto mr-auto">
                                    <h5>{{ __('130') }}
                                        <br>
                                        <small>{{ __('Catastros') }}</small>
                                    </h5>
                                </div>
                                <div class="col-lg-4 mr-auto">
                                    <h5>{{ __('150') }}
                                        <br>
                                        <small>{{ __('Novedades') }}</small>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Equipo de Trabajo') }}</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled team-members">
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <div class="avataru">
                                            <img src="{{ asset('quix') }}/images/mike.jpg" alt="Circle Image"
                                                class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-8">
                                        {{ __('Lector 1') }}
                                        <br />
                                        <span class="text-muted">
                                            <small>{{ __('Salcedo') }}</small>
                                        </span>
                                    </div>
                                    <div class="col-md-3 col-3 text-right">
                                        <button class="btn btn-sm btn-outline-success btn-round btn-icon"><i
                                                class="fa fa-envelope"></i></button>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <div class="avataru">
                                            <img src="{{ asset('quix') }}/images/mike.jpg" alt="Circle Image"
                                                class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-7">
                                            {{ __('Lector 2') }}
                                        <br />
                                        <span class="text-success">
                                            <small>{{ __('Salcedo') }}</small>
                                        </span>
                                    </div>
                                    <div class="col-md-3 col-3 text-right">
                                        <button class="btn btn-sm btn-outline-success btn-round btn-icon"><i
                                                class="fa fa-envelope"></i></button>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <div class="avataru border-gray">
                                            <img src="{{ asset('quix') }}/images/mike.jpg" alt="Circle Image"
                                                class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-ms-7 col-7">
                                        {{ __('Lector 3') }}
                                        <br />
                                        <span class="text-danger">
                                            <small>{{ __('Salcedo') }}</small>
                                        </span>
                                    </div>
                                    <div class="col-md-3 col-3 text-right">
                                        <button class="btn btn-sm btn-outline-success btn-round btn-icon"><i
                                                class="fa fa-envelope"></i></button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8 text-center">
                <form class="col-md-12"   enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Perfil') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Nombre') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control"  value="{{ $user->name}}" readonly="readonly">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Apellido') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="lastname" class="form-control" value="{{ $user->lastname}}" readonly="readonly">
                                     </div>
                                </div>
                            </div>
                            <div class="row">
                                    <label class="col-md-3 col-form-label">{{ __('Cedula') }}</label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input type="text" name="identification" class="form-control" value="{{ $user->idcard}}" readonly="readonly">
                                         </div>
                                    </div>
                            </div>
                            <div class="row">
                                    <label class="col-md-3 col-form-label">{{ __('Direccion') }}</label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input type="text" name="address" class="form-control" value="{{ $user->address}}" readonly="readonly">
                                         </div>
                                    </div>
                            </div>
                            
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Email') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" value="{{ $user->email}}" readonly="readonly">
                                    </div>
                                  
                                </div>
                            </div>
                            <div class="row">
                                    <label class="col-md-3 col-form-label">{{ __('Cargo') }}</label>
                                    <div class="col-md-9">
                                       <div class="form-group">
                                            <input type="text" name="rol" class="form-control"  value="{{ route('users.edit', $user->id)[0] }}" readonly="readonly">
                                                                                     
                                        </div>                                      
                                    </div>
                                </div>
                        </div>
                       
                    </div>
                </form>
                <form class="col-md-12" >                  
                
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Cambiar Contraseña') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Contraseña Anterior') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="old_password" class="form-control" placeholder="Contraseña anterior" required>
                                    </div>
                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Nueva Contraseña') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Confirme Contraseña') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirme Contraseña" required>
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round">{{ __('Guardar Cambios') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection