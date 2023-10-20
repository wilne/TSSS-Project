<!DOCTYPE html>
<html>
  <head>
    <title>TSSS Login Form</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="loginstyle.css" rel="stylesheet">
  </head>
  <body>
    <div class="main-block">
      <div class="left-part">
        <i class="fas fa-graduation-cap"></i>
        <h1 style="font-family: Algerian;">Tumaini Senior Secondary School</h1>
        <p>We do the best to ensure you be updated on your student's well-being at school.</p>
      </div>
      <form action="authenticate.php" method="post" style="border-radius: 30px;">
        <div class="title">
          <i class="fas fa-pencil-alt"></i> 
          <h2>Login Here</h2>
        </div>
        <div class="info">
          <input name="studentname" type="text" placeholder="Full Student's name" required>
          <input name="parentname" type="text" placeholder="Full Parent's name" required>
          <input type="password" name="password" placeholder="Password" required></div>
        <button type="submit" href="/">Submit</button><br>
        <button><a href="\TSSS Software\web" style=" text-decoration: none; color:white;">Previous Page</a></button>
      </form>
    </div>
  </body>
</html>