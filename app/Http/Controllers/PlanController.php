<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Plan;

class PlanController extends Controller
{
    public function index()
    {
    	session_start();
        if(!isset($_SESSION['logged_in'])) {

            return redirect('admin/login');

        }

        $query = Plan::paginate(20);

        return view('plans', compact('query'));
    }

    public function create()
    {
    	session_start();
        if(!isset($_SESSION['logged_in'])) {

            return redirect('admin/login');

        }

        return view('plan-create');
    }

    public function store(Request $request)
    {
    	session_start();
        if(!isset($_SESSION['logged_in'])) {

            return redirect('admin/login');

        }

        Plan::create([
            'title' => $request['title'],
            'amount' => $request['amount'],
            'type' => $request['type'],
            'coins' => $request['coins']
        ]);

        return redirect('admin/plans');
    }

    public function edit($id)
    {
    	session_start();
        if(!isset($_SESSION['logged_in'])) {

            return redirect('admin/login');

        }

        $model = Plan::find($id);

        return view('plan-edit', compact('model'));
    }

    public function update(Request $request, $id)
    {
    	session_start();
        if(!isset($_SESSION['logged_in'])) {

            return redirect('admin/login');

        }

        Plan::where('id', $id)->update([
            'title' => $request['title'],
            'amount' => $request['amount'],
            'type' => $request['type'],
            'coins' => $request['coins']
        ]);

        return redirect('admin/plans');
    }

    public function delete($id)
    {
    	session_start();
        if(!isset($_SESSION['logged_in'])) {

            return redirect('admin/login');

        }
        
        Plan::where('id', $id)->delete();

        return redirect('admin/plans');

    }
}
