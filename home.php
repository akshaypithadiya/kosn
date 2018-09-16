<?php include 'includes/session.php'; ?>
<?php include 'includes/addpost.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/sidenav.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
	<style>
	.svg-icon {
		width: 1.3em;
	  	height: 1.3em;
	    cursor: pointer;
	}

	.svg-icon path,
	.svg-icon polygon,
	.svg-icon rect {
		fill: #424242;
	}

	.svg-icon circle {
		stroke: #4691f6;
		stroke-width: 1;
	}

	.footer{
		border-top: 1px solid #d7d8db;
		padding: 10px 10px 5px 10px; 
	}

	</style>
</head>
<body>

	<?php include 'includes/header.php'; ?>
	
	<div id="main_container">

		<?php include 'includes/sidenav.php'; ?>

		<div id="right-nav"></div>
		
		<div id="add-post-container">
			<form action="" method="POST">
				<textarea name="post_txt" class="add-post-tarea" placeholder="Write a post"></textarea><br>
				<input type="submit" name="add_post" class="add-post-btn" value="Post"><?php echo @$error; ?>
			</form>
		</div>



		<?php


			$fetch_posts = "SELECT full_name, post_id, post_txt, post_date_time FROM posts ORDER BY post_id DESC";
			$result = mysqli_query($conn, $fetch_posts);


			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {

			    	echo '<div id="post-container">'; // main post container start

			    	echo '<div class="post-container-header">'; // header start

				    	//getting full-name
				    	echo '<div class="full-name-con">';
				        echo $row["full_name"];
				        echo '</div>';

				    	//getting date-time
				    	echo '<div class="date-time-con">';
				        echo $row["post_date_time"];
				        echo '</div>';

			    	echo '</div>'; // container header close

			    	//getting post
			        echo '<div class="post-txt-con">';
			        	echo $row["post_txt"];
			        echo '</div>';


			        echo '<div class="footer">';
			        	echo '<svg class="svg-icon" viewBox="0 0 20 20">
							<path d="M9.719,17.073l-6.562-6.51c-0.27-0.268-0.504-0.567-0.696-0.888C1.385,7.89,1.67,5.613,3.155,4.14c0.864-0.856,2.012-1.329,3.233-1.329c1.924,0,3.115,1.12,3.612,1.752c0.499-0.634,1.689-1.752,3.612-1.752c1.221,0,2.369,0.472,3.233,1.329c1.484,1.473,1.771,3.75,0.693,5.537c-0.19,0.32-0.425,0.618-0.695,0.887l-6.562,6.51C10.125,17.229,9.875,17.229,9.719,17.073 M6.388,3.61C5.379,3.61,4.431,4,3.717,4.707C2.495,5.92,2.259,7.794,3.145,9.265c0.158,0.265,0.351,0.51,0.574,0.731L10,16.228l6.281-6.232c0.224-0.221,0.416-0.466,0.573-0.729c0.887-1.472,0.651-3.346-0.571-4.56C15.57,4,14.621,3.61,13.612,3.61c-1.43,0-2.639,0.786-3.268,1.863c-0.154,0.264-0.536,0.264-0.69,0C9.029,4.397,7.82,3.61,6.388,3.61"></path>
						</svg>';
			        echo '</div>';			        
			       

			    	echo '</div>'; //main post container close

			    }
			} else {
			    echo "0 results";
			}

			mysqli_close($conn);

		?>


	</div>

</body>
</html>
