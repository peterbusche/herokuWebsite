<?php
   session_start();
   /*
   if (!isset($_SESSION['auth'])) {
      header("Location: login.php");
      exit();
   } 
   */
?>

<html>
  <head>
    <link rel="stylesheet" href="styles/buttons.css">
    <link rel="stylesheet" href="styles/text.css">
    <link rel="stylesheet" href="styles/boxes.css">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">

  </head>
  <body>
      <div id="content">         
         <h1>Peter's Playhouse</h1>
      </div>
     
     <div id="nav">
         <ul>

            <li><a href="index.php"><button class="join-button">HOME</button></a></li>
            <li><a href="AllGames.php"><button class="join-button">ALL GAMES</button></a></li>
            <li><a href="Multiplayer.php"><button class="join-button">MULTIPLAYER</button></a></li>
            <li><a href="SinglePlayer.php"><button class="join-button">SINGLE PLAYER</button></a></li>
            <li><a href="Random.php"><button class="join-button">RANDOM</button></a></li>     
         </ul>
      </div>








      