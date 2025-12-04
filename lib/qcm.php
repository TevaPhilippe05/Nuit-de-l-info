<?php
    // crud et mysql 
    mysqli_fetch_assoc($rs); // permet d'avoir le resultat de la requette ligne par ligne 
    // faire une connexion a la bdd 
    $conn = mysqli_connect("localhost", "root", "root" ,"quiz");
    mysqli_set_charset($conn, "utf8");

    function GetQuestions($conn){
        $sql="SELECT * FROM questions";
        $res=mysqli_query($conn, $sql);
        return $res ;
    }

    function GetQuestionById($conn, $id_question){
        $sql="SELECT * FROM questions WHERE id = $id_question";
        $res=mysqli_query($conn, $sql);
        return $res ;
    }

    function EstVrai($conn, $id_reponse){
        $sql="SELECT estVrai FROM reponse WHERE id = $id_reponse";
        $res=mysqli_query($conn, $sql);
        return $res ;
    }

    function GetReponsesByQuestionId($conn, $id_question){
        $sql="SELECT * FROM reponse WHERE id = $id_question";
        $res=mysqli_query($conn, $sql);
        return $res ;
    }
    // deconnecter 
    mysqli_close($conn);
?>