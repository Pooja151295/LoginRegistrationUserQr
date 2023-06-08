<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<style>
.profile {
  border-radius: 50%;
}
</style>
<body>
	<nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
		<a class="nav-link" href="{{ route('signout') }}">Logout</a>
	</nav>
	<div class="container mt-4">

		<div class="card">
			<div class="card-header">
				<h2>Scan For Your Information</h2>
			</div>
			<div class="card-body">
			<img height="115" width="115" src="data:image/png;base64,{{ DNS2D::getBarcodePNG(' Your Name is '.$user->firstname.' '.$user->lastname.' And Email Id is '.$user->email,'QRCODE') }}" alt="barcode" />
				<!-- {!! QrCode::size(250)->generate($user->firstname) !!} -->
			</div>
		</div><br>
		<div class="card">
			<div class="card-header">
				<h2>Your Profile</h2>
			</div>
		
			<div style="padding:17px;">
				<form name="editForm" id="editForm" method="POST" action="update">
					@csrf
					<?php if(!empty($user->img)){ ?>
						<img class="profile" src= "{{asset('img/').'/'.$user->img}}" width="100" height="100"><br><br>
					<?php }else{?>
					<img class="profile" src="{{ asset('img/avtar.jpg') }}" width="100" height="100"><br><br>
					<?php } ?>
					<input value=<?php echo $user->id; ?> id="id" class="form-control" name="id" hidden>
					<label>First Name: </label><input type="text" value= <?php echo $user->firstname; ?> id="firstname" class="form-control" name="firstname">
					<label>Last Name: </label><input type="text" value= <?php echo $user->lastname; ?> id="lastname" class="form-control" name="lastname">
					<label>Email: </label><input type="text" value= <?php echo $user->email; ?> id="email" class="form-control" name="email" readonly="readonly">
					<label>Profile Picture: </label><input type="file" name="image" class="form-control"><br>
					<button class="btn btn-success btn-submit">Update</button>
				</form>
			</div>
		</div><br>
		<div class="card">
			<div class="card-header">
				<h2>For Other User Information</h2>
			</div>
			<div class="card-body">
				<form action="{{url('users')}}">
					<button type="submit">Show All Users</button>
				</form>
			</div>
		</div>				
	</div>
</body>
<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
	});
	$('#editForm').submit(function(e) {
	e.preventDefault();
	var formData = new FormData($(this)[0]);
	$.ajax({
	type:'POST',
	url: "{{ url('update')}}",
	data: formData,
	cache:false,
	contentType: false,
	processData: false,
	success:function(data){
		location.reload();
	},
	error: function(data){
	console.log(data);
	}
	});
});
</script>
</html>