<?php 
    session_start();
    require_once("../Controller/reservation.class.php");

    $id = $_SESSION['id'];
    $idcircuit = $_GET['idcircuit'];

    if (isset($_SESSION['id'])) {
        if ($_SESSION !== "") {
            $reservation = new reservation($idcircuit, $id);
            header("location:./index.php?voyage=true");
        }
}else {
    header("location:./voyage.php?voyage=false");
}