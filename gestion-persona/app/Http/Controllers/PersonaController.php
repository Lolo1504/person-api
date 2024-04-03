<?php

namespace App\Http\Controllers;
use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personas = persona::all();
        $res = [
            "status" =>"ok",
            "code" => 100,
            "data" => $personas
           
        ];
        return $res;
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Jsonpersona = $request->json()->all();

           
        $persona = new Persona($Jsonpersona);
        

        $persona ->save();

        $res = [
            "status" => "ok",
            "message" => "Persona Creada",
            "code" => 1001,
            "data" => $persona
            
        ];
        return response ()->json($res);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $persona = persona::find($id);
        if(isset($persona)){
        $res = [
            "status" =>"ok",
            "message" => "Obteniendo persona por el id " . $id  ,
            "code" => 1001,
            "data" => $persona
        ];
        }
        else
        {
            $res = [
                "status" =>"Error",
                "message" => "No se encontro  persona por el id " . $id  ,
                "code" => 1001,
                "data" => null
            ];
        }
        return $res;

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $persona = persona::find($id);
        if (isset($persona))
            {
                $persona->update($request->json()->all());
                $res =[
                    "status" => "ok",
                    "code" => 1005,
                    "message" => "Persona actualizada"
                ];
            }
        else
            {
                $res =[
                    "status" => "ok",
                    "code" => 1005,
                    "message" => "No se encontro la persona a editar"
                ];
            }
            return $res ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $persona = persona::find($id);
        if (isset($persona))
        {
        $persona->delete();

        $res=[
            "status" => "ok",
            "code" => 400,
            "message" => "Persona eliminda"
        ];
        }
        else
        {
            $res=[
                "status" => "error",
                "code" => 400,
                "message" => "La persona no se pudo eliminar porque no existe"
            ];
        }
        return $res;
    }
}
