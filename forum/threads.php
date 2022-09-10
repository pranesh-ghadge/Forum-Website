<?php
 session_start();
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
      include 'essentials/_dbconnect.php';
      include 'essentials/_header.php';
      if(isset($_SESSION['loggedin']))
      {
        $username=$_SESSION['username'];
        $sql="SELECT * FROM `userdetails` WHERE `USERNAME`='$username'";
        $result=mysqli_query($connect,$sql);
        $row=mysqli_fetch_assoc($result);
        $userId=$row['S.NO'];
      }
    ?>
    <?php
    $queryId=$_GET['queryId'];
    $sql="SELECT * FROM `forumquery` WHERE `queryId`='$queryId'";
    $result=mysqli_query($connect,$sql);
    $row=mysqli_fetch_assoc($result);
    $user=$row['userId'];
    $sql2="SELECT * FROM `userdetails` WHERE `S.NO`='$user'";
    $result2=mysqli_query($connect,$sql2);
    $row2=mysqli_fetch_assoc($result2);
   echo ' <div class="container">
   <div class="jumbotron">
       <h3 class="display-4">'.$row['queryTitle'].'</h3>
       <p class="lead">'.$row['queryDescription'].'</p>
       <p style="color: black;"><strong>Posted By:<em> '.$row2['USERNAME'].'<em> on <em>'.$row2['DATE'].'</em></strong></p>
       <hr class="my-4">
       <div class="alert alert-warning" role="alert">No Spam / Advertising / Self-promote in the forums is allowed.
       Do not post copyright-infringing material.
       Do not post “offensive” posts, links or images.
       Remain respectful of other members at all times.
       You will be blocked from the website if you disobey the above mentioned rules.
       </div>
   </div></div>';
   ?>
   <?php
   if($_SERVER['REQUEST_METHOD']=="POST")
   {
       $comment=$_POST['comment'];
       $id=$_GET['queryId'];
       $sql="INSERT INTO `commenttablle`(`comment`, `userId`, `queryId`) VALUES ('$comment','$userId','$id')";
       $result=mysqli_query($connect,$sql);
    }
    ?>
    <div class="container">
        <?php
          if(isset($_SESSION['loggedin']))
          {
              echo '<form action="'. $_SERVER["REQUEST_URI"].'" method="POST">
              <div class="form-group">
                  <label for="comment">Enter Your Comment '.$_SESSION['username'].'</label>
                  <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
              </div>
              <button type="submit"  name="submitComment" class="btn mt-2 btn-success">Submit</button>
              </form>';
          }
          else
          {
            echo('<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Kindly signup/login to access the comment box!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            echo '<form action="'. $_SERVER["REQUEST_URI"].'" method="POST">
              <div class="form-group">
                  <label for="comment">Enter your comment here.</label>
                  <textarea class="form-control" name="comment" id="comment" rows="3" readonly></textarea>
              </div>
              <small>Kindly signup/login to access the comment box.</small>
              </form>';
          }
        ?>
    </div>
    <div class="container">
        <h2 class="my-4">Discussion:</h2>
    </div>
    <?php
     $queryId=$_GET['queryId'];
     $sql="SELECT * FROM `commenttablle` WHERE `queryId`='$queryId'";
     $result=mysqli_query($connect,$sql);
     $numRows=mysqli_num_rows($result);
    if($numRows==0)
    {
        echo '<div class="container"><div class="alert alert-success" role="alert">
        <h4 class="alert-heading">No comments yet!</h4>
        <p>Be the first person to answer the query.</p>
       </div></div>';
    }
    else
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $comment=$row['comment'];
            $comment=str_replace("<","&lt;",$comment);
            $comment=str_replace(">","&gt;",$comment);
            $comment=str_replace("'","''",$comment);
            echo ('<div class="container" style="margin-bottom:30px;"><div class="media">
            <img src="images/login.png" width="50px" height="40px" class="mr-3">
            <div class="media-body">'.$comment.'
            </div>
            <p class="text-primary"></em>
          </div></div>');
        }
    }

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>