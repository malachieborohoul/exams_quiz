<?php session_start(); ?>
<?php require('includes/header.php') ?>


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

                        <select class="form-control" name="reponse" id="reponse" >
                            
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

        //Ajouter une question
        $('#addQuestion').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('save_question_btn', true);
            $.ajax({
                method: "POST",
                url: "controllers/add-question.php",
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
                url: "controllers/get-quiz.php?quizId=" + quizId,

                success: function(response) {
                    var res = jQuery.parseJSON(response);
                    console.log(res.res)

                    if (res.status == 422) {
                        err(res.message)
                    } else if (res.status == 200) {
                        $('.quizdata').html("");

                        $('.quizdata').append('<div class="row justify-content-center"><div class="col-md-3"><button class="btn btn-primary refresh_btn">Rafraichir</button></div><div class="col-md-9"><button class="btn btn-primary add_question_btn">Ajouter question</button></div></div>')
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
            url: "controllers/get-options-question.php?questionId=" + idQuestion,

            success: function(response) {
                res = jQuery.parseJSON(response);
                // console.log(res.res)
                $('#reponse').html('')


                $.each(res.res, function (index, value) { 

                    $('.question_id').val(value.id_qs)

                     $('#reponse').append('<option value="'+value.id_opt+'">'+value.nom_opt+'</option>')
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

    function getQuiz() {
        $.ajax({
            type: "GET",
            url: "controllers/get-all-quiz.php",
            // data: "data",
            // dataType: "dataType",
            success: function(data) {
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
                                                <div class="btn btn-warning">Modifier</div>\
                                            </div>\
                                            <div class="col-md-2">\
                                                <div class="btn btn-primary">Reponses</div>\
                                            </div>\
                                            <div class="col-md-2">\
                                                <div class="btn btn-danger">Supprimer</div>\
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
            url: "controllers/get-all-questions.php",
            // data: "data",
            // dataType: "dataType",
            success: function(data) {
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