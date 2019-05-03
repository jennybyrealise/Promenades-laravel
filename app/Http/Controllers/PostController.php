<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(2);
      /*   return Post::all(); */
      return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //avant de stocker on veut vérifié quîl y a bien tous les attributs
         $this->validate($request,[
            'title' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'depart' => 'required',
            'duree' => 'required',
          /*   'pourFamille' => 'required', */
            'body' => 'required'

        ]);
        $fileName = null;
        if (request()->hasFile('photo')) {
            $file = request()->file('photo');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./storage/img', $fileName);    
        }
        
        //Create a new post
        $post = new Post();
        $post->title = $request->input('title');
        $post->photo = $fileName; 
        $post->depart = $request->input('depart');
        $post->duree = $request->input('duree');
        $post->pourFamille = $request->input('pourFamille')||false ; 
        $post->body = $request->input('body');
        $post->author = $request->input('author');
        $post->save();

        return redirect('/promenades')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //elle va chercher dans la bd id de url
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post',$post);
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
           //avant de stocker on veut vérifié quîl y a bien tous les attributs
           $this->validate($request,[
            'title' => 'required',
            'photo' => 'image|mimes:jpg,jpeg,png,gif,pdf', 
            'depart' => 'required',
            'duree' => 'required',
           /*  'pourFamille' => 'required', */
            'body' => 'required',
            'author' => 'required',
            
            ]);

            

        //Create a new post
        $post = Post::find($id);
        $post->title = $request->input('title');
        if($request->hasFile('photo')){
            // add the new photo
             $fileName = null;
            
                $file = request()->file('photo');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('./storage/img', $fileName);  
                $oldFilename = $post->imgage;
            //update the database
                $post->photo = $fileName;
            //delete the old photo
                Storage::delete($oldFilename);
            
        }
        $post->depart = $request->input('depart');
        $post->duree = $request->input('duree');
        $post->pourFamille = $request->input('pourFamille')||false; 
        $post->body = $request->input('body');
        $post->author = $request->input('author');
        $post->save();

        return redirect('/promenades')->with('success','Post Created');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/promenades')->with('success','Post Removed');
    }
}
