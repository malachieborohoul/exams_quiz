<?php
session_start();
require_once '../connect.php';

$quizId = $_SESSION['quizId'];

$sql = "SELECT * FROM questions  WHERE id_qz='$quizId';";
$query = $db->prepare($sql);
if ($query->execute()) {
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $output = '';
    $count=0;
    foreach ($result as $row) {

        $output .= '<br>
                    <div class="card">
                        <div class="card-body ">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-12 ">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4> Q' . ($count+1).') '. $row['titre_qs'] . '</h4>
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
        $cou=0;


        foreach ($options as $option) {

            $output .= '<div class="row">
                                <div class="col-md-2"><p>'.($cou+1).') '.$option['nom_opt'] .'</p></div>
                            </div>';

                            $cou++;
        }

        if($row['id_option']==NULL){
            $output .=
                ' 
                <div class="border-bottom"></div> 
                <p style="display:none" class="mb-0 id">'.$row['id_qs']. '</p>
                <button class="btn btn-success addReponse_btn">Ajouter reponse</button> 
                    </div>
                            </div>
                        </div>
                    </div>';

        }else{
            $idOption=$row['id_option'];
            $sql = "SELECT * FROM options WHERE id_opt='$idOption';";
            $query = $db->prepare($sql);
            $query->execute();
            $option = $query->fetch(PDO::FETCH_ASSOC);
            $output .=
                ' 
                <div class="border-bottom"></div> 
                <p class="mb-0 id"><b>Bonne reponse:</b> '.$option['nom_opt']. '</p>

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
