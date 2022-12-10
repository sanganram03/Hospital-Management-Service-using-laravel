<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;

use Illuminate\Support\Facades\Auth;

use App\Models\appointment;

use App\Models\news;

use Notification;

use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    public function addview(){

        if (Auth::id())
        {
            if (Auth::user()->usertype==1)
            {
                return view('admin.add_doctor');        
            }
            else 
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }
        
    }
    public function upload(Request $request)
    {
        $doctor=new doctor;
        $image=$request->file('file');


        $imagename=time().'.'.$image->getClientoriginalExtension();
                $destinationPath = public_path('/doctorimage');

        $image->move($destinationPath,$imagename);
        $doctor->image=$imagename;
        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->room=$request->room;
        $doctor->speciality=$request->speciality;
        $doctor->save();

        return redirect()->back()->with('message', 'Doctor Added Successfully');

    }
    public function showappointment()
    {
         if (Auth::id())
        {
            if (Auth::user()->usertype==1)
            {
        $data=appointment::all();
        return view('admin.showappointment',compact('data'));
         }
            else 
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }
        
    }
    

    public function approved($id)
    {
        $data=appointment::find($id);
        $data->status='Approved';
        $data->save();
        return redirect()->back();

    }
        public function reject($id)
    {
        $data=appointment::find($id);
        $data->status='Reject';
        $data->save();
        return redirect()->back();

    }
    public function viewdoctor()
      {
         if (Auth::id())
        {
            if (Auth::user()->usertype==1)
            {
        $data=doctor::all();
        return view('admin.viewdoctor',compact('data'));
         }
            else 
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }
    }

    public function editdoctor($id)
    {
           if (Auth::id())
        {
            if (Auth::user()->usertype==1)
            {
        $data=doctor::find($id);
        return view('admin.editdoctor',compact('data'));
         }
            else 
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }
    }


 public function deletedoctor($id)
    {
        $data=doctor::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Doctor Deleted Successfully');

    }   
    public function updatedoctor(Request $request, $id)
    {
        $doctor=doctor::find($id);
        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->speciality=$request->speciality;
        $doctor->room=$request->room;
        $image=$request->file;
        if($image)
        {
        $imagename=time().'.'.$image->getClientoriginalExtension();
                $destinationPath = public_path('/doctorimage');

        $image->move($destinationPath,$imagename);
        $doctor->image=$imagename;
    }
        $doctor->save();


        return redirect()->back()->with('message', 'Update Doctor\'s details Successfully');
    } 
    public function appointmentconfirm($id)
    {
           if (Auth::id())
        {
            if (Auth::user()->usertype==1)
            {
        $data=appointment::find($id);
        return view('admin.appointmentconfirm',compact('data'));
         }
            else 
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }
    }
    public function sendemail(Request $request,$id)
    {
        $data=appointment::find($id);

        $details=[
            'greeting' => 'This is mail From Hospital',
            'body' => $data->status,
            'action' =>  $request->action,
            'actionurl' => 'localhost:8000/login',
            'endpart' => 'Get Well Soon',

        ];

        Notification::send($data,new SendEmailNotification($details));
        return redirect()->back()->with('message', 'Email Sent Successfully');
    }
   public function crenews()
   {
     $doctor = doctor::all();
     
     return view('admin.crenews',compact('doctor'));
   }
   public function uploadnews(Request $request)
   {
    $news= new news;
    $image=$request->file('file');


    $imagename=time().'.'.$image->getClientoriginalExtension();
    $destinationPath = public_path('/newsimage');
        $image->move($destinationPath,$imagename);
        $news->nimage=$imagename;

        //$doctor = doctor::find('doctor');
        

        $news->heading=$request->heading;
        $news->content=$request->content;
        $news->save();
        return redirect()->back()->with('message', 'News Feeds Add Successfully');
   }
}
