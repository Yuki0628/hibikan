<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Source;
use App\Models\User;
use Laravel\Ui\Presets\React;
use Validator;

class PostController extends Controller
{
    public function index() {
        
        $post = Post::inRandomOrder()->first();
        $category_lists = Category::orderBy("id","asc")->get();
        $source_lists = Source::orderBy("id","asc")->get();


        return view('front')->with('post', $post)
                            ->with('category_lists', $category_lists)
                            ->with('source_lists', $source_lists);
    }


    public function category() {

        $uri = url()->current();
        $id = substr($uri, strrpos($uri, '/') +1); //uriの末尾を取得
       
        $categoryOrSource = explode('/', $uri); //uriを/で区切る
        $categoryOrSource = $categoryOrSource[3]; //5番目の文字列でsourceかcategoryか判別
        $categoryOrSource_id = $categoryOrSource . "_id";

        $posts = Post::where($categoryOrSource_id, '=', $id)->orderBy("id", "desc")->paginate(7);
        $category_lists = Category::orderBy("id","asc")->get();
        $source_lists = Source::orderBy("id","asc")->get();


        return view('category')->with('posts', $posts)
                               ->with('id', $id)
                               ->with('category_lists', $category_lists)
                               ->with('source_lists', $source_lists)
                               ->with('categoryOrSource', $categoryOrSource);
    }



    //個別投稿詳細ページの関数
    public function show() {

        $category_lists = Category::orderBy("id","asc")->get();
        $source_lists = Source::orderBy("id","asc")->get();

        $uri = url()->current();
        $id = substr($uri, strrpos($uri, '/') +1);
        $post = Post::find($id);

        return view('single')->with('post', $post)
                            ->with('category_lists', $category_lists)
                            ->with('source_lists', $source_lists);
    }

    //投稿画面
    public function create() {
        // ログインしているかの判定
        $user = \Auth::user();
        if(isset($user)) {
            return view('create');
        }else {
            return redirect('login')->with([
                'flash_msg' => '投稿にはログインが必要です。',
                'color' => 'danger'
            ]);
        }

    }


    public function edit(Request $request) {
        $user = \Auth::user();
        $post = Post::find($request->id);

        if(!isset($post)) {
            return redirect('/')->with([
                'flash_msg' => '不正なアクセスです。',
                'color' => 'danger'
            ]);
        }

        if(isset($user->id)) { //ログインしているかの判定

            if($post->user_id === $user->id) { //ユーザーIDが一致するかの判定
                return view('edit')->with('post', $post);

            } else {
                return redirect('/')->with([
                    'flash_msg' => 'アクセス権限がありません。',
                    'color' => 'danger'
                ]);
            }

        }else {
                return redirect('/')->with([
                    'flash_msg' => 'ログインしてください',
                    'color' => 'danger'
                ]);
            }

    }


    public function update(Request $request) {



        $request->validate([
            'title_kor' => 'required|string|max:100',
            'title_ja' => 'required|string|max:100',
            'explanation' => 'required',
            'category_id' => 'required',
            'source_id' => 'required',
        ]);

        $target = Post::find($request->id);

        $target->title_kor = request('title_kor');
        $target->title_ja = request('title_ja');
        $target->explanation = request('explanation');
        $target->category_id = request('category_id');
        $target->source_id = request('source_id');

        $target->save();
        return redirect('/')->with([
            'flash_msg' => '更新が完了しました。',
            'color' => 'success'
        ]);

    }




    //保存機能
    public function store(Request $request) {



        $explanation = $request->old('explanation');
        

        $input = $request->only('title_kor','title_ja',$explanation,'category_id','source_id');

        $validator = $request->validate([
            'title_kor' => 'required|string|max:100',
            'title_ja' => 'required|string|max:100',
            'explanation' => 'required',
            'category_id' => 'required',
            'source_id' => 'required',
        ]);


        //DBへ保存
        $user = \Auth::user();
        $post = new Post();

        $post->title_kor = $input["title_kor"];
        $post->title_ja = $input["title_ja"];
        $post->explanation = $input["explanation"];
        $post->user_id = $user->id;
        $post->category_id = $input["category_id"];
        $post->source_id = $input["source_id"];

        $post->save();

        return redirect('/')->with([
            'flash_msg' => '投稿が完了しました。',
            'color' => 'success'
        ]);

    }

    public function delete(Request $request) {
        $target = Post::find($request->id);
        $target->delete();
        return redirect('/')->with([
            'flash_msg' => '投稿の削除が完了しました。',
            'color' => 'success'
        ]);
    }
}
