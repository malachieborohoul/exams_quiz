<?php session_start(); ?>
<?php require('includes/header.php') ?>



<!-- Modal Modifier une option -->
<div class="modal" id="editOptionModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editOption">


                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Modifier une option</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="form-group">
                            <input type="text" style="display: none;" name="id" class="form-control id" placeholder="Entrez le titre" required>
                        </div>

                        <div class="form-group">
                            <input type="text" name="nom" class="form-control nom" placeholder="Entrez le titre" required>
                        </div>
                        <br>


                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <button name="btnedit" class="btn btn-success">Modifier</button>
                            </div>
                        </div>



                    </div>
                </div>
            </form>


        </div>
    </div>

</div>

<!--  Modal de suppression option -->
<div class="modal fade" id="deleteOptionModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form id="deleteOption">
                <!-- Modal body -->
                <div class="modal-body justify-content-center">
                    <input type="hidden" name="id" id="deleteId">
                    Voulez vous supprimer ?
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-dismiss="modal">Fermer</button>
                    <button name="btndelete" class="btn btn-danger cdelete_btn">Oui</button>
                    <div class="spinner_Delete"></div>
                </div>

            </form>


        </div>
    </div>
</div>

<!--  Modal de suppression -->
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form id="delete">
                <!-- Modal body -->
                <div class="modal-body justify-content-center">
                    <input type="hidden" name="id" id="deleteId">
                    Voulez vous supprimer ?
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-dismiss="modal">Fermer</button>
                    <button name="btndelete" class="btn btn-danger cdelete_btn">Oui</button>
                    <div class="spinner_Delete"></div>
                </div>

            </form>


        </div>
    </div>
</div>
<!-- Modal Modifier un quiz -->
<div class="modal" id="editQuizModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editQuiz">


                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title justify-content">Modifier un quiz</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="form-group">
                            <input type="text" style="display: none;" name="id" class="form-control id" placeholder="Entrez le titre" required>
                        </div>

                        <div class="form-group">
                            <input type="text" name="titre" class="form-control titre" placeholder="Entrez le titre" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <textarea class="form-control description" name="description" placeholder="Entrez description" rows="8" required></textarea>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="time" name="temps" class="form-control temps" placeholder="Entrez le titre" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="number" name="noteMax" class="form-control noteMax" placeholder="Note maximum" required>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <button name="btnedit" class="btn btn-success">Modifier</button>
                            </div>
                        </div>



                    </div>
                </div>
            </form>


        </div>
    </div>

</div>

<!-- Modal Ajouter une question -->
<div class="modal" id="addQuestionModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addQuestion">


                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title justify-content">Ajouter une question</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">

                        <div class="form-group">
                            <label><span class="text text-danger">* </span>Titre </label>
                            <input type="text" name="titre" class="form-control" required>
                            <span id='error_nom' class="text text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label><span class="text text-danger">* </span>Note </label>
                            <input type="number" name="note" class="form-control" required>
                            <span id='error_nom' class="text text-danger"></span>
                        </div>
                        <br>

                        <a href="javascript:void(0)" class="addOptionBtn btn btn-success">AJouter option</a>
                        <div class="options"></div>



                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                            <button class="btn btn-primary save_question_btn">Ajouter</button>
                            <div class="spinner"></div>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
</div>


<!-- Modal Modifier une question -->
<div class="modal" id="editQuestionModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editQuestion">


                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title justify-content">Modifier une question</h4>
                    <div class="spinner"><span class='spinner-border  text-primary'></span><span class='spinner-border  text-primary'></span></div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="form-group">
                            <label><span class="text text-danger">* </span>Id </label>
                            <input type="hidden" name="id" class="form-control id" required>
                            <span id='error_nom' class="text text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label><span class="text text-danger">* </span>Titre </label>
                            <input type="text" name="titre" class="form-control titre" required>
                            <span id='error_nom' class="text text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label><span class="text text-danger">* </span>Note </label>
                            <input type="number" name="note" class="form-control note" required>
                            <span id='error_nom' class="text text-danger"></span>
                        </div>
                        <br>
                        <h6>Options</h6>
                        <div class="old_options">

                        </div>

                        <a href="javascript:void(0)" class="addOptionBtn btn btn-success">AJouter option</a>
                        <div class="options"></div>



                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                            <button class="btn btn-primary save_question_btn">Ajouter</button>
                            <div class="spinner"></div>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
