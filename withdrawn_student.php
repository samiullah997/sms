<?php
include('cruds/insert.php');
if($_SESSION['firstname']==""){
    header("location:login.php");
}
$null="";

 if(isset($_POST['search'])){
	$null="";
	$search_admissionNO = $_POST['search_admission'];
	$search_admissionNO=preg_replace("#[^0-9a-z]#i","",$search_admissionNO);
	$query="SELECT * From `students` where `admission_no` LIKE '%$search_admissionNO%' AND `class_from_withdrawn`!='$null' or first_name LIKE '%$search_admissionNO%' AND `class_from_withdrawn`!='$null' or last_name LIKE '%$search_admissionNO%' AND `class_from_withdrawn`!='$null'  ";
	$all_students=mysqli_query($con,$query); 
	
}
else{
	$all_students = mysqli_query($con,"select * from students WHERE `class_from_withdrawn`!='$null' order by id ");

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
					th:text="${semester}+' '+'Semester Result List'">Withdrawn Students
				Record</theader>
				<form method="post">
				<div class="container row">
					<div class="col-md-10"><input type="text" class="form-control "  name="search_admission" placeholder="Search By Student Admission NO And Name Here...!">
				</div>
				<div class="col-md-2">
				<button type="submit" name="search" class="btn btn-outline-success">Search</button>
				</div>
				</div>
				</form>
				<thead>
					<tr>
                        <th scope="col">Profile</th>
						<th scope="col">Admission No</th>
						<th scope="col">Student Name</th>
						<th scope="col">Father Name</th>
						<th scope="col">Class Withdrawn</th>
						<th scope="col">Withdrawn Date</th>
                        <th scope="col">Remarks</th>
					</tr>
				</thead>
				<tbody>
                <?php while($row = mysqli_fetch_array($all_students)) {?>
					<tr >

                        <td ><img style="width: 50px; height: 50px;" src="images/student Images/<?php echo $row['image'];?>" alt=""></td>
						<td ><?php echo $row['admission_no'];?></td>
						<td ><?php echo $row['first_name'].' '.$row['last_name'];?></td>
						<td ><?php echo $row['father_name'];?></td>
						<td ><?php echo $row['class_from_withdrawn'];?> </td>
                        <td ><?php echo $row['date_of_withdrawn'];?></td>
                        <td ><?php echo $row['remarks'];?></td>
					</tr>
                    <?php };?>
				</tbody>
			</table>
                
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