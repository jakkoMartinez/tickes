<?php

namespace App\Http\Controllers\CUsuario;

use App\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:Administrador']);
        $this->middleware('permission:users-listar|users-crear|users-editar|users-borrar', ['only' => ['index','store']]);
        $this->middleware('permission:users-crear', ['only' => ['create','store']]);
        $this->middleware('permission:users-editar', ['only' => ['edit','update']]);
        $this->middleware('permission:users-borrar', ['only' => ['destroy']]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('usuarios.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('usuarios.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'idcard' => 'required|max:10|unique:users,idcard',//poner esto despues de max:10--|ecuador:ci
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'same:confirm-password|required|string|min:8',
            'rol' => 'required'
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('rol'));
        return redirect()->route('users.index')
                        ->with('success','Usuario Creado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        
       // dd($agencia_asignad);
        return view('usuarios.show',compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
             
        return view('usuarios.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'idcard' => 'required|max:10|ecuador:ci|unique:users,idcard,'.$id,//poner esto despues de max:10--|ecuador:ci
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,            
            'roles' => 'required',
            
        ]);
            
            $input = $request->all();        
                              
            if(!empty($input['password'])){ 
                $input['password'] = Hash::make($input['password']);
            }else{
                $input = Arr::except($input, ['password']);
               
            }
           
            $user = User::find($id);
            $user->update($input);
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $user->assignRole($request->input('roles'));
            return redirect()->route('users.index')
                        ->with('success','Usuario Actualizado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','Usuario Borrado con Exito');
    }
}
