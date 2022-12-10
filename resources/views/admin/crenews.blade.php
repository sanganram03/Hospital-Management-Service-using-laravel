
<!DOCTYPE html>
<html lang="en">
  <head>

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
   
    <div class="container-fluid page-body">
         @include('admin.sidebar')
     @include('admin.navbar')

          
          
            <div class="container" align="center" style="padding-top: 100px;">
                @if(session()->has('message'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">x</button>
              {{session()->get('message')}}
            </div>
            @endif
              <form action="{{url('upload_news')}}" method="POST" enctype="multipart/form-data">

                @csrf

                <div style="padding: 15px;">
                     <label>Doctor</label>
                <select style="color:black;" name="doctor" id="doctor" class="custom-select" required="" >
              <option>Select Doctor</option>
              @foreach($doctor as $doctors)

              <option value="{{$doctors->name}}">{{$doctors->name}}---{{$doctors->image}}</option>
              @endforeach
            </select>
                 
                
            </div>
            <div style="padding: 15px;">
                  <label>Heading</label>
                  <input type="text" style="color:black" name="heading" placeholder="heading" required="">
                
            </div>
            <div style="padding: 15px;">
                  <label>Content</label>
                  <input type="text" style="color:black" name="content" placeholder="content" required="">
            
            <div style="padding: 15px;">
                  <label>Image</label>
                  <input type="file" name="file" required="">
                  <div id="image-holder"></div>

                
            </div>

            
            <div style="padding: 15px;">
                  <input type="submit" class="btn btn-success">
                </div>



          </div></form></div>
         <script>
    $("#file").on('change', function () {

    var imgPath = $(this)[0].value;
    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

    if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
        if (typeof (FileReader) != "undefined") {

            var image_holder = $("#image-holder");
            image_holder.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                        "class": "thumb-image"
                }).appendTo(image_holder);

            }
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
    } else {
        alert("Pls select only images");
    }
});

</script>
@include('admin.script')
  </body>
</html>