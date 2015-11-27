<?php
session_start();
$user;
$isLoggedIn = false;
if(isset($_SESSION["username"])) {
    $user = $_SESSION["username"];
    $isLoggedIn = true;
}
?>
<style>
    #container {
        width: 100%;
        height: 50px;
        background-color: darkblue;
    }
    #button-container {
        width: 50%;
        height: 50px;
        margin: 0 auto;
        background-color: blue;
    }
    .button {
        float: left;
        width: 25%;
        height: 50px;
        text-align: center;
        background-color: blue;
        transition: background-color 1s;
    }
    .navlink {
        color: white;
        text-decoration: none;
        font-size: 40px;
        font-family: "Verdana";
        transition: color 1s;
    }
    .navlink:hover {
        color: black;
    }
    .button:hover {
        background-color: white;
    }
</style>

<div id="container">
    <div id="button-container">
        <a class="navlink" href="/shop/">
            <div class="button">home</div>
        </a>
        <a class="navlink" href="/shop/browse/">
            <div class="button">browse</div>
        </a>
        <a class="navlink" href="/shop/user/">
            <div class="button"><?php echo $user;?></div>
        </a>
        <?php
        if($isLoggedIn)
            echo "<a class='navlink' href='/shop/logout/'><div class='button'>logout</div></a>";
        else
            echo "<a class='navlink' href='/shop/login/'><div class='button'>login</div></a>";
        ?>
    </div>
</div>