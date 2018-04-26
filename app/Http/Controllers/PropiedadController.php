<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Propiedad;
use App\Http\Controllers\AuthenticateController;
use DB;

class PropiedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AuthenticateController $auth)
    {

        //return Propiedad::all();
        //return Propiedad::with('empresa:id,nombre,email,telefono,sitio_web')->where('id_empresa', $auth->getAuthenticatedUser()->empresa->id)->get();
        $user = \JWTAuth::parseToken()->authenticate();
	    return Propiedad::where('id_empresa', $user->empresa->id)->get();
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
        Propiedad::create($request->all());
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
        return Propiedad::find($id);
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
        $empresa = Propiedad::find($id);
        $empresa->update($request->all());
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
        Propiedad::destroy($id);
        return ['deleted' => true];
    }

    public function indexPersonalizado (AuthenticateController $auth){

        return Propiedad::join('empresa', 'empresa.id', '=', 'propiedad.id_empresa')
            ->select(DB::raw('propiedad.nombre as propiedad,
            propiedad.id as id_propiedad, empresa.nombre as empresa, empresa.id as id_empresa,
             propiedad.codigo as codido_propiedad'))->orderBy('empresa.nombre')->where('id_empresa', $auth->getAuthenticatedUser()->empresa->id)->get();

    }
}
