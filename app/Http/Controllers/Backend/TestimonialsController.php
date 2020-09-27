<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\HelperController;
use App\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TestimonialsController extends Controller
{
    public function index()
    {
        if(HelperController::hasShow(auth('admin')->id(),'testimonial') == false){
            return redirect()->route('home.index');
        }
        return view('admin.testimonials.index');
    }


    public function destroy($id)
    {
        $categories = Testimonial::find($id);

        $categories->delete();
        return response()->json([
            'success' => true,
            'message' => 'Testimonial Deleted'
        ]);
    }
    protected $adminId;
    public function testimonials($adminId){
        $this->adminId = $adminId;
        $testimonial = Testimonial::all();

        return DataTables::of($testimonial)
            ->addColumn('idn', function(){
                static $var= 1;
                return $var++;
            })
            ->addColumn('user', function($testimonial){
                return $testimonial->user->name;
            })
            ->addColumn('content', function($testimonial){
                return $testimonial->content;
            })
            ->addColumn('stars', function($testimonial){
                return $testimonial->stars == 0 ? 'Negative' : 'Positive';
            })
            ->addColumn('action', function($testimonial){
                $return = '';
                if(HelperController::hasDelete($this->adminId,'testimonial') == true){
                    $return.='<a onclick="deleteData('. $testimonial->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>';
                }
                return $return;
            })
            ->rawColumns(['idn','user','stars', 'action'])->make(true);
    }
}
