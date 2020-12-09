<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloRequest;
use Illuminate\Auth\Events\Validated;
// use Dotenv\Validator as DotenvValidator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    // public function index(Request $request, Response $response) {
    //     $html = <<<EOF
    //     <html>
    //     <head>
    //     <title>Hello>Index</title>
    //     <style>
    //     body {font-size:16pt; color:#999; }
    //     h1 { font-size:100pt; text-align:right; color#eee; margin:-40px 0px -50px 0px; }
    //     </style>
    //     </head>
    //     <body>
    //         <h1>Hello</h1>
    //         <h3>Request</h3>
    //         <pre>{$request}</pre>
    //         <h3>Response</h3>
    //         <pre>{$response}</pre>
    //     </body>
    //     </html>
    //     EOF;
    //             $response->setContent($html);
    //             return $response;
    // }

    // public function index(Request $request) {
    //     $data = ['msg'=>'これはコントローラから渡されたメッセージです。', 'id'=>$request->id];
    //     return view('hello.index', $data);
    // }

        
    public function add(Request $request){
        return view('hello.add');
    }

    public function create(Request $request){
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        // DB::insert('insert into people (name, mail, age) values(:name, :mail, :age)', $param);
        DB::table('people')->insert($param);
        return redirect('/cockie');
    }

    public function edit(Request $request){
        // $param = ['id' => $request->id];
        // $item = DB::select('select * from people where id = :id', $param);
        // return view('hello.edit', ['form' => $item[0]]);
        $item = DB::table('people')->where('id', $request->id)->first();
        return view('hello.edit', ['form' => $item]);
    }

    public function update(Request $request){
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        // DB::update('update people  set name =:name, mail =:mail, age = :age where id = :id', $param);
        DB::table('people')->where('id', $request->id)->update($param);
        return redirect('/cockie');
    }

    public function del(Request $request){
        $param=['id' => $request->id];
        $item = DB::select('select * from people where id =:id', $param);
        return view('hello.del', ['form' => $item[0]]);
    }

    public function remove(Request $request) {
        $param = ['id'=> $request->id];
        DB::delete('delete from people where id = :id', $param);
        return redirect('/cockie');
    }

    public function cockie(Request $request){
        // if ($request->hasCookie('msg'))
        // {
        //     $msg = 'Cookie: ' . $request->cookie('msg');
        // } else {
        //     $msg = '※クッキーはありません。';
        // }
        // $items = DB::select('select * from people');
        // return view('hello.cockie', ['items' => $items]);
        // if (isset($request->id))
        // {
        //     $param = ['id' => $request->id];
        //     $items = DB::select('select * from people where id = :id', $param);
        // } else {
        //     $items = DB::select('select * from people');
        // }
        $items = DB::table('people')->get();
        return view('hello.cockie', ['items' => $items]);
    }

    public function cpost(Request $request){
        $validate_rule = [
            'msg' => 'required',
        ];
        $this->validate($request, $validate_rule);
        $msg = $request->msg;
        $response = new Response(view('hello.cockie', ['msg' => '「'. $msg. '」をクッキーに保存しました。']));
        $response->cookie('msg', $msg, 100);
        return $response;
    }

    public function show(Request $request) {
        $page = $request->page;
        $items = DB::table('people')
        ->offset($page * 3)
        ->limit(3)
        ->get();
        // $items = DB::table('people')->orderBy('age', 'asc')->get();
        // $min = $request -> min;
        // $max = $request -> max;
        // $items = DB::table('people')
        // -> whereRaw('age >= ? and age <= ?', 
        // [$min, $max])->get();         
        // $name = $request->name;
        // $items = DB::table('people')
        // ->where('name', 'like', '%' .$name .'%')
        // ->orwhere('mail', 'like', '%'. $name. '%')
        // ->get();
        return view('hello.show', ['items' => $items]);
    }


    public function index(){
        return view('hello.index');
    }

    // public function post(Request $request){
    //     // $msg = $request->msg;
    //     // $data = ['msg' =>'こんにちは、' .$msg .'さん！'];
    //     return view('hello.index', ['msg'=>$request->msg]);
    // }

    public function sample() {
        $data = ['one', 'two', 'three', 'four', 'five'];
        return view('hello.sample', ['data'=>$data]);
    }

    public function inhe(Request $request) {
        // $data = [
        //     ['name' => '山田太郎', 'mail' => 'taro@yamada' ],
        //     ['name' => '田中花子', 'mail' => 'hanako@tanaka' ],
        //     ['name' => '鈴木さちこ', 'mail' => 'satiko@suzuki' ],
        // ];
        return view('hello.inheritance');
    }

    public function form(Request $request) {
        return view('hello.form', ['msg'=>'フォームを入力してください。']);
        // $validator = Validator::make($request->query(), [
        //     'id' => 'required',
        //     'pass' => 'required',
        // ]);
        // if ($validator->fails()) {
        //     $msg = 'クエリーに問題があります。';
        // } else {
        //     $msg = 'ID/PASSを受け付けました。フォームを入力ください。';
        // }

        // return view('hello.form',['msg'=>$msg,]);
        // return view('hello.form', ['msg'=>'フォームを入力:']);
    }

    // public function post(HelloRequest $request) {
    public function post(HelloRequest $request)
    {
        return view('hello.form', ['msg'=>'正しく入力されました！']);
        // $rules = [
        //     'name' => 'required',
        //     'mail' => 'email',
        //     'age' => 'numeric',
        // ];

        // $messages = [
        //     'name.required' => '名前は必ず入力してください。',
        //     'mail.email' => 'メールアドレスが必要です。',
        //     'age.numeric' => '年齢を整数で記入してください。',
        //     // 'age.between' => '年齢は0〜150の間で入力してください。',
        //     'age.min' => '年齢は0歳以上で記入してください。',
        //     'age.max' => '年齢は200歳以下で記入してください。',
        // ];

        // $validator = Validator::make($request->all(), $rules, $messages
        // // [   'name' => 'required',
        // //     'mail' => 'email',
        // //     'age' => 'numeric|between:0,140',]
        // );

        // $validator->sometimes('age', 'min:0', function($input){
        //     return !is_int($input->age);
        // });

        // $validator->sometimes('age', 'max:200', function($input){
        //     return !is_int($input->age);
        // });

        // if ($validator->fails()) {
        //     return redirect('/form') ->withErrors($validator) ->withInput();
        // }

        // // $validate_rule = [
        // //     'name' => 'required',
        // //     'mail' => 'email',
        // //     'age' => 'numeric|between:0,150',
        // // ];
        // // $this->validate($request, $validate_rule);
        // return view('hello.form',['msg'=>'正しく入力されました！']);
    }
}

