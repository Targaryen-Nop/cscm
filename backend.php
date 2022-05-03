<body oncontextmenu='return false;'>

    <?php
      session_start();
      date_default_timezone_set("Asia/Bangkok");

      include "connectdb.php";

      if (isset($_POST['username']) && isset($_POST['password'])) {

        // $sql_aes    = "SELECT AES_ENCRYPT('" . $_POST['password'] . "','ACL4064') AS PASS";
        // $query_aes  = mysqli_query($connection, $sql_aes);
        // $result_aes = mysqli_fetch_array($query_aes);

        $sql   = "select * from users where username='" . mysqli_real_escape_string($connection, $_POST["username"]) . "' and password='" . $_POST["password"] . "'";
        $query = mysqli_query($connection, $sql);
        $num   = mysqli_num_rows($query);
      ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <?php
      if ($num <= 0) {
          echo "<br><br><center><font size='5' color='red' face='MS Sans Serif'><b>Username or Password Invalid</b></font></center>";
          echo "<meta http-equiv=refresh content=2;URL=backend_insert.php>";
          exit();
        } else {
          $result                     = mysqli_fetch_array($query);
          $_SESSION['login_id']       = $result['id'];
          $_SESSION['username']       = $result['username'];
          $_SESSION['login_password'] = $_POST['password'];
          $_SESSION['auth']           = $result['auth'];
          $_SESSION['name']           = $result['name'];

          echo "<br><br><center><font size='5' color='green' face='MS Sans Serif'><b>Login Please Wait</b></font></center>";
          echo "<meta http-equiv='refresh' content='1 ;url=backend_insert.php'>";
          exit();
        }
    } ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> CSCM System </title>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!------ Include the above in your HEAD tag ---------->
        <link rel="stylesheet" type="text/css" href="login.css">
    </head>

    <body>
        <div id="login">
            <h1 class="text-center text-white pt-5">PEC SYSTEM</h1>
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <form id="login-form" class="form" action="" method="post" data-parsley-validate autocompete="off">
                                <h3 class="text-center text-primary">Login</h3>
                                <div class="form-group">
                                    <label for="username" class="text-primary">Username</label><br>
                                    <input type="text" id="username" class="form-control" placeholder="Username" required="" name="username" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label for="password" class="text-primary">Password</label><br>
                                    <input type="password" id="password" class="form-control" placeholder="Password" required="" name="password" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <!-- <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br> -->
                                    <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Submit">
                                </div>
                                <!-- <div id="register-link" class="text-right">
                                <a href="#" class="text-info">Register here</a>
                            </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <body oncontextmenu='return false;'>