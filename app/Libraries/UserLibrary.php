<?php

namespace App\Libraries;

use Illuminate\Support\Facades\Auth;

class UserLibrary
{
    public function index()
    {
        $data = Auth::user();
        return view('profile.index', ['data' => $data]);
    }

    public function edit($request)
    {
        $data = Auth::user();

        if ($request->input == 'name')
            $data->name = $request->data;
        elseif ($request->input == 'first_surname')
            $data->first_surname = $request->data;
        elseif($request->input == 'last_surname')
            $data->last_surname = $request->data;
        elseif ($request->input == 'email')
            $data->email = $request->data;

        $data->update();
        return response()->json(['status' => true, 'data' => $data]);
    }
}
