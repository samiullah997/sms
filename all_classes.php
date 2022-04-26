<?php
include('cruds/insert.php');
if($_SESSION['firstname']==null){
    header("location:login.php");
}
$null="";
$all_stuents = mysqli_query($con,"select count(*) as totalStudents from students WHERE `class_from_withdrawn`='$null' order by id ");
$result_students=mysqli_fetch_assoc($all_stuents);

$all_withdrawn_stuents = mysqli_query($con,"select count(*) as totalwithdrawnStudents from students WHERE `class_from_withdrawn` !='$null' order by id ");
$result_withdrawn_students=mysqli_fetch_assoc($all_withdrawn_stuents);

$all_teachers = mysqli_query($con,"select count(*) as totalTeachers from teachers order by id ");
$result_teacher=mysqli_fetch_assoc($all_teachers);

$all_fee_sum = mysqli_query($con,"SELECT SUM(`submit_fee`) As `submited_income` FROM `student_fee`");
$all_sumbited_fee_sum_result = mysqli_fetch_assoc($all_fee_sum);

$all_salary_sum = mysqli_query($con,"SELECT SUM(`total_salary`) As `total_salary` FROM `teachers_salary`");
$all_salary_sum_result = mysqli_fetch_array($all_salary_sum);



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
include('include/header.php');
?>


