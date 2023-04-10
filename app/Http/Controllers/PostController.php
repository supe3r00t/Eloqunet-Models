<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //اضافه طريقتي لعرض المقالة
        $posts = post::all();
        return view('posts.index', compact('posts'));
        // return view('posts'.'index',compact('posts'));
        //$posts =post::get();
        //  return $posts;
        // return "posts";
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // new post اول طريقة انسيلت
        //$post =  new Post();
        ///$post->title = $request->title;
        //$post->body= $request->body;
        //$post->save();
        //return  response('تم اضافة البيانات');

        post::create([


            // $requset->all()   اي شي يجي اضف للكل

            //------------------------------------------

            //    'اسم الحقل في الداتا بيز '=>'اسم التكست في الفورم'
            'title' => $request->title,
            'body' => $request->body

        ]);

        return response('تم اضافة البيانات');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\post $post
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $posts = Post::onlyTrashed()->get();
        return view('posts.softdelete', compact('posts'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\post $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        // $post = Post::findorfail($id);
        $post = Post::where('id', $id)->first();
        return view('posts.edit', compact('post'));
        //return $post;
        //  if ($post){

        //  }

        // else{

        // return response('خططا لايوجد مقالة');

        // return view('posts,edit',compact('post'));

    }
    //return $post;

    //   return $id;
    //


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findorFail($id);
        //  $post->title = $request->title;
        // $post->body = $request->body;
        // $post->save();

        $post->update([
            //   $request->all();
            'title' => $request->title,
            'body' => $request->body

        ]);
        return redirect()->route('posts.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //  Post::findorFail($id)->delete();
        Post::destroy($id);
        return redirect()->route('posts.index');

    }


    public function restore($id){



        Post::withTrashed()->where('id', $id)->restore();
        return redirect()->back();
    }
        // $posts = Post::onlyTrashed()->where('id', $id)->get();
        // return $posts;
    public function forcedelete($id){

        Post::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->back();

}

}
