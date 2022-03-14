@extends('adminlte::page')

@section('title', 'Servidores | Todos')

@section('content_header')
    <h1>Servidores</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Listado de servidores</h3>

            <div class="card-tools">
                <a href="{{route('createFormServer')}}" class="btn btn-primary">Nuevo</a>
            </div>
        </div>

        <div class="card-body">
            <table class="table" id="example">
                <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Host</th>
                    <th scope="col">Prioridad</th>
                    <th scope="col">Vips</th>
                    <th scope="col">Vlan</th>
                    <th scope="col">SO</th>
                    <th scope="col">Servicio</th>
                    <th scope="col">Puerto</th>
                    <th scope="col">CPU lógico</th>
                    <th scope="col">Ram</th>
                    <th scope="col">Hd local</th>
                    <th scope="col">Hd externo</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Creado por</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $items)
                <tr>
                    <td>{{$items->name}}</td>
                    <td>{{$items->host}}</td>
                    <td>{{$items->priority}}</td>
                    <td>{{$items->vips}}</td>
                    <td>{{$items->vlan}}</td>
                    <td>{{$items->so}}</td>
                    <td>{{$items->service}}</td>
                    <td>{{$items->port}}</td>
                    <td>{{$items->logic_cpu}}</td>
                    <td>{{$items->ram}}</td>
                    <td>{{$items->hd_local}}</td>
                    <td>{{$items->hd_external}}</td>
                    <td>{{$items->user_server}}</td>
                    <td>{{$items->user->fullname}}</td>
                    <td>
                        <a href="{{route('serverFormUpdate', $items->id)}}" class="btn btn-sm btn-info mr-1"><i class="fas fa-regular fa-pen"></i></a>
                        <button onclick="deleteServer({{$items->id}})" class="btn btn-sm btn-danger"><i class="fas fa-regular fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    <script>
        @if(session('message'))
        let message = @json(session('message'));
        let status = @json(session('status'));
        let title = @json(session('title'));

        Swal.fire(title, message, status);
        @endif

        function deleteServer(id) {
            Swal.fire({
                title: '¿Estas seguro?',
                text: "¡No podrás revertir esto!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Si, eliminar!',
                type: 'warning',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                    $(location).prop('href', '/server/all/serverDelete/' + id)
                }
            })
        }
    </script>
@stop
