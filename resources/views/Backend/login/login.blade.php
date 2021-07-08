<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<base href="{{ asset('').'Backend/' }}">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<link href="css/styles.css" rel="stylesheet">
</head>

<body>

	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>

				@if(session('thongbao'))
				<div class="alert alert-danger"><strong>{{ session('thongbao') }}</strong></div>
				@endif
				
				<div class="panel-body">
					<form role="form" method="post">
						@csrf
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" autofocus="" value="{{ old('email') }}">
								{!! ShowErrors($errors,'email') !!}
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
								{!! ShowErrors($errors,'password') !!}
							</div>
						
							<button type="submit" class='btn btn-primary'>Login</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->
</body>

</html>