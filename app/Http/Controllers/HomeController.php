<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Doctor;
use App\Models\appointment;
use App\Models\news;
class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                $doctor = doctor::all();
                return view('user.home',compact('doctor'));
            }
            else
            {
                return view('admin.home');   
            }
        }
        else {
            return redirect()->back();
        }
    }
    public function index()
            {
            $doctor = doctor::all();
            $news = news::all();
            
            //$news = news::all();
            return view('user.home', compact('doctor','news')); 
            }
        
    
    public function appointment(Request $request)
    {
        $data= new appointment;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->doctor=$request->doctor;
        $data->date=$request->date;
        $data->message=$request->message;
        $data->status='In Progress';
        if(Auth::id())
        {
            $data->user_id=Auth::user()->id;
            
        }
        $data->save();
          return redirect()->back()->with('message', 'Appointment Request Successful. We will contact with you soon.');
    }
    public function myappointment()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {

            $userid=Auth::user()->id;
            $appoint=appointment::where('user_id',$userid)->get();
        return view('user.myappoinment', compact('appoint'));
         }
            else
            {
                return view('admin.home');   
            }
    }
    else
    {
        return redirect()->back();
    }

    }
  public function cancelappoint($id)
    {
        $data=appointment::find($id);
        $data->delete();
        return redirect()->back();

    }

}
