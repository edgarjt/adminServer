<?php

namespace App\Http\Controllers;

use App\Libraries\ServerLibrary;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    protected $serverLibrary;

    public function __construct(ServerLibrary $serverLibrary)
    {
        $this->serverLibrary = $serverLibrary;
    }

    public function AllIndex()
    {
        return $this->serverLibrary->AllIndex();
    }

    public function serverFormCreate()
    {
        return $this->serverLibrary->serverFormCreate();
    }

    public function serverCreate(Request $request)
    {
        return $this->serverLibrary->serverCreate($request);
    }

    public function serverFormUpdate($id)
    {
        return $this->serverLibrary->serverFormUpdate($id);
    }

    public function serverDelete($id)
    {
        return $this->serverLibrary->serverDelete($id);
    }
}
