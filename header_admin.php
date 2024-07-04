       <link rel="stylesheet" href="css/header.css">
       <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
       <link rel="stylesheet" href="css/responsive.css">
       <style>
           .highlighted-code {
               background-color: #FF8C00;
               padding: 10px;
               border-radius: 5px;
               display: inline-block;
           }
       </style>
       <header>
           <hr class="hr1">
           <a href="dashboard.php"><img class="logo" src="images/logo1.png" alt="logo"></a>
           <div class="title">
               <h1>SKKInventory</h1><br>
           </div>
           <div class="menupos">
               <a href="dashboard.php" class="menu">DashBoard</a>
               <a href="inventory.php" class="menu">Inventory</a>
               <a href="add.php" class="menu">IN Items</a>
               <a href="request.php" class="menu ">Request Items</a>
               <a href="out.php" class="menu">OUT Items</a>
               <a href="statistics.php" class="menu">Statistics</a>
               <a href="history.php" class="menu">History</a>
               <a href="settings.php" class="menu">Settings</a>
               <a href="logout.php" class="menu">Logout</a>
               <?php
                if (session_status() == PHP_SESSION_NONE) {
                    // Only start the session if it hasn't been started yet
                    session_start();
                }

                $handler = $_SESSION['handler'];
                $position = $_SESSION['position'];

                echo '<div class="highlighted-code" style="position: absolute; right: 0; margin-top: -15px; margin-right: 10px;"><div class="fonttitle menu1" style="text-align: center; margin-right: 0px; margin-bottom: -7px;">' . $handler . '<br>' . $position . '<span></div></div>';
                ?>

           </div>
           <hr class="hr2">
       </header>