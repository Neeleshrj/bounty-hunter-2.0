<html>

<title>Dashboard</title>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" data-auto-replace-svg="nest"></script>


<?php 
    session_start();
    if(!isset($_SESSION['username'])){
    echo '<script type="text/javascript"> alert("Error!You need to Login First!") </script>';
    echo '<script>window.location.href = "./login.php";</script>';
}
    

?>


<body style="font-family: 'Lucida Sans';letter-spacing:2px;margin:auto;">

    <div id="navbar">
        <ul>
            <img src="imgs/logo2.png" id="logoimg" />
            <a href="notifications.php"><button id="navbarbtn"><i class="fas fa-bell "
                        style="font-size:36px;"></i>Notifications</button></a>
            <a href="profile.php"><button id="navbarbtn"><i class="fas fa-users"
                        style="font-size:34px;"></i><?php echo " " ,$_SESSION['username']?></button></a>
            <button style="top: 0px;
                            float: right;
                            font-size: large;
                            background-color: transparent;
                            padding: 20px;
                            border: transparent solid 1px;margin-bottom: 20px;"><i class="fas fa-phone-square"
                    style="font-size:34px;"></i>
                1800-500-2020</button>
        </ul>

    </div>

    <div id="main_body">
        <div id="message">
            <p>Many are already using Bounty Hunter to find odd jobs and generate an income.What are you waiting for?
            </p>

        </div>
    </div>
    <div id="footer">
        <center>
            <ul>
                <a href="posttask.php"><button id="footbtn"><i class="fa fa-cubes" aria-hidden="true"
                            style="font-size:36px;"></i>
                        POST TASK</button></a>
                <a href="history.php"><button id="footbtn"><i class="fa fa-server" style="font-size:36px;"></i>
                        HISTORY</button></a>
                <a href="huntask.php"><button id="footbtn"><i class="fas fa-binoculars" style="font-size:36px;"></i>
                        HUNT
                        TASK</button></a>

                <a href="index.php"><button id="footbtn"><i class="fas fa-sign-out-alt"
                            style="font-size:36px;"></i>LOGOUT</button></a>
            </ul>
        </center>

    </div>


</body>

</html>

<style>
#message {
    font-family: "Trebuchet MS", Helvetica, sans-serif;
    font-size: 48px;
    letter-spacing: 2.6px;
    word-spacing: 2.4px;
    color: #6C2D18;
    font-weight: 700;
    text-decoration: none;
    font-style: normal;
    font-variant: normal;
    text-transform: uppercase;
    z-index: 3;
    width: 600px;
    height: 400px;
    margin-left: 700px;

    padding: 20px;
}

#main_body {
    position: absolute;
    overflow-y: auto;
    height: 80%;
    padding: 16px;
    z-index: 1;
    margin-top: 150px;
    background-color: #F7F7F7;
    width: 100%;
    background-image: url("imgs/man4.jpg");
    background-size: 600px 520px;
    background-repeat: no-repeat;
}



#logoimg {
    position: fixed;
    top: 0px;
    height: 130px;
    width: 200px;
    float: left;
    z-index: 2;
}

#footer {
    position: fixed;
    height: 150px;
    bottom: 0px;
    width: 100%;
    background-color: white;
    border-top: solid 1px black;
    z-index: 2;
}

#navbar {
    position: absolute;
    overflow-y: auto;
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
    border: transparent solid 1px;
    z-index: 2;
}

#navbarbtn {
    top: 0px;
    float: right;
    font-size: large;
    background-color: transparent;
    padding: 20px;
    margin-bottom: 20px;
    border: transparent solid 1px;
    z-index: 2;
}

#navbarbtn:hover,
#footbtn:hover {
    border: 1px black solid;

    font-size: large;
    background-color: transparent;
    padding: 20px;

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