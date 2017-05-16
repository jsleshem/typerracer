<!DOCTYPE html>
<html>
	<head>
		<title>Typeracer Homepage</title>
		<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
		<style>
			h1 {
				font-size: 500%;
				text-align: center;
				-webkit-transition: fadein 2s;
	            animation: fadein 2s;
	            font-family: 'Lato';
			}
			/*below was found at http://stackoverflow.com/questions/11679567/using-css-for-fade-in-effect-on-page-load */
			@-webkit-keyframes fadein {
	 		    from { opacity: 0; }
			    to   { opacity: 1; }
			}
			/*end citation*/
			#signin {
				margin: auto;
				font-family: 'Lato';
				text-align: center;
				-webkit-transition: fadein 2s;
			}
			.content_wrap {
				margin: auto;
				margin-top: 20px;
	    		width: 50%;
	    		padding: 10px;
			}
			#signup_wrap {
				/*border: solid #D3D3D3 1px;*/
				border-radius: 5px;
			}
			#description {
				text-align: center;
				position: relative;
				-webkit-transition: fadein 3s;
	            animation: fadein 3s;
	            font-family: 'Lato';
			}
			#title {
				line-height: 0px;
			}
			#input_username {
				-webkit-transition: fadein 6s;
	            animation: fadein 6s;
			}
			#input_password {
				-webkit-transition: fadein 6s;
	            animation: fadein 6s;
			}
			#input_bio {
				-webkit-transition: fadein 6s;
	            animation: fadein 6s;
			}
			.buttons {
				background-color: white;
				font-family: 'Lato';
				border-radius: 6px;
				-webkit-transition-duration: 0.4s; /* Safari */
    			transition-duration: 0.4s;
    			border: none;
			}
			.buttons:hover {
				background-color: #D3D3D3;

			}
		</style>
	</head>
	<body>
		<div class="content_wrap">
			<h1 id="title">Typeracer</h1>
			<p id="description" style="color: #D3D3D3;">The next generation of competitive speed-typing.</p><br>
			<div id="signin">
				<!-- This is where a user can log in-->
				<form action="login" method="post">
					{{ csrf_field() }}
					<p id="input_username" style="color:grey;">Username</p> <input type="text" name="username"><br><br>
					<p id="input_password" style="color:grey;">Password</p> <input type="password" name="password"><br><br>
					<input type="submit" class="buttons" value="Log in">
				</form><br>
				<div class="content_wrap" id="signup_wrap">
					<!--This is where a user can sign up -->
					<form action='signup' method="get">
						<p style="color:grey;">Are you a new user?</p>
						<input type="submit" class="buttons" value="Sign up">
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
