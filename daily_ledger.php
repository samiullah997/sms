<?php
include('cruds/insert.php');
if($_SESSION['firstname']==null){
    header("location:login.php");
}


if(isset($_POST['daily_ladger'])){
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];

	$all_fee = mysqli_query($con,"SELECT * FROM `student_fee` where `date` Between '$start_date' and '$end_date' order by id desc ");
	$all_fee_sum = mysqli_query($con,"SELECT SUM(`total_fee`) As `total_income` FROM `student_fee` where `date` Between '$start_date' and '$end_date'");
	$all_fee_sum_result = mysqli_fetch_array($all_fee_sum);
	$all_fee_sum = mysqli_query($con,"SELECT SUM(`submit_fee`) As `submited_income` FROM `student_fee` where `date` Between '$start_date' and '$end_date'");
	$all_sumbited_fee_sum_result = mysqli_fetch_array($all_fee_sum);


	$all_salary = mysqli_query($con,"SELECT * FROM `teachers_salary`  where `date` Between '$start_date' and '$end_date' order by id desc ");
    $all_salary_sum = mysqli_query($con,"SELECT SUM(`total_salary`) As `total_salary` FROM `teachers_salary` where `date` Between '$start_date' and '$end_date'");
    $all_salary_sum_result = mysqli_fetch_array($all_salary_sum);
	$name="";
	$all_misce = mysqli_query($con,"SELECT * FROM `miscellaneous` where `name`= '$name' AND `date` Between '$start_date' and '$end_date' order by id desc ");
	$all_mesce_sum=mysqli_query($con,"SELECT SUM(`total_amount`) As `total_amount` From `miscellaneous` where `name`= '$name' AND `date` Between '$start_date' and '$end_date'");
	$all_mesce_sum_result = mysqli_fetch_array($all_mesce_sum);
}
else{
	$date= date('Y/m/d');
	$all_fee = mysqli_query($con,"SELECT * FROM `student_fee` where `date` = '$date'  order by id desc ");
	$all_fee_sum = mysqli_query($con,"SELECT SUM(`total_fee`) As `total_income` FROM `student_fee` where `date` = '$date'");
	$all_fee_sum_result = mysqli_fetch_array($all_fee_sum);
	$all_fee_sum = mysqli_query($con,"SELECT SUM(`submit_fee`) As `submited_income` FROM `student_fee` where`date` = '$date'");
	$all_sumbited_fee_sum_result = mysqli_fetch_array($all_fee_sum);


	$all_salary = mysqli_query($con,"SELECT * FROM `teachers_salary`  where `date`= '$date' order by id desc ");
    $all_salary_sum = mysqli_query($con,"SELECT SUM(`total_salary`) As `total_salary` FROM `teachers_salary` where `date` = '$date'");
    $all_salary_sum_result = mysqli_fetch_array($all_salary_sum);
	$name="";

	$all_misce = mysqli_query($con,"SELECT * FROM `miscellaneous` where `name`= '$name' AND `date`='$date' order by id desc ");
	$all_mesce_sum=mysqli_query($con,"SELECT SUM(`total_amount`) As `total_amount` From `miscellaneous` where `name`= '$name' AND `date`='$date'");
	$all_mesce_sum_result = mysqli_fetch_array($all_mesce_sum);


}
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
            <a href="student_record.php" class="item">Students Records</a>
            <a href="teacher_record.php" class="item " >Teachers Records</a>
			<a href="transport_home.php" class="item " >Transportation</a>
			<a href="message_category.php" class="item " >Messages</a>
			<a href="daily_ledger.php" class="item item-select " >Daily Ledger</a>
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

	<div class="card">
	<div class="text-center">
		<h2>Daily Ledger Record</h2></div>
			<div class="card-body">
				<div class="container">
			
					<form class="row g-3"  method="POST">

						<div class="col-md-6">
							<label for="inputCity" class="form-label">Start Date</label> <input name="start_date" required type="date"
								class="form-control" id="inputCity" >
						</div>

						<div class="col-md-6">
							<label for="inputCity" class="form-label">End Date</label> <input name="end_date" required type="date"
								class="form-control" id="inputCity" value="" >
						</div>

						<div class="col-12 text-center">
							<button type="submit" name="daily_ladger" class="btn btn-outline-primary">show</button>
						</div>
					</form>
				</div>
			</div>
	</div>
		

		<!-- Student Fee Record -->
        <div class="container text-center "
			style="font-size: 15px; margin-bottom: 50px;">
			<div  class="alert" role="alert">
				<p><?php if(isset($msg)){
                    echo $msg;
                }?></p>
				
			</div>



			<card class="card">
			<table class="table rTable caption-top">
				<theader colspan="10"
					style="margin-top:10px;margin-right:50px; font-size:30px;font-family:bold;"
					th:text="${semester}+' '+'Semester Result List'">Fee
				Record</theader>
				<thead>
					<tr>
						<th scope="col">Admission No</th>
						<th scope="col">Student Name</th>
                        <th scope="col">Class</th>
						<th scope="col">Type</th>
						<th scope="col">Total Fee</th>
                        <th scope="col">Submit Fee</th>
                        <th scope="col">Dues</th>
                        <th scope="col">Date</th>
					</tr>
				</thead>
				<tbody>
                <?php while($row = mysqli_fetch_array($all_fee)) {?>
					<tr >
						<td ><?php echo $row['admission_no'];?></td>
						<td ><?php echo $row['Name']?></td>
                        <td ><?php echo $row['class'];?> </td>
						<td ><?php echo $row['fee_type'];?> </td>
                        <td ><?php echo $row['total_fee'];?></td>
                        <td ><?php echo $row['submit_fee'];?></td>
                        <td ><?php echo $row['total_fee']-$row['submit_fee'];?></td>
                        <td ><?php echo $row['date'];?></td>

					</tr>
                    <?php };?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <hr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th  class="text-center" > Total Fee:   <?php echo $all_fee_sum_result['total_income']?> </th>

                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                        <th colspan="2" class="text-center" >Submited Fee: <?php echo $all_sumbited_fee_sum_result['submited_income']?> </th>

                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                        <th colspan="2" class="text-center" >Total Dues: <?php echo $all_fee_sum_result['total_income']-$all_sumbited_fee_sum_result['submited_income']?> </th>

                    </tr>
				</tbody>
			</table>


			
                
        </div>



		






