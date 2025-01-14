@extends('layouts.admin')

@section('titulo')

    
<span>Empleados</span>
    <a href="{{url('/empleado/create') }}" class="btn btn-primary btn-circle" data-toggle="" data-target="">
        <i class="fas fa-plus"></i>
    </a>


@endsection





<!--@section('content')-->

@section('contenido')
    <div class="card">
            <div class=card-body>
                    <table id="dt-empleado" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                        <th class="text-center">Acciones</th>
                            <th class="text-center">Id </th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Apellido</th>
                            <th class="text-center">Fecha de Nacimiento</th>
                            <th class="text-center">Fecha de Contratacion</th>
                            <th class="text-center">Dirección</th>
                            <th class="text-center">Id Cargo</th>
                            <th class="text-center"> Telefono</th>
                            <th class="text-center">Id Usuario</th>
                            <th class="text-center">Id Documento</th>
                            <th class="text-center">Id Turno</th>
                            <th class="text-center">Documento</th>
                            
                            </tr>
                    </thead>
                    <tbody>
        @foreach( $empleados as $empleado )

        <tr>
        <td> 
                
                <a href="{{url('/empleado/'.$empleado->id. '/edit' )}}" class="btn btn-primary">
    
                Editar
            
                </a>
            
                
                 |
    
    
                <form action="{{url('/empleado/'.$empleado->id)}} " class="d-inline" method="post">
                @csrf 
                {{method_field('DELETE')  }}
                    <input class="btn btn-danger" type="submit" onclick="return confirm ('¿Quieres Borrar?')"value="Borrar">
                
                </form>
    
                </td>
            <td>{{$empleado->id}}</td>
            <td>{{$empleado->Nombre}}</td>
            <td>{{$empleado->Apellido}}</td>
            <td>{{$empleado->FechaNacimiento}}</td>
            <td>{{$empleado->FechaContratacion}}</td>
            <td>{{$empleado->Direccion}}</td>
            <td>{{$empleado->Id_Cargo}}</td>
            <td>{{$empleado->Telefono}}</td>
            <td>{{$empleado->Id_Usuario}}</td>
            <td>{{$empleado->Id_Documento}}</td>
            <td>{{$empleado->Id_Turno}}</td>
            <td>{{$empleado->Documento}}</td>
            

        </tr>
        @endforeach
    < </tbody>
                </table>
            </div>

{!!$empleados->links() !!}
</div>

</div>
<!--@endsection-->
@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}" >
@endpush  
@push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>
    @endpush  