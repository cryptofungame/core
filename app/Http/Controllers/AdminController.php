<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Operator;

use App\Question;

use App\Level;

class AdminController extends Controller
{

	public function login()
	{
		return view('login');
	}

	public function verify(Request $request)
	{
		session_start();

		$username = $request['username'];
		$password = sha1($request['password'].'Hnev#2Z@');

		$count = Operator::where('username', $username)->where('password',$password)->count();

		if($count > 0) {

			$_SESSION['logged_in'] = 1;
			return redirect('admin/questions');

		} else {

			$error = "نام کاربری یا رمز عبور اشتباه است";
			return view('login', compact('error'));

		}
	}
    public function index()
    {
    	session_start();
    	if(isset($_SESSION['logged_in'])) {
    	$query = Question::paginate(20);	

    	return view('questions', compact('query'));

    	} else {

            return redirect('admin/login');

        }
    }

    public function create()
    {
        session_start();
        if(!isset($_SESSION['logged_in'])) {

            return redirect('admin/login');

        }

    	if(Question::count() > 0)
    		$max = Question::orderBy('priority', 'desc')->first()->priority + 1;
    	else
    		$max = 1;
    	$levels = Level::all();
    	return view('create', compact('levels','max'));
    }

    public function store(Request $request)
    {
        session_start();
        if(!isset($_SESSION['logged_in'])) {

            return redirect('admin/login');

        }

    	$image_source = $request['image_source'];

        $image = rand(1000000,100000000).".".$image_source->getClientOriginalExtension();

        $image_source->move(public_path('uploads/'), $image);

        $answer_image = $request['answer_image'];

        $image_answer = rand(1000000,100000000).".".$answer_image->getClientOriginalExtension();

        $answer_image->move(public_path('uploads/'), $image_answer);

    	Question::create([
    		'title' => $request['title'],
    		'slug' => str_random(30),
    		'priority' => $request['priority'],
    		'answer' => $request['answer'],
    		'level_id' => $request['level_id'],
    		'image_source' => url('public/uploads')."/".$image,
            'answer_image' => url('public/uploads')."/".$image_answer,
            'answer_description' => $request['answer_description'],
            'hint' => $request['hint']
    	]);

    	return redirect('admin/questions');
    }

    public function edit($id)
    {
        session_start();
        if(!isset($_SESSION['logged_in'])) {

            return redirect('admin/login');

        }

    	$levels = Level::all();
    	$model = Question::find($id);

    	return view('edit',compact('levels','model'));
    }

    public function update(Request $request, $id)
    {
        session_start();
        if(!isset($_SESSION['logged_in'])) {

            return redirect('admin/login');

        }

    	$pic = $request['image_source'];
    	if($pic != "" || $pic != null) {
    		$image_source = $request['image_source'];

	        $image = rand(1000000,100000000).".".$image_source->getClientOriginalExtension();

	        $image_source->move(public_path('uploads/'), $image);

	        $image = url('public/uploads')."/".$image;

	    } else {

	    	$image = Question::find($id)->image_source;

	    }

        $pic_2 = $request['answer_image'];
        if($pic_2 != "" || $pic_2 != null) {
            $answer_image = $request['answer_image'];

            $image_answer = rand(1000000,100000000).".".$answer_image->getClientOriginalExtension();

            $answer_image->move(public_path('uploads/'), $image_answer);

            $image_answer = url('public/uploads')."/".$image_answer;

        } else {

            $image_answer = Question::find($id)->answer_image;

        }

    	Question::where('id', $id)->update([
    		'title' => $request['title'],
    		'priority' => $request['priority'],
    		'answer' => $request['answer'],
    		'level_id' => $request['level_id'],
    		'image_source' => $image,
            'answer_image' => $image_answer,
            'answer_description' => $request['answer_description'],
            'hint' => $request['hint']
    	]);

    	return redirect('admin/questions');
    }

    public function delete($id)
    {
        session_start();
        if(!isset($_SESSION['logged_in'])) {

            return redirect('admin/login');

        }
        
    	Question::where('id', $id)->delete();

    	return redirect('admin/questions');
    }



    public function logout()
    {
        session_start();
        session_destroy();
        return redirect('admin/login');
    }

}
