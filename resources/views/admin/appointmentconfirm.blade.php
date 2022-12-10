
<!DOCTYPE html>
<html lang="en">
  <head>
     <base href="/public">
    <style type="text/css">
       label
      {
        display:  inline-block;
        width: 200px;

      }
    </style>
    <!-- Required meta tags -->
@include('admin.css')
  </head>
  <body>
   
    
         @include('admin.sidebar')
     @include('admin.navbar')

           <div class="container-fluid page-body">
              @if(session()->has('message'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">x</button>
              {{session()->get('message')}}
            </div>
            @endif
          
            <div class="container" align="center" style="padding-top: 100px;">
                @if(session()->has('message'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">x</button>
              {{session()->get('message')}}
            </div>
            @endif
              <form action="{{url('sendemail',$data->id)}}" method="POST">

                @csrf

            <div style="padding: 15px;">
                  <label>Reasonsns Text</label>
                   <input type="text" style="color:black" name="action" placeholder="Reason for status" required="">

            </div>
            <div style="padding: 15px;">
                  <input type="submit" class="btn btn-success">
                </div>



          </div>
          
@include('admin.script')
  </body>
</html>