<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticlesController extends Controller
{
    /**
     * @var Article
     */
    private $article;

    /**
     * ArticlesController constructor.
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->article->all();
        if (!$articles) {
            abort(404);
        }
        return view('articles', ['articles' => $articles]);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $request->all();
        $validator = $this->validateFields($request);
        if ($validator->fails()) {
            return redirect()->route('articles.create')
                ->withErrors($validator)
                ->withInput();
        }
        $this->article->create([
            'title' => $request['title'],
            'short_text' => $request['short_text'],
            'full_text' => $request['full_text'],
        ]);
        return redirect()->route('articles.index');
    }

    private function validateFields($request)
    {
        return Validator::make($request,
            [
                'title' => 'required|min:10|max:100|string',
                'short_text' => 'required|max:2000|string',
                'full_text' => 'required|max:60000|string',
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = $this->article->find($id);
        if (!$article) {
            abort(404);
        }
        return view('article', ['article' => $article]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = $this->article->find($id);
        if (!$article) {
            abort(404);
        }
        return view('edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request = $request->all();
        $validator = $this->validateFields($request);
        if ($validator->fails()) {
            return redirect()->route('articles.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }
        $this->article->where('id', $id)->update([
            'title' => $request['title'],
            'short_text' => $request['short_text'],
            'full_text' => $request['full_text'],
        ]);
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = $this->article->find($id);
        if(!$article){
            abort(404);
        }
        $article->delete();
        return redirect()->route('articles.index');
    }
}
