<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Session;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderByDesc('created_at')->paginate(2);
        return view('index', compact(['articles']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|string',
            'body' => 'required|max:5000|string',
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->body = $request->body;
        $article->saveOrFail();

        Session::flash('message', 'Статья сохранена');
        return redirect()->action('ArticleController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('show', compact(['article']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('edit', compact(['article']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255|string',
            'body' => 'required|max:5000|string',
        ]);

        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->body = $request->body;
        $article->saveOrFail();

        Session::flash('message', 'Статья обновлена');
        return redirect()->action('ArticleController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        Session::flash('message', 'Статья удалена');
        return redirect()->action('ArticleController@index');
    }
}
