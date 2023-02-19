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

// GET ALL QUESTIONS

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
                                            <h4> Q' . ($count + 1) . ') ' . $row['titre_qs'] . '</h4>
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

                $output .= '<div class="row">
                                <div class="col-md-2"><p>' . ($cou + 1) . ') ' . $option['nom_opt'] . '</p></div>
                            </div>';

                $cou++;
            }

            if ($row['id_option'] == NULL) {
                $output .=
                    ' 
                <div class="border-bottom"></div> 
                <p style="display:none" class="mb-0 id">' . $row['id_qs'] . '</p>
                <button class="btn btn-success addReponse_btn">Ajouter reponse</button> 
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
                <div class="border-bottom"></div> 
                <p class="mb-0 id"><b>Bonne reponse:</b> ' . $option['nom_opt'] . '</p>

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

if(isset($_GET['questionId'])){
    $questionId = $_GET['questionId'];
    // $_SESSION['quizId']=$quizId;




    $sql= "SELECT * FROM options WHERE id_qs='$questionId';";
    $query=$db->prepare($sql);
    if($query->execute()){
        $res=[
            "status"=>200,
            "res"=>$query->fetchAll(PDO::FETCH_ASSOC),

        ];
        echo json_encode($res);
        return false;
    }else{
        $res=[
            "status"=>500,
            "message"=>"Une erreur est survenue"
        ];
        echo json_encode($res);
        return false;
    }
}


require_once '../close.php';
