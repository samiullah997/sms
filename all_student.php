<?php
include('cruds/insert.php');
if($_SESSION['firstname']==null){
    header("location:login.php");
}
$class=$_GET['class'];
$null="";
$all_stuents = mysqli_query($con,"SELECT * from students WHERE `class`= '$class'  and `class_from_withdrawn`='$null' order by id ");

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
			<a href="index.php" class="item">Home</a>
            <a href="student_record.php" class="item item-select" >Students Records</a>
            <a href="teacher_record.php" class="item" >Teachers Records</a>
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
					><?php echo $class.' '; ?>Students
				Record</theader>
				<thead>
					<tr>
                        <th scope="col">Profile</th>
						<th scope="col">Admission No</th>
						<th scope="col">Student Name</th>
						<th scope="col">Father Name</th>
						<th scope="col" colspan="2">Fee Record</th>
                        <th scope="col">Miscellaneous</th>
                        <th scope="col">Withdrawn</th>
						<th scope="col">DMC</th>
					</tr>
				</thead>
				<tbody>
                <?php while($row = mysqli_fetch_array($all_stuents)) {?>
					<tr >

                        <td ><?php if($row['image']!=null){?>
							<img style="width: 50px; height: 50px;" src="images/student Images/<?php echo $row['image'];?>" alt="">
							<?php }else{?>
								<img style="width: 50px; height: 50px;" src="images/student.png" alt="">
								<?php }; ?></td>
						<td ><?php echo $row['admission_no'];?></td>
						<td ><?php echo $row['first_name'].' '.$row['last_name'];?></td>
						<td ><?php echo $row['father_name'];?></td>
						<td > <a href=""	data-bs-toggle="modal" data-bs-target="#addFee"
                        class="badge bg-primary rounded-pill" onclick="addFee('<?php echo $row['admission_no'];?>','<?php echo $row['id'];?>','<?php echo $row['first_name'].' '.$row['last_name'];?>')" style="text-decoration:none;" >Add fee</a></td>
                        <td > <a href="fee_record.php?id=<?php  echo $row['id'];?>"
                        class="badge bg-primary rounded-pill"  style="text-decoration:none;" >All Fee</a></td>
                        <td ><a	href="" data-bs-toggle="modal" data-bs-target="#misce"  
                        class="badge bg-success rounded-pill" onclick="addMisc('<?php echo $row['admission_no'];?>','<?php echo $row['id'];?>','<?php echo $row['first_name'].' '.$row['last_name'];?>')" style="text-decoration:none;" >Add Misc</a></td>
                        <td ><a href=""	data-bs-toggle="modal" data-bs-target="#withdrawn"  
                        class="badge bg-success rounded-pill" onclick="withdrawn('<?php echo $row['admission_no'];?>','<?php echo $row['id'];?>','<?php echo $row['first_name'].' '.$row['last_name'];?>')" style="text-decoration:none;" >Withdrawn</a></td>
						<td ><a href="dmc_record.php?admission_no=<?php echo $row['admission_no'];?>&id=<?php echo $row['id'];?>&name=<?php echo $row['first_name'].' '.$row['last_name'];?>&class=<?php echo $row['class'];?>" 
                        class="badge bg-success rounded-pill" onclick="createDMC('<?php echo $row['admission_no'];?>','<?php echo $row['id'];?>','<?php echo $row['first_name'].' '.$row['last_name'];?>')" style="text-decoration:none;" >Create</a></td>
					</tr>
                    <?php };?>
				</tbody>
			</table>
                
        </div>

