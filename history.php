<html>

<title>History</title>
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

if (isset($_POST['comp'])) {
    $tkid = $_POST['taskid'];
    $status=$_POST['status'];
    if ($status!="completed"){
        $query = "UPDATE taskinfo SET status ='completed' WHERE taskid='$tkid' AND status LIKE 'in progress' ";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        echo '<script type="text/javascript"> alert("Task Status updated successfully!") </script>';
        
    } 
    }
    else {
        echo '<script type="text/javascript"> alert("Error!Task already completed!") </script>';
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
            <div id="formbox">
                <table>

                    <tr>
                        <th>Task ID</th>
                        <th>Work description</th>
                        <th colspan="2">Date</th>
                        <th>Time</th>
                        <th>City</th>
                        <th>Money</th>
                        <th>Status</th>
                        <th>Hunter</th>
                        <th>Button</th>
                    </tr>
                    <?php

    $username = $_SESSION['username'];
    $var = 0;
    if (isset($_POST['posted'])) {
        $sql = "SELECT * from taskinfo WHERE t_userid='$username'";
        $var = 1;
    }
    if ($var == 1) {
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {


            while ($row = mysqli_fetch_assoc($result)) {
                $tkid=$row["taskid"] ;
                echo "<tr><td>" . $row["taskid"] . "</td><td>" . $row["w_desc"] . "</td><td>" . $row["doc"] . "</td><td>" . "</td><td>" . $row["toc"] . "</td><td>" .
                    $row["city"] . "</td><td>" . $row["money"] . "</td><td>" . $row["status"] . "</td><td>" . $row["hunter"] . "</td><td>". 
                    "<form action='history.php' method='post'>
                            <input type='hidden' name='taskid' value='".$tkid."' />
                            <input type='hidden' name='status' value='".$row["status"]."' />
                            <input type='submit' name='comp' id='add_btn' value='Completed' />
                    </form>" . "</td></tr>";
                    }
                    } else {
                    echo "<tr>
                        <td colspan='9' style='text-align:center;font-size:20px;font-weight:bold;'>" . "No results
                            found!" . "</td>
                    <tr>";
                }
    }

                if (isset($_POST['hunted'])) {
                $username = $_SESSION['username'];

                $sql = "SELECT * from taskinfo WHERE hunter='$username'";

                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                echo "
            <tr>
                <td>" . $row["taskid"] . "</td>
                <td>" . $row["w_desc"] . "</td>
                <td>" . $row["doc"] . "</td>
                <td>" . "</td>
                <td>" . $row["toc"] . "</td>
                <td>" .
                    $row["city"] . "</td>
                <td>" . $row["money"] . "</td>
                <td>" . $row["status"] . "</td>
                <td>" . $row["t_userid"] . "</td>
            </tr>";   
        }
    } else {
        echo "<tr><td colspan='9' style='text-align:center;font-size:20px;font-weight:bold;'>" . "No results found!" . "</td><tr>";
    }
}
    
    ?>


                </table>
                <form action="history.php" method="post" enctype="multipart/form-data">

                    <br><input name="posted" type="submit" id="sub_btn" value="View Posted"><br>
                    <input name="hunted" type="submit" id="sub_btn" value="View Hunted"><br>

                </form>

                <!-- <br> <a href="gethunterinfo.php">Change Status of Tasks</a> -->
                <br><br><a href="taskmenu.php">Back to home</a>
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
    background-color: #F8FAFB;
    width: 100%;
    background-image: url("imgs/man3.jpg");
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
    width: 1000px;
    padding: 50px;
    margin-top: 100px;
    margin-left: 500px;
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

table {
    border-collapse: collapse;
    width: 100%;
}

th,
td {
    word-wrap: 1;
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

tr:hover {
    background-color: #f5f5f5;
}

th {
    background-color: #00008b;
    color: white;
}
</style>