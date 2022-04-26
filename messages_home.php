<?php
include('cruds/insert.php');
if($_SESSION['firstname']==null){
    header("location:login.php");
}
$type=$_GET['type'];
if($type=='Teachers'){
	$result=mysqli_query($con,"Select * from teachers order by id");
}
if($type=='Parents'){
	$null="";
	$result = mysqli_query($con,"select * from students WHERE `class_from_withdrawn`='$null' order by id ");
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
			<a href="message_category.php" class="item item-select " >Messages</a>
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

    <div class="container text-center "
			style="font-size: 15px; margin-bottom: 50px;">
			<div  class="alert" role="alert">
				<p><?php if(isset($msg)){
                    echo $msg;
                }?></p>
				
			</div>
        <form method="post">
        <div class="card">
        <div class="col-md-12 container">
        <label for="inputPassword4" class="form-label"><h4>Type Your Message</h4>
		<?php $details=curl_init('https://secure.h3techs.com/sms/api/balance?email=hamzakhan143341@gmail.com&key=0872409f53ee931adf852147221d7acfba');
		curl_setopt($details, CURLOPT_POST, true);
		$response=curl_exec($details);
		echo $response;?>
            </label> <textarea name="message" placeholder="Type Your Message Here" width="10%" row="20"  height="50%" required type="text"
                class="form-control" id="inputPassword4"></textarea>
        </div>
        <div class="row  card-header">
					
                    <div class="col-sm-12 text-center "><h3 >Message Sent To <?php echo $_GET['type'];?></h3></div>
            </div>
            <table class="table rTable caption-top">
            <thead>
                <tr>
                    <th scope="col">Select</th>
                    <th scope="col">Names</th>
                    <th scope="col">Phone</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_array($result)) {?>
                <tr >

                    <td ><input type="checkbox" checked name="phone[]" value="<?php echo $row['phone']?>" ></td>
                    <td ><?php echo $row['father_name'];?><?php echo $row['name'];?></td>
                    <td ><?php echo $row['phone'];?></td>
                    
    
                </tr>
                <?php };?>
            </tbody>
        </table>
                <div class="text-center">
                    <input class="btn btn-outline-primary mb-2" type="submit" name="message_send" value="Send">
                </div>
        </form>
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