
//Set student id and name for submit fee
function addFee(admissionNo,id,name) {
	document.getElementById("admissionNo").value = admissionNo;
	document.getElementById("id").value = id;
	document.getElementById("name").value = name;
	
}

//Set student id and name for submit Withdrawn	
function withdrawn(w_admisisonNo,id,name) {
	document.getElementById("w_admisisonNo").value = w_admisisonNo;
	document.getElementById("w_id").value = id;
	document.getElementById("w_name").value = name;
	
}

//Set student id and name for submit Meciliniouse	
function addMisc(m_admissionNo,id,name) {
	document.getElementById("m_admissionNo").value = m_admissionNo;
	document.getElementById("m_id").value = id;
	document.getElementById("m_name").value = name;
}

//Update student Fee Detailed	
function updateFee(s_id,s_name,s_class,s_type,s_total_fee,s_submited_fee,s_date) {
	document.getElementById("s_id").value = s_id;
	document.getElementById("s_name").value = s_name;
	document.getElementById("s_class").value = s_class;
	document.getElementById("s_type").value = s_type;
	document.getElementById("s_total_fee").value = s_total_fee;
	document.getElementById("s_submited_fee").value = s_submited_fee;
	document.getElementById("s_date").value = s_date;
	
}



//Set Teacher id and name for submit Salary	
function addSalary(id,name,submit_salary,totalSalary) {
	document.getElementById("t_id").value = id;
	document.getElementById("t_name").value = name;
	document.getElementById("submit_salary").value = submit_salary;
	document.getElementById("totalSalary").value = totalSalary;

}
//Set Teacher id and name for submit Salary	
function assignDriver(v_id,v_name) {
	document.getElementById("v_id").value = v_id;
	document.getElementById("v_name").value = v_name;
}

//Update Teacher Salary Detailed	
function updateSalary(id,teacher_id,name,total_salary,submit_salary,date) {
	document.getElementById("id").value = id;
	document.getElementById("teacher_id").value = teacher_id;
	document.getElementById("name").value = name;
	document.getElementById("total_salary").value = total_salary;
	document.getElementById("submit_salary").value = submit_salary;
	document.getElementById("date").value = date;
	
	
}

//Seat Issued To Student 
function seatIssued(ve_id,ve_name,seat_no) {
	document.getElementById("ve_id").value = ve_id;
	document.getElementById("ve_name").value = ve_name;
	document.getElementById("seat_no").value = seat_no;
}

//Seat check out Student 
function checkout(s_id,s_name,ve_name,v_id) {
	document.getElementById("s_id").value = s_id;
	document.getElementById("s_name").value = s_name;
	document.getElementById("ve_name").value = ve_name;
	document.getElementById("v_id").value = v_id;
}

//Vehicle check out  
function checkOutDriver(id,d_name,v_name,v_id) {
	document.getElementById("id").value = id;
	document.getElementById("d_name").value = d_name;
	document.getElementById("v_name").value = v_name;
	document.getElementById("v_id").value = v_id;
}


//Set student DMC Record	
function createDMC(m_admissionNo,id,name) {
	document.getElementById("d_admissionNo").value = m_admissionNo;
	document.getElementById("s_id").value = id;
	document.getElementById("d_name").value = name;
}

//Update student DMC Record	
function editeDMC(d_id,subject_name,total_marks,obtained_marks,date) {
	document.getElementById("d_id").value = d_id;
	document.getElementById("subject_name").value = subject_name;
	document.getElementById("total_marks").value = total_marks;
	document.getElementById("obtained_marks").value = obtained_marks;
	document.getElementById("date").value = date;
}

