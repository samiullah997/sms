<?php
include('cruds/insert.php');
if($_SESSION['firstname']==null){
    header("location:login.php");
}
$null="";
 $all_teachers = mysqli_query($con,"select * from teachers order by id desc ");

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
            <a href="teacher_record.php" class="item item-select" >Teachers Records</a>
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
			
					<div class="row  card-header">
					
						<div class="col-sm-9 "><h3 >Teachers Records</h3></div>
                        <div class="col-sm-2"><input type="button" data-bs-toggle="modal" data-bs-target="#addTeacher" id="addbtn" class="btnadd btn btn-outline-primary"
						 value="Add Teacher Record"/></div>
				</div>
                <table class="table rTable caption-top">
				<thead>
					<tr>
                        <th scope="col">Profile</th>
						<th scope="col">Serial No</th>
						<th scope="col">Name</th>
						<th scope="col">Address</th>
						<th scope="col">Contact</th>
                        <th scope="col">Salary</th>
						<th scope="col" colspan="2">Action</th>
                        <!-- <th scope="col">withdrawn</th> -->
					</tr>
				</thead>
				<tbody>
                <?php while($row = mysqli_fetch_array($all_teachers)) {?>
					<tr >

                        <td ><?php if($row['image']!=null){?>
							<img style="width: 50px; height: 50px;" src="images/teachers images/<?php echo $row['image'];?>" alt="">
							<?php }else{?>
								<img style="width: 50px; height: 50px;" src="images/teacher.png" alt="">
								<?php }; ?></td>
						<td ><?php echo $row['id'];?></td>
						<td ><?php echo $row['name'];?></td>
						<td ><?php echo $row['address'];?></td>
						<td ><?php echo $row['phone'];?></td>
                        <td ><?php echo $row['salary'];?></td>
						<td > <a href=""	data-bs-toggle="modal" data-bs-target="#addSalary"
                        class="badge bg-primary rounded-pill" onclick="addSalary('<?php echo $row['id'];?>',
                        '<?php echo $row['name'];?>','<?php echo $row['salary'];?>','<?php echo $row['salary'];?>')" style="text-decoration:none;" >Pay Salary</a></td>
                        <td > <a href="salary_record.php?id=<?php  echo $row['id'];?>"
                        class="badge bg-primary rounded-pill"  style="text-decoration:none;" >All Salaries</a></td>
                
                        <!-- <td ><a href=""	data-bs-toggle="modal" data-bs-target="#withdrawn"  
                        class="badge bg-success rounded-pill" onclick="withdrawn('<?php echo $row['id'];?>','<?php echo $row['first_name'].' '.$row['last_name'];?>')" style="text-decoration:none;" >withdrawn</a></td> -->
					</tr>
                    <?php };?>
				</tbody>
			</table>
                
        </div>

<!-- Add Teacher Modal -->
        <div class="modal fade" id="addTeacher" tabindex="-1"
			aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add Teacher
							Records</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>

					<div class="modal-body">

						<div class="card">
							<div class="container card-header text-center">
								<h2>Teacher Records</h2>
							</div>
							<div class="card-body">

									<form class="row g-3" action="#" method="POST" enctype="multipart/form-data">
										
                                    <div class="col-md-6">
											<label for="inputEmail4" class="form-label">Choose Image
												</label> <input  name="image" id="name"  type="file"
												class="form-control" id="inputEmail4">
										</div>
										<div class="col-md-6">
											<label for="inputEmail4" class="form-label">Name
												</label> <input  name="name" id="name" required type="text"
												class="form-control" id="inputEmail4">
										</div>
										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Address
												 </label> <input  name="address" id="name" required type="text"
												class="form-control" id="inputPassword4">
										</div>

                                        <div class="col-md-6">
											<label for="inputPassword4" class="form-label">Contact
												 </label> <input name="contact" required type="number"
												class="form-control" id="inputPassword4">
										</div>
                                        <div class="col-md-6">
											<label for="inputPassword4" class="form-label">Qualification
												 </label> <input name="qualification" required type="text"
												class="form-control" id="inputPassword4">
										</div>

                                        <div class="col-md-6">
											<label for="inputPassword4" class="form-label">Totol Salary
												 </label> <input name="salary" required type="number"
												class="form-control" id="inputPassword4">
										</div>

                                        <div class="col-md-6">
											<label for="inputPassword4" class="form-label">Date
												 </label> <input name="date" required type="date"
												class="form-control" id="inputPassword4">
										</div>

                                        
										<div class="col-12 text-center">
											<button type="submit" name="teacher_submit" class="btn btn-outline-primary">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

            <!-- Add Teacher Salary Modal -->
        <div class="modal fade" id="addSalary" tabindex="-1"
			    aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add Salary
							Records</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>

					<div class="modal-body">

						<div class="card">
							<div class="container card-header text-center">
								<h2>Salary Records</h2>
							</div>
							<div class="card-body">

									<form class="row g-3" action="#" method="POST" >
										<input type="hidden" name="totalSalary" id="totalSalary">
										<div class="col-md-6">
											<label for="inputEmail4" class="form-label">Teacher
												Id</label> <input name="id" readonly id="t_id" required type="text"
												class="form-control" id="inputEmail4">
										</div>
										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Teacher
												Name </label> <input name="name" readonly  id="t_name" required type="text"
												class="form-control" id="inputPassword4">
										</div>

                                        <div class="col-md-6">
											<label for="inputPassword4" class="form-label">Salary
												 </label> <input name="submitSalary" required type="number"
												class="form-control" id="submit_salary">
										</div>

										<div class="col-md-6">
											<label for="inputDepartment" class="form-label">Date Of Salary
												Type</label> <input name="date" required type="date"
												class="form-control" id="inputPassword4">
										</div>

										<div class="col-12 text-center">
											<button type="submit" name="salary_submit" class="btn btn-outline-primary">Pay Salary</button>
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

										<div class="col-md-6">
											<label for="inputEmail4" class="form-label">Student
												Roll No </label> <input name="m_id" readonly id="m_id" required type="text"
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
												<option  >Cloths</option>
                                                
											</select>
										</div>

                                        <div class="col-md-6">
											<label for="inputDepartment" class="form-label">Date
												</label> <input name="date" required type="date"
												class="form-control" id="inputPassword4">
										</div>

                                        <div class="col-md-12">
											<label for="inputPassword4" class="form-label">Enter Detailed
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
											<button type="submit" name="misce_submit" class="btn btn-outline-primary">Withdraw Student</button>
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