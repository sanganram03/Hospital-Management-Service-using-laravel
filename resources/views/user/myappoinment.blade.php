@include('user.css')
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>
@include('user.header')

<div align="center" style="padding: 70px;">
	<table>
		
		<tr style="background-color:black;">
			<th style="padding:10px; font-size: 20px; color:white;">Doctor name</th>
			<th style="padding:10px; font-size: 20px; color:white;">Date</th>
			<th style="padding:10px; font-size: 20px; color:white;">Message</th>
			<th style="padding:10px; font-size: 20px; color:white;">Status</th>
			<th style="padding:10px; font-size: 20px; color:white;">Cancel Appointment</th>
		</tr>
		@foreach($appoint as $appoints)
		<tr style="background-color:black;" align="center">

			<th style="padding:10px; color:white;">{{$appoints->doctor}}</th>
			<th style="padding:10px; color:white;">{{$appoints->date}}</th>
			<th style="padding:10px; color:white;">{{$appoints->message}}</th>
			<th style="padding:10px; color:white;">{{$appoints->status}}</th>
			<th><a class="bt btn-danger" onclick="return confirm('are you sure to Delete this?')" href="{{url('cancelappoint',$appoints->id)}}">Cancel</th>
		</tr>
		@endforeach
	</table>

</div>
