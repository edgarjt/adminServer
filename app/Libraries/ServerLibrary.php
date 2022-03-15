<?php

namespace App\Libraries;

use App\Constants\PriorityConstant;
use App\Models\ServerModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class ServerLibrary
{
    public $nameRoute = null;

    public function __construct()
    {
        $this->nameRoute = Route::currentRouteName();
    }

    public function AllIndex() {
        if ($this->nameRoute == 'servers'){
            $title = 'Servidores';
            $route = 'createFormServerAll';
            $route_delete = 'all/serverDeleteAll';
            $route_update = 'serverFormUpdateAll';
            $data = ServerModel::all();

        } else if ($this->nameRoute == 'serversHigh'){
            $title = 'Servidores Altos';
            $route = 'createFormServerHigh';
            $route_delete = 'high/serverDeleteHigh';
            $route_update = 'serverFormUpdateHigh';
            $data = ServerModel::where('priority', PriorityConstant::HIGH)->get();

        }else if ($this->nameRoute == 'serversMedium'){
            $title = 'Servidores Medios';
            $route = 'createFormServerMedium';
            $route_delete = 'medium/serverDeleteMedium';
            $route_update = 'serverFormUpdateMedium';
            $data = ServerModel::where('priority', PriorityConstant::MEDIUM)->get();

        }else if ($this->nameRoute == 'serversUnder'){
            $title = 'Servidores Bajos';
            $route = 'createFormServerUnder';
            $route_delete = 'under/serverDeleteUnder';
            $route_update = 'serverFormUpdateUnder';
            $data = ServerModel::where('priority', PriorityConstant::UNDER)->get();

        }else if ($this->nameRoute == 'serversGrowth'){
            $title = 'Servidores Desarrollos';
            $route = 'createFormServerGrowth';
            $route_delete = 'growth/serverDeleteGrowth';
            $route_update = 'serverFormUpdateGrowth';
            $data = ServerModel::where('priority', PriorityConstant::GROWTH)->get();
        }

        return view('server.index', ['data' => $data, 'title' => $title, 'route' => $route, 'route_delete' => $route_delete, 'route_update' => $route_update]);
    }

    public function serverFormCreate()
    {
        if ($this->nameRoute == 'createFormServerAll'){
            $priority = PriorityConstant::PRIORITY;
            $route = 'serverCreateAll';

        } else if ($this->nameRoute == 'createFormServerHigh'){
            $priority = [
                ['priority' => PriorityConstant::HIGH]
            ];
            $route = 'serverCreateHigh';

        }else if ($this->nameRoute == 'createFormServerMedium'){
            $priority = [
                ['priority' => PriorityConstant::MEDIUM]
            ];
            $route = 'serverCreateMedium';

        }else if ($this->nameRoute == 'createFormServerUnder'){
            $priority = [
                ['priority' => PriorityConstant::UNDER]
            ];
            $route = 'serverCreateUnder';

        }else if ($this->nameRoute == 'createFormServerGrowth'){
            $priority = [
                ['priority' => PriorityConstant::GROWTH]
            ];
            $route = 'serverCreateGrowth';
        }

        return view('server.create', ['priority' => $priority, 'route' => $route]);
    }

    public function serverFormUpdate($id)
    {
        $data = ServerModel::find($id);

        if ($this->nameRoute == 'serverFormUpdateAll'){
            $priority = PriorityConstant::PRIORITY;
            $route = 'serverCreateAll';

        } else if ($this->nameRoute == 'serverFormUpdateHigh'){
            $priority = [
                ['priority' => PriorityConstant::HIGH]
            ];
            $route = 'serverCreateHigh';

        }else if ($this->nameRoute == 'serverFormUpdateMedium'){
            $priority = [
                ['priority' => PriorityConstant::MEDIUM]
            ];
            $route = 'serverCreateMedium';

        }else if ($this->nameRoute == 'serverFormUpdateUnder'){
            $priority = [
                ['priority' => PriorityConstant::UNDER]
            ];
            $route = 'serverCreateUnder';

        }else if ($this->nameRoute == 'serverFormUpdateGrowth'){
            $priority = [
                ['priority' => PriorityConstant::GROWTH]
            ];
            $route = 'serverCreateGrowth';
        }

        return view('server.edit', ['data' => $data,'priority' => $priority, 'route' => $route]);
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

        if ($this->nameRoute == 'serverCreateAll'){
            $route = 'servers';

        } else if ($this->nameRoute == 'serverCreateHigh'){
            $route = 'serversHigh';

        }else if ($this->nameRoute == 'serverCreateMedium'){
            $route = 'serversMedium';

        }else if ($this->nameRoute == 'serverCreateUnder'){
            $route = 'serversUnder';

        }else if ($this->nameRoute == 'serverCreateGrowth'){
            $route = 'serversGrowth';
        }

        return redirect()->route($route)->with($response);
    }

    public function serverDelete($id)
    {
        $data = ServerModel::find($id);

        if (is_null($data))
            $response = ['title' => 'Error!', 'message' => 'Nose encontro el servidor', 'status' => 'error'];
        else
            $response = ['title' => 'Éxito!', 'message' => 'El servidor ' . $data->name . ' se elimino correctamente', 'status' => 'success'];

        $data->delete();

        if (strpos($_SERVER['HTTP_REFERER'], 'all')){
            $route = 'server/all/servers';

        } else if (strpos($_SERVER['HTTP_REFERER'], 'high')){
            $route = 'server/high/serversHigh';

        }else if (strpos($_SERVER['HTTP_REFERER'], 'medium')){
            $route = 'server/medium/serversMedium';

        }else if (strpos($_SERVER['HTTP_REFERER'], 'under')){
            $route = 'server/under/serversUnder';

        }else if (strpos($_SERVER['HTTP_REFERER'], 'growth')){
            $route = 'server/growth/serversGrowth';
        }

        return redirect($route)->with($response);
    }
}
