<?php
session_start();
?>

<?php
    include_once 'db/includes/header.php';
?>
<title>Inviter - Nivelo</title>
</head>
<body>

<?php
    include_once 'db/includes/nav.php';
?>

<?php
if(isset($_SESSION['useruid'])){
echo "
<section style='margin-top: 75px;'>
    <div style='padding: 25px;font-size: 1.5rem;'>
        <div class='title sysText' style='text-align: center;'>Lav et nyt chatrum</div>
    </div>
    <div class='modal-bodyi'>
        <form class='form' action='chat_submit.php' method='POST' style='background-color: var(--b);border: none;width: 500px;'>
        <label class='label' for='bruger' style='color: #818181;font-size: 18px;'>Brugernavnet på den inviterede</label>
        <input class='input3' type='text' required name='bruger' id='bruger' placeholder='mhvidtfeldt...' style='margin-bottom:30px;margin-top:15px'>
        
        <label class='label' for='room_name' style='color: #818181;font-size: 18px'>Chatnavn</label>
        <input class='input3'  type='text' required name='room_name' id='name' placeholder='Feedback til Logo...' style='margin-bottom:5px;margin-top:15px'>
            <input type='hidden' name='user_from' value='{$_SESSION['useruid']}'>

            <!-- <small class=' style='font-weight: 300'>Glemt adgangskode?</small> -->

            <div class='modal-spc' style='text-align:center;'>
                <button class='modal-btn' type='submit' name='submit'>Lav chat</button>
            </div>
        </form>
    </div>";

?>
    
    <?php
    // INSERT INTO chat_room (name) VALUES ('My Chat Room');

        if(isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all fields!</p>";
            }
            else if($_GET["error"] == "wronglogin") {
                echo "<p>Incorrect login!</p>";
            }
        }
    ?>

<?php echo "</section>";

}

else {
    echo "<div class='aalign'>";
    echo "<p style='margin-top: 25px;text-align:center'>Du har ikke adgang! <br> Log på for at invitere en bruger til et chatrum.</p>";

    echo "<div class='modal-spc' style='text-align:center;'>";
    echo "<a href='/login.php'><button class='modal-btn'>Log på</button></a>";
    echo "</div>";
    echo "</div>";
}


?>

<div id="preloader" class="loader"></div>




<?php
    include_once 'db/includes/footer.php';
?>

<link rel="stylesheet" href="css/palette-selector.css">