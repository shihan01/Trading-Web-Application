<?php
session_start();
include('includes/connect.php');
include('includes/html_code.php');
?>
<!doctype html>
<html lang = 'en'>
<head>
	<title>Main Page</title>
	<link rel = 'stylesheet' href = 'css/main.css'>
	<link rel = 'stylesheet' href = 'css/form.css'>
	<link rel = 'stylesheet' href = 'css/index.css'>

</head>

<body>
	<div id = 'wrapper'>
       <?php headerAndSearchCode();?>
		<aside id = 'left_side'> 
		<?php IndexCategoryList()?>
		</aside>
		
		<div id = 'right_side'>
		   
		   <div id ='hello'>
			<section id = 'right_side1'>
	         <img src ="images/main1.jpg" >
			</section>

			<section id = 'right_side2'>
			<?php active_user();?>
		    </section>
		    </div>

		    <section id = 'right_side3'>
			<?php active_item();?>
		    </section>

	   </div>


		<?php footerCode(); ?>

	</div>
</body>
</html>
