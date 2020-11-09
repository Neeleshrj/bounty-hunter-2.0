<html>

<title>Hunt-task</title>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" data-auto-replace-svg="nest"></script>
<?php 
    require 'dbconfig/config.php';
    session_start();
    if(!isset($_SESSION['username'])){
    echo '<script type="text/javascript"> alert("Error!You need to Login First!") </script>';
    echo '<script>window.location.href = "./login.php";</script>';
}
?>
<?php


  if (isset($_POST['add'])) {
    $taskid = $_POST['taskid'];
    $userid = $_SESSION['username'];
    $query = "UPDATE taskinfo SET status ='in progress',hunter='$userid' WHERE taskid='$taskid' AND t_userid != '$userid'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
      echo '<script type="text/javascript"> alert("Task accepted successfully!") </script>';
        $content="Task accepted";
        date_default_timezone_set('Asia/Kolkata');
        $date = date('m/d/Y h:i a', time());
        $sql = "INSERT INTO notifinfo VALUES(NULL,'$content','$userid','$date')";
        
        $query_run = mysqli_query($con, $sql);
        if (!$query_run) {
            echo '<script type="text/javascript"> alert("Error!") </script>';
        }

        $sql="SELECT * FROM taskinfo WHERE taskid='$taskid'";
        $query_run = mysqli_query($con, $sql);
        if (!$query_run) {
            echo '<script type="text/javascript"> alert("Error!") </script>';
        }
        $row = mysqli_fetch_assoc($query_run);
        $user=$row['t_userid'];
        
        $content="Task accepted by ".$userid;
        $sql = "INSERT INTO notifinfo VALUES(NULL,'$content','$user','$date')";
        $query_run = mysqli_query($con, $sql);
        if (!$query_run) {
            echo '<script type="text/javascript"> alert("Error!") </script>';
        }


        
    } else {
      echo '<script type="text/javascript"> alert("Error!") </script>';
    }
  }
   ?>

<body style="font-family: 'Lucida Sans';letter-spacing:2px;margin:auto;">

    <div id="footer">
        <center>
            <ul>
                <button id="footbtn" style="
                            float:left;
                            font-weight:bolder;
                            letter-spacing:3px;
                            font-size: large;
                            background-color: transparent;
                            border: transparent solid 1px;">Welcome
                    <?php echo $_SESSION['username']?>!</button>
                <a href="index.php"><button id="footbtn"><i class="fas fa-sign-out-alt"
                            style="font-size:36px;"></i>LOGOUT</button></a>
                <a href="profile.php"><button id="footbtn"><i class="fas fa-users"
                            style="font-size:34px;"></i><?php echo " " ,$_SESSION['username']?></button></a>
                <a href=""><button id="footbtn"><i class="fas fa-binoculars" style="font-size:36px;"></i> HUNT
                        TASK</button></a>
                <a href="history.php"><button id="footbtn"><i class="fa fa-server" style="font-size:36px;"></i>
                        HISTORY</button></a>
                <a href="posttask.php"><button id="footbtn"><i class="fa fa-cubes" aria-hidden="true"
                            style="font-size:36px;"></i>
                        POST TASK</button></a>
            </ul>
        </center>

    </div>
    <div id="main_body">
        <center>
            <div id="top">
                <?php
                     if (isset($_POST['submit'])) {
                        $username = $_SESSION['username'];
                        $loc = $_POST['city'];
                        if (isset($_POST['submit'])) {
                $sql = "SELECT * from taskinfo WHERE city='$loc' AND status='pending' AND t_userid != '$username' ";

                 $result = mysqli_query($con, $sql);

                 while($row = mysqli_fetch_assoc($result)) { ?>
                <center>
                    <div id="taskbox">
                        <h3>TaskId:</h3>
                        <h4><?php echo $row["taskid"]?></h4>
                        <h3>Description:</h3>
                        <p><?php echo $row["w_desc"]?></p>
                        <h3>Image:</h3>
                        <?php 
                            if($row["image"]==""){
                                echo "No image Attached";
                            }else{
                                echo "<img id='images' src='uploaded-images/".$row["image"]."'/>";
                            }
              
                        ?>

                        <h3>Time Of Completion:</h3>
                        <p><?php echo $row["toc"]?></p>
                        <h3>City:</h3>
                        <p><?php echo $row["city"]?></p>
                        <h3>Reward:</h3>
                        <p><?php echo $row["money"]?></p>

                        <form action="huntask.php" method="post">
                            <input type="hidden" name="taskid" value="<?php echo $row['taskid'] ?>" />
                            <input type="submit" name="add" id="add_btn" value="Hunt" />
                        </form>
                    </div>
                </center>
                <?php }
    }
  }
      ?>
            </div>

            <div id="formbox">
                <h4>Find tasks based on location -></h4>
                <form method="post">
                    <select class="form-control" name="city" id="city">

                        <option value="New Delhi">New Delhi</option>
                        <option value="Chennai">Chennai</option>
                        <option value="Hyderabad">Hyderabad</option>
                        <option value="Mumbai">Mumbai</option>
                        <option value="Bangalore">Bangalore</option>
                        <option value="Lucknow">Lucknow</option>
                        <option value="Mirzapur">Mirzapur</option>
                        <option value="Wasseypur">Wasseypur</option>
                        <option value="Agra">Agra</option>
                        <option value="Patna">Patna</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Jaipur">Jaipur</option>
                    </select><br><br>
                    <input type="submit" name="submit" id="sub_btn" value="View Results">
                </form>

                <br><a href=" homepage.php">Back to home</a>
            </div>
        </center>
    </div>


