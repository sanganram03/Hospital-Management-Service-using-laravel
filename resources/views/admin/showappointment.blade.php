
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
@include('admin.css')
  </head>
  <body>
   
    <div class ="container-scroller">
         @include('admin.sidebar')
     @include('admin.navbar')
        
<div align="center" style="padding: 70px;">
	<table>
		
		<tr style="background-color:antiquewhite;" align="center">
			<th style="padding:10px; font-size: 20px; color:black;">Coustomer Name</th>
			<th style="padding:10px; font-size: 20px; color:black;">Email</th>
			<th style="padding:10px; font-size: 20px; color:black;">Phone</th>
			<th style="padding:10px; font-size: 20px; color:black;">Doctor Name</th>
			<th style="padding:10px; font-size: 20px; color:black;">Date</th>
			<th style="padding:10px; font-size: 20px; color:black;">Message</th>
			<th style="padding:10px; font-size: 20px; color:black;">Status</th>
			<th colspan="3" style="padding:10px; font-size: 20px; color:black;">Accept/Reject</th>
				<th style="padding:10px; font-size: 20px; color:black;">Confirm Mail</th>
		</tr>

		@foreach($data as $appoint)
		<tr style="background-color:black;" align="center">

			<th style="padding:10px; color:white;">{{$appoint->name}}</th>
			<th style="padding:10px; color:white;">{{$appoint->email}}</th>
			<th style="padding:10px; color:white;">{{$appoint->phone}}</th>
			<th style="padding:10px; color:white;">{{$appoint->doctor}}</th>
			<th style="padding:10px; color:white;">{{$appoint->date}}</th>
			<th style="padding:10px; color:white;">{{$appoint->message}}</th>
			<th style="padding:10px; color:white;">{{$appoint->status}}</th>
			<th><a class="bt btn-success" onclick="return confirm('are you sure to Approved this?')" style="color: black;" href="{{url('approved',$appoint->id)}}">Approved</th><th></th>
				<th><a class="bt btn-danger" onclick="return confirm('are you sure to reject this?')" href="{{url('reject',$appoint->id)}}">Reject</th>
					<th><a class="bt btn-primary" onclick="return confirm('are you sure to send Email this?')" href="{{url('appointmentconfirm',$appoint->id)}}">Send Mail</th>
		</tr>
		@endforeach
	</table>

</div>

@include('admin.script')
  </body>
</html>