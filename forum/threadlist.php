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
    $id=$_GET['ID'];
    $sql="SELECT * FROM `categories` WHERE `ID`= '$id'";
    $result=mysqli_query($connect,$sql);
    $row=mysqli_fetch_assoc($result);
   echo ' <div class="container">
   <div class="jumbotron">
       <h1 class="display-4">'.$row['TITLE'].'</h1>
       <p class="lead">'.$row['DESCRIPTION'].'</p>
       <hr class="my-4">
       <div class="alert alert-warning" role="alert">No Spam / Advertising / Self-promote in the forums is allowed.
       Do not post copyright-infringing material.
       Do not post “offensive” posts, links or images.
       Remain respectful of other members at all times.You will be blocked from the website if you disobey the above mentioned rules.
       </div>
   </div></div>';
   ?>
   <?php
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $queryTitle=$_POST['queryTitle'];    
        $queryTitle=str_replace("<","&lt;",$queryTitle);
        $queryTitle=str_replace(">","&gt;",$queryTitle);
        $queryTitle=str_replace("'","''",$queryTitle);  
        $queryDescription=$_POST['queryDescription']; 
        $queryDescription=str_replace("<","&lt;",$queryDescription);   
        $queryDescription=str_replace(">","&gt;",$queryDescription);   
        $queryDescription=str_replace("'","''",$queryDescription);   
        $sql="INSERT INTO `forumquery`( `queryTitle`, `queryDescription`, `userId`, `categoryId`) VALUES ('$queryTitle','$queryDescription','$userId','$id')";  
        $result=mysqli_query($connect,$sql);
        if($result)
        {
            echo '<div class="container"><div class="alert alert-success alert-dismissible fade show" role="alert">
            Your query was added successfully.Wait until someone from the community replies to your query.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div></div>';
        }
    }
    
   ?>
    <div class="container">
        <?php
           if(isset($_SESSION['loggedin']))
           {
               echo '<form action="'. $_SERVER['REQUEST_URI'].'" method="POST">
               <div class="form-group">
                   <label for="queryTitle"><strong>Query Title</strong></label>
                   <input type="text" class="form-control" name="queryTitle" id="queryTitle" aria-describedby="emailHelp">
               </div>
               <div class="form-group">
                   <label for="queryDescription"><strong>Query Description</strong></label>
                   <textarea class="form-control" name="queryDescription" id="queryDescription" rows="3"></textarea>
               </div>
               <small id="emailHelp" class="form-text text-muted"></small><br>
               <button type="submit" name="submit" class="btn btn-success">Submit</button>
           </form>';
           }
           else
           {
            echo('<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Kindly signup/login to access the query box!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            echo '<form action="'. $_SERVER['REQUEST_URI'].'" method="POST">
               <div class="form-group">
                   <label for="queryTitle"><strong>Query Title</strong></label>
                   <input type="text" class="form-control" name="queryTitle" id="queryTitle" aria-describedby="emailHelp" readonly>
               </div>
               <div class="form-group">
                   <label for="queryDescription"><strong>Query Description</strong></label>
                   <textarea class="form-control" name="queryDescription" id="queryDescription" rows="3" readonly></textarea>
               </div>
               <small id="emailHelp" class="form-text text-muted">Kindly signup/login to access the query box.</small><br>
           </form>';
            }
        ?>
        <h2 class="my-4">Queries:</h2>
    </div>
    <?php
     $id=$_GET['ID'];
     $sql="SELECT * FROM `forumquery` WHERE `categoryId`='$id'";
     $result=mysqli_query($connect,$sql);
     $rowSelected=mysqli_num_rows($result);
     if($rowSelected==0)
   
     {
         echo '<div class="container"><div class="alert alert-success" role="alert"><div class="container"><div class="jumbotron jumbotron-fluid">
           <h1 class="display-4">No queries available till now.</h1>
           <p class="lead">Be the first person to ask a query.</p>
         </div>
         </div></div></div>';
     }
     while($row=mysqli_fetch_assoc($result))
     {
        $user=$row['userId'];
        $sql3="SELECT * FROM `userdetails` WHERE  `S.NO`='$user'";
        $result3=mysqli_query($connect,$sql3);
        $row3=mysqli_fetch_assoc($result3);
        echo('<div class="container" style="margin-bottom:30px;"><div class="media">
        <img class="mr-3" src="images/login.png" height="40px" width="50px" alt="Generic placeholder image"><div class="media-body">
          <h5 class="mt-0"><a href="threads.php?queryId='.$row['queryId'].'" class="text-dark" style="text-decoration:none;">'.$row['queryTitle'].'</a></h5>
          '.$row['queryDescription'].'
        </div>
        <p style="color: black;"><strong>Posted By:<em> '.$row3['USERNAME'].'</em> at <em>'.$row3['DATE'].'</em></strong></p>
      </div></div>');
     }
    ?>
<!--     <?php
    include 'essentials/_footer.php';
    ?> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>