</body>

</html>

<style>
#main_body {
    position: absolute;
    overflow-y: auto;
    height: 80%;
    padding: 16px;
    z-index: 1;
    margin-top: 150px;
    background-color: #255D6E;
    width: 100%;
    background-image: url("imgs/man1.jpg");
    background-size: 600px 600px;
    background-repeat: no-repeat;
}

#sideimg {
    height: 550px;
    overflow: auto;
    width: 800px;
    position: fixed;
    z-index: 1;

}

#sub_btn {
    margin-top: 10px;
    background-color: #00b894;
    padding: 5px;
    color: white;
    width: 50%;
    font-weight: normal;
    text-align: center;
    font-size: 20px;
    letter-spacing: 2px;
    border: #00b894 solid;
    border-radius: 100px;
    outline-width: 0;
}

#back_btn {
    margin-bottom: 20px;
    background-color: #d63031;
    padding: 5px;
    color: white;
    width: 30%;

    text-align: center;
    font-size: 20px;
    border-radius: 100px;
    border: #d63031;
    outline-width: 0;
}

#footer {
    position: absolute;
    overflow: hidden;
    border-bottom: solid 1px black;
    height: 150px;
    top: 0px;
    width: 100%;
    z-index: 2;
}


#footbtn {
    top: 0px;
    margin-bottom: 20px;
    font-size: large;
    background-color: transparent;
    padding: 20px;
    margin-top: 1px;
    float: right;
    border: transparent solid 1px;
    z-index: 2;
}

#footbtn:hover {
    border: 1px black solid;

    font-size: large;
    background-color: transparent;
    padding: 20px;

    z-index: 2;
}

#formbox {
    position: absolute;
    width: 450px;
    height: 220px;
    padding: 50px;
    margin-top: 200px;
    margin-left: 800px;
    margin-bottom: 50px;
    background-color: white;
    border-radius: 20px;
    box-shadow: 0px 0px 40px;
    z-index: 3;
}

.inputvalues {
    width: 90%;
    color: #666666;
    background: #e6e6e6;
    font-weight: bold;
    border-radius: 100px;
    line-height: 1.5;
    border: none;
    font-size: medium;
    padding: 20px;
    margin-top: 10px;
    margin-bottom: 10px;
    outline-width: 0;
    letter-spacing: 1px;
}

#sub_btn:hover,
#back_btn:hover {
    background-color: #aaa69d;
    border: #aaa69d solid;
    box-shadow: 0px 0px 40px grey;
    color: black;
}

#taskbox {
    width: 800px;
    margin-top: 20px;
    border: black solid 1px;
    padding: 20px;
    margin-left: 500px;
    text-align: left;
    background-color: white;
    box-shadow: 0px 0px 40px;
    border-radius: 20px;
    display: inline-block;
}

#add_btn {
    margin-top: 10px;
    background-color: #00b894;
    padding: 5px;
    color: white;
    width: 20%;
    font-weight: normal;
    text-align: center;
    font-size: 20px;
    letter-spacing: 2px;
    border: #00b894 solid;
    border-radius: 100px;
    outline-width: 0;
}


#images {
    width: 250px;
    height: 200px;
}

select {
    padding: 12px 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    width: 380px;
    margin: 0 auto;
}

option {
    padding: 12px 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    width: 380px;
    margin: 0 auto;
}


ul {

    list-style-type: none;
    margin: 0;
    padding: 0;
    font-size: larger;
    padding: 50px;
}

li {
    padding: 20px;
    display: inline;

}
</style>