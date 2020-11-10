<html>

<title>Posttask</title>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" data-auto-replace-svg="nest"></script>
<?php 
    session_start();
    if(!isset($_SESSION['username'])){
    echo '<script type="text/javascript"> alert("Error!You need to Login First!") </script>';
    echo '<script>window.location.href = "./login.php";</script>';
}

require 'dbconfig/config.php';

if (isset($_POST['submit'])) {

  $t_userid = $_SESSION['username'];
  $w_desc = $_POST['w_desc'];
  $doc = $_POST['date'];
  $toc = $_POST['time'];
  $city = $_POST['city'];
  $money = $_POST['money'];
  $image=$_FILES['image']['name'];
  $status = 'pending';
  $hunter = 'none';
  $balance=$_SESSION['balance'];

  if($balance>=$money){
        $target= "uploaded-images/".basename($_FILES['image']['name']);

        $query = "INSERT INTO taskinfo VALUES(NULL,'$t_userid','$w_desc','$doc','$toc','$city','$money','$image','$status','$hunter')";
        $query_run = mysqli_query($con, $query);
        
       if ($query_run) {
            move_uploaded_file($_FILES['image']['tmp_name'],$target);
            $sql="UPDATE userinfo SET balance=(balance-'$money') WHERE userid LIKE '$t_userid' ";
            $query_run = mysqli_query($con, $sql);
            if (!$query_run) {
                echo '<script type="text/javascript"> alert("Error!") </script>';
            }else{
                echo '<script type="text/javascript"> alert("Task put for hunting!") </script>';
                $content="Task added";
                date_default_timezone_set('Asia/Kolkata');
                $date = date('m/d/Y h:i a', time());
                $user=$_SESSION['username'];
                $sql = "INSERT INTO notifinfo VALUES(NULL,'$content','$t_userid','$date')";
                $query_run = mysqli_query($con, $sql);
                if (!$query_run) {
                    echo '<script type="text/javascript"> alert("Error!") </script>';
                }
            
            }
        } else {
            echo '<script type="text/javascript"> alert("Error!") </script>';
        }
    }else{
      echo '<script type="text/javascript"> alert("You dont have enough balance!") </script>';
      
  }

  }
if (isset($_POST['back'])) {
    echo '<script>window.location.href = "./homepage.php";</script>';
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
                <a href="huntask.php"><button id="footbtn"><i class="fas fa-binoculars" style="font-size:36px;"></i>
                        HUNT
                        TASK</button></a>
                <a href="history.php"><button id="footbtn"><i class="fa fa-server" style="font-size:36px;"></i>
                        HISTORY</button></a>
                <a href=""><button id="footbtn"><i class="fa fa-cubes" aria-hidden="true" style="font-size:36px;"></i>
                        POST TASK</button></a>
            </ul>
        </center>

    </div>
    <div id="main_body">
        <center>
            <form id="formbox" action="posttask.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <h2>Post Task</h2>
                <textarea name="w_desc" type="text" class="inputvalues"
                    placeholder="Describe the task in less than 1000 words" required
                    style="height: 100px;border-radius:10px;font-size:large"></textarea> <br>

                <input type="date" id="date" name="date"
                    style="padding:10px;margin-left:10px;margin-top:10px;margin-bottom:10px;" required>

                <label for="appt">Select a time:</label>
                <input type="time" id="appt" name="time">

                <BR>

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

                <input name="money" type="text" class="inputvalues" placeholder="Enter payment amount in ₹" required />
                <br>

                <input name="image" type="file" style="padding:20px;" /><br>

                <input type="submit" name="submit" id="sub_btn" value="SUBMIT" style="display:inline;margin:10px" />
                <a href="homepage.php" style="font-family: Courier New;">Back
                    to home</a>
            </form>


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
    height: 500px;
    padding: 50px;
    margin-left: 700px;
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