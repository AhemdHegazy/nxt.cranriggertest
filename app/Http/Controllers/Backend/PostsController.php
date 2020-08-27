<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class PostsController extends Controller
{

    public function index()
    {
        return view('admin.posts.index');
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $input['featured'] = null;

        if ($request->hasFile('featured')){
            $input['featured'] = '/upload/posts/'.time().Str::slug($request->title, '-').'.'.$request->featured->getClientOriginalExtension();
            $request->featured->move('/home/u875885261/domains/craneriggertest.com/public_html/upload/posts/', $input['featured']);
        }

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => Str::slug($request->title),
            'content' => $request->contents,
            'featured'       => $input['featured']
        ]);


        return response()->json([
            'success' => true,
            'message' => 'Post Created'
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return Post::findOrFail($id);
    }


    public function update(Request $request, $id)
    {

        $Post = Post::findOrFail($id);

        $input['featured'] = $Post->featured;

        if ($request->hasFile('featured')){
            if (!$Post->featured === NULL){
                unlink('/home/u875885261/domains/craneriggertest.com/public_html/upload/posts/'.$Post->featured);
            }
            $input['featured'] = '/upload/posts/'.time().Str::slug($request->title, '-').'.'.$request->featured->getClientOriginalExtension();
            $request->featured->move('/home/u875885261/domains/craneriggertest.com/public_html/upload/posts/', $input['featured']);
        }
        $Post->update([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => Str::slug($request->title),
            'content' => $request->contents,
            'featured'       => $input['featured']
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post Updated'
        ]);
    }

    public function destroy($id)
    {
        Post::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Post Deleted'
        ]);
    }

    public function posts()
    {
        $post = Post::all();

        return DataTables::of($post)
            ->addColumn('idn', function(){
                static $var= 1;
                return $var++;
            })
            ->addColumn('title',static function($post){
                return $post->title;
            })
            ->addColumn('description', static function($post){
                return $post->description;
            })
            ->addColumn('featured',static function($post){
                if ($post->featured == NULL){
                    return 'No Image';
                }
                return '<img class="rounded-square" width="50" height="50" src="'. url($post->featured) .'" alt="">';;
            })
            ->addColumn('action',static function($post){
                return '<a onclick="editForm('. $post->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a> ' .
                    '<a onclick="deleteData('. $post->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>';
            })
            ->rawColumns(['title','description','featured','action'])->make(true);
    }
}
