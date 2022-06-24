<?php
	
	require_once('db.php');

	function showMemberDetails(){

		$conn=getConnection();
		$query="select mem_id,mem_name,mem_address,mem_gender,mem_email,man_id,t_id,b_id
				from member";
		$statement=oci_parse($conn,$query);
		oci_execute($statement);
		
		return $statement;
	}
	function showProgramDetails(){
		$conn=getConnection();
		$query="select pro_id,duration,cost from program";
        $statement=oci_parse($conn,$query);
		oci_execute($statement);
		
		return $statement;

	}
	function showBranchDetails(){
		$conn=getConnection();
		$query="select b.b_id,b.b_name,b.location,bb.b_phone,m.man_name,m.man_email
		from branch b,branch_1 bb,manager m where b.b_id=bb.b_id and b.b_id=m.b_id";
        $statement=oci_parse($conn,$query);
		oci_execute($statement);
		
		return $statement;

	}

	function showPaymentDetails(){
		$conn=getConnection();
		$query="select m.mem_name,m.mem_address,p.p_id,p.amount,p.payment_date
        from member m,payment p where m.p_id=p.p_id";
        $statement=oci_parse($conn,$query);
		oci_execute($statement);
		
		return $statement;

	}

	

	function showTrainerDetails(){

		$conn=getConnection();
		$query="select t.t_id,t.t_name,t.t_address,t.t_email,t.t_salary,b.b_name,b.location from trainer t,branch b where t.b_id=b.b_id";
		$statement=oci_parse($conn,$query);
		oci_execute($statement);
		
		return $statement;
	}
?>