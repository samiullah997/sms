<?php include('cruds/insert.php');
     include('include/header.php');
     $admissionNO=$_GET['admission_no'];
     $class=$_GET['class'];
     $all_result = mysqli_query($con,"SELECT * from dmc_records WHERE `admission_no`= '$admissionNO'  and `class`='$class' order by id ");
     $student_record=mysqli_query($con,"SELECT * from students where `admission_no`='$admissionNO'");
     $student_record_array=mysqli_fetch_array($student_record);


     $all_Total_marks_sum = mysqli_query($con,"SELECT SUM(`total_marks`) As `totalmarks` FROM `dmc_records`   WHERE `admission_no`= '$admissionNO'  and `class`='$class'");
     $all_Total_marks_sum_result = mysqli_fetch_array($all_Total_marks_sum);

     $all_obtained_marks_sum = mysqli_query($con,"SELECT SUM(`obtained_marks`) As `obtainedmarks` FROM `dmc_records`   WHERE `admission_no`= '$admissionNO'  and `class`='$class'");
     $all_obtianed_marks_sum_result = mysqli_fetch_array($all_obtained_marks_sum);
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
    <div class="container text-center">
        <div class="card">
            <div class="container text-center" style="width: 1000px;height: 1300px;">
                <div class="dmc_header " style="background-image: url('images/DMC.png'); background-size:cover; margin-top:60px;">
                    <img  src="images/student Images/<?php echo $student_record_array['image']?>" alt="" style="width: 100px;height: 130px; margin-top: 200px; margin-left: 580px; radius: 30px;" >
                </div>
                    <h3 class="mt-3">Admission No: <strong><?php echo $_GET['admission_no'];?></strong></h3>
                    <h2 class="text-black bold" style=""> DETAILS MARKS CERTIFICATE </h2>
                <div>
                    <h2> <span><strong><u><?php echo $student_record_array['first_name'].' '.$student_record_array['last_name'];?></u></strong></span> <span>SON/Daughter of</span> <span><strong><u><?php echo $student_record_array['father_name']?></u></strong></span></h2>
                </div>

            <div class="table text-center">
                <table class="table table-bordered caption-top">
				    <theader colspan="10"
					    style="margin-top:10px;margin-right:50px; font-size:30px;font-family:bold;"
					><?php echo 'Class '.$class.' '; ?>Student
				    DMC</theader>
				    <thead>
					    <tr>
                            <th scope="col">Subjects</th>
						    <th scope="col" colspan="4">Total Marks</th>
						    <th scope="col" colspan="4">Obtained Marks</th>
						</tr>
				    </thead>
				<tbody>
                <?php while($row = mysqli_fetch_array($all_result)) {?>
					<tr >

						<td style="text-align:left;" ><?php echo $row['subject_name'];?></td>
						<td colspan="4" ><?php echo $row['total_marks'];?></td>
						<td colspan="4"><?php echo $row['obtained_marks'];?></td>
						
					</tr>
                    <?php };?>
                    <tr>
                        <td></td>
                        <th colspan="4">Total Marks: <?php echo $all_Total_marks_sum_result['totalmarks'];?></th>
                        <th colspan="" >Obtained Marks: <?php echo $all_obtianed_marks_sum_result['obtainedmarks'];?></th>
                    </tr>
                    
                    
                    
				    </tbody>
			    </table>
                    <div class="" style="text-align:right;margin-right:10px; margin-top:50px;">
                    <h5 ><strong>Percentage: <?php echo round(($all_obtianed_marks_sum_result['obtainedmarks']*100)/$all_Total_marks_sum_result['totalmarks'],1).'%';?></strong></h5>

                    </div>
                    <div class="" style="text-align:left; margin-top:50px;">
                    <h5 ><strong>Admission No: <?php echo $_GET['admission_no'];?></strong></h5>

                    </div>

                   <div class="row " style="text-align:left; margin-top:60px;">
                   <div class="col-md-5" >
                    <h5 >Checked By: _______________</h5></div>
                    <div class="col-md-5" >
                    <h5 >Principal Sign: _______________</h5></div>
                   </div>

                    
                    <div class="" style="text-align:left; margin-top:10px;">
                    <h5 ><strong>Date of Issue: <?php echo date("d/m/Y");?></strong></h5>

                    </div>
                </div>
             </div>
            </div>
        </div>

    <?php include('include/footer.php');?>
    
</body>
</html>