<html>
<title>Register</title>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<?php
        require 'dbconfig/config.php';
        if (isset($_POST['signup_btn'])) {


            $fname = $_POST['fname'];
            $gen = $_POST['gender'];
            $cntnumber = $_POST['cntnumber'];
            $email = $_POST['email'];
            $userid = $_POST['userid'];
            $pass = $_POST['pass'];
            $cpass = $_POST['cpass'];
            if ($pass == $cpass) {
                $query = "SELECT * FROM userinfo WHERE userid= '$userid' ";

                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    echo '<script type="text/javascript"> alert("Username already exists,try another name") </script>';
                } else {

                    $query = "INSERT INTO userinfo VALUES('$fname','$gen','$cntnumber','$email','$userid','$pass' )";
                    $query_run = mysqli_query($con, $query);

                    if ($query_run) {
                        echo '<script type="text/javascript"> alert("User Registered!") </script>';
                        
                        echo '<script>window.location.href = "./index.php";</script>';
                    } else {
                        echo '<script type="text/javascript"> alert("Error!") </script>';
                    }
                }
            } else {
                echo '<script type="text/javascript"> alert("Error!Password and confirm password do not match!") </script>';
            }
        }

        ?>


<body style="font-family:'Lucida Sans';">

    <div id="sidebox">
        <center>
            <script>
            function picture(fieldvalue) {
                switch (fieldvalue) {
                    case 1:
                        document.getElementById("image").src = 'imgs/ava1.png';
                        break;
                    case 2:
                        document.getElementById("image").src = 'imgs/ava2.png';
                        break;
                    case 3:
                        document.getElementById("image").src = 'imgs/ava3.png';
                        break;
                }
            }
            </script>

            <img src="imgs/ava1.png" class="avatar" id="image" />

        </center>
    </div>
    <center>
        <div id="formbox">
            <img src="imgs/login2.jpg" id="sideimg" />
            <form id="register" action="register.php" method="post" enctype="multipart/form-data" autocomplete="off">

                <input name="fname" id="fname" type="text" class="inputvalues"
                    style="margin-top:25px;margin-bottom:15px;" placeholder="Enter your Full Name"
                    onblur="validate()" />
                <div id="name_err" style="display: inline-block"></div><br>
                <br>

                <label style="margin-left:10px;font-size: medium;letter-spacing: 1px;"><b>Gender: </b>
                    </lable>
                    <input name="gender" type="radio" class="radiobtn" value="male" onclick="picture(1)" checked
                        required>Male

                    <input name="gender" type="radio" class="radiobtn" value="female" onclick="picture(2)"
                        required>Female

                    <input name="gender" type="radio" class="radiobtn" value="others" onclick="picture(3)"
                        required>Others<br>


                    <input name="cntnumber" type="tel" style="margin-top:15px;" class="inputvalues"
                        placeholder="Enter your contact number" /> <br><br>


                    <input name="email" id="email" type="email" class="inputvalues" placeholder="Enter your email id"
                        onblur="validate()" />
                    <div id="email_err" style="display: inline-block"></div>
                    <br><br>

                    <input name="userid" id="userid" type="text" class="inputvalues" placeholder="Enter a username"
                        onblur="validate()" />
                    <div id="userid_err" style="display: inline-block"></div>
                    <br><br>

                    <input name="pass" id="pass" type="password" class="inputvalues" placeholder="Enter a password"
                        onblur="validate()" />
                    <div id="pass_err" style="display: inline-block"></div>
                    <br><br>

                    <input name="cpass" id="cpass" type="password" class="inputvalues"
                        placeholder="Confirm your password" onblur="validate()" style="margin-bottom:15px;" />
                    <div id="cpass_err" style="display: inline-block"></div><br><br>

                    <input type="checkbox" id="terms" name="terms" value="True"
                        style="font-weight: bold;font-size: medium;letter-spacing: 1px;" required />
                    I agree to the Terms of use
                    <br>


                    <a href="index.php"><input name="signup_btn" type="submit" id="signup_btn" value="REGISTER" /></a>
                    <script type="text/javascript" src="js/register.js"></script>
                    <br><br>

                    <a href="login.php"><input name="backlg_btn" type="button" id="backlg_btn" value="BACK" /></a>

            </form>
        </div>
        <center>


</body>

</html>

<style>
#formbox {
    position: absolute;
    display: flex;

    height: 650px;
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

#register {

    width: 380px;
    padding: 20px;
    border-radius: 10px;
    height: 580px;
    float: right;

}

#sidebox {
    height: 200px;
    width: 250px;
    background-color: white;
    position: absolute;
    right: 20px;
    top: 20px;
    border-radius: 20px;
    box-shadow: 0px 0px 40px;
}

.avatar {
    margin-top: 20px;
    width: 150px;
    border-radius: 50%;
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
    display: inline-block;
}

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="password"] {
    display: inline-block;
    padding: 12px 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    width: 380px;
    margin: 0 auto;
}


#signup_btn {
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

#signup_btn:hover,
#backlg_btn:hover {
    background-color: #aaa69d;
    border: #aaa69d solid;
    box-shadow: 0px 0px 40px grey;
    color: black;
}
</style>