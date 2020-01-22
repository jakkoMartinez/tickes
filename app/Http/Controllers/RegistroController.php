<?php

namespace App\Http\Controllers;

use App\Registro;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:registros-listar|registros-crear|registros-editar|registros-borrar', ['only' => ['index','store']]);
        $this->middleware('permission:registros-crear', ['only' => ['create','store']]);
        $this->middleware('permission:registros-editar', ['only' => ['edit','update']]);
        $this->middleware('permission:registros-borrar', ['only' => ['destroy']]);
        
    }
    
      
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index(Request $request)
    {
        $cedula  = $request->get('cedula');
        $nombre  = $request->get('nombre');
        $apellido = $request->get('apellido'); 

        $entregados = Registro::where('ticket','=',true)->count();
        $pormi = Registro::where('ticket','=',true)    
                ->where('user_id','=',Auth::user()->id)
                ->count();
        $entregados = Registro::where('ticket','=',true)->count();
        $faltantes = Registro::where('ticket', false)->count();;
        $total = Registro::count();
        $registros = Registro::where('ticket', false)
            ->cedula($cedula)
    		->nombre($nombre)
    		->apellido($apellido)
    		->paginate(100);

    	return view('registros.index', compact('registros','entregados','pormi','faltantes','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function show(Registro $registro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //
        $registro = Registro::find($id);                        
        return view('registros.edit',compact('registro'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [            
            'cedula' => 'required|max:10|ecuador:ci|unique:registros,cedula',//poner esto despues de max:10--|ecuador:ci           
        ]);
        $registro = Registro::find($id);
        $input = $request->all();  
        $input['ticket'] = true;   
        $input['user_id'] = Auth::user()->id; 
          
        $registro->update($input);     
            return redirect()->route('tickets.index')
                        ->with('success','Usuario Actualizado con Exito');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registro $registro)
    {
        //
    }  
  

}
