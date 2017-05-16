<!DOCTYPE html>
<html>
	<head>
		<title>Error</title>
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
      a:link {
          color: grey;
          text-decoration: none;
      }

      a:visited {
          color: grey;
          text-decoration: none;
      }

      a:hover {
          color: grey;
          text-decoration: none;
      }

      a:active {
          color: grey;
          text-decoration: none;
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
			<!-- Catcheh cheaters, and sends them home -->
			<h1 id="title">Stop Cheating!</h1>
			<p style="color: grey; text-align:center;">We could always ban you...</p>
			<p id="description" style="color: grey;"><a href="home">Please click here to be redirected home</a></p><br>
      <p></p><br>
				<div class="content_wrap" id="signup_wrap">
				</div>
		</div>
	</body>
</html>
