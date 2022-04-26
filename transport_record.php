<?php
include('cruds/insert.php');
if($_SESSION['firstname']==null){
    header("location:login.php");
}
$null="";
 $all_vehicles = mysqli_query($con,"select * from vehicles order by id ");

 $all_students = mysqli_query($con,"select * from students order by id ");

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
            <a href="student_record.php" class="item" >Students Records</a>
            <a href="teacher_record.php" class="item" >Teachers Records</a>
            <a href="transport_home.php" class="item item-select" >Transportation</a>
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
			
					<div class="row  card-header">
					
						<div class="col-sm-9 "><h3 >Vehicles Records</h3></div>
                        <div class="col-sm-2"><input type="button" data-bs-toggle="modal" data-bs-target="#addVehicles" id="addbtn" class="btnadd btn btn-outline-primary"
						 value="Add Vehicle Details"/></div>
				</div>
                <table class="table rTable caption-top">
				<thead>
					<tr>
                        <th scope="col">Profile</th>
                        <th scope="col">Name</th>
						<th scope="col">Serial No</th>
						<th scope="col">Model No</th>
						<th scope="col">Total Seats</th>
                        <th scop="col">Reg-Date</th>
						<th scope="col" colspan="2">Action</th>
                        <!-- <th scope="col">withdrawn</th> -->
					</tr>
				</thead>
				<tbody>
                <?php while($row = mysqli_fetch_array($all_vehicles)) {?>
					<tr >

                        <td >
							<?php if($row['image']!=null){?>
							<img style="width: 50px; height: 50px;" src="images/vehicles Image/<?php echo $row['image'];?>" alt="">
							<?php }else{?>
								<img style="width: 50px; height: 50px;" src="images/vehicles Image/default.png" alt="">
								<?php }; ?>
						</td>
						<td ><?php echo $row['name'];?></td>
						<td ><?php echo $row['id'];?></td>
						<td ><?php echo $row['model_no'];?></td>
						<td ><?php echo $row['total_seats']."/".$row['seat_issued'];?></td>
                        <td ><?php echo $row['reg_date'];?></td>
                        
						<td > <?php if($row['status']!="Assigned"){?> <a href=""	data-bs-toggle="modal" data-bs-target="#assignDriver"
                        class="badge bg-primary rounded-pill" onclick="assignDriver('<?php echo $row['id'];?>',
                        '<?php echo $row['name'];?>','<?php echo $row['salary'];?>')" style="text-decoration:none;" >Assign To Driver</a>
						<?php }else{
							?>
								<p class="badge bg-success rounded-pill">Vehicle Assigned</p>
							<?php
						}?>
						</td>
                        <td ><?php if($row['total_seats']!=$row['seat_issued']){?>
							 <a href=""data-bs-toggle="modal" data-bs-target="#seatIssued"
                    		 onclick="seatIssued('<?php echo $row['id'];?>',
                        '<?php echo $row['name'];?>','<?php echo $row['seat_issued']+1;?>')" style="text-decoration:none;"
                        class="badge bg-primary rounded-pill"  style="text-decoration:none;" >Issue Seat</a>
					<?php }else{
						?>
						<p class="badge bg-success rounded-pill">Seats Full</p>
						<?php
					};?>
					
					</td>
                
                        <!-- <td ><a href=""	data-bs-toggle="modal" data-bs-target="#withdrawn"  
                        class="badge bg-success rounded-pill" onclick="withdrawn('<?php echo $row['id'];?>','<?php echo $row['first_name'].' '.$row['last_name'];?>')" style="text-decoration:none;" >withdrawn</a></td> -->
					</tr>
                    <?php };?>
				</tbody>
			</table>
                
        </div>

