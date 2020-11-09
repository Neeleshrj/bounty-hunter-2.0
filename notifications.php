<html>

<title>Profile</title>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" data-auto-replace-svg="nest"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php 
    require 'dbconfig/config.php';
    session_start();
    if(!isset($_SESSION['username'])){
    echo '<script type="text/javascript"> alert("Error!You need to Login First!") </script>';
    echo '<script>window.location.href = "./login.php";</script>';
    
    }
    $userid=$_SESSION['username'];
    

?>


<body style="font-family: 'Lucida Sans';letter-spacing:2px;margin:auto;">

    <div id="navbar">
        <ul>

            <button style="top: 0px;
                            
                            font-size: large;
                            background-color: transparent;
                            padding: 20px;
                            border: transparent solid 1px;margin-bottom: 20px;"><i class="fas fa-phone-square"
                    style="font-size:34px;"></i>
                1800-500-2020</button>

            <a href="index.php"><button id="footbtn"><i class="fas fa-sign-out-alt"
                        style="font-size:36px;"></i>LOGOUT</button></a>
            <a href="posttask.php"><button id="footbtn"><i class="fa fa-cubes" aria-hidden="true"
                        style="font-size:36px;"></i>
                    POST TASK</button></a>
            <a href="history.php"><button id="footbtn"><i class="fa fa-server" style="font-size:36px;"></i>
                    HISTORY</button></a>
            <a href="huntask.php"><button id="footbtn"><i class="fas fa-binoculars" style="font-size:36px;"></i>
                    HUNT
                    TASK</button></a>
            <a href="notifications.php"><button id="footbtn"><i class="fas fa-bell "
                        style="font-size:36px;"></i>Notifications</button></a>
        </ul>

    </div>
    <center>
        <div id="main_body">
            <div id="notif_box">
                <?php 
                $sql="SELECT * FROM notifinfo WHERE user='$userid'";
                $query_run = mysqli_query($con, $sql);
                if (mysqli_num_rows($query_run) > 0) {
                while($row = mysqli_fetch_assoc($query_run)) { 
                    ?>
                <div id="notif">
                    <p><?php echo $row['content'] ?> on <?php echo $row['date']?></p>
                </div>
                <?php }
                }else{?>

                <h4>No results found!</h4>

                <?php }?>
                <a href="homepage.php" style="font-family: Courier New;">Back
                    to home</a>
            </div>

    </center>



</body>

</html>

<style>
#main_body {
    position: absolute;
    overflow-y: auto;
    width: auto;
    padding-top: 30px;
    padding-bottom: 30px;
    z-index: 1;
    margin-top: 150px;
    background-color: white;
    width: 100%;
}

#notif {
    width: 500px;
    height: 50px;
    padding: 10px;
    border: black solid 1px;
    border-radius: 20px;
    font-family: monospace;
    font-size: large;
    letter-spacing: 2px;
    margin: 10px;

}

.avatar {
    margin-top: 20px;
    width: 150px;
    border-radius: 50%;
}

#edit {
    width: 30px;
    height: 30px;
    background-color: transparent;
    border: none;
}

h3 {
    display: inline-block;

}

h4 {
    display: inline-block;
    font-weight: normal;

}

#notif_box {

    width: 600px;
    height: auto;
    background-color: #f5f6fa;
    padding: 30px;
    border-radius: 30px;
}

#navbar {
    position: fixed;
    height: 150px;
    width: 100%;
    top: 0px;
    background-color: white;
    border-bottom: solid 1px black;
    z-index: 2;
}

#footbtn {
    top: 0px;
    margin-bottom: 20px;
    float: right;
    font-size: large;
    background-color: transparent;
    padding: 20px;
    margin-top: 1px;
    border: transparent solid 1px;
    z-index: 2;
}

#navbarbtn {
    top: 0px;
    font-size: large;
    background-color: transparent;
    padding: 20px;
    margin-bottom: 20px;
    border: transparent solid 1px;
    z-index: 2;
}

#navbarbtn:hover,
#footbtn:hover,
#edit:hover,
#cancel:hover,
#addm:hover {
    border: 1px black solid;
    background-color: transparent;
    z-index: 2;
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