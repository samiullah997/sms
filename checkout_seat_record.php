<?php
include('cruds/insert.php');
if($_SESSION['firstname']==null){
    header("location:login.php");
}
$null="";
 $all_issued_seats = mysqli_query($con,"SELECT * from seat_issued where check_out_date != '$null' ");

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
			<p>Shrums Tech</p>
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
					
						<div class="col-sm-12 "><h3 >Student Check Out Seats Records</h3></div>
                       
				</div>
                <table class="table rTable caption-top">
				<thead>
					<tr>
                        
                        <th scope="col">Id</th>
						<th scope="col">Student Name</th>
						<th scope="col">Vehicle Name</th>
						<!-- <th scope="col">Seat No</th> -->
                        <th scop="col">Checkout-Date</th>
						<!-- <th scope="col" colspan="2">Action</th> -->
                        <!-- <th scope="col">withdrawn</th> -->
					</tr>
				</thead>
				<tbody>
                <?php while($row = mysqli_fetch_array($all_issued_seats)) {?>
					<tr >
						<td ><?php echo $row['s_id'];?></td>
						<td ><?php echo $row['s_name'];?></td>
						<td ><?php echo $row['v_name'];?></td>
						<!-- <td ><?php echo $row['seat_no'];?></td> -->
                        <td ><?php echo $row['check_out_date'];?></td>
                        
						<!-- <td > <?php if($row['status']!="Assigned"){?> <a href=""	data-bs-toggle="modal" data-bs-target="#checkout"
                        class="badge bg-primary rounded-pill" onclick="checkout('<?php echo $row['id'];?>',
                        '<?php echo $row['s_name'];?>','<?php echo $row['v_name'];?>',
						'<?php echo $row['v_id'];?>')" style="text-decoration:none;" >Check Out</a>
						<?php }else{
							?>
								<p class="badge bg-success rounded-pill">Check Out</p>
							<?php
						}?>
						</td> -->
                       
                
                        <!-- <td ><a href=""	data-bs-toggle="modal" data-bs-target="#withdrawn"  
                        class="badge bg-success rounded-pill" onclick="withdrawn('<?php echo $row['id'];?>','<?php echo $row['first_name'].' '.$row['last_name'];?>')" style="text-decoration:none;" >withdrawn</a></td> -->
					</tr>
                    <?php };?>
				</tbody>
			</table>
                
        </div>

            <!-- Add Check Out Modal -->
        <div class="modal fade" id="checkout" tabindex="-1"
			    aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Check Out</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>

					<div class="modal-body">

						<div class="card">
							<div class="container card-header text-center">
								<h2>Checkout</h2>
							</div>
							<div class="card-body">

									<form class="row g-3" action="#" method="POST" >
										<input type="hidden" name="v_id" id="v_id">
										<div class="col-md-6">
											<label for="inputEmail4" class="form-label">Seat
												Id</label> <input name="id" readonly id="s_id" required type="text"
												class="form-control" id="inputEmail4">
										</div>
										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Student
												Name </label> <input name="s_name" readonly  id="s_name" required type="text"
												class="form-control" id="inputPassword4">
										</div>
										<div class="col-md-6">
											<label for="inputPassword4" class="form-label">Vehicle
												Name </label> <input name="ve_name" readonly  id="ve_name" required type="text"
												class="form-control" >
										</div>


										<div class="col-md-6">
											<label for="inputDepartment" class="form-label">Check out
												Type</label> <input name="date" required type="date"
												class="form-control" id="inputPassword4">
										</div>

										<div class="col-12 text-center">
											<button type="submit" name="check_out_submit" class="btn btn-outline-primary">Check Out</button>
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