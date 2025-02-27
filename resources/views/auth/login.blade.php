<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('img/logo-tcf.png')}}">

    <title>Portal Quality - Log In</title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('eduadmin/main/css/vendors_css.css')}}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{asset('eduadmin/main/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('eduadmin/main/css/skin_color.css')}}">	

</head>
	
<body class="hold-transition theme-primary bg-img" style="background-image: url'{{asset('eduadmin/images/auth-bg/bg-1.jpg')}}'">
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">	
			
			<div class="col-12">
				<div class="row justify-content-center g-0">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="bg-white rounded10 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
                                <img src="{{asset('img/tcf-logo2.jpeg')}}" alt="logo-tcf">
								<h2 class="text-primary">Portal Checksheet</h2>
                                <h4>TRI CENTRUM FORTUNA</h4>
							</div>
							<div class="p-40">
								<form action="{{ route('login')}}" method="POST">
                                    @csrf
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											{{-- <input type="text" class="form-control ps-15 bg-transparent" placeholder="Username"> --}}
											<input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
											@error('email')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
											{{-- <input type="password" class="form-control ps-15 bg-transparent" placeholder="Password"> --}}
											<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
											@error('password')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror


										</div>
									</div>
									  <div class="row">
										<div class="col-6">
										  <div class="checkbox">
											<input type="checkbox" id="basic_checkbox_1" >
											<label for="basic_checkbox_1">Remember Me</label>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-6">
										 <div class="fog-pwd text-end">
											<a href="javascript:void(0)" class="hover-warning"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-12 text-center">
										  <button type="submit" class="btn btn-primary mt-10">{{ __('Login') }}</button>
										</div>
										<!-- /.col -->
									  </div>
								</form>	
							</div>						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="{{asset('eduadmin/main/js/vendors.min.js')}}"></script>
	<script src="{{asset('eduadmin/main/js/pages/chat-popup.js')}}"></script>
    <script src="{{asset('eduadmin/assets/icons/feather-icons/feather.min.js')}}"></script>	

</body>
</html>