<?php
include('config.php');

//User Registration 
if(isset($_POST['user_submit'])){
    $username=$_POST['user_name'];
    $firstName=$_POST['first_name'];
    $lastName=$_POST['last_name'];
    $password=$_POST['password'];
    $confirmPassword=$_POST['confirm_password'];
    if($password==$confirmPassword){
        $submit_user="insert into user(username,password,firstname,lastname) VALUES('$username','$password','$firstName','$lastName')";
        $registration = mysqli_query($con,$submit_user);
        if($registration){
        $msg="User Registered Successfully";
        }else{

         }
    }else{
        $msg="Your Password Does Not Match";
    }
}

//User Login
if (isset($_POST['user_login'])) {
    $username = $_POST['user_name'];
    $password = $_POST['password'];
    $query = mysqli_query($con, "SELECT * FROM `user` WHERE `username`= '$username' AND `password`='$password'");
    $result = mysqli_fetch_assoc($query);
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['id'] = $result['id'];
        $_SESSION['username'] = $result['username'];
        $_SESSION['firstname']=$result['firstname'];
        $_SESSION['lastname']=$result['lastname'];
        $_SESSION['password']=$result['password'];
        header("location:index.php");
    } else {
        $msg = "Login Error! Kindly Check Your Credentials";
    }
}

// Student Registration
if(isset($_POST['student_register'])){

    $admissionNo=$_POST['admissionNo'];
    $class=$_POST['class'];
    $dateOfSubmission=$_POST['dateOfSubmission'];
    $dateofbirth=$_POST['dateofbirth'];
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $fatherName=$_POST['fatherName'];
    $phone=$_POST['phone'];
    $permanentAddress=$_POST['permanentAddress'];
    $maillingAddress=$_POST['maillingAddress'];
    $fatherOccupation=$_POST['fatherOccupation'];
    $fatherQualification=$_POST['fatherQualification'];
    $motherOccupation=$_POST['motherOccupation'];
    $motherQualification=$_POST['motherQualification'];
    $religion=$_POST['religion'];
    $caste=$_POST['caste'];
    $hobbies=$_POST['hobbies'];
    $sibling=$_POST['sibling'];
    $testrepost=$_POST['testrepost'];
    $serialNo=$_POST['serialNo'];
    $cnicNo=$_POST['cnicNo'];

    //    Logo
    $tmp_logo=$_FILES['image']['tmp_name'];
    if (!empty($tmp_logo)) {
        $dir1 = "images/student Images";
        $logo_name = date('ymdghsi') . $_FILES['image']['name'];
        $uploaded_file1 = move_uploaded_file($tmp_logo, $dir1 . "/" . $logo_name);
    }

    $insert_student_data = "INSERT INTO `students`(`image`, `first_name`, `last_name`, `father_name`, `p_address`, `m_address`, `phone`, `date_of_submission`, `roll_no`, `cnic`, `class`, `serial_no`, `class_from_withdrawn`, `date_of_withdrawn`, `remarks`, `date_of_birth`, `father_occupation`, `father_qualification`, `mother_occupation`, `mother_qualification`, `religion`, `caste`, `hobbies`, `sibling`, `test_report`,`admission_no`) VALUES 
    ('$logo_name','$firstName','$lastName','$fatherName','$permanentAddress','$maillingAddress','$phone','$dateOfSubmission','$rollNo','$cnicNo','$class','$serialNo','$class_from_withdrawn','$date_of_withdrawn','$remarks','$dateofbirth','$fatherOccupation','$fatherQualification','$motherOccupation','$motherQualification','$religion','$caste','$hobbies','$sibling','$testrepost','$admissionNo')";
    if (mysqli_query($con,$insert_student_data)) {
        $msg = 'Student Registered Successfully';
    } else {
        $msg = 'Error: ' . $insert_logo . ':-' . mysqli_error($con);
    }
}


// Student Fee Submition
if(isset($_POST['fee_submit'])){
    $id=$_POST['id'];
    $admissionNo=$_POST['admissionNo'];
    $name=$_POST['name'];
    $class=$_POST['class'];
    $total_fee=$_POST['total_fee'];
    $submited_fee=$_POST['submited_fee'];
    $type=$_POST['type'];
    $date=$_POST['date'];

    $submit_fee="INSERT INTO `student_fee`(`student_id`,`Name`, `class` ,`total_fee`, `submit_fee`, `fee_type`, `date`,`admission_no`) VALUES ('$id','$name','$class','$total_fee','$submited_fee','$type','$date','$admissionNo')";
        $submit = mysqli_query($con,$submit_fee);
        if($submit){
        $msg="<h2 class='badge bg-success rounded-pill'>".$type." Submitted Successfully</h2>";
        }else{

         }
}


