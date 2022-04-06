<?php 
    session_start();
    require_once("../Controller/reservation.class.php");

    $idcircuit = $_GET['idcircuit'];

    if (isset($_SESSION['id'])) {

        $id = $_SESSION['id'];

        if ($_SESSION !== "") {
            $reservation = new reservation($idcircuit, $id);
            $reservation->add($idcircuit, $id);
            $reservation->maj($idcircuit, $reservation->getNp());
            header("location:./index.php?voyage=1&id=$idcircuit");
        }
}else {
    header("location:./voyage.php?voyage=2&id=$idcircuit");
}