<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Events $events)
    {   
        try{
            return response()->json([
                "message"=>"Listado com sucesso",
                "dados"=>$events->get(),
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
    public function store(Events $events,Request $request)
    {
        try{
            $dados=$events->create($request->all());
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
    public function show($id)
    {
        try{
            $dados=Events::find($id);
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
    public function update(Request $request, $id)
    {
        try{        
            Events::find($id)->update($dados=$request->all());
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
            Events::destroy($id);
                return response()
                ->json([
                    "msg"=>"O registro foi deletado com sucesso.",
                ], 200);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
