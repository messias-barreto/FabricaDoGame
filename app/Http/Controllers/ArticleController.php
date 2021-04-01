<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->paginate(6);
        $secondaryarticles = Article::latest()->limit(3)
        ->get();

        return view('articles.index', compact('articles', 'secondaryarticles'));
    }

    public function favorite(){
        $articles = Article::latest()->limit(3)->get();
        $news = Article::latest()->limit(2)
        ->where('subject', '=', 'Noticia')
        ->get();
        
        $secondaryarticles = Article::latest()->limit(3)
        ->get();

        return view('welcome', compact('articles','news', 'secondaryarticles'));
    }

    public function configurearticle($id){
        $article = Article::latest()
        ->where('userId', '=' , $id)
        ->get();
        return view('articles.confarticle', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasFile('image')){
            // Get filename with the extension
                $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
                $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
                $image = $filename.'_'.time().'.'.$extension;
            // Upload Image
                //$path = $request->file('image')->storeAs('img', $image);
                $request->image->move(public_path('img/article'), $image);
        } else { $image = 'notImage.png'; }

        //save in database
        $article = new Article([
            'title' => $request->title,
            'subject' => $request->subject,
            'image' => $image,
            'post' => $request->post,
            'userId' => $request->userId
        ]);
        
        $article->save();
        return redirect('/dashboard')->with('success', 'Artigo Adicionado Com Sucesso!!');
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $article = DB::table('articles')
        ->join('users', 'users.id', '=', 'articles.userId')
        ->select(   'articles.id', 'articles.title', 'articles.image', 
                    'articles.post', 'articles.created_at','articles.updated_at', 
                    'users.name')
        ->where('articles.id', $id)
        ->get();
        
        $comments = DB::table('comments')->latest()
        ->join('users', 'users.id', '=', 'userId')
        ->select('comments.id', 'comments.comment','comments.created_at', 'users.name')
        ->where('comments.articleId', $id)
        ->get();

        $secoundComment = DB::table('secound_comments')
        ->join('users', 'users.id', '=', 'secound_comments.userId')
        ->select('secound_comments.commentId', 'secound_comments.comment','secound_comments.created_at', 'users.name')
        ->get();

        $secondaryarticles = Article::latest()->limit(3)
        ->get();

        return view('articles.show', compact(   'article', 
                                                'comments', 
                                                'secondaryarticles',
                                                'secoundComment'));
    }

    public function edit($id)
    {
        $article = Article::where('id', '=', $id)->get();
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title' => 'required',
            'post' => 'required',
        ]);

        Article::find($id)->update($request->all());
        return redirect('/configurearticle/'. $request->userId) ->with('success', 'Artigo Atualizado com Sucesso!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
