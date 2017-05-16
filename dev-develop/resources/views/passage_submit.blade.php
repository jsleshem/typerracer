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
			.content_wrap {
				margin: auto;
				margin-top: 20px;
	    		width: 50%;
	    		padding: 10px;
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
			.passage_wrap {
				margin: auto;
				margin-top: 20px;
	    		width: 50%;
	    		padding: 10px;
			}
		</style>
	</head>
	<body>
		<div class="content_wrap">
			<!-- This is where a user submits a passage -->
			<h1 id="title">Submit a Passage</h1>
			<p id="description" style="color: #D3D3D3;">The passage you enter will be added to our passage database.</p><br>
		</div>
		<div>
			<div class="passage_wrap">
				<!--This is where the text goes -->
				<form action="submitter" method="post">
					{{ csrf_field() }}
					<p style="color:grey; font-family: 'Lato'">Passage Title</p><input type="text" name="passageName"/>
					<p style="color:grey; font-family: 'Lato'">Content</p><input type="text" name="passage" />
					<input type="submit" class="buttons" value="Submit Passage">
				</form>
			</div>
		</div>
	</body>
</html>
