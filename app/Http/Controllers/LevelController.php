<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Level;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        if(!isset($_SESSION['logged_in'])) {

            return redirect('admin/login');

        }

        $query = Level::paginate(20);

        return view('levels', compact('query'));
    }

    public function create()
    {
        session_start();
        if(!isset($_SESSION['logged_in'])) {

            return redirect('admin/login');

        }

        return view('level-create');
    }

    public function store(Request $request)
    {
        session_start();
        if(!isset($_SESSION['logged_in'])) {

            return redirect('admin/login');

        }

        Level::create([
            'title' => $request['title']
        ]);

        return redirect('admin/levels');
    }

    public function edit($id)
    {
        session_start();
        if(!isset($_SESSION['logged_in'])) {

            return redirect('admin/login');

        }

        $model = Level::find($id);

        return view('level-edit', compact('model'));
    }

    public function update(Request $request, $id)
    {
        session_start();
        if(!isset($_SESSION['logged_in'])) {

            return redirect('admin/login');

        }

        Level::where('id', $id)->update([
            'title' => $request['title']
        ]);

        return redirect('admin/levels');
    }

    public function delete($id)
    {
        session_start();
        if(!isset($_SESSION['logged_in'])) {

            return redirect('admin/login');

        }
        
        Level::where('id', $id)->delete();

        return redirect('admin/levels');

    }
}
