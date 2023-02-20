<?php
require_once 'connect.php';
session_start();


// GET A QUIZ

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM questions WHERE id_qz='$id';";
    $query = $db->prepare($sql);
    if ($query->execute()) {
        $questions = $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
    }
} else {
    header('Location: index.php');
}

?>
<?php require('includes/header.php'); ?>
<div class="col-md-9 ">
    <form action="" method="post">
        <br>
        <?php $count = 0; ?>
        <?php foreach ($questions as $question) : ?>

            <div class="card">
                <div class="card-body ">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-12 ">
                            <div class="row">
                                <div class="col-md-6">
                                    <i class="bi-search"></i>
                                    <h4>Q<?= $count + 1 ?>) <?= $question['titre_qs'] ?> </h4>
                                    <input type="text" value="<?= $question['id_qs'] ?>" name="id" id="">
                                </div>
                                <div class="col-md-6">
                                    <h5></h5>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="col-md-2">
                                    <?php
                                    require_once 'connect.php';

                                    $idQuestion = $question["id_qs"];
                                    $sql = "SELECT * FROM options WHERE id_qs='$idQuestion';";
                                    $query = $db->prepare($sql);
                                    $query->execute();
                                    $options = $query->fetchAll(PDO::FETCH_ASSOC);

                                    ?>
                                    <?php foreach ($options as $option) : ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="<?= $option['id_qs'] ?>" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <?= $option['nom_opt'] ?>
                                            </label>
                                        </div>

                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <?php $count++; ?>
        <?php endforeach; ?>


    </form>


</div>
<div class="col-md-3 ">
    <br>
    <div class="card">
        <div class="card-body ">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-12 ">
                    <div class="row">
                        <div class="col-md-6">
                            <i class="bi-search"></i>
                            <h4> </h4>
                        </div>
                        <div class="col-md-6">
                            <h5></h5>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap">
                        <div class="col-md-2">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<?php require('includes/footer.php'); ?>