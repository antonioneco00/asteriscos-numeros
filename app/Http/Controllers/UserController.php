<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function config() {
        return view('user.config');
    }

    public function update(Request $request) {
        // Sesión usuario

        $user = Auth::user();
        $id = $user->id;

        // Validación

        $validate = $this->validate($request, [
            'name' => ['required', 'string', 'max:255', 'unique:users,name,' . $id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'image' => ['image']
        ]);

        // Actualización

        $id = Auth::user()->id;
        $name = $request->input('name');
        $description = $request->input('description');
        $email = $request->input('email');
        $image = $request->file('image');

        if ($image) {
            $image_path = time() . $image->getClientOriginalName();

            Storage::disk('public')->put($image_path, File::get($image));

            $user->image_path = $image_path;
        }

        $user->name = $name;
        $user->description = $description;
        $user->email = $email;

        $user->update();

        return redirect()->route('user.config')->with([
            'message' => 'Usuario actualizado correctamente'
        ]);
    }

    public function getImage($filename) {
        $file = Storage::disk('public')->get($filename);

        return new Response($file, 200);
    }
}
