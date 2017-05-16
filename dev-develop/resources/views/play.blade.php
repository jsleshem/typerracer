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
			/*The following bit of CSS was taken from http://stackoverflow.com/questions/2310734/how-to-make-html-text-unselectable in order to make the passage and user input unselectable*/
			.unselectable {
				-webkit-touch-callout: none;
			    -webkit-user-select: none;
			    -khtml-user-select: none;
			    -moz-user-select: none;
			    -ms-user-select: none;
			    user-select: none;
			}
		</style>
	</head>
	<body>
		<div class="content_wrap">
			<!--This ois the page where the user plays
		 	the text that the user types is all white, so they cannnot always guarentee 100% accuracy-->
			<h1 id="title">Start Typing!</h1>
			<p id="description" style="color: #D3D3D3;">Type as fast as you can to maximize your WPM.</p><br>
			<p style="text-align: center; font-family: 'Lato';">{{session()->get('name')}}</p>
			<strong><p style="font-family: 'Lato'; color: black;" class="unselectable";>{{session()->get('passage')}}</p><strong><br>
			<!--This is where they end the round-->
			<form action="score" method="post"><br>
				{{ csrf_field() }}
				<input type="text" class="unselectable" name="input" style="color:white" />
				<input type="submit" class="buttons" value="Click to finish!">
			</form><br>
			<form action="logout" method="post"><br>
				{{ csrf_field() }}
				<input type="submit" class="buttons" value="Click here to rage quit.">
			</form><br>
		</div>
	</body>
</html>
