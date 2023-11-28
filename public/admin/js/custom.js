"use strict";
$(function ($) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

// Call the dataTables jQuery plugin
    $(document).ready(function() {
        // $('#dataTable').DataTable(
        //     {
        //         dom: 'Bfrtip',
        //         buttons: [
        //             'print'
        //         ]
        //     }
        // );
        $('.js-dt').DataTable(
            {
                dom: 'Bfrtip',
                buttons: [
                    // 'print'
                    {
                        extend: 'print',
                        text: "Print",
                        description:"sadsad",
                        exportOptions: {
                            columns: function (idx, data, node) {
                                // console.log(node.innerHTML);
                                if (node.innerHTML == "Action")
                                    return false;
                                return true;
                            }
                        }
                    }
                ],
            },
            
        );
    });

    /*****************************************************
     ==========Bootstrap Notify start==========
     ******************************************************/
    function bootnotify(message, title, type) {
        var content = {};

        content.message = message;
        content.title = title;
        content.icon = 'fa fa-bell';

        $.notify(content, {
            type: type,
            placement: {
                from: 'top',
                align: 'right'
            },
            showProgressbar: true,
            time: 1000,
            allow_dismiss: true,
            delay: 4000
        });
    }
    /*****************************************************
     ==========Bootstrap Notify end==========
     ******************************************************/


  /* ***************************************************
  ==========Form Submit with AJAX Request Start==========
  ******************************************************/
    // Image file mp3 upload preview
    const input = document.getElementById('customFile');
    const imgPreview = document.getElementById('imgprev');

    input.addEventListener('change', function() {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                imgPreview.src = e.target.result;
                imgPreview.style.display = 'block';
            };

            reader.readAsDataURL(file);
        } else {
            imgPreview.src = '';
            imgPreview.style.display = 'none';
        }
    });

    $("#submitBtn").on('click', function (e) {
        $(e.target).attr('disabled', true);

        $(".request-loader").addClass("show");

        let ajaxForm = document.getElementById('ajaxForm');
        let fd = new FormData(ajaxForm);
        let url = $("#ajaxForm").attr('action');
        let method = $("#ajaxForm").attr('method');


        $.ajax({
            url: url,
            method: method,
            data: fd,
            contentType: false,
            processData: false,
            success: function (data) {
                $(e.target).attr('disabled', false);
                $(".request-loader").removeClass("show");

                $(".em").each(function () {
                    $(this).html('');
                });

                if (data == "success") {
                    location.reload();
                }

                // if error occurs
                else if (typeof data.error != 'undefined') {
                    for (let x in data) {
                        if (x == 'error') {
                            continue;
                        }
                        document.getElementById('err-' + x).innerHTML = data[x][0];
                    }
                }
            },
            error: function (error) {
                $(".em").each(function () {
                    $(this).html('');
                })
                for (let x in error.responseJSON.errors) {
                    document.getElementById('err-' + x).innerHTML = error.responseJSON.errors[x][0];
                }
                $(".request-loader").removeClass("show");
                $(e.target).attr('disabled', false);
            }
        });
    });

/* ***************************************************
 ==========Form Submit with AJAX Request End==========
 ******************************************************/




  /* ***************************************************
  ==========Form Pre populate After Clicking Edit Button Start==========
  ******************************************************/
    $(".editbtn").on('click', function () {

        let datas = $(this).data();
        delete datas['toggle'];

        for (let x in datas) {
            if ($("#in" + x).hasClass('summernote')) {
                $("#in" + x).summernote('code', datas[x]);
            } else if ($("#in" + x).hasClass('image')) {
                $("#in" + x).attr('src', datas[x]);
            } else if ($("#in" + x).data('role') == 'tagsinput') {
                if (datas[x].length > 0) {
                    let arr = datas[x].split(" ");
                    for (let i = 0; i < arr.length; i++) {
                        $("#in" + x).tagsinput('add', arr[i]);
                    }
                } else {
                    $("#in" + x).tagsinput('removeAll');
                }
            }
            else if ($("input[name='" + x + "']").attr('type') == 'radio') {
                $("input[name='" + x + "']").each(function (i) {
                    if ($(this).val() == datas[x]) {
                        $(this).prop('checked', true);
                    }
                });
            }
            else {
                $("#in" + x).val(datas[x]);
            }
        }

    });


    /* ***************************************************
    ==========Form Pre populate After Clicking Edit Button End==========
    ******************************************************/



    /* ***************************************************
     ==========Form Update with AJAX Request Start==========
     ******************************************************/
    $("#updateBtn").on('click', function (e) {

        $(".request-loader").addClass("show");

        let ajaxEditForm = document.getElementById('ajaxEditForm');
        let fd = new FormData(ajaxEditForm);
        let url = $("#ajaxEditForm").attr('action');
        let method = $("#ajaxEditForm").attr('method');

        $.ajax({
            url: url,
            method: method,
            data: fd,
            contentType: false,
            processData: false,
            success: function (data) {

                $(".request-loader").removeClass("show");

                $(".em").each(function () {
                    $(this).html('');
                })

                if (data == "success") {
                    location.reload();
                }

                // if error occurs
                else if (typeof data.error != 'undefined') {
                    for (let x in data) {
                        if (x == 'error') {
                            continue;
                        }
                        document.getElementById('eerr-' + x).innerHTML = data[x][0];
                    }
                }
            }
        });
    });
    /* ***************************************************
    ==========Form Update with AJAX Request End==========
    ******************************************************/