<!-- Add Vehicles Record Modal -->
        <div class="modal fade" id="addVehicles" tabindex="-1"
			aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add Vehicle
							Records</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>

					<div class="modal-body">

						<div class="card">
							<div class="container card-header text-center">
								<h2>Vehicle Records</h2>
							</div>
							<div class="card-body">

									<form class="row g-3" action="#" method="POST" enctype="multipart/form-data">
										
                                    <div class="col-md-6">
											<label for="inputEmail4" class="form-label">Choose Image
												</label> <input  name="image" id="name"  type="file"
												class="form-control" id="inputEmail4">
										</div>
										<div class="col-md-6">
											<label for="inputEmail4" class="form-label">Vehicle Name
												</label> <input  name="vehicle_name" id="name" required type="text"
												class="form-control" id="inputEmail4">
										</div>
										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Model No
												 </label> <input  name="model_no" id="name" required type="text"
												class="form-control" id="inputPassword4">
										</div>

                                        <div class="col-md-6">
											<label for="inputPassword4" class="form-label">Total Seats
												 </label> <input name="total_seats" required type="number"
												class="form-control" id="inputPassword4">
										</div>

                                        <div class="col-md-6">
											<label for="inputPassword4" class="form-label">Registration Date
												 </label> <input name="date" required type="date"
												class="form-control" id="inputPassword4">
										</div>

                                        
										<div class="col-12 text-center">
											<button type="submit" name="vehicle_submit" class="btn btn-outline-primary">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

            <!-- Add Assign To Driver Modal -->
        <div class="modal fade" id="assignDriver" tabindex="-1"
			    aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Assign To Driver</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>

					<div class="modal-body">

						<div class="card">
							<div class="container card-header text-center">
								<h2>Assign</h2>
							</div>
							<div class="card-body">

									<form class="row g-3" action="#" method="POST" >

										<div class="col-md-6">
											<label for="inputEmail4" class="form-label">Vehicle
												Id</label> <input name="id" readonly id="v_id" required type="text"
												class="form-control" id="inputEmail4">
										</div>
										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Vehicle
												Name </label> <input name="v_name" readonly  id="v_name" required type="text"
												class="form-control" id="inputPassword4">
										</div>

                                        <div class="col-md-6">
											<label for="inputPassword4" class="form-label">Driver Name
												 </label> <input name="d_name" required type="text"
												class="form-control" id="t_salary">
										</div>

										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Driver Address
												 </label> <input name="d_address" required type="text"
												class="form-control" id="t_salary">
										</div>

										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Driver Contact
												 </label> <input name="d_contact" required type="number"
												class="form-control" id="t_salary">
										</div>

										<div class="col-md-6">
											<label for="inputDepartment" class="form-label">Date Of Assign
												</label> <input name="date" required type="date"
												class="form-control" id="inputPassword4">
										</div>

										<div class="col-12 text-center">
											<button type="submit" name="assign_submit" class="btn btn-outline-primary">Assign</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

             <!-- Seat Issued To Student Modal -->
        <div class="modal fade" id="seatIssued" tabindex="-1"
			    aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Seat Issued 
							Records</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>

					<div class="modal-body">

						<div class="card">
							<div class="container card-header text-center">
								<h2>Seat Issued Records</h2>
							</div>
							<div class="card-body">

									<form class="row g-3" action="#" method="POST" >

										<div class="col-md-6">
											<label for="inputEmail4" class="form-label">Vehicle
												Id </label> <input name="ve_id" readonly id="ve_id" required type="text"
												class="form-control" id="inputEmail4">
										</div>
										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Vehicle
												Name </label> <input name="ve_name" readonly  id="ve_name" required type="text"
												class="form-control" id="inputPassword4">
										</div>
										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Seat Number
												 </label> <input name="seat_no" readonly  id="seat_no" required type="number"
												class="form-control" id="inputPassword4">
										</div>

                                        <div class="col-md-6">
											<label for="inputPassword4" class="form-label">Select Student
												</label> <select name="s_id" id="inputState" required
												class="form-select">
												<option selected disabled>Choose...</option>
												<?php while($row_students = mysqli_fetch_array($all_students)) {?>
													<option value="<?php echo $row_students['id'] ?>" ><?php echo $row_students['first_name'].' '.$row_students['last_name'].'('.$row_students['class'].')';?></option>
													<?php };?>
                                            
											</select>
										</div>

										<div class="col-md-12 text-center">
											<label for="inputDepartment" class="form-label">
												<h3>Transport Fee</h3>
												</label> 
										</div>

										<div class="col-md-6">
											<label for="inputDepartment" class="form-label">Total Fee
												</label> <input name="total_fee" required type="number"
												class="form-control" id="inputPassword4">
										</div>

										<div class="col-md-6">
											<label for="inputDepartment" class="form-label">Submited Fee
												</label> <input name="submited_fee" required type="number"
												class="form-control" id="inputPassword4">
										</div>

                                        <div class="col-md-6">
											<label for="inputDepartment" class="form-label">Date
												</label> <input name="date" required type="date"
												class="form-control" id="inputPassword4">
										</div>


										<div class="col-12 text-center">
											<button type="submit" name="seat_issued_submit" class="btn btn-outline-primary">Issue Seat</button>
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