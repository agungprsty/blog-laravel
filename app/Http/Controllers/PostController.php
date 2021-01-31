<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::paginate(5);
        return view('admin.post.create', compact('posts', 'tags', 'categories'));
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
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $gambar = $request->file('gambar');
        $image_name = time().'.'.$gambar->getClientOriginalName();
        // $gambar->storeAs('images', $image_name, 'public');
        $gambar->move(public_path('images'),$image_name);


        $posts = new Post();
        $posts->judul = $request->input('judul');
        $posts->slug = str_slug( $request->input('judul'));
        $posts->category_id = $request->input('category_id');
        $posts->content = $request->input('content');
        $posts->gambar = $image_name;
        $posts->save();

        $posts->tags()->attach($request->tags);
        return redirect()->back()->with('success', 'New Post was successfully created!');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::find($id);
        return view('admin.post.edit', compact('posts', 'tags', 'categories'));
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
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ]);

        $posts = Post::find($id);

        if($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $image_name = time().'.'.$gambar->getClientOriginalName();
            // $gambar->storeAs('images', $image_name, 'public');
            $gambar->move(public_path('images'), $image_name);

            Storage::delete('/public/images/'. $posts->gambar);

            $posts->judul = $request->input('judul');
            $posts->category_id = $request->input('category_id');
            $posts->content = $request->input('content');
            $posts->slug = str_slug($request->input('judul'));
            $posts->gambar =$image_name;
        } 
        else {
            $posts->judul = $request->input('judul');
            $posts->category_id = $request->input('category_id');
            $posts->content = $request->input('content');
            $posts->slug = str_slug($request->input('judul'));
        }

        $posts->tags()->sync($request->tags);
        $posts->update();

        return redirect('/post')->with('success', 'Post was successfully update!');
        
        // $gambar = $request->file('file');
        // $image_name = time().'.'.$gambar->getClientOriginalName();
        // $gambar->move(public_path('images'), $image_name);
        
        // $posts->judul = $request->input('judul');
        // $posts->category_id = $request->input('category_id');
        // $posts->content = $request->input('content');
        // $posts->slug = str_slug($request->input('judul'));
        // $posts->gambar =$image_name;
        
        // if($request->hasFile('gambar')){
        //     $gambar = $request->gambar;
        //     $new_gambar = time().'.'.$gambar->getClientOriginalName();
        //     $gambar->move(public_path('images').$new_gambar);
            

        //     $post_data = [
        //         'judul' => $request->judul,
        //         'category_id' => $request->category_id,
        //         'content' => $request->content,
        //         'slug' => str_slug($request->judul),
        //         'gambar' => $new_gambar,
        //     ];
        // } else {
        //     $post_data = [
        //         'judul' => $request->judul,
        //         'category_id' => $request->category_id,
        //         'content' => $request->content,
        //         'slug' => str_slug($request->judul),
        //     ];
        // }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->delete();

        return redirect()->back()->with('info', 'Post was successfully delete!');
    }

    public function trash_bin(){
        $posts = Post::onlyTrashed()->paginate(5);
        return view('admin.post.trashed', compact('posts'));
    }

    public function restored($id){
        $posts = Post::withTrashed()->where('id', $id)->first();
        $posts->restore();

        return redirect()->back()->with('success', 'Post was successfully restored!');
    }

    public function kill($id){
        $posts = Post::withTrashed()->where('id', $id)->first();
        $posts->forceDelete();

        return redirect()->back()->with('info', 'Post on trash bin was successfully delete!');
    }
}
