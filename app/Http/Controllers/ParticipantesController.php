<?php

namespace App\Http\Controllers;

use App\Models\Participantes;
use Illuminate\Http\Request;

class ParticipantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Participantes $participantes)
    {
        try{
            return response()->json([
                "message"=>"Listado com sucesso",
                "dados"=>$participantes->get(),
            ], 200);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Participantes $participantes)
    {
        try{
            $dados=$participantes->create($request->all());
            return response()->json([
                "message"=>"Criado com sucesso",
                "dados"=>$dados
            ],200);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Participantes $participantes)
    {
        try{
            $dados=$participantes->find($id);
            return response()->json([
                "message"=>"Listado com sucesso",
                "dados"=>$dados,
            ], 200);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Participantes $participantes,$id)
    {
        try{        
            $dados=$request->all();
            dd($dados);
            $participantes->find($id)->update($dados);
            return response()->json([
                "message"=>"Atualizado com sucesso",
                "dados"=>$dados,
            ], 200);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Participantes::destroy($id);
                return response()
                ->json([
                    "msg"=>"O registro foi deletado com sucesso.",
                ], 200);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
