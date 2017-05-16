<!DOCTYPE html>
<html>
	<head>
		<title>Score Page</title>
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
	            color: black;
			}
			#description2 {
				text-align: center;
				position: relative;
				-webkit-transition: fadein 3s;
	            animation: fadein 3s;
	            font-family: 'Lato';
	            color: black;
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
			#leaderboard_container {
				text-align: center;
				position: relative;
				-webkit-transition: fadein 3s;
	            animation: fadein 3s;
	            font-family: 'Lato';
	            color: black;
	            margin: auto;
	            width: 50%;
			}
			.leaderboard {
				font-family: 'Lato';
			}
		</style>
	</head>
	<body>
		<div class="content_wrap">
			<!-- This is where we score and display everything-->
			<h1 id="title">Your score:</h1><br><br>
			<p id="description" style="color: #D3D3D3;"><strong>WPM: {{session()->get('WPM')}}</strong></p><br>
			<p id="description2" style="color: #D3D3D3;"><strong>Accuracy: {{session()->get('accuracy')}}%</strong></p>
		</div>
		<div id="leaderboard_container">
			<h3 class="leaderboard">Leaderboard for "{{session()->get('name')}}"
				<ol class="leaderboard">
					<li>{{session()->get('leaderboard0')->username}}- WPM: {{session()->get('leaderboard0')->wpm}}| Acc: {{session()->get('leaderboard0')->accuracy}}</li>
					<li>{{session()->get('leaderboard1')->username}}- WPM: {{session()->get('leaderboard1')->wpm}}| Acc: {{session()->get('leaderboard1')->accuracy}}</li>
					<li>{{session()->get('leaderboard2')->username}}- WPM: {{session()->get('leaderboard2')->wpm}}| Acc: {{session()->get('leaderboard2')->accuracy}}</li>
					<li>{{session()->get('leaderboard3')->username}}- WPM: {{session()->get('leaderboard3')->wpm}}| Acc: {{session()->get('leaderboard3')->accuracy}}</li>
					<li>{{session()->get('leaderboard4')->username}}- WPM: {{session()->get('leaderboard4')->wpm}}| Acc: {{session()->get('leaderboard4')->accuracy}}</li>
					<li>{{session()->get('leaderboard5')->username}}- WPM: {{session()->get('leaderboard5')->wpm}}| Acc: {{session()->get('leaderboard5')->accuracy}}</li>
					<li>{{session()->get('leaderboard6')->username}}- WPM: {{session()->get('leaderboard6')->wpm}}| Acc: {{session()->get('leaderboard6')->accuracy}}</li>
					<li>{{session()->get('leaderboard7')->username}}- WPM: {{session()->get('leaderboard7')->wpm}}| Acc: {{session()->get('leaderboard7')->accuracy}}</li>
					<li>{{session()->get('leaderboard8')->username}}- WPM: {{session()->get('leaderboard8')->wpm}}| Acc: {{session()->get('leaderboard8')->accuracy}}</li>
					<li>{{session()->get('leaderboard9')->username}}- WPM: {{session()->get('leaderboard9')->wpm}}| Acc: {{session()->get('leaderboard9')->accuracy}}</li>
				</ol>
			</h3>
		</div>
		<!-- THis lets you end, and go back to your page-->
		<form action="end_run" method="get"><br>
			{{ csrf_field() }}
			<input type="submit" class="buttons" value="Go back to user page!" style="left: 37%">
		</form>
	</body>
</html>
