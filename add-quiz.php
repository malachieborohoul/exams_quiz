<?php require('includes/header.php') ?>
<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3 class="card_title">Ajouter un quiz</h3>
        </div>
        <div class="card-body ">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8 ">
                    <form id="addQuiz">
                        <div class="form-group">
                            <input type="text" name="titre" class="form-control" placeholder="Entrez le titre" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <textarea class="form-control " name="description" placeholder="Entrez description" rows="8" required></textarea>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="time" name="temps" class="form-control" placeholder="Entrez le titre" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="number" name="noteMax" class="form-control" placeholder="Note maximum" required>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <button name="btnsave" class="btn btn-success">Ajouter</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>


</div>
<?php require('includes/footer.php') ?>

<script>
    $(document).ready(function() {

        $('#addQuiz').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('btnsave', true);
            $.ajax({
                method: "POST",
                url: "controllers/add-quiz.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                        err(res.message)
                    } else if (res.status == 200) {
                        $('#addQuiz')[0].reset();
                        suc(res.message)

                    }
                }
            });
        });
    });

    function suc(msg) {
        Swal.fire(
            msg,
            'Cliquer sur le boutton!',
            'success'
        )
    }

    function err(msg) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Une erreur est survenue!',
        })
    }
</script>