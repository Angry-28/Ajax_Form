<?php 
 
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'ajax';

	$conn = mysqli_connect($servername,$username,$password,$db);

	extract($_POST);

	if (isset($_POST['Name']) && isset($_POST['Email']) && isset($_POST['Username']) && isset($_POST['Password']) && isset($_POST['Phone']))
	{
		// code...
	$sql = "INSERT INTO ajaxf(Name, Email, Username, Password, Phone) VALUES ('".$Name."','".$Email."','".$Username."','".$Password."','".$Phone."')";

	$result = mysqli_query($conn,$sql);

	if ($result) {
		// code...
		echo "data added successfully";
		header("location:index.php");
	}else{
		echo "Some error occured";
	}

	}
	//display data 
	if (isset($_POST['readrecord'])) {
		// code...
		$data = '<table class = "table table-bordered table-striped">
						<tr>
						<th>No.</th>
						<th>Name</th>
						<th>Email</th>
						<th>Username</th>
						<th>Password</th>
						<th>Phone</th>
						<th>Edit</a></th>
						<th>Delete</th>
						</tr>';

		$display = "SELECT * FROM ajaxf";
		$query = mysqli_query($conn,$display);

		$nrow = mysqli_num_rows($query);

		if ($nrow >0 ) {
			// code...
			$number = 1;
			while($nrow = mysqli_fetch_array($query)){

				$data .='<tr>
				<td>'.$number.'</td>
				<td>'.$nrow['Name'].'</td>
				<td>'.$nrow['Email'].'</td>
				<td>'.$nrow['Username'].'</td>
				<td>'.$nrow['Password'].'</td>
				<td>'.$nrow['Phone'].'</td>
				<td><button onclick = "Userdetail('.$nrow['Id'].')" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Edit</button></td>
				<td><button onclick = "DeleteUser('.$nrow['Id'].')" class="btn btn-danger" >Delete</button></td>
				</tr>';

				$number++;
			}
		}
		$data .='</table>';
		echo $data;


	}

	//delete user details
if(isset($_POST['deleteid'])){
	$userid = $_POST['deleteid'];
	$delquery = "DELETE FROM ajaxf WHERE Id = '$userid' ";
	mysqli_query($conn,$delquery);
}


/////get user id for update
if(isset($_POST['Id']) && isset($_POST['Id']) != "")
{
	$user_id = $_POST['Id'];
	$query = "SELECT * FROM ajaxf WHERE Id = '$user_id'";
	if (!$result = mysqli_query($conn,$query)) {
		// code...
		exit(mysqli_error());
	}
	$response = array();

	if (mysqli_num_rows($result) > 0 ) {
		// code...
		while ($rrow = mysqli_fetch_assoc($result)) {
			// code...
			$response = $rrow;
		}
	}
	else{
		$response['status'] = 200;
		$response['message'] = "Data Not Found";
	}
	echo json_encode($response);
}
else{
	$response['status'] = 200;
	$response['message'] = "Invalid request";

}
////Update tabel
if (isset($_POST['uhidden_user_id'])) {
	// code...
	$uhidden_user_id = $_POST['uhidden_user_id'];
	$uName = $_POST['uName'];
	$uEmail = $_POST['uEmail'];
	$uUsername = $_POST['uUsername'];
	$uPassword = $_POST['uPassword'];
	$uPhone = $_POST['uPhone'];

	$query = "UPDATE ajaxf SET `Name`='$uName',`Email`='$uEmail',`Username`='$uUsername',`Password`='$uPassword',`Phone`='$uPhone' WHERE Id = '$uhidden_user_id'";

	mysqli_query($conn,$query);
}

	
 	
?>