<!-- Add Fee Modal -->
        <div class="modal fade" id="addFee" tabindex="-1"
			aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add Fee
							Records</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>

					<div class="modal-body">

						<div class="card">
							<div class="container card-header text-center">
								<h2>Fee Records</h2>
							</div>
							<div class="card-body">

									<form class="row g-3" action="#"method="POST" >
										<input type="hidden" name="id" id="id">

										<div class="col-md-6">
											<label for="inputEmail4" class="form-label">Admission
												No </label> <input readonly name="admissionNo" id="admissionNo" required type="text"
												class="form-control" id="inputEmail4">
										</div>
										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Student
												Name </label> <input readonly name="name" id="name" required type="text"
												class="form-control" id="inputPassword4">
										</div>

                                        <div class="col-md-6">
											<label for="inputPassword4" class="form-label">Total
												Fee </label> <input name="total_fee" required type="text"
												class="form-control" id="inputPassword4">
										</div>
                                        <div class="col-md-6">
											<label for="inputPassword4" class="form-label">Submitted
												Fee </label> <input name="submited_fee" required type="text"
												class="form-control" id="inputPassword4">
										</div>

                                        
							                <input type="hidden" name="class" value="<?php echo $_GET['class'];?>">
						                

										<div class="col-md-6">
											<label for="inputDepartment" class="form-label">Fee
												Type</label> <select name="type" id="inputState" require
												class="form-select">
												<option selected disabled>Choose...</option>
                                                <option  >Registration Fee</option>
												<option  >Monthly Fee</option>
											</select>
										</div>

										<div class="col-md-6">
											<label for="inputCity" class="form-label">Fee
												Submitted Date </label> <input name="date" required type="date"
												class="form-control" id="inputCity">
										</div>

										<div class="col-12 text-center">
											<button type="submit" name="fee_submit" class="btn btn-outline-primary">Add Fee</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

            <!-- Student withdrawn Modal -->
        <div class="modal fade" id="withdrawn" tabindex="-1"
			    aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Withdrawn
							Records</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>

					<div class="modal-body">

						<div class="card">
							<div class="container card-header text-center">
								<h2>Withdrawn Records</h2>
							</div>
							<div class="card-body">

									<form class="row g-3" action="#" method="POST" >
										<input type="hidden" name="w_id" id="w_id">
										<div class="col-md-6">
											<label for="inputEmail4" class="form-label">Admission
												No </label> <input name="w_admisisonNo" readonly id="w_admisisonNo" required type="text"
												class="form-control" id="inputEmail4">
										</div>
										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Student
												Name </label> <input name="w_name" readonly  id="w_name" required type="text"
												class="form-control" id="inputPassword4">
										</div>


										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Class From Withdrawn
												</label> <select name="class" id="inputState" required
												class="form-select">
												<option selected disabled>Choose...</option>
                                                <option>Nursery</option>
												<option>Prep</option>
												<option>One</option>
												<option>Two</option>
												<option>Third</option>
												<option>Fourth</option>
												<option>Fifth</option>
												<option>Sixth</option>
												<option>Seventh</option>
												<option>Eight</option>
											</select>
										</div>
                                        <div class="col-md-6">
											<label for="inputPassword4" class="form-label">Remarks
												 </label> <input name="remarks" required type="text"
												class="form-control" id="inputPassword4">
										</div>

										<div class="col-md-6">
											<label for="inputDepartment" class="form-label">Withdrawn Date
												</label> <input name="date" required type="date"
												class="form-control" id="inputPassword4">
										</div>

										<div class="col-12 text-center">
											<button type="submit" name="withdrawn_submit" class="btn btn-outline-success">Withdraw Student</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Student DMC Modal -->
			<div class="modal fade" id="addDmcRecord" tabindex="-1"
			    aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Student DMC
							Records</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>

					<div class="modal-body">

						<div class="card">
							<div class="container card-header text-center">
								<h2>DMC Records</h2>
							</div>
							<div class="card-body">

									<form class="row g-3" action="#" method="POST" >
										<input type="hidden" name="s_id" id="s_id">
									<input type="hidden" name="class" value="<?php echo $_GET['class']; ?>">

										<div class="col-md-6">
											<label for="inputEmail4" class="form-label">Admission No
												 </label> <input name="admissionNo" readonly id="d_admissionNo" required type="text"
												class="form-control" id="inputEmail4">
										</div>
										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Student
												Name </label> <input name="name" readonly  id="d_name" required type="text"
												class="form-control" id="inputPassword4">
										</div>

										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Submject
												Name </label> <input name="subject_name"   id="w_name" required type="text"
												class="form-control" id="inputPassword4">
										</div>
										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Total Marks
												 </label> <input name="total_marks"   id="w_name" required type="text"
												class="form-control" id="inputPassword4">
										</div>

										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Obtained Marks
												 </label> <input name="obtained_marks"   id="w_name" required type="text"
												class="form-control" id="inputPassword4">
										</div>

										<div class="col-md-6">
											<label for="inputDepartment" class="form-label">Creation Date
												</label> <input name="date" required type="date"
												class="form-control" id="inputPassword4">
										</div>

										<div class="col-12 text-center">
											<button type="submit" name="dmc_submit" class="btn btn-outline-success">submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

             <!-- Student Meci Modal -->
        <div class="modal fade" id="misce" tabindex="-1"
			    aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">miscellaneous 
							Records</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>

					<div class="modal-body">

						<div class="card">
							<div class="container card-header text-center">
								<h2>miscellaneous Records</h2>
							</div>
							<div class="card-body">

									<form class="row g-3" action="#" method="POST" >
									<input type="hidden" name="m_id" id="m_id">
										<div class="col-md-6">
											<label for="inputEmail4" class="form-label">Student
												Roll No </label> <input name="admissionNo" readonly id="m_admissionNo" required type="text"
												class="form-control" id="inputEmail4">
										</div>
										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Student
												Name </label> <input name="m_name" readonly  id="m_name" required type="text"
												class="form-control" id="inputPassword4">
										</div>
										
                                        <div class="col-md-6">
											<label for="inputPassword4" class="form-label">Type
												</label> <select name="type" id="inputState" required
												class="form-select">
												<option selected disabled>Choose...</option>
                                                <option  >Books</option>
												<option  >Uniform</option>
												<option  >Books & Uniform</option>
												<option  >Others</option>
                                                
											</select>
										</div>

                                        <div class="col-md-6">
											<label for="inputDepartment" class="form-label">Date
												</label> <input name="date" required type="date"
												class="form-control" id="inputPassword4">
										</div>

                                        <div class="col-md-12">
											<label for="inputPassword4" class="form-label">Enter Details
												 </label> <textarea name="detailed" width="10%" height="40%" required type="text"
												class="form-control" id="inputPassword4"></textarea>
										</div>

										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Total Amount
												 </label> <input name="total_amount"   id="m_name" required type="number"
												class="form-control" id="inputPassword4">
										</div>

                                        <div class="col-md-6">
											<label for="inputPassword4" class="form-label">Submit Amount
												 </label> <input name="submit_amount"   id="m_name" required type="number"
												class="form-control" id="inputPassword4">
										</div>

										<div class="col-12 text-center">
											<button type="submit" name="misce_submit" class="btn btn-outline-success">Submit</button>
										</div>
									</form>
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