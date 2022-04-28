<?php 
 
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'ajax';

	$conn = mysqli_connect($servername,$username,$password,$db);

	$ViewData = "SELECT * FROM ajaxf;";
	$result = mysqli_query($conn,$ViewData);

	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title> Ajax Form Practice </title>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="text-center bg-primary text-warning "><h1>Ajax Curd Practice</h1>
			   <hr>
			</div>
			<div class="mt-3 d-flex justify-content-end">
				<hr>
				<!--<button class="btn btn-primary" style="width: 100px;" id="" onclick="create.php">create User</button>-->
				<button class="btn btn-warning " style="width: 100px;" ><a  class = "text-dark" href="create.php"><b>Create User</b></a></button>
			</div>
			
<!--update model-->
		<div class="modal fade" id="myModal" role="dialog">
    		<div class="modal-dialog">
    
      			<!-- Modal content-->
      		<div class="modal-content">
        		<div class="modal-header">
          				
          				<h4 class="modal-title text-dark ">Update User Detail</h4>
        		</div>
        		<!-- Modal body-->
        		<div class="modal-body">
          			<form class="row" action="backend.php" method="post">
						<div class="mb-3">
							<label class="text-info form-label">Name:</label>
							<input type="text" class="form-group" name="Name" id="FName" required>
						</div>
						<div class="mb-3">
							<label for="Email" class="text-info form-label">Email:</label>
							<input type="email" class="form-group" name="Email" id="FEmail" required>
						</div>
						<div class="mb-3">
							<label for="Username" class="text-info form-label">Username</label>
							<input type="text" class="form-group" name="Username" id="FUsername" pattern="[A-Za-z0-9]{6,}" required>
						</div>
						<div class="mb-3"> 
							<label  for="Password" class="text-info form-label">Password:</label>
							<input type="Password" class="form-group" name="Password" id="FPassword" pattern="[A-Za-z0-9]{8}" required>
						</div>
						<div class="mb-3">
							<label for="Phone" class="text-info form-label">Phone:</label>
							<input type="number" class="form-group" name="Phone" id="FPhone" pattern="[0-9]{10}" min="6666666666" max="9999999999" required>
						</div>
					</form>
        		</div>


        		<!-- Modal Footer-->
        		<div class="modal-footer">
        			<button type="button" class="btn btn-default" data-dismiss="modal" onclick="UpdateUserdetail()">Update</button>
          			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          			<input type="hidden" name="" id="hidden_user_id">
        		</div>
      		</div>
      </div>
  	</div>
<!--Display Records-->
			<div>
				<h1>All Records</h1>
				<hr>
			</div>
			<div id="read_contents">
				

			</div>
		</div>
	</div>
<!--Fuctions-->
	<script type="text/javascript">
		$(document).ready(function(){
			readRecords();
		});
			
			function readRecords(){
				var readrecord = "readrecord";
				$.ajax({
					url:'backend.php',
					type:'post',
					data:{

						readrecord:readrecord
					},
					success:function(data,status){
						$('#read_contents').html(data)
					}

				});
			}

			function Record()
			{
				var Name = $('Name').val();
				var Email = $('Email').val();
				var Username = $('Username').val();
				var Password = $('Password').val();
				var Phone = $('Phone').val();

				$.ajax({
					url:'backend.php',
					type:'post',
					data:{
						Name:Name,
						Email:Email,
						Username:Username,
						Password:Password,
						Phone:Phone
					},
					success:function(data,status){
						readRecords();
					}

			});
			}


		///delete 
		function DeleteUser(deleteid){
			var conf = confirm("are you sure");
			if (conf==true) {
				$.ajax({
					url:"backend.php",
					type:"post",
					data:{deleteid:deleteid },
					success:function(data,status){
						readRecords();
					}
				});
			}
		}
		///update function
		
		function Userdetail(Id){
			$('#hidden_user_id').val(Id);

			$.post("backend.php",{
				Id:Id},function(data,status){

					var user = JSON.parse(data);
					$('#FName').val(user.Name);
					$('#FEmail').val(user.Email);
					$('#FUsername').val(user.Username);
					$('#FPassword').val(user.Password);
					$('#FPhone').val(user.Phone);
				}


			
			);
			$('#myModal').model("show");
}

        function UpdateUserdetail(){
        	var uName = $('#FName').val();
        	var uEmail = $('#FEmail').val();
        	var uUsername = $('#FUsername').val();
        	var uPassword = $('#FPassword').val();
        	var uPhone = $('#FPhone').val();

        	var uhidden_user_id = $('#hidden_user_id').val();

        	$.post("backend.php",{
        		uhidden_user_id:uhidden_user_id,
        		uName:uName,
       			uEmail:uEmail,
       			uUsername:uUsername,
       			uPassword:uPassword,
       			uPhone:uPhone
        	},
        	function(data,status){
        		$('#myModal').model("hide");
        		readRecords();
        	}

        	);
        }
			
			
	</script>

		

		
	</script>
</body>
</html>