<?php

namespace App\Http\Controllers;

use App\Article;
use Auth;
use Illuminate\Http\Request;
use DB;
use phpDocumentor\Reflection\Types\Boolean;


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Aqui Usamos elonquent
//        $articles = Article::WithTrashed()->paginate(10); //Busca todos artigos inclusive os deletados.
//        $articles = Article::onlyTrashed()->paginate(10); //Mostra apenas os deletados.
        $articles = Article::paginate(10); //Mostra apenas os nao deletados.
//        $articles = Article::whereLive(0)->get();

        //Aqui usamos QueryBilder
//        $articles = DB::table('articles')->get();
//        $articles = DB::table('articles')->whereLive(1)->first(); //Este deve ser usado com dd()
//        dd($articles);


//        return $articles;
        return view('articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    public function table()
    {
        $articles  = Article::all();
        return view('articles.table',compact('articles'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* 1. Aqui  criamos a instancia para poder gravar
        $article = new Article;
        $article->user_id = Auth::user()->id;
        $article->content = $request->content;
        $article->live = (boolean) $request->live;
        $article->post_on = $request->post_on;
        $article->save(); */

//        return $request->all();
        //2. A forma mais compacta: so temos de  definir o fillable no Model Article
        if(isset($request->live))
            Article::create($request->all());
        else
            Article::create(array_merge($request->all(),['live'=>false]));

//        DB::table('articles')->insert($request->except('_token')); //Gravar usando QuerBilder

        //3.. gravar especificando as colunas.
//        Article::create([
//            'user_id' => Auth::user()->id,
//            'content' => $request->content,
//            'live' => $request->live,
//            'post_on' => $request->post_on
//        ]);
        return redirect('/articles');
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
        return view('articles.show',compact('article'));
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
        return view('articles.edit',compact('article'));
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
        $article = Article::findOrFail($id);

        if(!isset($request->live))
            $article->update(array_merge($request->all(),['live'=>false]));
        else
            $article->update($request->all());
        return redirect('/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Duas formas para deletar
        //1. Usando delete, recuperamos primeiro o objecto.
//        $article = Article::findOrFail($id);
//        $article->delete();

        //2. Usando destroy
        Article::destroy($id);

        return redirect('/articles');
    }
    public  function restore($id){
        $article = Article::findOrFail($id);
        $article->restore();
    }

}
