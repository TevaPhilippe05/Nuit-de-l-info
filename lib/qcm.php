<?php

    // faire une connexion a la bdd 
    $conn = mysqli_connect("localhost", "root", "root", "quiz");
    mysqli_set_charset($conn, "utf8");

    function GetQuestions($conn)
    {
        $sql = "SELECT * FROM questions";
        $res = mysqli_query($conn, $sql);

        $data = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $data[] = $row;
        }
        return $data;
    }

    function GetQuestionById($conn, $id_question)
    {
        $id_question = (int)$id_question;

        $sql = "SELECT * FROM questions WHERE id = $id_question";
        $res = mysqli_query($conn, $sql);

        return mysqli_fetch_assoc($res);
    }

    function EstVrai($conn, $id_reponse)
    {
        $id_reponse = (int)$id_reponse;

        $sql = "SELECT estVrai FROM reponses WHERE id = $id_reponse";
        $res = mysqli_query($conn, $sql);

        $data = mysqli_fetch_assoc($res);
        return $data['estVrai'];
    }

    function GetReponsesByQuestionId($conn, $id_question)
    {
        $id_question = (int)$id_question;

        $sql = "SELECT * FROM reponses WHERE id_question = $id_question";
        $res = mysqli_query($conn, $sql);

        if (!$res) {
            die("ERREUR SQL GetReponsesByQuestionId : " . mysqli_error($conn));
        }

        $data = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $data[] = $row;
        }

        return $data;
    }

    function GetExplicationByQuestionId($conn, $id_question)
    {
        $id_question = (int)$id_question;

        $sql = "SELECT * FROM explications WHERE id_question = $id_question";
        $res = mysqli_query($conn, $sql);

        return mysqli_fetch_assoc($res);
    }