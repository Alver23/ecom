<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $data = Profile::get();
        return view('profileIndex', [
            'profiles' => $data
        ]);
    }

    public function store(Request $request)
    {
        $profile = new Profile;
        $profile->name = $request->input('name');
        $profile->description = $request->input('description');
        $profile->save();
        return redirect('profiles');
    }

    public function create()
    {
        return view('profile');
    }

    public function destroy(Request $request, $id)
    {
       $profile = Profile::find($id);
       $profile->delete();
       return redirect('profiles');
    }

    public function edit(Request $request, $id)
    {
        $data = Profile::find($id);
        return view('profileEdit', [
            'profile' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::find($id);
        $profile->name = $request->input('name');
        $profile->description = $request->input('description');
        $profile->save();
        return redirect('profiles');
    }
}
