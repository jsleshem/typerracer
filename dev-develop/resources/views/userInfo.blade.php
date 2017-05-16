<!DOCTYPE html>
<html>
	<head>
		<title>User Page</title>
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
			.buttons {
				background-color: white;
				font-family: 'Lato';
				border-radius: 6px;
				-webkit-transition-duration: 0.4s; /* Safari */
    			transition-duration: 0.4s;
    			border: none;
		        text-align:center;
		        position:relative;
		        top:37%;
		        left:37%;

			}
			#playButton	{
				padding: 10px;
				font-size: 200%;
				width:60px;
				height:30px;
			}
			#viewOther {
				margin: auto;
				font-family: 'Lato';
				text-align: center;
				-webkit-transition: fadein 2s;
			}
			.buttons:hover {
				background-color: #D3D3D3;
			}
			.info {
				font-family: 'Lato';
			}
			#picture {
        		height:100%;
			  	max-height:150px;
			  	text-align: center;
			}
			#info_wrapper {
				border: solid 1px grey;
				border-radius: 6px;
				margin:auto;
			}
			#find_button {
				text-align: center;
				width: 50%;
				margin: auto;
			}
		</style>
	</head>
	<body>
		<div class="content_wrap">
			<h1 id="title">{{session()->get('user')}}</h1>
				<div style="text-align:center">
					<img id="picture" src="{{session()->get('propic')}}" alt="No Profile Picture"/>
				</div><br>
	        	<div id="info_wrapper">
							<!--Here we get all of the session variables to display updated -->
		        	<h2 class="info">Bio:</h2>
		       		<p class="info">{{session()->get('bio')}}</p>
							<h2 class="info">Commends: {{session()->get('commend')}}</h2>
		        	<h2 class="info">Highest WPM: {{session()->get('user_wpm')}}</h2>
		        	<h2 class="info">Highest Accuracy: {{session()->get('user_acc')}}</h2><br>
				</div><br>
				<!-- Here we have the many forms for what can be done on this page as a user -->
			<form action="play" method="get">
				{{ csrf_field() }}
				<input type="submit" id="play_button" class="buttons" value="Play now!">
			</form><br>
        	<form action="passage_submit" method="get">
          		<input type="submit" class="buttons" value="Submit a new passage by clicking here!">
        	</form><br>
					<div id="thisDiv">
						<!--This specific form will start a new session, and view their page -->
						<form action="viewOther" method="post"><br>
	          		{{ csrf_field() }}
					<p class="info" style="color:grey;">
							View this user's profile: <input type="text" name="otherUser" id="find_button"><br>
							<input type="submit" class="buttons" style="float:left;" value="Click here to view the profile!">
	          </form><br>
				</div>
				<!-- This clears the database of innapropriate titles -->
					<form action="purge" method="post"><br>
          		{{ csrf_field() }}
              	<input type="submit" class="buttons" value="Click here to clean the database!">
          </form><br>
					<!-- This logs you out-->
          <form action="logout" method="post"><br>
          		{{ csrf_field() }}
              	<input type="submit" class="buttons" value="Click here to sign out.">
          </form><br>
		</div>
	</body>
</html>
