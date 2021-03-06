<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostCreateRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $posts =Post::all();

       return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('name','id')->all();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $input = $request->all();

        $user = Auth::user();

        if ($file = $request->file('photo_id')) {
            $name = time().$file->getClientOriginalName().'Admin';

            $file->move('images',$name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id']=$photo->id;
        }

        $user->posts()->create($input);


        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post =Post::findOrFail($id);

        $categories = Category::lists('name','id')->all();
        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $input = $request->all();
        $user = Auth::user();

        if ($file = $request->file('photo_id')) {
            $name = time().$file->getClientOriginalName().'Admin';

            $file->move('images',$name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id']=$photo->id;
        }

        $user->posts()->whereId($id)->first()->update($input);


        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        unlink(public_path().$post->photo->file);


        $post->delete();

        return  redirect('/admin/posts');
    }



    public function post($id){

        $post = Post::findOrFail($id);


        $categories = Category::all();

        $comments =$post->comments()->whereIsActive(1)->get();

        return view('post',compact('post','categories','comments'));



    }
}
