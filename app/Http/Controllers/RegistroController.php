<?php

namespace App\Http\Controllers;

use App\Registro;
use Carbon\Carbon;
use App\Ticketzona;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
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
        $this->middleware('permission:registros-borrar', ['only' => ['misdelete']]);
        
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
        $provincia = $request->get('provincia'); 

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
            ->provincia($provincia)
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
        //$zonas=DB::table('ticketzonas')
         //->whereColumn('cantidad','>', 'entregados')
         //->pluck('nombre', 'id')          
         //->toArray();       
        
        //return view('registros.create',compact('zonas'));
        
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
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cedula' => 'required|max:10|ecuador:ci|unique:registros,cedula',//poner esto despues de max:10--|ecuador:ci
            'provincia' => 'required|string|max:255',
            'discapacidad' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:registros,email',
            //'ticket' => 'required',
            //'ticketzona_id' => 'required',
            
        ]);
        $input = $request->all();
        $input['ticket'] = true; 
        $input['user_id'] = Auth::user()->id; 
        //$countreg = Registro::where(['ticketzona_id' => $input['ticketzona_id']])->count();
        //dd($countreg);
        //$countreg= $countreg+1;
        //DB::table('ticketzonas')
        //->where('id', $input['ticketzona_id'])
        //->update(['entregados' => $countreg]);
        
        $registro = Registro::create($input);
        return redirect()->route('tickets.index')
                        ->with('success','Registro de Ticket Creado con Exito');
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
         
         //$zonas=DB::table('ticketzonas')
         //->whereColumn('cantidad','>', 'entregados')
         //->pluck('nombre', 'id') 
         //->toArray();
       
        $registro = Registro::find($id);                        
        return view('registros.edit',compact('registro'));//,'zonas'
        
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
           // 'ticketzona_id' => 'required',        
        ]);
        $registro = Registro::find($id);
        $input = $request->all();  
        $input['ticket'] = true;   
        $input['user_id'] = Auth::user()->id; 
        //$countreg =Registro::where(['ticketzona_id' => $input['ticketzona_id']])->count();
        //dd($countreg);
        //$countreg=$countreg+1;
       // DB::table('ticketzonas')
       // ->where('id', $input['ticketzona_id'])
       // ->update(['entregados' => $countreg]);
        
        $registro->update($input);       
            return redirect()->route('tickets.index')
                        ->with('success','Registro Actualizado con Exito');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Registro::where('ticket', false)
        ->whereDate('created_at','<=',now()->subDays(3))
        ->delete();
                   
        return redirect()->route('tickets.index')
        ->with('success','Registros Borrados con Exito');
       
    }  

    
    public function misdelete(Request $request)
    {
        //
        $registrosborrar=Registro::where('ticket', false)
                ->whereDate('created_at','<=', now()->subDays(3))
                ->paginate(100);   
        $totalborrar=Registro::where('ticket', false)
                ->whereDate('created_at','<=',now()->subDays(3))
                ->count();                    
    	return view('registros.misdelete', compact('registrosborrar','totalborrar'));
    }    

}
