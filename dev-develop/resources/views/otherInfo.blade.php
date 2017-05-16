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
			}
		</style>
	</head>
	<body>
	<div class="content_wrap">
		<!--This entire page usses session2 to load the relevant information
	  It helps maje sure we do not use the curently logged in user's info to display -->
		<h1 id="title">{{session()->get('user2')}}</h1><br>
		<form action="commendUser" method="post">
			  {{ csrf_field() }}
				<input type="submit" class="buttons" value="Commend this user, then go back to your page!"><br>
		</form>
			<div style="text-align:center">
				<img id="picture" src="{{session()->get('propic2')}}" alt="No Profile Picture"/>
			</div><br>
					<div id="info_wrapper">
						<!-- This is where we specifically get all of the info from the session variables -->
						<h2 class="info">Bio:</h2>
						<p class="info">{{session()->get('bio2')}}</p>
						<h2 class="info">Commends: {{session()->get('commend2')}}</h2>
						<h2 class="info">Highest WPM: {{session()->get('user_wpm2')}}</h2>
						<h2 class="info">Highest Accuracy: {{session()->get('user_acc2')}}</h2><br>
			</div><br>
			<form action="return" method="post"><br>
				<!-- This reroutes back to the original users page -->
					{{ csrf_field() }}
						<input type="submit" class="buttons" value="Click here to go back">
			</form><br>
	</div>
</body>
</html>
