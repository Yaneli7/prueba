@extends('layouts.layout')
@section('content')
        <div class="row">
          <section class="content">
            <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="pull-left"><h3>Lista usuarios</h3></div>
                  <div class="pull-right">
                    <div class="btn-group">
                      <a href="{{ route('usuarios.create') }}" class="btn btn-info" >Añadir usuario</a>
                    </div>
                  </div>
                  <div class="table-container">
                    <table id="mytable" class="table table-bordred table-striped">
                     <thead>
                       <th>Nombre</th>
                       <th>Apellido paterno</th>
                       <th>Apellido materno</th>
                       <th>Edad</th>
                       </thead>
                     <tbody>

                      @if($usuarios->count())  

                      @foreach($usuarios as $usuario)  
                      <tr>
                        <td>{{$usuario->nombre}}</td>
                        <td>{{$usuario->ape_paterno}}</td>
                        <td>{{$usuario->ape_materno}}</td>
                        <td>{{$usuario->edad}}</td>
                        <td><a class="btn btn-primary btn-xs" href="{{route('usuarios.edit', $usuario->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                        <td>
                          
                            <form action="{{route('eliminar', $usuario->id)}}" method="post" >
                              {{ csrf_field() }}
                           <button type="submit" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></button>
                           </form>
                         </td>
                       </tr>
                       @endforeach 
                       @else
                       <tr>
                        <td colspan="8">¡ No hay registro !!</td>
                      </tr>
                      @endif
                    </tbody>

                  </table>
                </div>
                </div>
                </div>
            </section>
        </div>


          <div class="row">
      <section class="content">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="pull-left"><h3>Lista de direcciones</h3></div>
              <div class="pull-right">
              <div class="btn-group">
              <a href="{{ route('direcciones.create') }}" class="btn btn-info" >Añadir dirección</a>
            </div>
          </div>
           <table id="mytables" class="table table-bordred table-striped">
             <thead>
               <th>Calle</th>
               <th>Colonia</th>
               <th>Delegación</th>
               <th>Número</th>
               <th>Usuario</th>
               </thead>
             <tbody>

              @if($direcciones->count())  

                  @foreach($direcciones as $direccion)  
                  <tr>
                    <td>{{$direccion->calle}}</td>
                    <td>{{$direccion->colonia}}</td>
                    <td>{{$direccion->delegacion}}</td>
                    <td>{{$direccion->numero}}</td>  
                    <th>{{$direccion->usuario->nombre}}</th>
                    <td><a class="btn btn-primary btn-xs" href="{{route('direcciones.edit', $direccion->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td>
                      
                        <form action="{{route('eliminarDir', $direccion->id)}}" method="post" >
                          {{ csrf_field() }}
                       <button type="submit" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></button>
                       </form>
                     </td>
                   </tr>
                   @endforeach 
               @else
               <tr>
                <td colspan="8">¡ No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
          
        </div>
      </div>
    </div>
  </div>
</section>

@endsection 
