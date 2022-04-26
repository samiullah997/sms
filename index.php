<?php
include('cruds/insert.php');
if($_SESSION['firstname']==null){
    header("location:login.php");
}
$null="";
$date1= date('Y/m/d');
$date2= date('Y/m/d');
$all_stuents = mysqli_query($con,"select count(*) as totalStudents from students WHERE `class_from_withdrawn`='$null' order by id ");
$result_students=mysqli_fetch_assoc($all_stuents);

$all_withdrawn_stuents = mysqli_query($con,"select count(*) as totalwithdrawnStudents from students WHERE `class_from_withdrawn` !='$null' order by id ");
$result_withdrawn_students=mysqli_fetch_assoc($all_withdrawn_stuents);

$all_teachers = mysqli_query($con,"select count(*) as totalTeachers from teachers order by id ");
$result_teacher=mysqli_fetch_assoc($all_teachers);

$all_fee_sum = mysqli_query($con,"SELECT SUM(`submit_fee`) As `submited_income` FROM `student_fee` where `date`='$date1'");
$all_sumbited_fee_sum_result = mysqli_fetch_assoc($all_fee_sum);

$all_salary_sum = mysqli_query($con,"SELECT SUM(`total_salary`) As `total_salary` FROM `teachers_salary` where `date`='$date2'");
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
			<a href="index.php" class="item item-select">Home</a>
            <a href="student_record.php" class="item">Students Records</a>
            <a href="teacher_record.php" class="item " >Teachers Records</a>
			<a href="transport_home.php" class="item " >Transportation</a>
			<a href="message_category.php" class="item " >Messages</a>
			<a href="daily_ledger.php" class="item " >Daily Ledger</a>
            <a class="nav-link active " aria-current="page" href="logout.php">Logout</a>
		</div>
		<div class="divider" style="position: relative; bottom: 0px;"></div>

		<div class="card-footer text-center update fixed footer"
			style="position: absolute; bottom: 0px;">
			<div class="mt-2">Version 1.0.0</div>
			<div>Developed by</div>
			<div>Shrums Tech </div>
		</div>
	</div>

	<!--    Content  -->

	<div class="content card-body">

	<div>
		
		<div class="row row-cols-1 row-cols-md-2 g-2">
			<div class="col" >
				<a style="text-decoration: none;"
					href="all_classes.php">
					<div class="card"
						style="background-color: lightgray; border-radius: 5%;background-image: url('images/students.png'); height:250px;background-size: 100% 100%;background-repeat: no-repeat;">
						<div class="card-body text-center text-green  mt-5 mb-5">
							<h5 style="margin-top:100px; margin-left:100px; color:green;"><strong><?php echo $result_students['totalStudents']; ?></strong></h5>
							
						</div>
					</div>
				</a>
			</div>

			<div class="col" >
				<a style="text-decoration: none;"
					href="withdrawn_student.php">
					<div class="card"
						style="background-color: lightgray; border-radius: 5%;background-image: url('images/withdrawn.png'); height:250px;background-size: 100% 100%;background-repeat: no-repeat;">
						<div class="card-body text-center text-bold mt-5 mb-5">
							<h5 style="margin-top:100px; margin-left:100px; color:green; "><strong><?php echo $result_withdrawn_students['totalwithdrawnStudents']; ?></strong></h5>
						</div>
					</div>
				</a>
			</div>
			
			<div class="col" >
				<a style="text-decoration: none;"
					href="all_teachers.php">
					<div class="card"
						style="background-color: lightgray; border-radius: 5%;background-image: url('images/teachers.png'); height:250px;background-size: 100% 100%;background-repeat: no-repeat;">
						<div class="card-body text-center text-bold mt-5 mb-5">
							<h5 style="margin-top:100px; margin-left:100px;color:green; "><strong><?php echo $result_teacher['totalTeachers']; ?></strong></h5>
						</div>
					</div>
				</a>
			</div>

			<div class="col" >
				<a style="text-decoration: none;"
					href="daily_ledger.php">
					<div class="card"
						style="background-color: lightgray; border-radius: 5%; background-image: url('images/income.png'); height:250px;background-size: 100% 100%;background-repeat: no-repeat;">
						<div class="card-body text-center text-bold mt-5 mb-5">
							<h5 style="margin-top:100px; margin-left:100px;color:green; "><strong><?php echo 'Rs: '.$all_sumbited_fee_sum_result['submited_income']; ?></strong></h5>
						</div>
					</div>
				</a>
			</div>

			<!-- <div class="col" >
				<a style="text-decoration: none;"
					href="dmc_record.php">
					<div class="card"
						style="background-color: Green; border-radius: 5%;">
						<div class="card-body text-center text-white mt-5 mb-5">
							<h5>Total Registration Fee</h5>
							<h5>50000</h5>
						</div>
					</div>
				</a>
			</div> -->

			<div class="col" >
				<a style="text-decoration: none;"
					href="daily_ledger.php">
					<div class="card"
						style="background-color: lightgray; border-radius: 5%;background-image: url('images/expenses.png'); height:250px;background-size: 100% 100%;background-repeat: no-repeat;">
						<div class="card-body text-center text-bold mt-5 mb-5">
							<h5 style="margin-top:100px; margin-left:100px; color:green;"><strong><?php echo 'Rs: '.$all_salary_sum_result['total_salary']; ?></strong></h5>
							<a style="margin-left:150px;" href=""	data-bs-toggle="modal" data-bs-target="#expenses" class="btn btn-outline-success btn-sm" type="" value="">Add Expenses</a>
						</div>
					</div>
				</a>
			</div>

			

			
			
		</div>


     <!-- Expenses  Modal -->
	 <div class="modal fade" id="expenses" tabindex="-1"
			    aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">miscellaneous Expenses 
							Records</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>

					<div class="modal-body">

						<div class="card">
							<div class="container card-header text-center">
								<h2>Miscellaneous Expenses Records</h2>
							</div>
							<div class="card-body">
									<form class="row g-3" action="#" method="POST" >
																				
                                        <div class="col-md-12">
											<label for="inputPassword4" class="form-label">Enter Details
												 </label> <textarea name="detailed" width="10%" height="40%" required type="text"
												class="form-control" id="inputPassword4"></textarea>
										</div>
										<div class="col-md-6">
											<label for="inputDepartment" class="form-label">Expenses Type
												</label> <input name="exp_type" required type="text"
												class="form-control" id="inputPassword4">
										</div>
										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Total Expenses Amount
												 </label> <input name="total_amount"   id="m_name" required type="number"
												class="form-control" id="inputPassword4">
										</div>

                                        <div class="col-md-6">
											<label for="inputPassword4" class="form-label">Date
												 </label> <input name="date"   id="m_name" required type="date"
												class="form-control" id="inputPassword4">
										</div>

										<div class="col-12 text-center">
											<button type="submit" name="expenses_submit" class="btn btn-outline-success">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
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