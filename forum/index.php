<?php
session_start();
include 'essentials/_dbconnect.php';
//signup code
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $sameUserName=false;
    $incorrectPassword=false;
    if(isset($_POST['signup']))
    {
       $username=$_POST['username'];
       $username=str_replace("<","&lt;",$username);
       $username=str_replace(">","&gt;",$username);
       $username=str_replace("'","''",$username);
       $password=$_POST['password'];
       $password=str_replace("<","&lt;",$password);
       $password=str_replace(">","&gt;",$password);
       $password=str_replace("'","''",$password);
       $rpassword=$_POST['rpassword'];
       $rpassword=str_replace("<","&lt;",$rpassword);
       $rpassword=str_replace(">","&gt;",$rpassword);
       $rpassword=str_replace("'","''",$rpassword);
       $sql="SELECT * FROM `userdetails` WHERE `USERNAME`='$username'";
       $result=mysqli_query($connect,$sql);
       $num_rows_selected=mysqli_num_rows($result);
       if($num_rows_selected==1)
       {
           $sameUserName=true;   
       }
       else
       {
           if($password==$rpassword)
           {
               $hashPassword=password_hash($password,PASSWORD_DEFAULT);
               $sql="INSERT INTO `userdetails`( `USERNAME`, `PASSWORD`) VALUES ('$username','$hashPassword')";
               $result=mysqli_query($connect,$sql);
           }
           else
           {
               $incorrectPassword=true;
           }
       }
   }
}
// login code
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $loginUser=true;
    if(isset($_POST['login']))
    {
        $lusername=$_POST['lusername'];
        $lusername=str_replace("<","&lt;",$lusername);
        $lusername=str_replace(">","&gt;",$lusername);
        $lusername=str_replace("'","''",$lusername);
        $lpassword=$_POST['lpassword'];
        $lpassword=str_replace("<","&lt;",$lpassword);
        $lpassword=str_replace(">","&gt;",$lpassword);
        $lpassword=str_replace("'","''",$lpassword);
        $sql="SELECT * FROM `userdetails` WHERE `USERNAME`='$lusername'";
        $result=mysqli_query($connect,$sql);
        $num=mysqli_num_rows($result);
        if($num==1)
        {
            $row=mysqli_fetch_assoc($result);
            if(password_verify($lpassword,$row['PASSWORD']))
            {
                $loginUser=true;
                $_SESSION['loggedin']=true;
                $_SESSION['username']=$row['USERNAME'];
                header("location:index.php");
            }
            else
            {
                $loginUser=false;
            }
        }
        else
        {
            $loginUser=false;
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="a.css">

    <!-- icon link -->
    <link rel="icon" href="images/forumlogo.png" type="image/icon type">

    <title>MyForum</title>
</head>

<body>
    <?php
    include 'essentials/_header.php';
    if(isset($sameUserName)){

        if($sameUserName){
            echo('<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Username already present!</strong> Try some other username.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
        }
    }
    if(isset($incorrectPassword)){

        if($incorrectPassword){
            echo('<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Passwords don\'t match!</strong> Re-enter the password correctly.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
        }
    }
    if(isset($incorrectPassword)&&isset($sameUserName)){

        if($incorrectPassword==false&& $sameUserName==false){
            echo('<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Account createrd successfully!</strong>Now login to continue.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
        }
    }
    if(isset($loginUser)){

        if(!$loginUser){
            echo('<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Invalid credentials!</strong>Try to login again.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
        }
    }
    ?>
    
    <div class="catalog">
        <?php
          $sql="SELECT * FROM `categories`";
          $result=mysqli_query($connect,$sql);
          while($row=mysqli_fetch_assoc($result))
          {
            $title=$row['TITLE'];
            $description=$row['DESCRIPTION'];
            echo '  <div class="main">
            <a href="threadlist.php?ID='.$row['ID'].'" style="text-decoration: none; color: white;">
            <div class="glassdiv">
              <div class="card-body">
                <img src="cardImages/'.$title.'.png" height=100px style="border-radius: 5px;">
                <h5 class="card-title">'.$title.'</h5>
                <button class="thread-button">View thread</button>
              </div>
            </div></a>
          </div>';
          }
        ?>
    </div>
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>

<!--     <?php
    include 'essentials/_footer.php';
    ?> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>