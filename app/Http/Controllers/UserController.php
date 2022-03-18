<?php

namespace App\Http\Controllers;

use App\Libraries\UserLibrary;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userLibrary;

    public function __construct(UserLibrary $userLibrary)
    {
        $this->userLibrary = $userLibrary;
    }

    public function index()
    {
        return $this->userLibrary->index();
    }

    public function edit(Request $request)
    {
        return $this->userLibrary->edit($request);
    }
}