//Student Fee Update
if(isset($_POST['fee_update'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $class=$_POST['class'];
    $total_fee=$_POST['total_fee'];
    $submited_fee=$_POST['submited_fee'];
    $type=$_POST['type'];
    $date=$_POST['date'];

    $submit_fee="UPDATE `student_fee` SET `total_fee`='$total_fee',`submit_fee`='$submited_fee',`fee_type`='$type',`class`='$class' WHERE `id`='$id'";
        $submit = mysqli_query($con,$submit_fee);
        if($submit){
        $msg="<h2 class='badge bg-success rounded-pill'>".$type." Updated Successfully</h2>";
        }else{

         }
}



// Withdrawn Student Details
if(isset($_POST['withdrawn_submit'])){
    $id=$_POST['w_id'];
    $admissionNo=$_POST['w_admisisonNo'];
    $name=$_POST['w_name'];
    $class=$_POST['class'];
    $remarks=$_POST['remarks'];
    $date=$_POST['date'];

    $all_fee_sum = mysqli_query($con,"SELECT SUM(`total_fee`) As `total_income` FROM `student_fee`  where `student_id`='$id'");
    $all_fee_sum_result = mysqli_fetch_array($all_fee_sum);
    $all_fee_sum = mysqli_query($con,"SELECT SUM(`submit_fee`) As `submited_income` FROM `student_fee` where  `student_id`='$id'");
    $all_sumbited_fee_sum_result = mysqli_fetch_array($all_fee_sum);

    if($all_fee_sum_result>$all_sumbited_fee_sum_result){
        $msg = "<h2 class='badge bg-success rounded-pill'>".$name." have need to clear his Dues.</h2>";
        header("location:fee_record.php?id=$id");
    }
    else{
    $update_student="UPDATE `students` SET `class_from_withdrawn`='$class',`date_of_withdrawn`='$date',`remarks`='$remarks' WHERE `id`='$id'";
        $submit = mysqli_query($con,$update_student);
        if($submit){
        $msg="<h2 class='badge bg-success rounded-pill'>".$name." Withdrawn Successfully</h2>";
        }else{

         }
        }

}


// Student Promotion TO Next Class
if(isset($_POST['promotion_submit'])){
    $class=$_POST['class'];
    $id=$_POST['id'];
    $date=$_POST['date'];

    $update_student="UPDATE `students` SET `class`='$class' WHERE `id`='$id'";
        $submit = mysqli_query($con,$update_student);
        if($submit){
        $msg="<h2 class='badge bg-success rounded-pill'> Student Promoted Successfully</h2>";
        header("location:dmc_record.php");
        }else{

         }
}



// Miscellaneous Record of Student like books and cloths
if(isset($_POST['misce_submit'])){
    $admissionNo=$_POST['admissionNo'];
    $id=$_POST['m_id'];
    $name=$_POST['m_name'];
    $type=$_POST['type'];
    $detailed=$_POST['detailed'];
    $date=$_POST['date'];
    $total_amount=$_POST['total_amount'];
    $submit_amount=$_POST['submit_amount'];

    $submit_misce="INSERT INTO `miscellaneous`( `student_id`,`name`, `type`, `detailed`, `date`,`total_amount`,`submit_amount`,`admission_no`)
     VALUES ('$id','$name','$type','$detailed','$date','$total_amount','$submit_amount','$admissionNo')";
        $submit = mysqli_query($con,$submit_misce);
        if($submit){
        $msg="<h2 class='badge bg-success rounded-pill'>".$type." Submited Successfully</h2>";
        }else{

         }
}


// Expenses Record Submited
if(isset($_POST['expenses_submit'])){
    $type=$_POST['exp_type'];
    $detailed=$_POST['detailed'];
    $total_amount=$_POST['total_amount'];
    $date=$_POST['date'];

    $submit_expenses="INSERT INTO `miscellaneous`( `type`, `detailed`, `date`,`total_amount`)
     VALUES ('$type','$detailed','$date','$total_amount')";
        $submit = mysqli_query($con,$submit_expenses);
        if($submit){
        $msg="<h2 class='badge bg-success rounded-pill'>".$type." Submited Successfully</h2>";
        header('location:daily_ledger.php');
        }else{

         }
}



// Teachers Registration
if(isset($_POST['teacher_submit'])){

    $name=$_POST['name'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $qualification=$_POST['qualification'];
    $salary=$_POST['salary'];
    $date=$_POST['date'];
    //    Logo
    $tmp_logo=$_FILES['image']['tmp_name'];
    if (!empty($tmp_logo)) {
        $dir1 = "images/teachers Images";
        $logo_name = date('ymdghsi') . $_FILES['image']['name'];
        $uploaded_file1 = move_uploaded_file($tmp_logo, $dir1 . "/" . $logo_name);
    }

    $insert_teachers_data = "INSERT INTO `teachers`(`image`, `name`, `address`, `phone`, `qualification`,`salary`, `date`) VALUES 
    ('$logo_name','$name','$address','$contact','$qualification','$salary','$date')";
    if (mysqli_query($con,$insert_teachers_data)) {
        $msg = 'Teacher Registered Successfully';
    } else {
        $msg = 'Error: ' . $insert_logo . ':-' . mysqli_error($con);
    }
}

//Submit Teacher Salary Record
if(isset($_POST['salary_submit'])){
    $teacher_id=$_POST['id'];
    $name=$_POST['name'];
    $type=$_POST['type'];
    $totalSalary=$_POST['totalSalary'];
    $submitSalary=$_POST['submitSalary'];
    $date=$_POST['date'];

    $submit_salary="INSERT INTO `teachers_salary`( `teacher_id`, `name`, `type`,`total_salary`,`submit_salary`, `date`)
                    VALUES ('$teacher_id','$name','$type','$totalSalary','$submitSalary','$date')";
        $submit = mysqli_query($con,$submit_salary);
        if($submit){
        $msg="<h2 class='badge bg-success rounded-pill'>".$type." Salary Submited Successfully</h2>";
        }else{

         }
}
//Teacher Salary Update
if(isset($_POST['salary_update'])){
    $id=$_POST['id'];
    $teacher_id=$_POST['teacher_id'];
    $name=$_POST['name'];
    $total_salary=$_POST['total_salary'];
    $submit_salary=$_POST['submit_salary'];
    $date=$_POST['date'];
    
    $update_Salary="UPDATE `teachers_salary` SET `submit_salary`='$submit_salary' WHERE `id`='$id'";
        $submit = mysqli_query($con,$update_Salary);
        if($submit){
        $msg="<h2 class='badge bg-success rounded-pill'>".$type." Updated Successfully</h2>";
        }else{

         }
}

//Submit Vehicles Record
if(isset($_POST['vehicle_submit'])){
    $vehicle_name=$_POST['vehicle_name'];
    $model_no=$_POST['model_no'];
    $total_seats=$_POST['total_seats'];
    $date=$_POST['date'];

    //    Logo
    $tmp_logo=$_FILES['image']['tmp_name'];
    if (!empty($tmp_logo)) {
        $dir1 = "images/vehicles Image";
        $logo_name = date('ymdghsi') . $_FILES['image']['name'];
        $uploaded_file1 = move_uploaded_file($tmp_logo, $dir1 . "/" . $logo_name);
    }

    $submit_vehicle="INSERT INTO `vehicles`(`name`, `model_no`, `total_seats`, `reg_date`, `image`)
                     VALUES ('$vehicle_name','$model_no','$total_seats','$date','$logo_name')";
        $submit = mysqli_query($con,$submit_vehicle);
        if($submit){
        $msg="<h2 class='badge bg-success rounded-pill'>".$vehicle_name." Record Submited Successfully</h2>";
        }else{

         }
}

//Assign Vehicles to Driver 
if(isset($_POST['assign_submit'])){
    $vehicle_id=$_POST['id'];
    $v_name=$_POST['v_name'];
    $d_name=$_POST['d_name'];
    $d_address=$_POST['d_address'];
    $d_contact=$_POST['d_contact'];
    $date=$_POST['date'];

    // //    Logo
    // $tmp_logo=$_FILES['image']['tmp_name'];
    // if (!empty($tmp_logo)) {
    //     $dir1 = "images/vehicles Image";
    //     $logo_name = date('ymdghsi') . $_FILES['image']['name'];
    //     $uploaded_file1 = move_uploaded_file($tmp_logo, $dir1 . "/" . $logo_name);
    // }

    

        $update_vehicle="UPDATE `vehicles` SET `status`='Assigned' WHERE `id`='$vehicle_id'";
        $update = mysqli_query($con,$update_vehicle);
        if($update){
            $assign_vehicle="INSERT INTO `driver_details`(`name`, `Address`, `contact`, `date`, `v_id`, `v_name`)
            VALUES ('$d_name','$d_address','$d_contact','$date','$vehicle_id','$v_name')";
            $submit = mysqli_query($con,$assign_vehicle);
            if($submit){
            $msg="<h2 class='badge bg-success rounded-pill'>Vehicle Assign to ".$d_name." Successfully</h2>";
            }else{
    
             }
        }else{

        }

       
}

//Seat Submited to Student 
if(isset($_POST['seat_issued_submit'])){
    $ve_id=$_POST['ve_id'];
    $ve_name=$_POST['ve_name'];
    $seat_no=$_POST['seat_no'];
    $total_fee=$_POST['total_fee'];
    $submited_fee=$_POST['submited_fee'];
    $s_id=$_POST['s_id'];
    $d_contact=$_POST['d_contact'];
    $date=$_POST['date'];

    
    $student_record = mysqli_query($con,"SELECT * FROM `students` WHERE `id`= '$s_id'");
    $student_record_array = mysqli_fetch_array($student_record); 
    $s_name=$student_record_array['first_name'].' '.$student_record_array['last_name'];
    $admissionNo=$student_record_array['admission_no'];
        $update_vehicle="UPDATE `vehicles` SET `seat_issued`='$seat_no' WHERE `id`='$ve_id'";
        $update = mysqli_query($con,$update_vehicle);
        if($update){
            $seat_issued="INSERT INTO `seat_issued`( `v_id`, `v_name`, `s_id`, `seat_no`, `date`,`s_name`,`admission_no`) 
            VALUES ('$ve_id','$ve_name','$s_id','$seat_no','$date','$s_name','$admissionNo')";
            $submit = mysqli_query($con,$seat_issued);
            if($submit){
                $type="Transport Fee";
                $submit_fee="INSERT INTO `student_fee`(`student_id`,`Name` ,`total_fee`, `submit_fee`, `fee_type`, `date`,`admission_no`) 
                VALUES ('$s_id','$s_name','$total_fee','$submited_fee','$type','$date','$admissionNo')";
                $fee_submit = mysqli_query($con,$submit_fee);
                if($fee_submit){
            $msg="<h2 class='badge bg-success rounded-pill'>Seat Number ".$seat_no." is issued to ".$s_name." Successfully</h2>";
            }    
        }else{
    
             }
        }else{

        }

       
}


//Submit check out deteils
if(isset($_POST['check_out_submit'])){
    $v_id=$_POST['v_id'];
    $checkout_id=$_POST['id'];
    $s_name=$_POST['s_name'];
    $ve_name=$_POST['ve_name'];
    $checkout_date=$_POST['date'];
    
    $all_vehicles = mysqli_query($con,"select * from vehicles where `id`='$v_id'");
    $all_vehicles_result = mysqli_fetch_array($all_vehicles);
    $seat_issued=$all_vehicles_result['seat_issued']-1;

    $update_vehicle_seate_Issued="UPDATE `vehicles` SET `seat_issued`='$seat_issued' WHERE `id`='$v_id'";
    $update_v_s_i = mysqli_query($con,$update_vehicle_seate_Issued);
    if($update_v_s_i){
        $udpate_checkout_date="UPDATE `seat_issued` SET `check_out_date`='$checkout_date' WHERE `id`='$checkout_id'";
        $submit = mysqli_query($con,$udpate_checkout_date);
        if($submit){
        $msg="<h2 class='badge bg-success rounded-pill'>Student ".$s_name." Check Out Successfully</h2>";
        }else{

         }    }else{

     }
       
}

//Submit check out Driver Vehicle
if(isset($_POST['checkout_driver_submit'])){
    $v_id=$_POST['v_id'];
    $checkout_id=$_POST['id'];
    $s_name=$_POST['s_name'];
    $v_name=$_POST['v_name'];
    $checkout_date=$_POST['date'];

    $update_vehicle_seate_Issued="UPDATE `vehicles` SET `status`='Not Assign' WHERE `id`='$v_id'";
    $update_v_s_i = mysqli_query($con,$update_vehicle_seate_Issued);
    if($update_v_s_i){
        $udpate_checkout_date="UPDATE `driver_details` SET `check_out_date`='$checkout_date' WHERE `id`='$checkout_id'";
        $submit = mysqli_query($con,$udpate_checkout_date);
        if($submit){
        $msg="<h2 class='badge bg-success rounded-pill'>Student ".$v_name." Check Out Successfully</h2>";
        }else{

         }    }else{

     }
       
}

if(isset($_POST['dmc_submit'])){
    $s_id=$_POST['s_id'];
    $class=$_POST['class'];
    $admissionNo=$_POST['admissionNo'];
    $name=$_POST['name'];
    $subject_name=$_POST['subject_name'];
    $total_marks=$_POST['total_marks'];
    $obtained_marks=$_POST['obtained_marks'];
    $date=$_POST['date'];

    $query="INSERT INTO `dmc_records`(`s_id`, `name`, `admission_no`, `subject_name`, `total_marks`, `obtained_marks`, `date`,`class`) 
    VALUES ('$s_id','$name','$admissionNo','$subject_name','$total_marks','$obtained_marks','$date','$class')";
    $submit=mysqli_query($con,$query);
    if($submit){
        $msg="<h2 class='badge bg-success rounded-pill'>DMC Record Inserted Successfully</h2>";
    }else{
        $msg="somthing went Wrong";
    }
}


if(isset($_POST['dmc_update'])){
    $s_id=$_POST['id'];
    $class=$_POST['class'];
    $admissionNo=$_POST['admissionNo'];
    $name=$_POST['name'];
    $subject_name=$_POST['subject_name'];
    $total_marks=$_POST['total_marks'];
    $obtained_marks=$_POST['obtained_marks'];
    $date=$_POST['date'];

    $query="UPDATE `dmc_records` SET `subject_name`='$subject_name',`total_marks`='$total_marks',`obtained_marks`='$obtained_marks',`date`='$date'
     WHERE `id`='$s_id'";
    $submit=mysqli_query($con,$query);
    if($submit){
        $msg="<h2 class='badge bg-success rounded-pill'>DMC Record Updated Successfully</h2>";
    }else{
        $msg="somthing went Wrong";
    }
}





//Send Messages 
if(isset($_POST['message_send'])){
    $phone=$_POST['phone'];
    $message=$_POST['message'];
    $encodedMessage = urlencode($message);
    $mobile_numbers= implode('',$phone);
    $arr= str_split($mobile_numbers,'12');
    $numbers = implode(',',$arr);


        // Confedential Configuration Variables / Mandatory Variables
// Confedential Configuration Variables / Mandatory Variables
$email = "hamzakhan143341@gmail.com";
$key = "0872409f53ee931adf852147221d7acfba";
$mask1 = "Digi Alert";
$to = $numbers;

// Preparing Data to POST Request / DO NOT TOUCH BELOW
$multiple = "1";
$mask = urlencode($mask1);
$data = "email=".$email."&key=".$key."&mask=".$mask."&multiple=".$multiple."&to=".$to."&message=".$encodedMessage;
// Sending the POST Request with cURL to Branded SMS Pakistan Server
$ch = curl_init('https://secure.h3techs.com/sms/api/send');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
echo $details;
 // Result from Branded SMS Pakistan including Return ID
        // $response = curl_exec($ch); // Result from Branded SMS Pakistan including Return ID
        // curl_close($ch);


    // $authkey="9XGje0YYS7DG0BRQfefR5Uk94AIKAaa2";   /* Api key */
    // $senderId="samiullah";   /* SenderId */
    // $route =4;
    // $postData = array(
    //     'authkey'=>$authkey,
    //     'mobiles'=>$numbers,
    //     'message'=>$encodedMessage,
    //     'sender'=>$senderId,
    //     'route'=>$route
    // );
    // $url="https://secure.h3techs.com/sms/api/send";

    // $ch=curl_init();
    // curl_setopt_array($ch,array(
    //     CURLOPT_URL=>$url,
    //     CURLOPT_RETURNTRANSFER=>true,
    //     CURLOPT_POST=>true,
    //     CURLOPT_POSTFIELDS=>$postData
    // ));

    // curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
    // curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
    $response=curl_exec($ch);
    if($response ==TRUE){
        $msg="<h2 class='badge bg-success rounded-pill'>Message Sent Successfuly</h2>";
    }
    if(curl_errno($ch)){
        $msg='error: '.curl_error($ch);
    }
    curl_close($ch);

    // $update_vehicle_seate_Issued="UPDATE `vehicles` SET `status`='Not Assign' WHERE `id`='$v_id'";
    // $update_v_s_i = mysqli_query($con,$update_vehicle_seate_Issued);
    // if($update_v_s_i){
    //     $udpate_checkout_date="UPDATE `driver_details` SET `check_out_date`='$checkout_date' WHERE `id`='$checkout_id'";
    //     $submit = mysqli_query($con,$udpate_checkout_date);
    //     if($submit){
    //     $msg="<h2 class='bg-success text-white'>Student ".$v_name." Check Out Successfully</h2>";
    //     }else{

    //      }    }else{

    //  }
       
}


?>