<?php

namespace App\Http\Controllers;
use App\Usuario;
use App\Direccion;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuarios=Usuario::all();
        $direcciones=Direccion::all();

        return view('Usuario.index',compact('usuarios', 'direcciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Usuario.create');
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
        $this->validate($request,['nombre'=>'required']);
        Usuario::create($request->all());
        return redirect()->route('usuarios.index')->with('success','Registro creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        $usuarios=Usuario::find($usuario->id);
        return view('Usuario.index',compact('usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //dd($usuario);
        //variable-modelo de las direcciones a las que se llamara
        $usuarios=Usuario::find($usuario->id);
        return view('Usuario.edit',compact('usuarios', 'usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
       // dd($request->all());
        $this->validate($request,['nombre'=>'required','ape_paterno'=>'required','ape_materno'=>'required']);
        //Usuario::find($usuario->id)->update([$request->all()]);
        $usuario->update([
                'nombre'=>$request->nombre,
                'ape_paterno'=>$request->ape_paterno,
                'ape_materno'=>$request->ape_materno,
                'edad'=>$request->edad
        ]);
        $usuario->save();
        return redirect()->route('usuarios.index')->with('success','Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        dd($usuario);
       $post = Usuario::find($usuario->id);
       dd($post);
       $post->delete();
       
        //Usuario::find($usuario->id)->delete();
       
        //Usuario::destroy($usuario);
        return redirect()->route('usuarios.index')->whith('success','success', 'registor eliminado');
    }
    public function eliminar($id)
    {
        //dd($id);
       $post = Usuario::find($id);
       //dd($post);
       $post->delete();

       
        //Usuario::find($usuario->id)->delete();
       
        //Usuario::destroy($usuario);
        return redirect()->route('usuarios.index');
    }
}

