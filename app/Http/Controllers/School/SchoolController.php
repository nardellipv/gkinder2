<?php

namespace gkinder\Http\Controllers\School;

use gkinder\Http\Controllers\Controller;
use gkinder\School;
use gkinder\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SchoolController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        //
    }

    public function updateSchool(Request $request, $id)
    {
        $school = School::find($id);
        $school->name = $request['nombre'];
        $school->address = $request['direccion'];
        $school->city = $request['ciudad'];
        $school->cp = $request['cp'];
        $school->phone = $request['telefono'];
        $school->url = $request['url'];
        $school->email = $request['email'];

        $school->save();

        Session::flash('message', 'Perfil editado correctamente');
        return back();
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request['nombre'];
        $user->email = $request['email'];
        if($request['password']) {
            $user->password = bcrypt($request['password']);
        }

        $user->save();

        Session::flash('message', 'Perfil editado correctamente');
        return back();
    }

    public function show($id)
    {
        $school = School::find($id);
        $user = User::find(auth()->user()->id);

        return view('school.profile.edit', compact('school', 'user'));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
