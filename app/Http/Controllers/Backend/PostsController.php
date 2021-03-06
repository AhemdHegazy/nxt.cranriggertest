<?php

namespace App\Http\Controllers\Backend;

use App\Capacity;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Post;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class PostsController extends Controller
{

    public function index()
    {
        if(HelperController::hasShow(auth('admin')->id(),'post') == false){
            return redirect()->route('home.index');
        }
        return view('admin.posts.index',[
            'subjects'  => Subject::all()
        ]);
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
            'subject_id' => $request->subject_id,
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
            'subject_id' => $request->subject_id,
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

    protected $adminId;

    public function posts($adminIds){

        $this->adminId = $adminIds;
        $post = Post::all();

        return DataTables::of($post)
            ->addColumn('idn', function(){
                static $var= 1;
                return $var++;
            })
            ->addColumn('title', function($post){
                return $post->title;
            })
            ->addColumn('description',  function($post){
                return $post->description;
            })
            ->addColumn('subject',  function($post){
                return $post->subject->name;
            })
            ->addColumn('featured', function($post){
                if ($post->featured == NULL){
                    return 'No Image';
                }
                return '<img class="rounded-square" width="50" height="50" src="'. url($post->featured) .'" alt="">';;
            })
            ->addColumn('action', function($post){
                $return = '';
                if(HelperController::hasEdit($this->adminId,'post') == true){
                    $return.='<a onclick="editForm('. $post->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a> ' ;
                }
                if(HelperController::hasDelete($this->adminId,'post') == true){
                    $return.='<a onclick="deleteData('. $post->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>';
                }
                return $return;
            })
            ->rawColumns(['title','description','subject','featured','action'])->make(true);
    }
}
