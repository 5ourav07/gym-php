<?php
    session_start();

    if(!isset($_SESSION['flag'])){
        header("location: ../controllers/loginCheck.php");
    }

    	require_once('../models/show_details.php');
    	require_once('../models/UserModel.php');

	$statement=showMemberDetails();

	if(isset($_POST['update_mem_btn'])){

		$user = [	
					'MEM_ID'=>$_POST['MEM_ID'],
					'MEM_NAME'=>$_POST['MEM_NAME'], 
					'MEM_ADDRESS'=>$_POST['MEM_ADDRESS'], 
					'MEM_GENDER'=>$_POST['MEM_GENDER'], 
					'MEM_EMAIL'=>$_POST['MEM_EMAIL'], 
					'MAN_ID'=>$_POST['MAN_ID'],
					'P_ID'=>$_POST['P_ID'], 
					'T_ID'=>$_POST['T_ID'],
					'B_ID'=>$_POST['B_ID'],    
				];
					
		 $status = AddMemberInsertData($user);

		if($status){

			?>
				<script type="text/javascript">
					alert('Inserted data in database');
				</script>
			<?php
			header('location: member_details.php');
			
		}else{

			?>
				<script type="text/javascript">
					alert('Connection error');
				</script>
			<?php
		}
	}
?>
<!-- ============================================================ -->
<?php 
    $title= "edit-member";
    require_once('../includes/manager_header.php');
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update Member</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">

    <a href="../views/member_details_for_manager.php"><button type="button">Back</button></a>
	<a href="../controllers/logout.php"><button type="button" onclick="alert('Are you sure..?')">logout</button></a>

<!-- ========================================================= -->

<h1 style="text-align:center;color:black"><em>Member Information</em></h1>
  
<form name="MemberForm" action="addMember.php" method="POST" >
	<center>
	<fieldset style="width: 40%; border:2px solid black;" >
	    <table>
	      	<tr>
				<td><label>MEMBER NAME :</label> </td>
				<td><input type="text" id="mem_name" name="mem_name" value=""></td>
			
			</tr>
			<br>
			
			<tr>
		   	   <td><label>MEMBER ADDRESS:</label></td>
		   	   <td><input type="text" id="address" name="address" value=""></td>
		   </tr>
		   
		   <tr>
				<td> <label>Gender:</label></td>
				<td><input type="radio" name="gender"
	            <?php if (isset($gender) && $gender=="male") echo "checked";?>
	             value="male">Male
	             <input type="radio" name="gender"
	             <?php if (isset($gender) && $gender=="female") echo "checked";?>
	             value="female">Female</td>
			</tr>
			
		 	
		 	<tr>
		   	   <td><label>EMAIL:</label></td>
		   	   <td><input type="text" id="email" name="email" value=""></td>
		    </tr>
		     		
		    <tr>
		   	   <td><label>MANAGER ID:</label></td>
		   	   <td><input type="text" id="man_id" name="man_id" value=""></td>
		    </tr>
		     	
		    <tr>
		   	   <td><label>PAYMENT ID:</label></td>
		   	   <td><input type="text" id="p_id" name="p_id" value=""></td>
		    </tr>
		     	
		    <tr>
		   	   <td><label>TRAINER ID:</label></td>
		   	   <td><input type="text" id="t_id" name="t_id" value=""></td>
		    </tr>
		     	
		    <tr>
		   	   <td><label>BRANCH ID:</label></td>
		   	   <td><input type="text" id="b-id" name="b_id" value=""></td>
		    </tr>
	    </table>
	</fieldset>    
	 
	</center>
	<br>
	 <center> <input type="submit" name="update_mem_btn" value="Add" style="color:tomato"></center>
</form>	
<!-- ========================================================= -->


    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">


            <!-- /.panel -->
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">

            <!-- /.panel .chat-panel -->
        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

<?php include_once('../includes/footer.php'); ?>
