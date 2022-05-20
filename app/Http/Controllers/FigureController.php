<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Figure;
use App\Models\Comment;
use App\Models\Like;

class FigureController extends Controller
{
    public $phpTag = "<?php ";
    public $preStart = "echo '<pre>'; ";
    public $preEnd = "echo '</pre>';";

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index($type = null, $category = null, Request $request) {        
        if ($request->input('type') && $request->input('category')) {
            $type = $request->input('type');
            $category = $request->input('category');
        } elseif ($request->input('type') && $request->input('type') != 'categoria') {
            $type = $request->input('type');
        } elseif ($request->input('category')) {
            $category = $request->input('category');
        } elseif ($request->input('type') == 'categoria') {
            return redirect()->route('figure.index');
        }

        if ($type && $type != 'categoria' && $category) {
            $figures = Figure::where('type', $type)
                             ->where('category', $category)
                             ->orderBy('id', 'desc')
                             ->simplePaginate(9);
        } elseif ($type && $type != 'categoria') {
            $figures = Figure::where('type', $type)
                             ->orderBy('id', 'desc')
                             ->simplePaginate(9);
        } elseif ($category) {
            $figures = Figure::where('category', $category)
                             ->orderBy('id', 'desc')
                             ->simplePaginate(9);
        } else {
            $figures = Figure::orderBy('id', 'desc')->simplePaginate(9);
        }

        $likedFigures = [0];

        if (Auth::user()) {
            foreach ($figures as $figure) {
                foreach ($figure->likes as $like) {
                    if ($like->user_id == Auth::user()->id) {
                        array_push($likedFigures, $figure->id);
                    }
                }
            }
        }

        return view('figure.index', [
            'figures' => $figures,
            'type' => $type,
            'category' => $category,
            'likedFigures' => $likedFigures
        ]);
    }

    public function create() {
        return view('figure.create', [
            'phpTag' => $this->phpTag,
            'preStart' => $this->preStart,
            'preEnd' => $this->preEnd
        ]);
    }

    public function save(Request $request) {
        $validate = $this->validate($request, [
            'name' => ['required'],
            'type' => ['required'],
            'category' => ['required'],
            'code' => ['required'],
        ]);

        $name = $request->input('name');
        $type = $request->input('type');
        $category = $request->input('category');
        $code = $request->input('code');
        $description = $request->input('description');

        $user = Auth::user();
        $figure = new Figure();
        $figure->user_id = $user->id;
        $figure->name = $name;
        $figure->type = $type;
        $figure->category = $category;
        $figure->code = $this->phpTag . $this->preStart . $code . $this->preEnd;
        $figure->description = $description;

        $figure->save();

        return redirect()->route('figure.index')->with([
            'message' => 'La figura se ha subido correctamente'
        ]);
    }

    public function detail($id) {
        $figure = Figure::find($id);
        
        if (Auth::user()) {
            $user = Auth::user();
            $user_like = false;

            foreach ($figure->likes as $like) {
                if ($like->user_id == $user->id) {
                    $user_like = true;
                }
            }

            return view('figure.detail', [
                'figure' => $figure,
                'user_like' => $user_like
            ]);
        } else {
            return view('figure.detail', [
                'figure' => $figure
            ]);
        }        
    }

    public function edit($id) {
        $user = Auth::user();
        $figure = Figure::find($id);

        if ($user && $figure && ($figure->user->id == $user->id || $user->role == 'admin')) {
            return view('figure.edit', [
                'figure' => $figure
            ]);
        } else {
            return redirect()->route('figure.index')->with([
                'message' => 'No puedes editar esta figura'
            ]);
        }
    }

    public function update(Request $request) {
        $validate = $this->validate($request, [
            'name' => ['required'],
            'type' => ['required'],
            'category' => ['required'],
            'code' => ['required']
        ]);

        $id = $request->input('figure_id');
        $name = $request->input('name');
        $type = $request->input('type');
        $category = $request->input('category');
        $code = $request->input('code');
        $description = $request->input('description');

        $user = Auth::user();
        $figure = Figure::find($id);

        $figure->name = $name;
        $figure->type = $type;
        $figure->category = $category;
        $figure->code = $code;
        $figure->description = $description;

        $figure->update();

        return redirect()->route('figure.index')->with([
            'message' => 'La figura se ha actualizado correctamente'
        ]);
    }

    public function delete($id) {
        $user = Auth::user();
        $figure = Figure::find($id);
        $comments = Comment::where('figure_id', $id)->get();
        $likes = Like::where('figure_id', $id)->get();

        if ($user && $figure && ($figure->user->id == $user->id || $user->role == 'admin')) {
            if ($comments && count($comments) >= 1) {
                foreach ($comments as $comment) {
                    $comment->delete();
                }
            }

            if ($likes && count($likes) >= 1) {
                foreach ($likes as $like) {
                    $like->delete();
                }
            }

            $figure->delete();

            return redirect()->route('figure.index')->with([
                'message' => 'La figura se ha eliminado correctamente'
            ]);
        } else {
            return redirect()->route('figure.index')->with([
                'message' => 'La figura no se ha podido eliminar'
            ]);
        }
    }
}
