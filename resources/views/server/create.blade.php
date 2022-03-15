@extends('adminlte::page')

@section('title', 'Servidores | Crear')



@section('content_header')
    <h1>Crear servidor</h1>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Servidor</h3>
        </div>

        <div class="card-body">
            <form action="{{route($route)}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Nombre</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Host</label>
                        <input type="text" class="form-control @error('host') is-invalid @enderror" name="host" value="{{ old('host') }}">

                        @error('host')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputAddress">Prioridad</label>
                    <select id="inputState" class="form-control @error('priority') is-invalid @enderror" name="priority">
                        @foreach($priority as $items)
                        <option value="{{$items['priority']}}">{{$items['priority']}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="inputAddress">Vips</label>
                    <input type="text" class="form-control @error('vips') is-invalid @enderror" name="vips" value="{{ old('vips') }}">

                    @error('vips')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputAddress">Vlan</label>
                    <input type="text" class="form-control @error('vlan') is-invalid @enderror" name="vlan" value="{{ old('vlan') }}">

                    @error('vlan')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputAddress">Sistema operativo</label>
                    <input type="text" class="form-control @error('so') is-invalid @enderror" name="so" value="{{ old('so') }}">

                    @error('so')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputAddress">Servicio</label>
                    <input type="text" class="form-control @error('service') is-invalid @enderror" name="service" value="{{ old('service') }}">

                    @error('service')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputAddress">Puerto</label>
                    <input type="text" class="form-control @error('port') is-invalid @enderror" name="port" value="{{ old('port') }}">

                    @error('port')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputAddress">CPU Lógico</label>
                    <input type="text" class="form-control @error('logic_cpu') is-invalid @enderror" name="logic_cpu" value="{{ old('logic_cpu') }}">

                    @error('logic_cpu')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputAddress">RAM</label>
                    <input type="text" class="form-control @error('ram') is-invalid @enderror" name="ram" value="{{ old('ram') }}">

                    @error('ram')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Hd Local</label>
                        <input type="text" class="form-control @error('hd_local') is-invalid @enderror" name="hd_local" value="{{ old('hd_local') }}">

                        @error('hd_local')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputAddress">Hd externo</label>
                        <input type="text" class="form-control @error('hd_external') is-invalid @enderror" name="hd_external" value="{{ old('hd_external') }}">

                        @error('hd_external')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputAddress">Usuario</label>
                    <input type="text" class="form-control @error('user_server') is-invalid @enderror" name="user_server" value="{{ old('user_server') }}">

                    @error('user_server')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@stop
