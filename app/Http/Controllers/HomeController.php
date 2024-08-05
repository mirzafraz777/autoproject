<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index() // Show 5 Packages on Home Page.
    {
        $packages = Package::with('category')->limit(3)->get();
        $featured_package = Package::where('type',1)->with('category')->first();
        return view('home', compact('packages','featured_package'));
    }

    public function packageShowAll()  // Show All Packages on Packages Page.
    {
        $categories = category::select('category_name')->orderBy('id')->get();
        $packages = Package::with('category')->get();
        return view('packages', compact('packages','categories'));
    }

    public function packageShowSingle($id)
    {
        $package = Package::where('id',$id)->with('category')->first();

        if($package){
            $category_id = $package->category->id;
            $related_package = Package::where('cat_id',$category_id)->with('category')->limit(3)->get();
    
            return view('buy-package',compact('package','related_package'));
        }else{

            return redirect()->route('home')->with('message','Bad Request.');
        }
    }


    public function buyPackage($id)
    {
        $package = Package::where('id',$id)->first();
        $user = Auth::user();
        $userInfo = User::find($user->id)->users_info;
        if($package && $userInfo->current_balance >= $package->price){
            Order::create([
                'u_id'=>$user->id,
                'trx'=>Str::random(),
                'package_name'=>$package->name,
                'package_amount'=>$package->price,
                'payment_method'=>'Current Balance'
                
            ]);

        // $userInfo = User::find($user->id)->users_info;
        $userInfo->current_balance -= $package->price;
        $userInfo->status = 1;
        $userInfo->save(); 
        return redirect()->route('user.index')->with('message','Package Purchased Successfully.');

        }else{

            return redirect()->route('home')->with('message','Bad Request.');
        }
    }


    public function contactFormShow()
    {
        return view('contact');
    }

    public function contactForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string|max:20',
            'message' => 'required|string',
 
        ]);


            $contact = new Contact;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->save();
            return redirect()->back()->with('message', 'Message sent successfully');
    }

}
