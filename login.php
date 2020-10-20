<html>
<title>Login</title>

<?php
        session_start();

        require 'dbconfig/config.php';
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $pass = $_POST['pass'];

            $query = "SELECT * FROM userinfo WHERE userid='$username' AND pass='$pass'";

            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) {
                $row = mysqli_fetch_assoc($query_run);
                $_SESSION['username'] = $row['userid'];
                $_SESSION['gender'] = $row['gen'];
                header('location:homepage.php');
            } else {
                echo '<script type="text/javascript"> alert("Invalid Credentials!") </script>';
            }
        }

        ?>


<body style="font-family:'Lucida Sans';">


    <center>
        <div id="formbox">
            <img src="imgs/login.jpg" id="sideimg" />
            <form id="login" method="POST" action="login.php">
                <input name="username" type="text" class="inputvalues" placeholder="Username" required /> <br><br>

                <input name="pass" type="password" class="inputvalues" placeholder="Password" required /><br><br>

                <input name="login" type="submit" id="loginbtn" value="LOGIN" />

                <h4 style="letter-spacing:2px;font-size:large;font-weight:normal">Not a user yet?</h4>
                <a href="register.php"><input type="button" id="register_btn" value="REGISTER" /></a><br>
                <a href="index.php"><input name="backlg_btn" type="button" id="backlg_btn" value="BACK" /></a>

            </form>
        </div>
        <center>


</body>

</html>

<style>
#formbox {
    position: absolute;
    display: flex;
    margin-top: 80px;
    height: 500px;
    width: 50%;
    background-color: transparent;
    flex-direction: row;
    padding: 50px;
    border-radius: 20px;
    background: white;

    margin-left: 20%;
    box-shadow: 0px 0px 40px;
}

#sideimg {
    margin-top: 50px;
    width: 50%;
    height: 80%;
    border-radius: 200px;

}

#login {
    margin-top: 70px;
    width: 380px;
    padding: 20px;
    border-radius: 10px;
    height: 330px;
    float: right;

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

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="password"] {

    padding: 12px 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    width: 380px;
    margin: 0 auto;
}


#loginbtn {
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

#backlg_btn {
    margin-bottom: 20px;
    background-color: #00a8ff;
    padding: 5px;
    color: white;
    width: 30%;

    text-align: center;
    font-size: 20px;
    border-radius: 100px;
    border: #00a8ff;
    outline-width: 0;
}

#register_btn {
    margin-bottom: 20px;
    background-color: #d63031;
    padding: 5px;
    color: white;
    width: 50%;
    text-align: center;
    font-size: 20px;
    letter-spacing: 2px;
    border: #d63031 solid;
    border-radius: 100px;
    outline-width: 0;
}

#loginbtn:hover,
#register_btn:hover,
#backlg_btn:hover {
    background-color: #aaa69d;
    border: #aaa69d solid;
    box-shadow: 0px 0px 40px grey;
    color: black;
}
</style>