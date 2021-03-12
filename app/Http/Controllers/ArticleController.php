<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->paginate(4);
        return view('articles.index', compact('articles'));
    }

    public function favorite(){
        $articles = Article::limit(3)->get();
        return view('welcome', compact('articles'));
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
        /*
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        */
        $article = new Article([
            'title' => $request->title,
            'subject' => $request->subject,
            //'image' => $request->image,
            'post' => $request->post,
            'userId' => $request->userId
        ]);

        //$image = $request->image;

        //dd($image);
        
        //$imageName = time().'.'.$request->image->extension();
        //$upload = $request->image->storeAs('img', $imageName, 's3');
        
        //$article->image = $upload;

        $article->save();
        //return redirect()->action([ArticleController::class, '/']);
        return redirect('/dashboard');
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
        $article = Article::where('id', $id)->get();
        $comments = Comment::where('articleId', $id)
        ->LeftJoin('users', 'users.id', '=', 'userId')
        ->get();

        return view('articles.show', compact('article', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
