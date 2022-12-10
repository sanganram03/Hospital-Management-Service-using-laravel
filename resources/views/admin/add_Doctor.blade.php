
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
   
    
         @include('admin.sidebar')
     @include('admin.navbar')

           <div class="container-fluid page-body">
          
            <div class="container" align="center" style="padding-top: 100px;">
                @if(session()->has('message'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">x</button>
              {{session()->get('message')}}
            </div>
            @endif
              <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">

                @csrf

                <div style="padding: 15px;">
                  <label>Doctor Name</label>
                  <input type="text" style="color:black" name="name" placeholder="Doctor Name" required="">
                
            </div>
            <div style="padding: 15px;">
                  <label>Phone</label>
                  <input type="number" style="color:black" name="phone" placeholder="Phone" required="">
                
            </div>
            <div style="padding: 15px;">
                  <label>Speciality</label>
                  <select name="speciality" id="speciality" style="color: black; width:200px" required="" >
                    <option>--Select--</option>
                    <option value="Skin">Skin</option>
                    <option value="Heart">Heart</option>
                    <option value="Child">Child</option>
                    <option value="Eye">Eye</option>
                    <option value="ENT">ENT</option>
                  </select>

            </div>
            <div style="padding: 15px;">
                  <label>Room No.</label>
                  <input type="text" style="color:black" name="room" placeholder="Enter Room Number"required="">
                
            </div>
            <div style="padding: 15px;">
                  <label>Doctor Image</label>
                  <input type="file" name="file" required="">
                  <div id="image-holder"></div>
                
            </div>
            <div style="padding: 15px;">
                  <input type="submit" class="btn btn-success">
                </div>



          </div>
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