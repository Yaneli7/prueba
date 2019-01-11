<?php

namespace App\Http\Controllers;
use App\Usuario;
use App\Direccion;
use Illuminate\Http\Request;

class DireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direcciones=Direccion::all();
        dd($direcciones);
        return view('Usuario.index',compact('direcciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $usuarios=Usuario::all();
        return view('Direccion.createD',compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,['calle'=>'required','colonia'=>'required','delegacion'=>'required','numero'=>'required','id_usuario'=>'required']);
        $direccion = Direccion::create([
            'calle' => $request->calle,
            'colonia'=> $request->colonia,
            'delegacion'=> $request->delegacion,
            'numero'=> $request->numero,
            'id_usuario' => $request->id_usuario
        ]);
        return redirect()->route('usuarios.index')->with('success','Registro creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Direccion $direccione)
    {
        //
        $direccion=Direccion::find($direccion->id);
        return view('Usuario.index',compact('direccion'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Direccion $direccione)
    {
        //
        $usuarios=Usuario::all();
        $direcciones=Direccion::find($direccione->id);
        //dd($direccione);
        return view('Direccion.editD',compact('direcciones','usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Direccion $direccione)
    {
        //
        $this->validate($request,['calle'=>'required','colonia'=>'required','delegacion'=>'required','numero'=>'required','id_usuario'=>'required']);

        $direccione->update([
            'calle'=>$request->calle,
            'colonia'=>$request->colonia,
            'delegacion'=>$request->delegacion,
            'numero'=>$request->numero,
            'id_usuario'=>$request->id_usuario]);

        $direccione->save();
        return redirect()->route('usuarios.index')->with('succes','Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *public function eliminar($id)
    {
        //
        $post=Direccion::find($id);
        $post->delete();
        return redirect()->route('usuarios.index');
    }
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        dd($id);
       $post = Direccion::find($id);
       dd($post);
       $post->delete();
       
        return redirect()->route('usuarios.index')->whith('success','success', 'registor eliminado');
    }

     public function eliminarDir($id)
    {
        //dd($id);
       $post = Direccion::find($id);
       //dd($post);
       $post->delete();
        return redirect()->route('usuarios.index');
    }
}