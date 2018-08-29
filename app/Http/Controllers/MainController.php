<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;

use App\User;

use App\UserAnswer;

use Carbon\Carbon;

use App\Question;

use App\Plan;

use App\Transaction;

use App\Setting;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        $wallet = new \NeoPHP\NeoWallet();

        return Response::json([
                'wif' => $wallet->getWif()
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

            try {

                $wallet = new \NeoPHP\NeoWallet($request['wif']);

                $wif = $request['wif'];

                $address = $wallet->getAddress();

                $user = User::where('address', $address);

                if($user->count() > 0) {

                    return Response::json([
                        'result' => [
                            'message' => 'successful login',
                            'api_token' => $user->first()->api_token,
                            'address' => $address,
                            'credit' => $user->first()->credit,
                            'avatar' => "https://www.gravatar.com/avatar/".$request['wif']."?s=64&d=identicon&r=PG"
                        ]
                ], 200);

                } else {

                    $query = User::create([
                        'address' => $address,
                        'api_token' => str_random(50)
                    ]);

                    
                    return Response::json([
                        'result' => [
                            'message' => 'successful login',
                            'api_token' => $query->api_token,
                            'address' => $wallet->getAddress(),
                            'credit' => 100,
                            'avatar' => "https://www.gravatar.com/avatar/".$request['wif']."?s=64&d=identicon&r=PG"
                        ]
                    ]);
                }

            }

            catch (\Exception $e) {
                return Response::json([
                    'message' => 'invalid wif'
                ], 403);
            }

    }

    public function questions(Request $request, $slug)
    {
        $token = $request->header('Authorization');

        $query = User::where('api_token', $token);

        if($query->count() == 0) {

            return Response::json([
                'error' => 'unauthorized user'
            ], 403);

        } else {

            $user_id = $query->first()->id;

            $q = Question::where('slug', $slug)->first();

            $query = UserAnswer::where('question_id', $q->id)->where('user_id', $user_id);

            if($query->count() > 0) {

                $status = $query->first()->status;

            } else {

                $status = 0;

            }
        }

        return Response::json([
                'id' => $q->id,
                'title' => $q->title,
                'slug' => $q->slug,
                'answer_length' => strlen($q->answer),
                'image_source' => $q->image_source,
                'level_id' => $q->level_id,
                'priority' => $q->priority,
                'status' => $status,
                'hint_token' => Setting::first()->show_hint,
                'show_token' => Setting::first()->show_answer,
        ]);
    }

    public function answer(Request $request, $slug)
    {
        $token = $request->header('Authorization');

        $query = User::where('api_token', $token);

        if($query->count() == 0) {

            return Response::json([
                'error' => 'unauthorized user'
            ], 403);

        } else {

            $user_id = $query->first()->id;

            $question_id = Question::where('slug', $slug)->first()->id;

            $next = Question::where('id','>',$question_id);

            if(UserAnswer::where('question_id', $next->first()->id)->count() > 0) {

                $next = Question::where('id','>',$question_id + 1);

                    if(UserAnswer::where('question_id', $next->first()->id)->count() > 0) {

                        $next = Question::where('id','>',$question_id);

                    } if(UserAnswer::where('question_id', $next->first()->id)->count() > 0) {

                            $next = Question::where('id','>',$question_id);

                    }

            }

            if($next->count() > 0) {

                $next_slug = $next->first()->slug;

            } else {

                $next_slug = Null;

            }

            if(UserAnswer::where('user_id', $user_id)->where('question_id', $question_id)->where('status', 4)->count() > 0) {

                $prize = 0;

            } else {

                $prize = Setting::first()->answer;

            }

            $credit = User::where('id', $user_id)->first()->credit;

            $query = UserAnswer::where('user_id', $user_id)->where('question_id', $question_id);

            if($request['answer'] == Question::where('slug', $slug)->first()->answer) {

                User::where('id', $user_id)->update([
                    'credit' => $credit + $prize
                ]);

                if($query->count() == 0) {

                    UserAnswer::create([
                        'user_id' => $user_id,
                        'question_id' => $question_id,
                        'status' => 4
                    ]);

                } else {

                    $query->update([
                        'status' => 4
                    ]);

                }

                return Response::json([
                    'message' => 'correct answer!',
                    'image_source' => Question::where('slug', $slug)->first()->answer_image,
                    'answer_description' => Question::where('slug', $slug)->first()->answer_description,
                    'url' => Question::where('slug', $slug)->first()->url,
                    'slug' => $next_slug,
                    'credit' => $credit + $prize
                ], 200);

            } else {


                if($query->count() == 0) {

                } else {

                    if($query->first()->status == 2) {

                        $query->update([
                            'status' => 3
                        ]);

                    }
                }

                return Response::json([
                    'message' => 'answer is wrong!',
                    'credit' => $credit
                ], 410);

            }

        }
    }

    public function showAnswer(Request $request, $slug)
    {
        $token = $request->header('Authorization');

        $query = User::where('api_token', $token);

        if($query->count() == 0) {

            return Response::json([
                'error' => 'unauthorized user'
            ], 403);

        } else {

            $user_id = $query->first()->id;

            $credit = User::where('id', $user_id)->first()->credit;

            $answer = Question::where('slug', $slug)->first()->answer;

            $answer_length = strlen($answer);

            $split_answer = str_split($answer);

            $answer = [];

            for($i=1; $i<=$answer_length; $i++) {

                array_push($answer, base64_encode($split_answer[$i-1]));

            }


            if($credit >= Setting::first()->show_answer) {

                User::where('id', $user_id)->update([
                    'credit' => $credit - Setting::first()->show_answer
                ]);

                return Response::json([
                    'length' => $answer_length,
                    'answer' => $answer,
                    'credit' => $credit - Setting::first()->show_answer
                ], 200);
            } else {

                return Response::json([
                    'error' => 'credit is not enough!',
                    'credit' => $credit
                ], 410);

            }
        }
    }

    public function showHint(Request $request, $slug)
    {
        $token = $request->header('Authorization');

        $query = User::where('api_token', $token);

        if($query->count() == 0) {

            return Response::json([
                'error' => 'unauthorized user'
            ], 403);

        } else {

            $user_id = $query->first()->id;

            $credit = User::where('id', $user_id)->first()->credit;

            $answer = Question::where('slug', $slug)->first()->answer;

            $hint = Question::where('slug', $slug)->first()->hint;

            $answer_length = strlen($answer);

            $hint_length = strlen($hint);

            $split_answer = str_split($answer);

            $split_hint = str_split($hint);

            for($i=0; $i<$answer_length; $i++) {

                if(!in_array($i+1, $split_hint)) {

                    $split_answer[$i] = "";
 
                } else {

                    $split_answer[$i] = base64_encode($split_answer[$i]);

                }

            }

            $answer = [];

            for($j=1; $j<=$answer_length; $j++) {

                array_push($answer, $split_answer[$j-1]);

            }


            if($credit >= Setting::first()->show_hint) {

                User::where('id', $user_id)->update([
                    'credit' => $credit - Setting::first()->show_hint
                ]);

                return Response::json([
                    'length' => $answer_length,
                    'hint' => $answer,
                    'credit' => $credit - Setting::first()->show_hint
                ], 200);
            } else {

                return Response::json([
                    'error' => 'credit is not enough!',
                    'credit' => $credit
                ], 410);

            }
        }
    }

    public function userQuestions(Request $request)
    {
        $token = $request->header('Authorization');

        $query = User::where('api_token', $token);

        $questions_array = [];

        if($query->count() == 0) {

            return Response::json([
                'error' => 'unauthorized user'
            ], 403);

        } else {

            $user_id = $query->first()->id;

            if(UserAnswer::where('user_id', $user_id)->count() > 0) {

            $questions = Question::all();

            foreach($questions as $q) {

                $query = UserAnswer::where('question_id', $q->id)->where('user_id', $user_id)->where('status', 4);

                if($query->count() > 0) {

                    $status = $query->first()->status;

                    if($status == 4) {
                        $level_status = '1';
                    } else {
                        $level_status = '2';
                    }

                    $result = [
                        'id' => $q->id,
                        'title' => $q->title,
                        'slug' => $q->slug,
                        'answer_length' => strlen($q->answer),
                        'image_source' => $q->image_source,
                        'level_id' => $q->level_id,
                        'priority' => $q->priority,
                        'status' => $status,
                        'level_status' => $level_status
                    ];

                    array_push($questions_array, $result);
                }

            }

            foreach($questions as $q) {

                $query = UserAnswer::where('question_id', $q->id)->where('user_id', $user_id)->where('status','!=',4);

                if($query->count() > 0) {

                    $status = $query->first()->status;

                    if($status == 4) {
                        $level_status = '1';
                    } else {
                        $level_status = '2';
                    }
                    $result = [
                        'id' => $q->id,
                        'title' => $q->title,
                        'slug' => $q->slug,
                        'answer_length' => strlen($q->answer),
                        'image_source' => $q->image_source,
                        'level_id' => $q->level_id,
                        'priority' => $q->priority,
                        'status' => $status,
                        'level_status' => $level_status
                    ];

                    array_push($questions_array, $result);
                }

            }

            $fetch = UserAnswer::where('user_id', $user_id)->orderBy('id','desc');

            $myfetch = [];

            foreach($fetch->get() as $f) {

                array_push($myfetch, $f->question_id);

            }

            
            if($fetch->first()->status == 4) {
                $level_status = '2';
            } else {
                $level_status = '3';
            }

            $q = Question::whereNotIn('id', $myfetch)->count();

                if($q > 0) { 

                    $q = Question::whereNotIn('id', $myfetch)->first();

                    array_push($myfetch, $q->id);

                    $result = [
                        'id' => $q->id,
                        'title' => $q->title,
                        'slug' => $q->slug,
                        'answer_length' => strlen($q->answer),
                        'image_source' => $q->image_source,
                        'level_id' => $q->level_id,
                        'priority' => $q->priority,
                        'status' => 0,
                        'level_status' => $level_status
                    ];

                    array_push($questions_array, $result);


                    $new_query = Question::whereNotIn('id', $myfetch)->get();

                    foreach($new_query as $q) {

                            $result = [
                                'id' => $q->id,
                                'title' => $q->title,
                                'slug' => $q->slug,
                                'answer_length' => strlen($q->answer),
                                'image_source' => $q->image_source,
                                'level_id' => $q->level_id,
                                'priority' => $q->priority,
                                'status' => 0,
                                'level_status' => '3'
                            ];

                            array_push($questions_array, $result);

                    }
                }
            } //end if

            else {

                $q = Question::first();
                $result = [
                        'id' => $q->id,
                        'title' => $q->title,
                        'slug' => $q->slug,
                        'answer_length' => strlen($q->answer),
                        'image_source' => $q->image_source,
                        'level_id' => $q->level_id,
                        'priority' => $q->priority,
                        'status' => 0,
                        'level_status' => '2'
                ];

                array_push($questions_array, $result);

                $query = Question::where('id', '>', $q->id)->get();

                foreach($query as $q) {

                    $result = [
                        'id' => $q->id,
                        'title' => $q->title,
                        'slug' => $q->slug,
                        'answer_length' => strlen($q->answer),
                        'image_source' => $q->image_source,
                        'level_id' => $q->level_id,
                        'priority' => $q->priority,
                        'status' => 0,
                        'level_status' => '3'
                ];

                array_push($questions_array, $result);

                }

            }

            $solved = UserAnswer::where('user_id', $user_id)->count();

            if($solved == 0) {
                $solved = 1;
            }

            else {
                if(UserAnswer::where('user_id', $user_id)->orderBy('id','desc')->first()->status == 4) {
                $solved+=1;
                }
            }

            $all_questions = Question::count();

            $new_questions = [];

            if($solved > $all_questions) $solved = $all_questions;

            $first = array_slice($questions_array, 0, 10, false);

            array_push($new_questions, $first);

            $second = array_slice($questions_array, 10, 50, false);

            shuffle($second);

            $solved_array = [];

            $unsolved_array = [];

            foreach($second as $row) {

                if($row['status'] > 0) {

                    array_push($solved_array, [
                        'id' => $row['id'],
                        'title' => $row['title'],
                        'slug' => $row['slug'],
                        'answer_length' => $row['answer_length'],
                        'image_source' => $row['image_source'],
                        'level_id' => $row['level_id'],
                        'priority' => $row['priority'],
                        'status' => $row['status'],
                        'level_status' => $row['level_status']
                ]);

                } else {

                    array_push($unsolved_array, [
                        'id' => $row['id'],
                        'title' => $row['title'],
                        'slug' => $row['slug'],
                        'answer_length' => $row['answer_length'],
                        'image_source' => $row['image_source'],
                        'level_id' => $row['level_id'],
                        'priority' => $row['priority'],
                        'status' => $row['status'],
                        'level_status' => $row['level_status']
                ]);

                }

            }

            array_push($new_questions, $second);

            $third = array_slice($questions_array, 60, 20, false);

            $merge = array_merge($first, $solved_array, $unsolved_array, $third);

            $new_merge = [];
            $next_merge = [];
            $final_merge = [];

            $j = 1;

            $k = 1;

            $n = 0;

            foreach($merge as $row) {
                if($row['status'] == 4) {
                array_push($new_merge, [
                        'id' => $row['id'],
                        'title' => $row['title'],
                        'slug' => $row['slug'],
                        'answer_length' => $row['answer_length'],
                        'image_source' => $row['image_source'],
                        'level_id' => $row['level_id'],
                        'priority' => $row['priority'],
                        'status' => $row['status'],
                        'level_status' => $row['level_status'],
                        'postition' => $j++
                    ]);
                } elseif($row['status'] > 0 && $row['status'] < 4) {

                    array_push($next_merge, [
                        'id' => $row['id'],
                        'title' => $row['title'],
                        'slug' => $row['slug'],
                        'answer_length' => $row['answer_length'],
                        'image_source' => $row['image_source'],
                        'level_id' => $row['level_id'],
                        'priority' => $row['priority'],
                        'status' => $row['status'],
                        'level_status' => "2",
                        'postition' => $j++
                    ]);

                    $n = 1;

                } else {

                    if($k == 1 && $n == 1)  {
                        array_push($final_merge, [
                            'id' => $row['id'],
                            'title' => $row['title'],
                            'slug' => $row['slug'],
                            'answer_length' => $row['answer_length'],
                            'image_source' => $row['image_source'],
                            'level_id' => $row['level_id'],
                            'priority' => $row['priority'],
                            'status' => $row['status'],
                            'level_status' => "3",
                            'postition' => $j++
                        ]);
                    }
                        elseif($k == 1 && $n == 0) {

                            array_push($final_merge, [
                            'id' => $row['id'],
                            'title' => $row['title'],
                            'slug' => $row['slug'],
                            'answer_length' => $row['answer_length'],
                            'image_source' => $row['image_source'],
                            'level_id' => $row['level_id'],
                            'priority' => $row['priority'],
                            'status' => $row['status'],
                            'level_status' => "2",
                            'postition' => $j++
                        ]);
                } else {

                        array_push($final_merge, [
                            'id' => $row['id'],
                            'title' => $row['title'],
                            'slug' => $row['slug'],
                            'answer_length' => $row['answer_length'],
                            'image_source' => $row['image_source'],
                            'level_id' => $row['level_id'],
                            'priority' => $row['priority'],
                            'status' => $row['status'],
                            'level_status' => "3",
                            'postition' => $j++
                        ]);

                    }

                    $k++;

                }

                

            }

            $merger = array_merge($new_merge, $next_merge, $final_merge);

            // array_unique($merge, SORT_REGULAR);

            return Response::json([
                'progress' => ['solved' => $solved, 'all' => $all_questions],
                'questions' => $merger
            ]);

        }
    }

    public function plans()
    {
        return Response::json(
            Plan::get()
        );
    }


    public function getBalance(Request $request)
    {
        $token = $request->header('Authorization');

        $query = User::where('api_token', $token);

        $wallet = new \NeoPHP\NeoWallet($request["wif"]);

        $address = $wallet->getAddress();

        $neo = new \NeoPHP\NeoRPC(); #use false as argument to go to testnet
//$neo->setNode($neo->getFastestNode());
        $neo->setNode("http://seed5.neo.org:10332");

        $result = $neo->getBalance($address);



        if($query->count() == 0) {

            return Response::json([
                'error' => 'unauthorized user'
            ], 403);

        } else {

            return Response::json(
                $result
            );

        }
    }

    public function transaction(Request $request)
    {
        $token = $request->header('Authorization');

        $query = User::where('api_token', $token);

        if($query->count() == 0) {

            return Response::json([
                'error' => 'unauthorized user'
            ], 403);

        } else {

                    $hash_string = $request['hash'];

                    $exploded_hash_string = explode("&", $hash_string);

                    $plan_id = $exploded_hash_string[1];

                    $string = substr($exploded_hash_string[0], 6);

                    $string = substr($string, 0, -3);

                    if(Plan::find($plan_id)->type == "gas") {

                        $gas = Plan::find($plan_id)->amount;
                        $neo = 0;

                    } else {

                        $neo = Plan::find($plan_id)->amount;
                        $gas = 0;

                    }

                    Transaction::create([
                        'transaction_hash' => $string,
                        'user_id' => $query->first()->id,
                        'neo' => $neo,
                        'gas' => $gas
                    ]);





                    // $value = file_get_contents("https://api.neoscan.io/api/main_net/v1/get_transaction/".$string);

                    // $value = json_decode($value, true);

                    // $amount = $value['vouts'][0]['value'];

                    // $type =  strtolower($value['vouts'][0]['asset']);

                    $coins = Plan::find($plan_id)->coins;

                    $credit = $query->first()->credit;

                    $query->update([
                        'credit' => $credit + $coins
                    ]);

                    return Response::json([
                        'message' => 'successful transaction',
                        'coins_added' => $coins,
                        'new_credit' => $coins + $credit,
                        'hash' => $string
                    ]);
                
            
        }
    }


    public function users(Request $request)
    {
        // try {
        // return User::paginate(10);
            $page = $request['page'];

            $count = $request['count'];

            $users = User::count();

            $query = User::all();

            $arr = json_decode($query, true);

            $progress = array();
            foreach ($arr as $key => $row)
            {
                $progress[$key] = $row['progress'];
            }
            array_multisort($progress, SORT_DESC, $arr);

            $arr = collect($arr);

            $arr = $arr->forPage($page,$count);

            $newarr = [];

            foreach($arr as $row) {
                array_push($newarr, $row);
            }

            $result = [];
            $j = 1;
            foreach($newarr as $n) {
                array_push($result, [
                    'id' => $n['id'],
                    'credit' => $n['credit'],
                    'address' => $n['address'],
                    'progress' => $n['progress'],
                    'rank' => $j++
                ]);
            }

            return Response::json([
                'all_users' => $users,
                'result' => $result
            ]);
        // } catch(\Exception $e) {

        //     return Response::json([
        //         'error' => 'no result'
        //     ]);

        // }


    }

    public function search(Request $request)
    {
        $user_id = User::where('address', $request['address']);

        if($user_id->count() == 0) {

            return Response::json([
                'error' => 'address not found'
            ]);

        } else {
            
            

            $user_id = $user_id->first()->id;

            $users = User::count();

            $query = User::all();

            $arr = json_decode($query, true);
            
            $progress = array();
            foreach ($arr as $key => $row)
            {
                $progress[$key] = $row['progress'];
            }
            array_multisort($progress, SORT_DESC, $arr);
            
            

            $newarr = [];

            foreach($arr as $row) {
                array_push($newarr, $row);
            }

            $result = [];
            $j = 1;
            foreach($newarr as $n) {
                array_push($result, [
                    'id' => $n['id'],
                    'credit' => $n['credit'],
                    'address' => $n['address'],
                    'progress' => $n['progress'],
                    'rank' => $j++
                ]);
            }

            foreach($result as $row) {

                if($row['id'] == $user_id) {

                    return [
                    'id' => $row['id'],
                    'credit' => $row['credit'],
                    'address' => $row['address'],
                    'progress' => $row['progress'],
                    'rank' => $row['rank']
                    ];

                }

            }

        }
    }
}
