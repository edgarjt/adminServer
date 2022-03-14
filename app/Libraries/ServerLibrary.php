<?php

namespace App\Libraries;

use App\Constants\PriorityConstant;
use App\Models\ServerModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ServerLibrary
{
    public function AllIndex() {
        $data = ServerModel::with('user')->get();
        return view('server.all.index', ['data' => $data]);
    }

    public function serverFormCreate()
    {
        $priority = PriorityConstant::PRIORITY;

        return view('server.all.create', ['priority' => $priority]);
    }

    public function serverFormUpdate($id)
    {
        $priority = PriorityConstant::PRIORITY;
        $data = ServerModel::find($id);

        return view('server.all.edit', ['data' => $data,'priority' => $priority]);
    }

    public function serverCreate($request)
    {
        $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'host'        => ['required', 'string', 'max:255'],
            'priority'    => ['required', 'string', 'max:255'],
            'vips'        => ['required', 'string', 'max:255'],
            'vlan'        => ['required', 'string', 'max:255'],
            'so'          => ['required', 'string', 'max:255'],
            'service'     => ['required', 'string', 'max:255'],
            'port'        => ['required', 'string', 'max:255'],
            'logic_cpu'   => ['required', 'string', 'max:255'],
            'ram'         => ['required', 'string', 'max:255'],
            'hd_local'    => ['required', 'string', 'max:255'],
            'hd_external' => ['required', 'string', 'max:255'],
            'user_server' => ['required', 'string', 'max:255']
        ]);

        unset($request['_token']);

        $request['id_user'] = Auth::id();

        if (isset($request->update)){
            $data = ServerModel::find($request->update);
            $data->fill($request->all())->save();
            $message = ' actualizado';
        }else {
            $data = ServerModel::create($request->all());
            $message = ' registrado';
        }

        if (is_null($data))
            $response = ['title' => 'Error!', 'message' => 'Ocurrio un error al registrar', 'status' => 'error'];
        else
            $response = ['title' => 'Éxito!', 'message' => $data->name . $message, 'status' => 'success'];

        return redirect()->route('servers')->with($response);
    }

    public function serverDelete($id)
    {
        $data = ServerModel::find($id);

        if (is_null($data))
            $response = ['title' => 'Error!', 'message' => 'Nose encontro el servidor', 'status' => 'error'];
        else
            $response = ['title' => 'Éxito!', 'message' => 'El servidor ' . $data->name . ' se elimino correctamente', 'status' => 'success'];

        $data->delete();

        return redirect()->route('servers')->with($response);
    }
}