<!-- Add Fee Modal -->
<div class="modal fade" id="update_fee" tabindex="-1"
			aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Update Fee
							Records</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>

					<div class="modal-body">

						<div class="card">
							<div class="container card-header text-center">
								<h2>Update Fee Records</h2>
							</div>
							<div class="card-body">

									<form class="row g-3" action="#"method="POST" >
										

										<div class="col-md-6">
											<label for="inputEmail4" class="form-label">Student
												Roll No </label> <input readonly name="id" id="s_id" required type="text"
												class="form-control" >
										</div>
										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Student
												Name </label> <input readonly name="name" id="s_name" required type="text"
												class="form-control" >
										</div>

                                        <div class="col-md-6">
											<label for="inputPassword4" class="form-label">Total
												Fee </label> <input name="total_fee" required type="text"
												class="form-control" id="s_total_fee">
										</div>
                                        <div class="col-md-6">
											<label for="inputPassword4" class="form-label">Submitted
												Fee </label> <input name="submited_fee" required type="text"
												class="form-control" id="s_submited_fee">
										</div>

                                        <div class="col-md-6">
							                <label for="inputDepartment" class="form-label">Class</label>
							                <select name="class" id="s_class" required class="form-select">
                                                <option selected>Choose...</option>
                                                <option>Nursery</option>
                                                <option>Prep</option>
                                                <option>One</option>
                                                <option>Two</option>
                                                <option>Three</option>
                                                <option>Four</option>
                                                <option>Fifth</option>
                                                <option>sixth</option>
							                </select>
						                </div>

										<div class="col-md-6">
											<label for="inputDepartment" class="form-label">Fee
												Type</label> <select name="type" id="s_type" required
												class="form-select">
												<option selected disabled>Choose...</option>
                                                <option  >Registration Fee</option>
												<option  >Monthly Fee</option>
											</select>
										</div>

										<div class="col-md-6">
											<label for="inputCity" class="form-label">Fee
												Submitted Date </label> <input name="date" readonly required type="date"
												class="form-control" id="s_date">
										</div>

										<div class="col-12 text-center">
											<button type="submit" name="fee_update" class="btn btn-outline-primary">Add Fee</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


