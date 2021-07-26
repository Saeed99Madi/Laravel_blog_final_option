<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(){
        $posts = auth()->user()->posts()->paginate(5);

        return view('admin.post.index',['posts'=>$posts]);
    }
    public function show(Post $post)
    {

        return view('blog-post' ,['post'=>$post,

            ]);
    }
    public function create(){
        $this->authorize('create',Post::class);
        return view('admin.post.create');
    }
    public function store(Request $request){
        $this->authorize('create',Post::class);
    $inputs=   request()->validate([
           'title'=>'required|min:8|max:255',
           'body'=>'required',
           'post_image'=>'mimes:jpeg,png',
       ]);
    if (request('post_image')){
        $inputs['post_image']= request('post_image')->store('images');
    }
    auth()->user()->posts()->create($inputs);
    $request->session()->flash('message' , 'post is Created');
    return redirect()->route('post.index');

    }
    public function destroy(Post $post , Request $request){
        $this->authorize('delete' , $post);
        try {
            $post->delete();
        } catch (\Exception $e) {
            $request->session()->flash('message' , 'there a problem ');
            return back();
        }
//        Session::flash('message' , 'post was deleted');
        $request->session()->flash('warning' , 'post was deleted');
        return back();
    }
    public function edit(Post $post){
        $this->authorize('view', $post);
        return view('admin.post.edit', ['post'=>$post]);
    }
    public function update(post $post){
        $inputs=   request()->validate([
            'title'=>'required|min:8|max:255',
            'body'=>'required',
            'post_image'=>'mimes:jpeg,png'
        ]);

        if (request('post_image')){
            $inputs['post_image']= request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }
        $post->title= $inputs['title'];
        $post->body= $inputs['body'];
        $this->authorize('update' , $post);
        auth()->user()->posts()->save($post);
        session()->flash('update','post with title is updated Done'.$inputs['title']);
        return redirect()->route('post.index');

    }

}
