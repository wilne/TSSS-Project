<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="register">
			<h1>Register</h1>
			<form action="register.php" method="post" autocomplete="off">
				<label for="adminNo">
					<i class="fas fa-calculator"></i>
				</label>
				<input type="number" min="0" name="adminNo" placeholder="Admin Number" id="adminNo" required>
				<label for="studentname">
					<i class="fas fa-child"></i>
				</label>
				<input type="text" name="studentname" placeholder="Student name" id="studentname" required>
				<label for="parentname">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="parentname" placeholder="Parent name" id="parentname" required>
				<label for="phone">
					<i class="fas fa-phone-square"></i>
				</label>
				<input type="tel" name="phone" maxlength="12" placeholder="Phone Number" id="phone" required>
				<label for="email">
					<i class="fas fa-envelope"></i>
				</label>
				<input type="email" name="email" placeholder="Email" id="email" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" minlength="8" maxlength="16" name="password" placeholder="Password" id="password" required>
				
				<input type="submit" value="Register">
			</form>
		</div>
	</body>
</html>