<!-- Techer Salary Record -->
<div class="container text-center "
			style="font-size: 15px; margin-bottom: 50px;">
			<div  class="alert" role="alert">
				<p><?php if(isset($msg)){
                    echo $msg;
                }?></p>
				
			</div>



			<card class="card">
			<table class="table rTable caption-top">
				<theader colspan="10"
					style="margin-top:10px;margin-right:50px; font-size:30px;font-family:bold;"
					th:text="${semester}+' '+'Semester Result List'">Salary
				Record</theader>
				<thead>
					<tr>
						<th scope="col">Serial No</th>
						<th scope="col">Teacher Name</th>
                        <th scope="col">Salary</th>
						<th scope="col">Date</th>
					</tr>
				</thead>
				<tbody>
                <?php while($row = mysqli_fetch_array($all_salary)) {?>
					<tr >
						<td ><?php echo $row['teacher_id'];?></td>
						<td ><?php echo $row['name']?></td>
                        <td ><?php echo $row['total_salary'];?> </td>
						<td ><?php echo $row['date'];?> </td>
                        

					</tr>
                    <?php };?>
                     <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                        
                    </tr>
                    <hr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                       
                        
                        <th  class="text-center" > Total Salary:   <?php echo $all_salary_sum_result['total_salary']?> </th>

                    </tr>
                    
				</tbody>
			</table>
                
        </div>
<!-- Daily Expenses Record Record -->
<div class="container text-center "
			style="font-size: 15px; margin-bottom: 50px;">
			<div  class="alert" role="alert">
				<p><?php if(isset($msg)){
                    echo $msg;
                }?></p>
				
			</div>

		<card class="card">
			<table class="table rTable caption-top">
				<theader colspan="10"
					style="margin-top:10px;margin-right:50px; font-size:30px;font-family:bold;"
					th:text="${semester}+' '+'Semester Result List'">Daily Expenses
				Record</theader>
				<thead>
					<tr>
						
						<th scope="col">Type</th>
						<th scope="col">Total Amount</th>
						<th scope="col">Date</th>
					</tr>
				</thead>
				<tbody>
                <?php while($row = mysqli_fetch_array($all_misce)) {?>
					<tr >
						
						<td ><?php echo $row['type'];?> </td>
                        <td ><?php echo $row['total_amount'];?></td>
						<td><?php echo $row['date'];?></td>
					</tr>
                    <?php };?>
					<tr>
                        <td></td>
                        <td></td>
						<td></td>
                        
                    </tr>
                    <hr>
                    <tr>
                        <td></td>
                       <td></td>
                        <th  class="text-center" > Total Expenses:   <?php echo $all_mesce_sum_result['total_amount']?> </th>

                    </tr>
				</tbody>
			</table>
                
        </div>



<!-- Add Fee Modal -->
<div class="modal fade" id="update_fee" tabindex="-1"
			aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Update Fee
							Records</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>

					<div class="modal-body">

						<div class="card">
							<div class="container card-header text-center">
								<h2>Update Fee Records</h2>
							</div>
							<div class="card-body">

									<form class="row g-3" action="#"method="POST" >
										

										<div class="col-md-6">
											<label for="inputEmail4" class="form-label">Student
												Roll No </label> <input readonly name="id" id="s_id" required type="text"
												class="form-control" >
										</div>
										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Student
												Name </label> <input readonly name="name" id="s_name" required type="text"
												class="form-control" >
										</div>

                                        <div class="col-md-6">
											<label for="inputPassword4" class="form-label">Total
												Fee </label> <input name="total_fee" required type="text"
												class="form-control" id="s_total_fee">
										</div>
                                        <div class="col-md-6">
											<label for="inputPassword4" class="form-label">Submitted
												Fee </label> <input name="submited_fee" required type="text"
												class="form-control" id="s_submited_fee">
										</div>

                                        <div class="col-md-6">
							                <label for="inputDepartment" class="form-label">Class</label>
							                <select name="class" id="s_class" required class="form-select">
                                                <option selected>Choose...</option>
                                                <option>Nursery</option>
                                                <option>Prep</option>
                                                <option>One</option>
                                                <option>Two</option>
                                                <option>Three</option>
                                                <option>Four</option>
                                                <option>Fifth</option>
                                                <option>sixth</option>
							                </select>
						                </div>

										<div class="col-md-6">
											<label for="inputDepartment" class="form-label">Fee
												Type</label> <select name="type" id="s_type" required
												class="form-select">
												<option selected disabled>Choose...</option>
                                                <option  >Registration Fee</option>
												<option  >Monthly Fee</option>
											</select>
										</div>

										<div class="col-md-6">
											<label for="inputCity" class="form-label">Fee
												Submitted Date </label> <input name="date" readonly required type="date"
												class="form-control" id="s_date">
										</div>

										<div class="col-12 text-center">
											<button type="submit" name="fee_update" class="btn btn-outline-primary">Add Fee</button>
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