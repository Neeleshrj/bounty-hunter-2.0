<!DOCTYPE html>
<html>
<title>Homepage</title>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" data-auto-replace-svg="nest"></script>

<?php 
    
    session_unset();
    

?>

<body style="font-family: 'Lucida Sans';letter-spacing:2px;margin:auto;">

    <div id="navbar">
        <ul>
            <a href="index.php"><img src="imgs/logo2.png" id="logoimg" /></a>
            <a href="#contactus"><button id="navbarbtn">CONTACT US <i class="fas fa-at"
                        style="font-size:24px;"></i></button></a>
            <a href="#aboutus"><button id="navbarbtn">ABOUT US <i class="fas fa-address-card"
                        style="font-size:24px;"></i></button></a>
            <a href="login.php"><button id="navbarbtn">LOGIN <i class="fas fa-sign-in-alt"
                        style="font-size:24px;"></i></button></a>
        </ul>
    </div>
    <div id="main">
        <img src="imgs/work1.jpg" id="bgimage" />
        <center>
            <div id="midtextbox">
                <h4>
                    Bounty Hunter gives you opportunity to Earn & Work Whenever You Want / Need.
                    <ul>
                        <li>Earn Round the Clock!</li>
                        <li>Work By Choice!</li>
                    </ul>
                </h4>
            </div>
        </center>
        <div id="sidebox">
            <ul>
                <h4 id="textbox">Bounty Hunter allows freelancers like you to work for anyone.</h4>
                <h4 id="textbox">You can earn anywhere,anytime and in multiple ways,all you need is a skill</h4>
                <h4 id="textbox">Sign Up Today!</h4>
            </ul>
        </div>
        <img src="imgs/work2.jpg" id="bgimage" style="width: 50%;float:left" />

        <div id="aboutus">
            <ul>
                <img src="imgs/ava1.png" id="avatar" style="float:left" />
                <h4 style="float:left">Neelesh Ranjan Jha</h4><br><br>
                <h4 style="float:left">19BCE1645</h4>
            </ul>
            <ul>
                <img src="imgs/ava1.png" id="avatar" style="float:right" />
                <h4 style="float:right">Devang Dayal</h4><br><br>
                <h4 style="float:right">19BCE1527</h4>
            </ul>
            <center>
                <h2 style="font-weight: normal;">We are a 2 man team working to provide the best experience to our
                    customers!</h4>
            </center>
        </div>
        <img src="imgs/main-bg.jpg" id="bgimage1" />
        <div id="contactus">
            <center>
                <h4>Reach us by filling this form!</h4>
                <form>
                    <input type="email" placeholder="Email Address..." /><br><br>
                    <input type="text" placeholder="Full Name..." /><br><br>
                    <input type="submit" value="submit" id="loginbtn" /><br>
                </form>

                <p>Follow us on Instagram @bountyhunter</p><i class="fab fa-instagram" style="font-size:36px"></i>
                <p>Reach us out on Linked in! @bountyhunter</p><i class="fab fa-linkedin" style="font-size:36px"></i>

            </center>
        </div>
    </div>




</body>



</html>


<style>
#contactus {
    height: 400px;
    width: 80%;
    background-color: #f5f6fa;
    margin-top: 50px;
    padding: 30px;
    margin-left: 10%;
    margin-bottom: 50px;
    border-radius: 50px;

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

#loginbtn {
    margin-top: 10px;
    background-color: #3498db;
    padding: 5px;
    color: white;
    width: 20%;
    font-weight: normal;
    text-align: center;
    font-size: 20px;
    letter-spacing: 2px;
    border: #3498db solid;
    border-radius: 100px;
    outline-width: 0;
}

#navbar {
    position: absolute;
    overflow-y: auto;
    /* border-bottom: solid 1px black; */
    height: 200px;
    top: 0px;
    width: 100%;
    z-index: 2;
}

#main {
    position: absolute;
    overflow-y: auto;

}

#avatar {
    height: 200px;
    width: 200px;
    border-radius: 20px;

}

#textbox {
    font-size: larger;
    letter-spacing: 2px;
    font-weight: normal;
}

#logoimg {
    top: 0px;
    height: 130px;
    width: 200px;
    float: left;
    z-index: 2;
}

#sidebox {
    display: inline-block;
    position: relative;
    z-index: 2;
    height: 500px;
    width: 30%;
    text-align: right;
    margin-left: 50px;
    background-color: #f5f6fa;
    border-radius: 50px;
}

#navbarbtn {
    top: 0px;
    float: right;
    font-size: large;
    background-color: transparent;
    padding: 20px;
    border: transparent solid 1px;
    z-index: 2;
}

#navbarbtn:hover {
    border: 1px black solid;
    float: right;
    font-size: large;
    background-color: transparent;
    padding: 20px;

    z-index: 2;
}

#aboutus {
    border-radius: 50px;
    height: 450px;
    position: relative;
    padding: 20px;
    margin-top: 100px;
    z-index: 2;
    background-color: #f5f6fa;

}

#midtextbox {
    height: 150px;
    padding: 20px;
    margin-bottom: 40px;
    width: 60%;
    position: relative;
    z-index: 2;
    font-size: large;
    background-color: #f5f6fa;
    border-radius: 50px;
}

#bgimage {
    /* position: relative; */
    margin-top: 50px;
    top: 0;

    width: 100%;
    /* height: 1080px; */
    z-index: 1;
}

#bgimage1 {
    /* position: relative; */
    width: 80%;
    margin-left: 15%;
    height: 500px;
    /* height: 1080px; */
    z-index: 1;
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