</div>

<!-- Modal Ajouter une reponse -->
<div class="modal" id="addReponseModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addReponse">


                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title justify-content">Ajouter une reponse</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <input type="text" name="question_id" style="display:none" class="question_id">

                        <select class="form-control" name="reponse" id="reponse">

                        </select>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                            <button class="btn btn-primary save_reponse_btn">Ajouter</button>
                            <div class="spinner"></div>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
</div>

<div class="col-md-9 quizdata">
    <div class="spinner_quiz"></div>
    <div class="ajouter-question"></div>

</div>

</div>
</div>
<?php require('includes/footer.php') ?>



<script>
    $(document).ready(function() {
        // echo json_encode($_SESSION['quizId'])
        // getQuestions();

        getQuiz();

        //Supprimer option
        $("#deleteOption").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('btndelete', true);
            $.ajax({
                method: "POST",
                url: "controllers/options.php",
                data: formData,
                processData: false,
                contentType: false,
                // beforeSend: function () {
                //     $('.spinner_Delete').html("<span class='spinner-border  text-primary'></span><span class='spinner-border  text-primary'></span>");
                // },
                success: function(response) {
                    var res = jQuery.parseJSON(response);

                    console.log(res)

                    // $('.spinner_Delete').html("");
                    var questionId = res.res.id_qs

                    $.ajax({
                        method: "GET",
                        url: "controllers/questions.php?idQuestion=" + questionId,

                        success: function(response) {
                            var res = jQuery.parseJSON(response);
                            $('.old_options').html('')


                            $('.id').val(res.res.id_qs)
                            $('.titre').val(res.res.titre_qs)
                            $('.note').val(res.res.note_qs)
                            $.each(res.opt, function(index, value) {
                                $('.old_options').append('<div class="row">\
                            <div class="col-md-6">' + value.nom_opt + '</div>\
                            <div class="col-md-2">\
                                <p style="display:none" class="mb-0 id">' + value.id_opt + '</p>\
                                <a class="editOption_btn" href="javascript:void(0)">Modifier</a></div>\
                            <div class="col-md-2">\
                                <p style="display:none" class="mb-0 id">' + value.id_opt + '</p>\
                                <a class="deleteOption_btn" href="javascript:void(0)">Supprimer</a></div>\
                            </div>')
                            });

                            $('.old_options').append('<br>')
                            $('#editQuestionModal').modal('show')


                        }
                    });
                    $('#editQuestionModal').modal('show')

                    succ(res.message)

                }
            });
        });

        //Ouvir modal Supprimer une option
        $(document).on('click', '.deleteOption_btn', function(e) {
            var optionId = $(this).closest('div').find('.id').text();

            $('#deleteId').val(optionId)
            $('#editQuestionModal').modal('hide')


            $('#deleteOptionModal').modal('show')



        });

        //Ouvir modal Supprimer un question
        $(document).on('click', '.deleteQuestion_btn', function(e) {
            var questionId = $(this).closest('div').find('.id').text();

            $('#deleteId').val(questionId)

            // $('#editQuestionModal').modal('hide')
            $('#deleteModal').modal('show')



        });

        // Modifier une option
        $('#editOption').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('btnedit', true);
            $.ajax({
                method: "POST",
                url: "controllers/options.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                        err(res.message)
                    } else if (res.status == 200) {
                        // $('#addQuiz')[0].reset();
                        $('#editOptionModal').modal('hide')

                        // console.log(res)
                        var questionId = res.res.id_qs
                        $.ajax({
                            method: "GET",
                            url: "controllers/questions.php?idQuestion=" + questionId,

                            success: function(response) {
                                var res = jQuery.parseJSON(response);
                                $('.old_options').html('')


                                $('.id').val(res.res.id_qs)
                                $('.titre').val(res.res.titre_qs)
                                $('.note').val(res.res.note_qs)
                                $.each(res.opt, function(index, value) {
                                    $('.old_options').append('<div class="row">\
                            <div class="col-md-6">' + value.nom_opt + '</div>\
                            <div class="col-md-2">\
                                <p style="display:none" class="mb-0 id">' + value.id_opt + '</p>\
                                <a class="editOption_btn" href="javascript:void(0)">Modifier</a></div>\
                                javascript:void(0)<div class="col-md-2"><a class="deleteOption_btn" href="javascript:void(0)">Supprimer</a></div>\
                         </div>')
                                });

                                $('.old_options').append('<br>')
                                $('#editQuestionModal').modal('show')


                            }
                        });
                        $('#editQuestionModal').modal('show')

                        succ(res.message)


                    }
                }
            });
        });

        //Ouvir modal Modifier un option d'une question
        $(document).on('click', '.editOption_btn', function(e) {
            var optionId = $(this).closest('div').find('.id').text();

            // alert(optionId)

            // $('#deleteId').val(quizId)

            $.ajax({
                method: "GET",
                url: "controllers/options.php?optionId=" + optionId,

                success: function(response) {
                    var res = jQuery.parseJSON(response);

                    // console.log(res)
                    // $('.old_options').html('')


                    $('.id').val(res.res.id_opt)
                    $('.nom').val(res.res.nom_opt)
                    // $('.titre').val(res.res.titre_qs)
                    // $('.note').val(res.res.note_qs)

                    // $('.old_options').append('<br>')
                    $('#editQuestionModal').modal('hide')
                    $('#editOptionModal').modal('show')


                }
            });




        });

        //Ouvir modal Modifier un question
        $(document).on('click', '.editQuestion_btn', function(e) {
            var questionId = $(this).closest('div').find('.id').text();


            // alert(questionId)

            // $('#deleteId').val(quizId)

            $.ajax({
                method: "GET",
                url: "controllers/questions.php?idQuestion=" + questionId,

                success: function(response) {
                    var res = jQuery.parseJSON(response);
                    $('.old_options').html('')


                    $('.id').val(res.res.id_qs)
                    $('.titre').val(res.res.titre_qs)
                    $('.note').val(res.res.note_qs)
                    $.each(res.opt, function(index, value) {
                        $('.old_options').append('<div class="row">\
                            <div class="col-md-6">' + value.nom_opt + '</div>\
                            <div class="col-md-2">\
                                <p style="display:none" class="mb-0 id">' + value.id_opt + '</p>\
                                <a class="editOption_btn" href="javascript:void(0)">Modifier</a></div>\
                            <div class="col-md-2">\
                                <p style="display:none" class="mb-0 id">' + value.id_opt + '</p>\
                                <a class="deleteOption_btn" href="javascript:void(0)">Supprimer</a></div>\
                            </div>')
                    });

                    $('.old_options').append('<br>')
                    $('#editQuestionModal').modal('show')


                }
            });




        });


        //Ouvir modal Supprimer un quiz
        $(document).on('click', '.deleteQuiz_btn', function(e) {
            var quizId = $(this).closest('div').find('.id').text();

            $('#deleteId').val(quizId)

            $('#deleteModal').modal('show')



        });

        //Supprimer quiz
        $("#delete").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('btndelete', true);
            $.ajax({
                method: "POST",
                url: "controllers/quiz.php",
                data: formData,
                processData: false,
                contentType: false,
                // beforeSend: function () {
                //     $('.spinner_Delete').html("<span class='spinner-border  text-primary'></span><span class='spinner-border  text-primary'></span>");
                // },
                success: function(response) {
                    var res = jQuery.parseJSON(response);

                    // $('.spinner_Delete').html("");

                    if (res.status == 422) {
                        err(res.message)
                    } else if (res.status == 200) {
                        // $('#addQuiz')[0].reset();
                        $('#deleteModal').modal('hide');
                        suc(res.message);
                        getQuiz()

                        // $('#editQuizModal').modal('hide')

                    }

                }
            });
        });


        //Ouvir modal Modifier un quiz
        $(document).on('click', '.editQuiz_btn', function() {
            var quizId = $(this).closest('div').find('.id').text();

            // alert(quizId)

            $.ajax({
                method: "GET",
                url: "controllers/quiz.php?quizId=" + quizId,

                success: function(response) {
                    var res = jQuery.parseJSON(response);

                    $('.id').val(res.res.id)
                    $('.titre').val(res.res.titre)
                    $('.description').val(res.res.description)
                    $('.temps').val(res.res.temps)
                    $('.noteMax').val(res.res.noteMax)
                    $("#editQuizModal").modal('show')


                }
            });



            // $('.titre').val()

            // $("#editQuizModal").modal('show')
        });

        // Modifier un quiz
        $('#editQuiz').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('btnedit', true);
            $.ajax({
                method: "POST",
                url: "controllers/quiz.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                        err(res.message)
                    } else if (res.status == 200) {
                        // $('#addQuiz')[0].reset();
                        suc(res.message)
                        getQuiz()

                        $('#editQuizModal').modal('hide')

                    }
                }
            });
        });

        //Ajouter une question
        $('#addQuestion').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('save_question_btn', true);
            $.ajax({
                method: "POST",
                url: "controllers/questions.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                        err(res.message)
                    } else if (res.status == 200) {
                        $('#addQuestion')[0].reset();
                        $('#addQuestionModal').modal('hide');

                        $('.quizdata').html("");

                        $('.quizdata').append('<div class="row justify-content-center"><div class="col-md-3"><button class="btn btn-primary refresh_btn">Rafraichir</button></div><div class="col-md-9"><button class="btn btn-primary add_question_btn">Ajouter question</button></div></div>')
                        $('.quizdata').append('<div class="spinner_quiz"><span class="spinner-border  text-primary"></span><span class="spinner-border  text-primary"></span></div>')

                        getQuestions();
                        suc(res.message)

                    }
                }
            });
        });

        //Ajouter option
        $(document).on('click', '.addOptionBtn', function() {
            $('.options').append('<br>\
                <div class="row">\
                    <div class="col-md-9"><input type="text" name="options[]" class="form-control" required></div>\
                    <div class="col-md-3 deleteOptionBtn"><a class="btn btn-danger" href="javascript:void(0)">Supprimer</a></div>\
                </div>')
        })
        //Supprimer option
        $(document).on('click', '.deleteOptionBtn', function(e) {
            e.preventDefault()
            $(this).parent('div').remove()
        })

        //Afficher toutes les questions
        $(document).on('click', '.questions_btn', function() {
            var quizId = $(this).closest('div').find('.id').text();
            $.ajax({
                method: "GET",
                url: "controllers/quiz.php?quizId=" + quizId,

                success: function(response) {
                    var res = jQuery.parseJSON(response);
                    console.log(res.res)

                    if (res.status == 422) {
                        err(res.message)
                    } else if (res.status == 200) {
                        $('.spinner_quiz').html("<span class='spinner-border  text-primary'></span><span class='spinner-border  text-primary'></span>");

                        $('.quizdata').html("");

                        $('.quizdata').append('<div class="row justify-content-center"><div class="col-md-3"><button class="btn btn-primary refresh_btn">Rafraichir</button></div><div class="col-md-9"><button class="btn btn-primary add_question_btn">Ajouter question</button></div></div>')
                        $('.quizdata').append('<div class="spinner_quiz"><span class="spinner-border  text-primary"></span><span class="spinner-border  text-primary"></span></div>')

                        // suc(res.message)

                        getQuestions()

                    }
                }
            });
        });

        //Ajouter une reponse
        $('#addReponse').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('save_reponse_btn', true);
            $.ajax({
                method: "POST",
                url: "controllers/add-reponse.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                        err(res.message)
                    } else if (res.status == 200) {
                        // $('#addQuestion')[0].reset();
                        $('#addReponseModal').modal('hide');
                        $('.quizdata').html("");

                        $('.quizdata').append('<div class="row justify-content-center"><div class="col-md-3"><button class="btn btn-primary refresh_btn">Rafraichir</button></div><div class="col-md-9"><button class="btn btn-primary add_question_btn">Ajouter question</button></div></div>')
                        suc(res.message)
                        getQuestions()

                    }
                }
            });
        });

        //Ouvir madal Ajouter une question
        $(document).on('click', '.add_question_btn', function() {
            $("#addQuestionModal").modal('show')
        })



        //Ouvrir modal Ajouter une reponse
        $(document).on('click', '.addReponse_btn', function() {
            var idQuestion = $(this).closest('div').find('.id').text();
            $.ajax({
                method: "GET",
                url: "controllers/questions.php?questionId=" + idQuestion,

                success: function(response) {
                    res = jQuery.parseJSON(response);
                    // console.log(res.res)
                    $('#reponse').html('')


                    $.each(res.res, function(index, value) {

                        $('.question_id').val(value.id_qs)

                        $('#reponse').append('<option value="' + value.id_opt + '">' + value.nom_opt + '</option>')
                    });
                    $("#addReponseModal").modal('show')



                    // if (res.status == 422) {
                    //     err(res.message)
                    // } else if (res.status == 200) {

                    // $('.quizdata').html("");

                    // $('.quizdata').append('<div class="row justify-content-center"><div class="col-md-3"><button class="btn btn-primary refresh_btn">Rafraichir</button></div><div class="col-md-9"><button class="btn btn-primary add_question_btn">Ajouter question</button></div></div>')
                    // suc(res.message)
                    // getQuestions()

                    // }
                }
            });

            // alert(questionId)


            $("#addReponseModal").modal('show')
        })
        //Rafraichir
        $(document).on('click', '.refresh_btn', function() {
            $('.quizdata').html("");

            $('.quizdata').append('<div class="row justify-content-center"><div class="col-md-3"><button class="btn btn-primary refresh_btn">Rafraichir</button></div><div class="col-md-9"><button class="btn btn-primary add_question_btn">Ajouter question</button></div></div>')
            getQuestions()
        })


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

    function succ(msg) {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: msg,
            showConfirmButton: false,
            timer: 1500
        })
    }

    function getQuiz() {
        $('.quizdata').html("");

        $.ajax({
            type: "GET",
            url: "controllers/quiz.php?quiz=",
            // data: "data",
            // dataType: "dataType",
            beforeSend: () => {
                $('.spinner_quiz').html("<span class='spinner-border  text-primary'></span><span class='spinner-border  text-primary'></span>");
            },
            success: function(data) {
                $('.spinner_quiz').html("");

                var response = JSON.parse(data)
                // $('.quizdata').html(data)
                console.log(response)
                $.each(response.res, function(index, value) {
                    $('.quizdata').append('\
                        <br>\
                        <div class="card">\
                            <div class="card-body ">\
                                <div class="row justify-content-center align-items-center">\
                                    <div class="col-md-12 ">\
                                        <div class="row">\
                                            <div class="col-md-2"><img src="" class="image-circle" alt="Quiz logo"></div>\
                                            <div class="col-md-10">\
                                                <h3>' + value.titre + '</h3>\
                                            </div>\
                                        </div>\
                                        <div class="row">\
                                            <p>' + value.description + '</p>\
                                        </div>\
                                        <div class="row">\
                                            <div class="col-md-2">\
                                                <p style="display:none" class="mb-0 id">' + value.id + '</p>\
                                                <button class="btn btn-primary questions_btn">Questions</button>\
                                            </div>\
                                            <div class="col-md-2">\
                                                <div class="border border-grey rounded text text-primary">Note max: ' + value.noteMax + '</div>\
                                            </div>\
                                            <div class="col-md-2">\
                                                <div class="border border-grey rounded text text-primary questions_btn">Questions</div>\
                                            </div>\
                                            <div class="col-md-2">\
                                                <p style="display:none" class="mb-0 id">' + value.id + '</p>\
                                                <button class="btn btn-warning editQuiz_btn">Modifier</button>\
                                            </div>\
                                            <div class="col-md-2">\
                                                <p style="display:none" class="mb-0 id">' + value.id + '</p>\
                                                <button class="btn btn-danger deleteQuiz_btn">Supprimer</button>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                     ')
                });
            }
        });
    }


    function getQuestions() {
        $.ajax({
            type: "GET",
            url: "controllers/questions.php?questions=",
            // data: "data",
            // dataType: "dataType",

            success: function(data) {
                $('.spinner_quiz').html("");



                // var response = JSON.parse(data)
                $('.quizdata').append(data);



                // console.log(response.res)
                // $.each(response.res, function(index, value) {
                //     var options;


                //     $.ajax({
                //         method: "GET",
                //         url: "controllers/get-options-question.php?questionId=" + value.id_qs,

                //         success: function(response) {
                //             res = jQuery.parseJSON(response);
                //             // console.log(res.res)

                //             options = res.res;

                //             // if (res.status == 422) {
                //             //     err(res.message)
                //             // } else if (res.status == 200) {

                //             // $('.quizdata').html("");

                //             // $('.quizdata').append('<div class="row justify-content-center"><div class="col-md-3"><button class="btn btn-primary refresh_btn">Rafraichir</button></div><div class="col-md-9"><button class="btn btn-primary add_question_btn">Ajouter question</button></div></div>')
                //             // suc(res.message)
                //             // getQuestions()

                //             // }
                //         }
                //     });
                //     console.log(options)

                //     $('.quizdata').append('\
                //         <br>\
                //         <div class="card">\
                //             <div class="card-body ">\
                //                 <div class="row justify-content-center align-items-center">\
                //                     <div class="col-md-12 ">\
                //                         <div class="row">\
                //                             <div class="col-md-6">\
                //                                 <h3> Q' + (index + 1) + '. ' + value.titre_qs + '</h3>\
                //                             </div>\
                //                             <div class="col-md-6">\
                //                                 <h5>Note:' + value.note_qs + '</h5>\
                //                             </div>\
                //                         </div>\
                //                         <div class="row">\
                //                             <p>' + $.each(options, function (index, value) { 
                //                                  '<li>'+value.nom_opt+'</li>'
                //                             }) + '</p>\
                //                         </div>\
                //                         <div class="row">\
                //                             <div class="col-md-2">\
                //                                 <p style="display:none" class="mb-0 id">' + value.id_qs + '</p>\
                //                                 <button class="btn btn-primary questions_btn">Questions</button>\
                //                             </div>\
                //                         </div>\
                //                     </div>\
                //                 </div>\
                //             </div>\
                //         </div>\
                //      ')
                // });
            }
        });
    }

    function getOptions(idQuestion) {
        var res;
        $.ajax({
            method: "GET",
            url: "controllers/get-options-question.php?questionId=" + idQuestion,

            success: function(response) {
                res = jQuery.parseJSON(response);
                // console.log(res.res)


                // if (res.status == 422) {
                //     err(res.message)
                // } else if (res.status == 200) {

                // $('.quizdata').html("");

                // $('.quizdata').append('<div class="row justify-content-center"><div class="col-md-3"><button class="btn btn-primary refresh_btn">Rafraichir</button></div><div class="col-md-9"><button class="btn btn-primary add_question_btn">Ajouter question</button></div></div>')
                // suc(res.message)
                // getQuestions()

                // }
            }
        });

        return res;

    }
</script>