<!-- navbar -->
<nav
		class="navbar navbar-expand-lg navbar-dark custom-bg container-fluid navbar-toggler sticky-top">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php">APS</a>
			<button class="navbar-toggler" type="button"
				data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item"><a class="nav-link active"
						aria-current="page" href="index.php">Home</a></li>

				</ul>
				<ul class="navbar-nav text-right">
					<li class="nav-item"><a class="nav-link active"
						aria-current="page" href="#!">Welcome! <span
							><?php $firstname= $_SESSION['firstname']; $lastname=$_SESSION['lastname']; echo $firstname.' '.$lastname?></span></a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- End of navbar -->


	<!-- 	Side bar -->
	<div class="sidebar">
		<div class="text-center">
			<img class="logo" src="images/logo.png" alt="logo" />
		</div>
		<div class="divider"></div>
		<div class="main" id="main">
			<a href="index.php" class="item ">Home</a>
            <a href="student_record.php" class="item item-select">Students Records</a>
            <a href="teacher_record.php" class="item " >Teachers Records</a>
			<a href="transport_home.php" class="item " >Transportation</a>
			<a href="message_category.php" class="item " >Messages</a>
			<a href="daily_ledger.php" class="item " >Daily Ledger</a>
            <a class="nav-link active " aria-current="page" href="logout.php">logout</a>
		</div>
		<div class="divider" style="position: relative; bottom: 0px;"></div>

		<div class="card-footer text-center update fixed footer"
			style="position: absolute; bottom: 0px;">
			<p class="mt-2">Version 1.0.0</p>
			<p>Developed by</p>
			<p>Shrums Tech </p>
		</div>
	</div>

	<!--    Content  -->
	<div class="content card-body">

	<div>
		<div class="text-center text-green">
		<h2 style="color:green;"><strong>Total Classes</strong></h2>
		</div>
		<div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col" >
				<a style="text-decoration: none;"
					href="all_student.php?class=Nursery">
					<div class="card"
						style="background-color: lightgray; border-radius: 5%;
						background-image: url('images/Class card/nurs2.png');height:160px; background-size: 225px 160px;background-repeat: no-repeat;">
						<div class="card-body text-center text-white mt-5 mb-5">
							
						</div>
					</div>
				</a>
			</div>

            <div class="col" >
				<a style="text-decoration: none;"
					href="all_student.php?class=Prep">
					<div class="card"
						style="background-color: lightgray; border-radius: 5%;
						background-image: url('images/Class card/prep.png');height:160px; background-size: 225px 160px;background-repeat: no-repeat;">
						<div class="card-body text-center text-white mt-5 mb-5">
							
							
						</div>
					</div>
				</a>
			</div>

			<div class="col" >
				<a style="text-decoration: none;"
					href="all_student.php?class=One">
					<div class="card"
						style="background-color: lightgray; border-radius: 5%;
						background-image: url('images/Class card/1.png');height:160px; background-size: 225px 160px;background-repeat: no-repeat;
						">
						<div class="card-body text-center text-white mt-5 mb-5">
							
							
						</div>
					</div>
				</a>
			</div>

			<div class="col" >
				<a style="text-decoration: none;"
					href="all_student.php?class=Two">
					<div class="card"
						style="background-color: lightgray; border-radius: 5%;
						background-image: url('images/Class card/2.png');height:160px; background-size: 225px 160px;background-repeat: no-repeat;
						">
						<div class="card-body text-center text-white mt-5 mb-5">
							
							
						</div>
					</div>
				</a>
			</div>
			
			<div class="col" >
				<a style="text-decoration: none;"
					href="all_student.php?class=Three">
					<div class="card"
						style="background-color: lightgray; border-radius: 5%;
						background-image: url('images/Class card/3.png');height:160px; background-size: 225px 160px;background-repeat: no-repeat;
						">
						<div class="card-body text-center text-white mt-5 mb-5">
							
							
						</div>
					</div>
				</a>
			</div>

			<div class="col" >
				<a style="text-decoration: none;"
					href="all_student.php?class=Four">
					<div class="card"
						style="background-color: lightgray; border-radius: 5%;
						background-image: url('images/Class card/4.png');height:160px; background-size: 225px 160px;background-repeat: no-repeat;
						">
						<div class="card-body text-center text-white mt-5 mb-5">
							
							
						</div>
					</div>
				</a>
			</div>

			<div class="col" >
				<a style="text-decoration: none;"
					href="all_student.php?class=Fifth">
					<div class="card"
						style="background-color: lightgray; border-radius: 5%;
						background-image: url('images/Class card/5.png');height:160px; background-size: 225px 160px;background-repeat: no-repeat;
						">
						<div class="card-body text-center text-white mt-5 mb-5">
							
							
						</div>
					</div>
				</a>
			</div>

			<div class="col" >
				<a style="text-decoration: none;"
					href="all_student.php?class=Sixth">
					<div class="card"
						style="background-color: lightgray; border-radius: 5%;
						background-image: url('images/Class card/6.png');height:160px; background-size: 225px 160px;background-repeat: no-repeat;
						">
						<div class="card-body text-center text-white mt-5 mb-5">
							
							
						</div>
					</div>
				</a>
			</div>

            <div class="col" >
				<a style="text-decoration: none;"
					href="all_student.php?class=Seventh">
					<div class="card"
						style="background-color: lightgray; border-radius: 5%;
						background-image: url('images/Class card/7.png');height:160px; background-size: 225px 160px;background-repeat: no-repeat;
						">
						<div class="card-body text-center text-white mt-5 mb-5">
							
							
						</div>
					</div>
				</a>
			</div>

			<div class="col" >
				<a style="text-decoration: none;"
					href="all_student.php?class=Eight">
					<div class="card"
						style="background-color: lightgray; border-radius: 5%;
						background-image: url('images/Class card/8.png');height:160px; background-size: 225px 160px;background-repeat: no-repeat;">
						<div class="card-body text-center text-white mt-5 mb-5">
							
							
						</div>
					</div>
				</a>
			</div>

			
			
		</div>
                
        </div>


	</div>

	<!--     Optional JavaScript; choose one of the two! -->
	<!--     Option 1: Bootstrap Bundle with Popper -->
	<!--     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script> -->
	<!--     Option 2: Separate Popper and Bootstrap JS -->
	<!--     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script> -->
	<!--     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> -->





    
<?php include('include/footer.php')?>

</body>
</html>