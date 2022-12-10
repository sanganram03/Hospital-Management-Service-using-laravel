
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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
                <form action="{{url('updatedoctor',$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                <div style="padding: 15px;">
                  <label>Doctor Name</label>
                  <input type="text" style="color:black" name="name" value="{{$data->name}}" required=""></div>

                  <div style="padding: 15px;">
                  <label>Doctor's Phone</label>
                  <input type="name" style="color:black" name="phone" value="
                  {{$data->phone}}" required=""></div>

                  <div style="padding: 15px;">
                  <label>Speciality</label>
                  <input type="name" style="color:black" name="speciality" value="
                  {{$data->speciality}}" required=""></div>

                  <div style="padding: 15px;">
                  <label>Room No.</label>
                  <input type="name" style="color:black" name="room" value="
                  {{$data->room}}" required=""></div>

                  <div style="padding: 15px;">
                  <label>Doctor's Old Photo</label>
                  <img height="200px" width="150px" src="doctorimage/{{$data->image}}" alt=""></div>

                   <div style="padding: 15px;">
                  <label>Change Photo</label>
                  <input type="file" name="file" id="file">
                  <div id="image-holder"></div>
                
            </div>
            <div style="padding: 15px;">
                  <input type="submit" class="btn btn-success">
                </div>

</div>
@include('admin.script')
<style>
    img {
  border-radius: 50px;
}
</style>
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


  </body>
</html>