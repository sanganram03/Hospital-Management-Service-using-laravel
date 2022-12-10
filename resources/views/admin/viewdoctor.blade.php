
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
@include('admin.css')
  </head>
  <center><body>
   
    <div class ="container-scroller">
         @include('admin.sidebar')
     @include('admin.navbar')
        
<div align="center" style="padding: 100px;">
	<table>
		
		<tr style="background-color:antiquewhite;" align="center">
			<th style="padding:10px; font-size: 20px; color:black;">Doctor Name</th>
			<th style="padding:10px; font-size: 20px; color:black;">Phone</th>
			<th style="padding:10px; font-size: 20px; color:black;">Speciality</th>
			<th style="padding:10px; font-size: 20px; color:black;">Room</th>
			<th style="padding:10px; font-size: 20px; color:black;">Photo</th><th></th>
			<th colspan="3" style="padding:10px; font-size: 20px; color:black;">Action</th>
		</tr>

		@foreach($data as $appoint)
		<tr style="background-color:black;" align="center">

			<th style="padding:10px; color:white;">{{$appoint->name}}</th>
			<th style="padding:10px; color:white;">{{$appoint->phone}}</th>
			<th style="padding:10px; color:white;">{{$appoint->speciality}}</th>
			<th style="padding:10px; color:white;">{{$appoint->room}}</th>
			<th><img height="200px" width="150px" src="doctorimage/{{$appoint->image}}" alt=""></th><th></th>
			<th><a class="bt btn-primary" style="color: black;" href="{{url('editdoctor',$appoint->id)}}">Edit</th><th></th>
				<th><a class="bt btn-danger" onclick="return confirm('are you sure to Delete record from Docotors List?')" href="{{url('deletedoctor',$appoint->id)}}">Delete</th>
		</tr><tr><th colspan="7" align="center"></th></tr>
		<tr><th colspan="7" align="center"></th></tr>
		@endforeach

	</table>

</div>
<style>
	img {
  border-radius: 50px;
}
</style>
@include('admin.script')
  </body>
</html>