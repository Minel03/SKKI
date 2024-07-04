<!DOCTYPE html>
<html lang="en">

<head>
  <script language="javascript" type="text/javascript">
    window.history.forward();
  </script>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="css/index.css">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link rel="icon" type="image/x-icon" href="images/logo1.ico">
  <title>Login Page</title>
</head>

<body style="background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-image: url('images/log-in_bg.jpg');">
  <div class="container-content">
    <div class="content">
      <form action="login.php" method="POST">
        <img class="logo" src="images/logo1.png" alt="logo" height="170px"> <br>
        <h1 class="title"> SKKInventory </h1>
        <div class="username">
          <input class="holder" type="text" id="username" name="username" placeholder="Username" required />
        </div><br>
        <div class="pass">
          <input class="holder" type="password" id="password" name="password" placeholder="Password" required />
        </div><br>
        <div class="container1">
          <button type="submit" class="btn" value="Log In">Log In</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>