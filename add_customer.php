<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Add customer</title>
     <!-- WebIcon -->
  <link rel="icon" href="assets/img/Logo_T&M.png">
    <script src="https://kit.fontawesome.com/a2c5b72efa.js" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <?php
if(isset($_POST["btn_add"]))
{
    $us=$_POST["username"];
    $pass1=$_POST["pass1"];
    $pass2=$_POST["pass2"];
    $fname=$_POST["fullname"];
    $phone=$_POST["phone"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    $state=$_POST["state"];
    if (trim($us) == "") {
        echo "<script type='text/javascript'>alert('Username can not be empty');</script>";
    }
    else if (trim($pass1) == ""||trim($pass2) == "") {
        echo "<script type='text/javascript'>alert('Passoword can not be empty');</script>";
    }
    else if (strcmp($pass2,$pass1)!=0) {
        echo "<script type='text/javascript'>alert('Passoword do not match');</script>";
    }
    else if (strlen($pass1)<6 ||strlen($pass1)>20) {
        echo "<script type='text/javascript'>alert('Password length must be from 6 to 20 characters');</script>";
    }
    else if (trim($fname) == "") {
        echo "<script type='text/javascript'>alert('fullname can not be empty');</script>";
    }
    else if (trim($phone) == "") {
        echo "<script type='text/javascript'>alert('phone can not be empty');</script>";
    }
    else if (!is_numeric($phone)) {
        echo "<script type='text/javascript'>alert('Phone must be a number');</script>";
    }
    else if (trim($email) == "") {
        echo "<script type='text/javascript'>alert('phone can not be empty');</script>";
    }
    else if (trim($address) == "") {
        echo "<script type='text/javascript'>alert('phone can not be empty');</script>";
    }
    else{
    $pass=md5($pass1);
    include_once("connection.php");
    $sq="select * from customer where Username='$us' or Email='$email'";
    $res=mysqli_query($conn,$sq);
    if(mysqli_num_rows($res)==0){
        mysqli_query($conn,"Insert into customer (Username, Password,CustomerName,Tel,Email,Address,State) 
        values('$us','$pass','$fname',$phone,'$email','$address',$state)")
        or die(mysqli_error($conn));
        echo "<script type='text/javascript'>alert('Add Successful');</script>";
        echo "<script> location.href='admin.php?page=customer'; </script>";
        exit;
    }
    else{
        echo "<script type='text/javascript'>alert('Add Failing');</script>";
        echo "<script> location.href='admin.php?page=add_customer'; </script>";
        exit;
    }
}
}
 ?>
    <!-- Custom styles for this template -->
    <link href="admin.css" rel="stylesheet">
    <link rel="stylesheet" href="btn.css">
  </head>
  <body>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>

      <h2>Add Customer</h2>
      <div class="btn-cancel">
      <a class="btn btn-danger" href="admin.php?page=customer" role="button"><i class="fas fa-times"></i><Span> Cancel</Span></a>
    </div>
        <form name="add_customer" method="post" action="">
              <!-- Text input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="username">User Name</label>
                <input name="username" type="text" id="username" class="form-control" placeholder="UserName"/>
              </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <label class="form-label" for="pass1">Password</label>
                  <input name="pass1" type="password" id="pass1" class="form-control" placeholder="Password"/>
                </div>
              </div>
              <div class="col">
                <div class="form-outline">
                  <label class="form-label" for="pass2">Confirm Password</label>
                  <input name="pass2" type="password" id="pass2" class="form-control" placeholder="Password" />
                </div>
              </div>
            </div>
          
            <!-- Text input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="fullname">Full Name</label>
              <input name="fullname" type="text" id="fullname" class="form-control" placeholder="FullName"/>
            </div>
            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="email">Email</label>
              <input name="email" type="email" id="email" class="form-control" placeholder="Email"/>
            </div>
          
            <!-- Number input -->
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <label class="form-label" for="phone">Phone</label>
                  <input name="phone" type="tel" id="phone" class="form-control" placeholder="Phone"/>
                </div>
              </div>
              <div class="col">
                <div class="form-outline">
                  <label class="form-label" for="state">State</label>
                  <select name="state" id="" class="form-control">
                      <option value=0>0</option>
                      <option value=1>1</option>
                  </select>
                </div>
              </div>
            </div>
    
            <!-- Text input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="address">Address</label>
              <input name="address"  type="text" id="address" class="form-control" placeholder="Address"/>
            </div>
            <!-- Submit button -->
            <div class="btn-func">
                <button name="btn_add"  type="submit" class="btn btn-primary">ADD</button>
                <button  type="reset" class="btn btn-primary">RESET</button>
            </div>
          </form>
    </main>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>

