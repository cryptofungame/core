<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaction;

use App\User;

class TransactionController extends Controller
{
    public function index()
    {
    	session_start();
        if(!isset($_SESSION['logged_in'])) {

            return redirect('admin/login');

        }
        
    	$query = Transaction::orderBy('id','desc')->paginate(20);

    	return view('transactions', compact('query'));
    }
}
