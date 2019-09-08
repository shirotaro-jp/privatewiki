<?php
use App\Article;
// use App\Text;
// use App\Log;
// use App\User;
// use App\Group;
use Illuminate\Http\Request;
use cebe\markdown\Markdown as Markdown;

// サービストップ
Route::get('/', function () {
    return view('top');
});

// ホーム
Route::get('/home', function () {
    $articles = Article::orderBy('updated_at', 'desc')->get();
    return view('home', [
        'articles' => $articles
    ]);
});

// 記事リスト
Route::get('/list', function () {
    $articles = Article::orderBy('updated_at', 'desc')->get();
    return view('list', [
        'articles' => $articles
    ]);
});

// ログイン
// Route::get('/login', function () {
//     return view('welcome');
// });

// 記事表示
Route::get('/article/{article}',function (Article $article) {
    // contentのmarkdownをパースする
    $parser = new Markdown();
    $article->content = $parser->parse($article->content);
    return view('article', ['article' => $article]);
});

// 記事作成
Route::get('/create', function () {
    return view('create');
});

// 記事作成処理
Route::post('/creates', function (Request $request) {
    //
    //バリデーション
    $validator = Validator::make($request->all(), [
        'title' => 'required|max:255',
    ]);
    //バリデーション:エラー
    if ($validator->fails()) {
        return redirect('/create')
            ->withInput() //セッションに値を保持
            ->withErrors($validator);
    }
    // Eloquentモデル
    $article = new Article;
    $article->title = $request->title;
    $article->content = $request->content;
    $article->deleted = false;
    $article->save();
    //「/」ルートにリダイレクト
    return redirect('/home');
});

// 記事編集
Route::get('/edit/{article}',function (Article $article) {
    return view('edit', ['article' => $article]);
});

// 記事編集処理
Route::post('/rewrite', function (Request $request) {
    //
    //バリデーション
    $validator = Validator::make($request->all(), [
        'id' => 'required',
        'title' => 'required|max:255',
    ]);
    //バリデーション:エラー
    if ($validator->fails()) {
        return redirect('/edit/{$article}', ['article' => $request->title])
            ->withInput() //セッションに値を保持
            ->withErrors($validator);
    }
    // Eloquentモデル
    $article = Article::find($request->id);
    $article->title = $request->title;
    $article->content = $request->content;
    $article->save();
    //「/」ルートにリダイレクト
    return redirect('/home');
});

// 記事削除処理
Route::post('/delete', function (Request $request) {
    // Eloquentモデル
    $article = Article::find($request);
    $article->deleted = true;
    $article->save();
    //「/」ルートにリダイレクト
    return redirect('/home');
});



