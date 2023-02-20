<?php
session_start();
require_once '../connect.php';

// ADD QUESTION
if (isset($_POST['save_question_btn'])) {
    $titre = $_POST['titre'];
    $note = $_POST['note'];
    $quizId = $_SESSION['quizId'];
    $options = $_POST['options'];

    // if($titre==NULL || $description==NULL || $temps==NULL || $noteMax==NULL){
    //     $res=[
    // 		"status"=>422,
    // 		"message"=>"Champs requis"
    // 	];
    // 	echo json_encode($res);
    // 	return false;
    // }

    $sql = "INSERT INTO questions (titre_qs, note_qs, id_qz) VALUES ('$titre', '$note', '$quizId')";
    $query = $db->prepare($sql);

    if ($query->execute()) {
        $idQuestion = $db->lastInsertId();
        for ($i = 0; $i < count($options); $i++) {
            $query = $db->prepare("INSERT INTO options (nom_opt, id_qs) VALUES ('$options[$i]','$idQuestion')");
            $query->execute();
        }
        $res = [
            "status" => 200,
            "message" => "Question et options ajoutés"
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            "status" => 500,
            "message" => "Une erreur est survenue"
        ];
        echo json_encode($res);
        return false;
    }
}

// GET ALL QUESTIONS FOR PARTICULAR QUIZ

if (isset($_GET['questions'])) {
    $quizId = $_SESSION['quizId'];

    $sql = "SELECT * FROM questions  WHERE id_qz='$quizId';";
    $query = $db->prepare($sql);
    if ($query->execute()) {
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $output = '';
        $count = 0;
        foreach ($result as $row) {

            $output .= '<br>
                    <div class="card">
                        <div class="card-body ">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-12 ">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <i class="bi-search"></i><h4> Q' . ($count + 1) . ') ' . $row['titre_qs'] . '</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Note:' . $row['note_qs']  . '</h5>
                                        </div>
                                    </div>';
            $idQuestion = $row['id_qs'];

            $sql = "SELECT * FROM options WHERE id_qs='$idQuestion';";
            $query = $db->prepare($sql);
            $query->execute();
            $options = $query->fetchAll(PDO::FETCH_ASSOC);
            $cou = 0;


            foreach ($options as $option) {

                $output .= '<div class="d-flex flex-wrap">
                                <div class="col-md-2"><p>' . ($cou + 1) . ') ' . $option['nom_opt'] . '</p></div>
                            </div>';

                $cou++;
            }

            if ($row['id_option'] == NULL) {
                $output .=
                    ' 
                <div class="border-bottom"></div>

                <div class="row">
                <div class="col-md-2">
                    <p style="display:none" class="mb-0 id">' . $row['id_qs'] . '</p>
                    <a style="text-decoration:none" class="text-danger deleteQuestion_btn" href="javascript:void(0)">Supprimer</a>
                </div>
            

                <div class="col-md-2 ">
                    <p style="display:none" class="mb-0 id">' . $row['id_qs'] . '</p>
                    <a style="text-decoration:none" class="text-success editQuestion_btn" href="javascript:void(0)">Modifier</a>
                </div>
                    <div class="col-md-4">
                        <p style="display:none" class="mb-0 id">' . $row['id_qs'] . '</p>
                        <button class="btn btn-success addReponse_btn">Ajouter reponse</button> 
                    </div>
                </div>
                    </div>
                            </div>
                        </div>
                    </div>';
            } else {
                $idOption = $row['id_option'];
                $sql = "SELECT * FROM options WHERE id_opt='$idOption';";
                $query = $db->prepare($sql);
                $query->execute();
                $option = $query->fetch(PDO::FETCH_ASSOC);
                $output .=
                    ' 
                    <div class="col-md-2">
                    <p style="display:none" class="mb-0 id">' . $row['id_qs'] . '</p>
                    <a style="text-decoration:none" class="text-primary editReponse_btn" href="javascript:void(0)">Changer reponse</a>
                </div>
                <div class="border-bottom"></div> 
                <p class="mb-0 id"><b>Bonne reponse:</b> ' . $option['nom_opt'] . '</p>
                <div class="row">
                    

                    <div class="col-md-2">
                        <p style="display:none" class="mb-0 id">' . $row['id_qs'] . '</p>
                        <a style="text-decoration:none" class="text-danger deleteQuestion_btn" href="javascript:void(0)">Supprimer</a>
                    </div>
                    

                    <div class="col-md-2 ">
                        <p style="display:none" class="mb-0 id">' . $row['id_qs'] . '</p>
                        <a style="text-decoration:none" class="text-success editQuestion_btn" href="javascript:void(0)">Modifier</a>
                    </div>
                </div>

                    </div>
                            </div>
                        </div>
                    </div>';
            }


            $count++;
        }
        echo $output;

        // $res=[
        //     "status"=>200,
        //     "res"=>$query->fetchAll(PDO::FETCH_ASSOC),

        // ];
        // echo json_encode($res);
        // return false;
    } else {
        // $res=[
        //     "status"=>500,
        //     "message"=>"Une erreur est survenue"
        // ];
        // echo json_encode($res);
        // return false;
    }
}

