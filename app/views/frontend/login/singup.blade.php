<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="{{THEME_FONTEND_URL}}css/style.css">
	<title>
		Animated login signup
	</title>
</head>

<body>
	<div id="container" class="container">
		<!-- FORM SECTION -->
		<div class="row">
			<!-- SIGN UP -->
			<div class="col align-items-center flex-col sign-up">
				<div class="form-wrapper align-items-center">
					<div class="form sign-up">
					<form action="{{BASE_URL.'post_login_client'}}/singup" method="post">
						<div class="input-group">
							<i class='bx bxs-user'></i>
							<input type="text" placeholder="Username" name="name" value="@if(isset($data)&& !empty($data['name'])){{$data['name']}}@endif">
						</div>
						<div class="input-group">
							<i class='bx bx-mail-send'></i>
							<input type="email" placeholder="Email" name="email" value="@if(isset($data)&& !empty($data['email'])){{$data['email']}}@endif">
							@if(isset($err)&& !empty($err["email"])){{$err["email"]}}@endif
						</div>
						<div class="input-group">
							<i class='bx bxs-lock-alt'></i>
							<input type="password" placeholder="Password" name="password"value="@if(isset($data)&& !empty($data['password'])){{$data['password']}}@endif">
						</div>
						<div class="input-group">
							<i class='bx bxs-lock-alt'></i>
							<input type="password" placeholder="Confirm password" name="password2"value="@if(isset($data)&& !empty($data['password2'])){{$data['password2']}}@endif">
							@if(isset($err)&& !empty($err["password"])){{$err["password"]}}@endif
						</div>
						<button type="submit">
							Sign up
						</button>
						<p>
							<span>
								Already have an account?
							</span>
							<a href="{{BASE_URL.'login_client'}}">
							<b onclick="toggle()" class="pointer">
								Sign in here
							</b>
							</a>
							
						</p>
						</form>
					</div>
				</div>
				<div class="form-wrapper">
					<div class="social-list align-items-center sign-up">
						<div class="align-items-center facebook-bg">
							<i class='bx bxl-facebook'></i>
						</div>
						<div class="align-items-center google-bg">
							<i class='bx bxl-google'></i>
						</div>
						<div class="align-items-center twitter-bg">
							<i class='bx bxl-twitter'></i>
						</div>
						<div class="align-items-center insta-bg">
							<i class='bx bxl-instagram-alt'></i>
						</div>
					</div>
				</div>
			</div>
			<!-- END SIGN UP -->
			<!-- SIGN IN -->
			<div class="col align-items-center flex-col sign-in">
				<div class="form-wrapper align-items-center">
					<form action="{{BASE_URL.'post_login_client'}}/singin" method="post">
						<div class="form sign-in">
							<div class="input-group">
							<label for="" style="color: red;" >@if(isset($err)&& !empty($err["acc"])){{$err["acc"]}}@endif</label>
								<i class='bx bxs-user'></i>
								<input type="email" placeholder="Useremail" value="@if(isset($data)&& !empty($data['email'])){{$data['email']}}@endif" name="email">
								<label for="" style="color: red;" >@if(isset($err)&& !empty($err["email"])){{$err["email"]}}@endif</label>
							</div>
							<div class="input-group">
								<i class='bx bxs-lock-alt'></i>
								<input type="password" placeholder="Password"value="@if(isset($data)&& !empty($data['password'])){{$data['password']}}@endif" name="password">
								<label for="" style="color: red;" >@if(isset($err)&& !empty($err["pass"])){{$err["pass"]}}@endif</label>
							</div>
							<button>
								Sign in
							</button>

							<p>
								<b>
									Forgot password?
								</b>
							</p>
							<p>
								<span>
									Don't have an account?
								</span>
								<b onclick="toggle()" class="pointer">
									Sign up here
								</b>
							</p>
						</div>
					</form>
				</div>
				<div class="form-wrapper">
					<div class="social-list align-items-center sign-in">
						<div class="align-items-center facebook-bg">
							<i class='bx bxl-facebook'></i>
						</div>
						<div class="align-items-center google-bg">
							<i class='bx bxl-google'></i>
						</div>
						<div class="align-items-center twitter-bg">
							<i class='bx bxl-twitter'></i>
						</div>
						<div class="align-items-center insta-bg">
							<i class='bx bxl-instagram-alt'></i>
						</div>
					</div>
				</div>
			</div>
			<!-- END SIGN IN -->
		</div>
		<!-- END FORM SECTION -->
		<!-- CONTENT SECTION -->
		<div class="row content-row">
			<!-- SIGN IN CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="text sign-in">
					<h2>
						Welcome back
					</h2>
					<p>
						This is a lover rental website. we have hot, sexy models
					</p>
				</div>
				<div class="img sign-in">
					<img src="{{THEME_FONTEND_URL}}assets/undraw_different_love_a3rg.svg" alt="welcome">
				</div>
			</div>
			<!-- END SIGN IN CONTENT -->
			<!-- SIGN UP CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="img sign-up">
					<img src="{{THEME_FONTEND_URL}}assets/undraw_creative_team_r90h.svg" alt="welcome">
				</div>
				<div class="text sign-up">
					<h2>
						Register now
					</h2>
					<p>
						This is a lover rental website. we have hot, sexy models. Sign up now to receive more incentives
					</p>
				</div>
			</div>
			<!-- END SIGN UP CONTENT -->
		</div>
		<!-- END CONTENT SECTION -->
	</div>

	<script >
	let container = document.getElementById('container')
	container.classList.add('sign-up')
	</script>
</body>

</html>