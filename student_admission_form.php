<?php
include('cruds/insert.php');
if($_SESSION['firstname']==null){
    header("location:login.php");
}
 $regno = mysqli_query($con,"select admission_no from students order by id desc limit 1");
 $admissionNo = mysqli_fetch_array($regno);
  $reg_no = $admissionNo['admission_no'] + 1 ; ?>

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
			<a href="index.php" class="item">Home</a>
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
		<div class="page-body">
        <div class="card">
			<div class="container card-header text-center">
			<?php if(isset($msg)){
				echo "<h2 style='background-color:green;color:white;'>".$msg."</h2>";
			}?>	
			
			<h2>Student
				Registration Form</h2></div>
			<div class="card-body">
				<div class="container">
			

					<form class="row g-3" action="#" 
						enctype="multipart/form-data" method="POST"
						>
						<div class="col-md-6">
							<label class="form-label">Upload Student Image</label> <input
								name="image"  type="file" class="form-control"
								id="inputfile">
						</div>
						<div class="col-md-6">
							<label for="inputEmail4" class="form-label">Admission No</label> <input
								name="admissionNo" required type="text" readonly value="<?php echo $reg_no;?>" class="form-control"
								id="inputEmail4" require >
						</div>

						<div class="col-md-6">
							<label for="inputDepartment" class="form-label">Class</label>
							<select name="class" id="inputState" required class="form-select">
								<option selected>Choose...</option>
								<option>Nursery</option>
								<option>Prep</option>
               					<option>One</option>
                				<option>Two</option>
                				<option>Three</option>
                				<option>Four</option>
                				<option>Fifth</option>
                				<option>Sixth</option>
								<option>Seventh</option>
								<option>Eight</option>
							</select>
						</div>

						<div class="col-md-6">
							<label for="inputCity" class="form-label">Date of
								Submission</label> <input name="dateOfSubmission" required type="date"
								class="form-control" id="inputCity" require>
						</div>

						<div class="col-md-6">
							<label for="inputCity" class="form-label">Date of
								Birth</label> <input name="dateofbirth" required type="date"
								class="form-control" id="inputCity" require>
						</div>

						<div class="col-md-6">
							<label for="inputEmail4" class="form-label">Student First Name</label> <input
								name="firstName" required type="text" class="form-control"
								id="inputEmail4" require>
						</div>
						<div class="col-md-6">
							<label for="inputPassword4" class="form-label">Student Last Name</label>
							<input name="lastName" required type="text" class="form-control"
								id="inputPassword4" require>
						</div>
						<div class="col-md-6">
							<label for="inputPassword4" class="form-label"> Student Father
								Name</label> <input name="fatherName" required type="text" class="form-control"
								id="inputPassword4" require>
						</div>

						<div class="col-md-6">
							<label for="inputCity" class="form-label">Contact Number</label> <input
								name="phone" type="number" class="form-control" id="inputCity" require>
						</div>

						<div class="col-6">
							<label for="inputAddress" class="form-label">Permanent
								Address</label> <input name="permanentAddress" required type="text"
								class="form-control" id="inputAddress"
								placeholder="1234 Main St" require>
						</div>
						<div class="col-6">
							<label for="inputAddress2" class="form-label">Mailing
								Address</label> <input name="maillingAddress" required type="text"
								class="form-control" id="inputAddress2"
								placeholder="Apartment, studio, or floor" require>
						</div>
						<div class="col-md-6">
							<label for="inputCity" class="form-label">Father Occupation</label> <input
								name="fatherOccupation" type="text" class="form-control" id="inputCity" require>
						</div>

						<div class="col-md-6">
							<label for="inputCity" class="form-label">Father Qualification (Optional)</label> <input
								name="fatherQualification" type="text" class="form-control" id="inputCity" >
						</div>

						<div class="col-md-6">
							<label for="inputCity" class="form-label">Mother Occupation (if in service)</label> <input
								name="motherOccupation" type="text" class="form-control" id="inputCity">
						</div>
						
						<div class="col-md-6">
							<label for="inputCity" class="form-label">Mother Qualification</label> <input
								name="motherQualification" type="text" class="form-control" id="inputCity">
						</div>

						<div class="col-md-6">
							<label for="inputCity" class="form-label">Religion</label> <input
								name="religion" type="text" class="form-control" id="inputCity" require>
						</div>

						<div class="col-md-6">
							<label for="inputCity" class="form-label">Caste</label> <input
								name="caste" type="text" class="form-control" id="inputCity" require>
						</div>

						<div class="col-md-6">
							<label for="inputCity" class="form-label">Habbits & Hobbies of student</label> <input
								name="hobbies" type="text" class="form-control" id="inputCity" require>
						</div>

						<div class="col-md-6">
							<label for="inputCity" class="form-label">Any Sibling</label> <input
								name="sibling" type="number" class="form-control" id="inputCity" require>
						</div>

						<div class="col-md-6">
							<label for="inputCity" class="form-label">Test Report </label> <input
								name="testrepost" type="text" class="form-control" required id="inputCity">
						</div>

						<div class="col-md-6">
							<label for="inputCity" class="form-label">Father CNIC Number</label> <input
								name="cnicNo" type="text" class="form-control" required id="inputCity">
						</div>
						

						<div class="col-12 text-center">
							<button type="submit" name="student_register" class="btn btn-outline-primary">Register</button>
						</div>
					</form>
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