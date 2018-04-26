<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReservaVisita;
use DB;
use App\Utils\Reservas\TransformReservas;

class ReservaVisitaController extends Controller
{
    protected $reservasTransformer;

    public function __construct(TransformReservas $reservasTransformer) {
        $this->reservasTransformer = $reservasTransformer;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AuthenticateController $auth)
    {

        return ReservaVisita::all();
        //return Propiedad::with('empresa:id,nombre,email,telefono,sitio_web')->where('id_empresa', $auth->getAuthenticatedUser()->empresa->id)->get();
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
        ReservaVisita::create($request->all());
        return ['created' => true];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ReservaVisita::find($id);
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
        $reserva_visita = ReservaVisita::find($id);
        $reserva_visita->update($request->all());
        return ['updated' => true];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ReservaVisita::destroy($id);
        return ['deleted' => true];
    }

    public function reservaPropiedad(AuthenticateController $auth){
        return ReservaVisita::join('propiedad', 'propiedad.id', '=', 'reserva_visita.id_propiedad')
            ->join('empresa', 'propiedad.id_empresa', '=', 'empresa.id')
            ->join('cliente', 'reserva_visita.id_cliente', '=', 'cliente.id')

            ->select(DB::raw('reserva_visita.id as id_reserva, reserva_visita.fecha,
            propiedad.nombre as propiedad, cliente.nombre, cliente.apellido'))
            
            ->where('empresa.id', $auth->getAuthenticatedUser()->empresa->id)
            ->where('reserva_visita.estado', true)
            ->get();
            
    }

    public function diasRestantesReserva (AuthenticateController $auth) 
    {
        $reservas = ReservaVisita::join('propiedad', 'reserva_visita.id_propiedad', '=', 'propiedad.id')
                ->join('empresa', 'propiedad.id_empresa', '=', 'empresa.id')
                ->join('cliente', 'reserva_visita.id_cliente', '=', 'cliente.id')

                ->select(DB::raw('reserva_visita.id as id_reserva, reserva_visita.fecha, reserva_visita.estado, propiedad.nombre as propiedad, cliente.nombre, cliente.apellido'))

                ->where('empresa.id', $auth->getAuthenticatedUser()->empresa->id)
                ->where('reserva_visita.estado', true)
                ->get();
        //Llamamos a la instancia de TransformReservas ya importado
        return $this->reservasTransformer->transformCollection($reservas->toArray());
    }    

}