/* ***************************************************
 ==========Delete Using AJAX Request Start==========
 ******************************************************/
    $('.deletebtn').on('click', function (e) {
        e.preventDefault();

        $(".request-loader").addClass("show");

        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            buttons: {
                confirm: {
                    text: 'Yes, delete it!',
                    className: 'btn btn-success'
                },
                cancel: {
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((Delete) => {            
            if (Delete) {
                $(this).parent(".deleteform").trigger('submit');
            } else {
                swal.close();
                $(".request-loader").removeClass("show");
            }
        });
    });
    /* ***************************************************
    ==========Delete Using AJAX Request End==========
    ******************************************************/


    $("#updateBtnPopup").on('click', function (e) {

        $(".request-loader").addClass("show");

        let ajaxEditForm = document.getElementById('ajaxEditForm');
        let fd = new FormData(ajaxEditForm);
        let url = $("#ajaxEditForm").attr('action');
        let method = $("#ajaxEditForm").attr('method');

        $.ajax({
            url: url,
            method: method,
            data: fd,
            contentType: false,
            processData: false,
            success: function (data) {

                $(".request-loader").removeClass("show");

                $(".em").each(function () {
                    $(this).html('');
                })

                if (data == "success") {
                    bootnotify('Popup text updated Successfully!','success')
                    $('#createModal').modal('hide');
                }

                // if error occurs
                else if (typeof data.error != 'undefined') {
                    for (let x in data) {
                        if (x == 'error') {
                            continue;
                        }
                        document.getElementById('eerr-' + x).innerHTML = data[x][0];
                    }
                }
            }
        });
    });


    $("#submitBtn2").on('click', function (e) {
        $(e.target).attr('disabled', true);

        $(".request-loader").addClass("show");

        let ajaxForm = document.getElementById('ajaxForm2');
        let fd = new FormData(ajaxForm);
        let url = $("#ajaxForm2").attr('action');
        let method = $("#ajaxForm2").attr('method');


        $.ajax({
            url: url,
            method: method,
            data: fd,
            contentType: false,
            processData: false,
            success: function (data) {
                $(e.target).attr('disabled', false);
                $(".request-loader").removeClass("show");

                $(".em").each(function () {
                    $(this).html('');
                });

                if (data == "success") {
                    location.reload();
                }

                // if error occurs
                else if (typeof data.error != 'undefined') {
                    for (let x in data) {
                        if (x == 'error') {
                            continue;
                        }
                        document.getElementById('err-' + x).innerHTML = data[x][0];
                    }
                }
            },
            error: function (error) {
                $(".em").each(function () {
                    $(this).html('');
                })
                for (let x in error.responseJSON.errors) {
                    document.getElementById('err-' + x).innerHTML = error.responseJSON.errors[x][0];
                }
                $(".request-loader").removeClass("show");
                $(e.target).attr('disabled', false);
            }
        });
    });




});


$('.text_editor').summernote({
    placeholder: 'Write here',
    minHeight: 280,
    maxHeight: 400,
    styleTags: ['p', 'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
    fontNames: ['Nikosh','Arial', 'Galada', 'Kalpurush', 'Roboto', 'Times New Roman', 'Verdana'],
    fontNamesIgnoreCheck: ['Roboto', 'Galada', 'Kalpurush'],
    toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
    ]
});


$('.js-solve').on('click', function() {
    var id = $(this).attr();
    $.post(ROOT+"{{route('complains.update/1')}}", {id:id}, function(res){
        console.log(res);
    });
});


// Itinery
$('.js-gen-itinerary').on('change', function() {
    var gen_it = $(this).val();
    if(gen_it) {
        $.get(ROOT+"get_gti_total_days/"+gen_it, function(res){
            console.log(res);
            $('.js_day_itinerary').val(res);
        });
    } else {
        $('.js_day_itinerary').val('');
    }
});