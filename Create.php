<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<title>Create User</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div>
				<h1 class="text-center">Add User</h1>
				<hr>
			</div>
			<form class="row" action="backend.php" method="post">
				<div class="mb-3">
					<label class="text-info form-label">Name:</label>
					<input type="text" class="form-group" name="Name" id="Name" required>
				</div>
				<div class="mb-3">
					<label for="Email" class="text-info form-label">Email:</label>
					<input type="email" class="form-group" name="Email" id="Email" required>
				</div>
				<div class="mb-3">
					<label for="Username" class="text-info form-label">Username</label>
					<input type="text" class="form-group" name="Username" id="Username" pattern="[A-Za-z0-9]{6,}" required>
				</div>
				<div class="mb-3"> 
					<label  for="Password" class="text-info form-label">Password:</label>
					<input type="Password" class="form-group" name="Password" id="Password" pattern="[A-Za-z0-9]{8}" required>
				</div>
				<div class="mb-3">
					<label for="Phone" class="text-info form-label">Phone:</label>
					<input type="number" class="form-group" name="Phone" id="Phone" pattern="[0-9]{10}" min="6666666666" max="9999999999" required>
				</div>
				<button class="btn btn-dark" style="width:100px" onclick="Record()">Submit</button>
			</form>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			


			
		});
	</script>
</body>
</html>
