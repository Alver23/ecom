<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index(Request $request)
    {
        //dd($request);
        return view('profileTable', [
            'profiles' => Profile::get(),
            'msg' => $request->input('msg') ?? null,
            'msgType' => $request->input('msgType') ?? null,
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('profile');
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Profile::create($request->all());
        return redirect('profiles')->with([
            'msg' => 'Perfil Creado',
            'msgType' => 'success'
        ]);
    }

    public function destroy(Request $request, Profile $profile)
    {
        $profile->delete();
        return redirect('profiles')->with([
            'msg' => 'Perfil eliminado',
            'msgType' => 'danger'
        ]);
    }

    public function edit($profile)
    {
        $result = Profile::find($profile);
        return view('profileEdit', compact('result'));
    }

    public function update(Request $request, $profile)
    {
        Profile::find($profile)->update($request->all());
        return redirect('profiles')->with([
            'msg' => 'Perfil Actualizado',
            'msgType' => 'success'
        ]);
    }
}