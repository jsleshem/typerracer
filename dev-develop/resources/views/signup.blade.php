<!DOCTYPE html>
<html>
	<head>
		<title>Sign up for Typeracer</title>
		<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
		<style>
			h1 {
				font-size: 300%;
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
			.content_wrap {
				margin: auto;
				margin-top: 75px;
	    		width: 50%;
	    		padding: 10px;
			}
			#signup {
				/*border: solid #D3D3D3 1px;*/
				border-radius: 5px;
				margin: auto;
				font-family: 'Lato';
				text-align: center;
				-webkit-transition: fadein 2s;
			}
			#new_username {
				-webkit-transition: fadein 6s;
	            animation: fadein 6s;
			}
			#new_password {
				-webkit-transition: fadein 6s;
	            animation: fadein 6s;
			}
			#new_bio {
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
		<!--This is the signup page-->
		<div class="content_wrap">
			<h1 id="title">Sign up for Typeracer</h1>
			<div id="signup">
				<!--This form is where the info is put-->
				<form action="new_user" method="post">
					{{ csrf_field() }}
					<p id="new_username" style="color:grey;">New username</p> <input type="text" name="username"><br><br>
					<p id="new_password" style="color:grey;">New password</p> <input type="password" name="password"><br><br>
					<p id="new_bio" style="color:grey;">Bio</p> <input type="text" name="bio"><br><br>
					<p id="new_picLink" style="color:grey;">Link to Profile Picture</p> <input type="text" name="picLink"><br><br>
					<input type="submit" class="buttons" value="Sign up">
				</form><br>
			</div>
		</div>
	</body>
</html>