// RECUPERER OPTION D'UNE QUESTION

if (isset($_GET['questionId'])) {
    $questionId = $_GET['questionId'];
    // $_SESSION['quizId']=$quizId;




    $sql = "SELECT * FROM options WHERE id_qs='$questionId';";
    $query = $db->prepare($sql);
    if ($query->execute()) {
        $res = [
            "status" => 200,
            "res" => $query->fetchAll(PDO::FETCH_ASSOC),

        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            "status" => 500,
            "message" => "Une erreur est survenue"
        ];
        echo json_encode($res);
        return false;
    }
}


// RECUPERER UNE QUESTION

if (isset($_GET['idQuestion'])) {
    $questionId = $_GET['idQuestion'];
    $_SESSION['idQuestion'] = $_GET['idQuestion'];




    $sql = "SELECT * FROM questions WHERE id_qs='$questionId';";
    $query = $db->prepare($sql);
    if ($query->execute()) {
        $sql = "SELECT * FROM options WHERE id_qs='$questionId';";
        $que = $db->prepare($sql);
        $que->execute();
        $res = [
            "status" => 200,
            "res" => $query->fetch(PDO::FETCH_ASSOC),
            "opt" => $que->fetchAll(PDO::FETCH_ASSOC)

        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            "status" => 500,
            "message" => "Une erreur est survenue"
        ];
        echo json_encode($res);
        return false;
    }
}


// MODIFIER UNE QUESTION
if (isset($_POST['edit_question_btn'])) {

    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $note = $_POST['note'];
    $options = $_POST['options'];


    // if($titre==NULL || $description==NULL || $temps==NULL || $noteMax==NULL){
    //     $res=[
    // 		"status"=>422,
    // 		"message"=>"Champs requis"
    // 	];
    // 	echo json_encode($res);
    // 	return false;
    // }

    $sql = "UPDATE questions SET titre_qs='$titre', note_qs='$note' WHERE id_qs='$id';";
    $query = $db->prepare($sql);

    if ($query->execute()) {
        // $idQuestion = $db->lastInsertId();
        for ($i = 0; $i < count($options); $i++) {
            $query = $db->prepare("INSERT INTO options (nom_opt, id_qs) VALUES ('$options[$i]','$id')");
            $query->execute();
        }
        $res = [
            "status" => 200,
            "message" => "Question et options modifiés"
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            "status" => 500,
            "message" => "Une erreur est survenue"
        ];
        echo json_encode($res);
        return false;
    }
}

// SUPPRIMER UNE QUESTION
if (isset($_POST['btndelete'])) {
    $id = $_POST['id'];



    $sql = "DELETE FROM questions WHERE id_qs='$id'";

    $query = $db->prepare($sql);

    if ($query->execute()) {
        $res = [
            "status" => 200,
            "message" => "Question supprimée"
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            "status" => 500,
            "message" => "Une erreur est survenue"
        ];
        echo json_encode($res);
        return false;
    }
}


require_once '../close.php';
