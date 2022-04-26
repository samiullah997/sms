<?php
include('cruds/insert.php');
if($_SESSION['firstname']==null){
    header("location:login.php");
}
$null="";
$admissionNo=$_GET['admission_no'];
$class=$_GET['class'];
 $all_stuents = mysqli_query($con,"SELECT * from dmc_records where `admission_no`= '$admissionNo' and `class`= '$class' order by `admission_no` ");

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
            <a class="nav-link active " aria-current="page" href="logout.php">Logout</a>
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
            <div class="card">
            <div class="row   card-header">
					
			<div class="row  card-header">
			<div class="col-sm-2"> <a href="dmc_print.php?admission_no=<?php echo $_GET['admission_no'];?>&class=<?php echo $_GET['class'];?>"
                        class="btn btn-outline-primary" style="text-decoration:none;" >Print DMC</a></div>
					<div class="col-sm-8 "><h3 ><?php echo $_GET['class'];?> DMC Record</h3></div>
					<div class="col-sm-2"><input type="button" data-bs-toggle="modal" data-bs-target="#addDmcRecord" id="addbtn" class="btnadd btn btn-outline-primary"
					 value="Add Paper Result"/></div>
			</div>
                    
            </div>

			
			<table class="table rTable caption-top">
				
				<thead>
					<tr>
                        <th scope="col">Admission No</th>
						<th scope="col">Student Name</th>
						<th scope="col">Paper Name</th>
						<th scope="col">Total Marks</th>
                        <th scope="col">Obtained Marks</th>
						<th scope="col">Date</th>
                        <th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
                <?php while($row = mysqli_fetch_array($all_stuents)) {?>
					<tr >

						<td ><?php echo $row['admission_no'];?></td>
						<td ><?php echo $row['name'];?></td>
						<td ><?php echo $row['subject_name'];?></td>
						<td ><?php echo $row['total_marks'];?></td>
                        <td ><?php echo $row['obtained_marks'];?></td>
                        <td ><?php echo $row['date'];?></td>
						<td > <a href="" data-bs-toggle="modal" data-bs-target="#editDMCRecord"
                        class="badge bg-primary rounded-pill" style="text-decoration:none;"
						onclick="editeDMC('<?php echo $row['id'];?>','<?php echo $row['subject_name'];?>','<?php echo $row['total_marks'];?>','<?php echo $row['obtained_marks'];?>','<?php echo $row['date'];?>')" >Edit</a></td>
                        <td >
					</tr>
                    <?php };?>
				</tbody>
			</table>

			<?php if(!empty($_GET['id'])){?>
			<div class=" text-center mt-4 mb-3">
				
			 <input type="button" data-bs-toggle="modal" data-bs-target="#promotion" class="btn btn-outline-primary" value="Promote To Next Class">
		 </div>
		 <?php }; ?>
         </div>
		 
     </div>



	<!-- Student DMC Modal -->
	<div class="modal fade" id="addDmcRecord" tabindex="-1"
			    aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Student DMC Records</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

					<div class="modal-body">

						<div class="card">
							<div class="container card-header text-center">
								<h2>DMC Records</h2>
							</div>
							<div class="card-body">

									<form class="row g-3" action="#" method="POST" >
										<input type="hidden" name="s_id" id="s_id" value="<?php echo $_GET['id'];?>">
									<input type="hidden" name="class" value="<?php echo $_GET['class']; ?>">

										<div class="col-md-6">
											<label for="inputEmail4" class="form-label">Admission No
												 </label> <input name="admissionNo" readonly id="d_admissionNo" required type="text"
												class="form-control" value="<?php echo $_GET['admission_no']; ?>" id="inputEmail4">
										</div>
										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Student
												Name </label> <input name="name" value="<?php echo $_GET['name']; ?>" readonly  id="d_name" required type="text"
												class="form-control" id="inputPassword4">
										</div>

										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Suject
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
											<button type="submit" name="dmc_submit" class="btn btn-outline-success">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

        <!-- Student Add DMC Record Modal -->
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

										<div class="col-md-6">
											<label for="inputEmail4" class="form-label">Student
												Roll No </label> <input name="w_id" readonly id="w_id" required type="text"
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
                                                <option  >Nursery</option>
												<option  >Prep</option>
                                                <option  >One</option>
												<option  >Two</option>
                                                <option  >Three</option>
												<option  >Four</option>
                                                <option  >Fifth</option>
											</select>
										</div>
                                        <div class="col-md-6">
											<label for="inputPassword4" class="form-label">Remarks
												 </label> <input name="remarks" required type="text"
												class="form-control" id="inputPassword4">
										</div>

										<div class="col-md-6">
											<label for="inputDepartment" class="form-label">Date Of Withdrawn
												Type</label> <input name="date" required type="date"
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


 
	<!-- Update DMC Modal -->
	<div class="modal fade" id="editDMCRecord" tabindex="-1"
			    aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Student DMC Records</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

					<div class="modal-body">

						<div class="card">
							<div class="container card-header text-center">
								<h2>Update DMC Records</h2>
							</div>
							<div class="card-body">

									<form class="row g-3" action="#" method="POST" >
										<input type="hidden" name="id" id="d_id" value="<?php echo $_GET['id'];?>">
									<input type="hidden" name="class" value="<?php echo $_GET['class']; ?>">

										<div class="col-md-6">
											<label for="inputEmail4" class="form-label">Admission No
												 </label> <input name="admissionNo" readonly id="d_admissionNo" required type="text"
												class="form-control" value="<?php echo $_GET['admission_no']; ?>" id="inputEmail4">
										</div>
										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Student
												Name </label> <input name="name" value="<?php echo $_GET['name']; ?>" readonly  id="d_name" required type="text"
												class="form-control" id="inputPassword4">
										</div>

										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Subject
												Name </label> <input name="subject_name"   id="subject_name" required type="text"
												class="form-control">
										</div>
										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Total Marks
												 </label> <input name="total_marks"   id="total_marks" required type="text"
												class="form-control" >
										</div>

										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Obtained Marks
												 </label> <input name="obtained_marks"   id="obtained_marks" required type="text"
												class="form-control">
										</div>

										<div class="col-md-6">
											<label for="inputDepartment" class="form-label">Creation Date
												</label> <input name="date" required type="date"
												class="form-control" id="date">
										</div>

										<div class="col-12 text-center">
											<button type="submit" name="dmc_update" class="btn btn-outline-success">Update</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>



 <!-- Promted To Next Class  Modal -->
 <div class="modal fade" id="promotion" tabindex="-1"
			    aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Promoted To Next Class</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>

					<div class="modal-body">

						<div class="card">
							<div class="container card-header text-center">
								<h2>Promotion</h2>
							</div>
							<div class="card-body">
									<form class="row g-3" action="#" method="POST" >
																				
                                       
										<div class="col-md-6">
											<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
											<label for="inputDepartment" class="form-label">Current Class
												</label> <input name="current_id" readonly required type="text"
												class="form-control" id="inputPassword4" value="<?php echo $_GET['class'];?>">
										</div>
										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Choose Next Class
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


										<div class="col-12 text-center">
											<button type="submit" name="promotion_submit" class="btn btn-outline-success">Submit</button>
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