// global $head, $style, $body, $end;
// $head = '<html><head>';
// $style = <<<EOF
// <style>
// body {font-size:16pt; color:#999; }
// h1 { font-size:100pt; text-align:right; color#eee; margin:-40px 0px -50px 0px; }
// </style>
// EOF;
// $body = '</head><body>';
// $end = '</body></html>';

// function tag($tag, $txt) {
//     return "<{$tag}>" .$txt . "</{$tag}>";
// }

// class HelloController extends Controller
// {
//     // public function index($id='noname', $pass='unknown') {
//     //     <ul>
//     //     <li>ID: {$id}</li>
//     //     <li>PASS: {$pass}</li>
//     // </ul>
//     public function __invoke() {
        
//         return <<<EOF
// <html>
// <head>
// <title>Hello/Index</title>
// <style>

// </style>
// </head>
// <body>
//     <h1>Index</h1>
//     <p>これは、Helloコントローラーのindexアクションです。</p>
// </body>
// </html>
// EOF;

//     }

//     // public function index() {
//     //     global $head, $style, $body, $end;

//     //     $html = $head . tag('title','Hello/Index') .$style . $body . tag('h1', 'index') . tag('p' ,'this is Index page') . '<a href="/index/other">go to Other Page</a>' . $end;
//     //     return $html;
//     // }

//     // public function other() {
//     //     global $head, $style, $body, $end;

//     //     $html = $head .tag('h1', 'Other'). tag('p', 'this is Other Page'). $end;
//     //     return $html;
//     // }

// }
