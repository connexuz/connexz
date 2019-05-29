function validateEmail(email) {
    if (email.value != '') {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if (!emailReg.test(email.value)) {
            $(email).css('border', '1px solid red');
            toastr.error('Please Enter valid Email Address.');
            $(email).focus();
            return false;
        } else {
            $(email).css('border', '');
            return true;
        }
    } else {
        $(email).css('border', '');
        return true;
    }
    return true;
}

function change_status(type, url, token) {

    $.ajax({
        url: url,
        type: 'post',
        data: {
            "_token": token,
            type: type,
            value: $('#' + type).prop('checked')
        },
        success: function(data, textStatus, jQxhr) {

        },

    });
}

jQuery(document).ready(function($) {
    /*
     * frontend
     */

    $('.replay-form').hide();

    $(".replay_comment").click(function() {
        var id = $(this).data('id');
        $('#replay-form-'+id).toggle();
    });

    $.validator.addMethod("noSpace", function(value, element) {
        return $.trim(value) != "";
    }, "No space please and don't leave it empty");

    $.validator.addMethod("oldPassword", function(value, element) {
        return $.trim($("#old_password").val()) != "";
    }, "Please enter old password first");

    $.validator.addMethod("checkEmail", function(value, element) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var send_email = true;
        var result = value.replace(/\s/g, "").split(/,|;/);
        for (var i = 0; i < result.length; i++) {
            if (!regex.test(result[i])) {
                send_email = false;
                break;
            }
        }
        if (!send_email) {
            $(element).css('border', '1px solid red');
            //toastr.error('Please Enter valid Email Address.');
            $(element).focus();
            return false;
        } else {
            $(element).css('border', '');
            return true;
        }
    }, "Please Enter valid Email Address.");

    tab = $('.tabs h3 a');

    tab.on('click', function(event) {
        event.preventDefault();
        tab.removeClass('active');
        $(this).addClass('active');

        tab_content = $(this).attr('href');
        $('div[id$="tab-content"]').removeClass('active');
        $(tab_content).addClass('active');
    });

    /* 21_11_2018 */
    $(".delete_interest").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var $i_id = $(this).data("id");
        $.ajax({
            url: "profile/deleteinterest",
            method: 'post',
            data: {
                i_id: $i_id
            },
            success: function(result) {
                if (result.success) {
                    $("[data-id='" + $i_id + "']").parent("li").remove();
                }
            }
        });

    });

    $(".profile_form_submit").validate({
        rules: {
            first_name: {
                required: true,
                noSpace: true,
            },
            last_name: {
                required: true,
                noSpace: true,
            },
            email: {
                required: true,
                email: true,
            },
            date_of_birth: {
                required: true,
                noSpace: true,
            },
            gender: {
                required: true
            },
            city: {
                required: true,
                noSpace: true
            },
            country: {
                required: true
            },
            about: {
                required: true,
                noSpace: true
            },
//            university: {
//                required: true,
//                noSpace: true
//            },
//            education_from_date: {
//                required: true,
//                noSpace: true
//            },
//            education_to_date: {
//                required: true,
//                noSpace: true
//            },
//            education_about: {
//                required: true,
//                noSpace: true
//            },
//            graduted: {
//                required: true
//            },
            password: {
                oldPassword: true
            },
            confirmed: {
                equalTo: "#password"
            }

        },
        messages: {
            first_name: "Please enter your first name",
            last_name: "Please enter your last name",
            email: "Please enter your email id",
            date_of_birth: "Please enter your date of birth",
            gender: "Please select your gender",
            city: "Please enter your city name",
            country: "Please select your country",
            about: "Please enter about you",
//            university: "Please enter your university name",
//            education_from_date: "Please select your university start date",
//            education_to_date: "Please select your university end date",
//            education_about: "Please enter about your university",
//            graduted: "Please select you are graduated",
            confirmed: "Your password missmatch"
        },
        submitHandler: function(form) {

            form.submit();
        }
    });

    /* this event written for remve disabled attribute automatically added using jquery validate */
    $(".save-btn").click(function() {
        setTimeout(function() {
            $(".save-btn").removeAttr("disabled");
        }, 1000);
    });

    $('#date_of_birth').datepicker({
        format: 'dd-mm-yyyy',
        maxDate: '0',
        changeMonth: true,
      changeYear: true,
      yearRange: "-100:+0",
    });


    $("#date_of_birth").keydown(false);
    $("#education_from_date").keydown(false);
    $("#education_to_date").keydown(false);

    $('#education_from_date').datepicker({
        format: 'dd-mm-yyyy',
        maxDate: '0',
        changeMonth: true,
      changeYear: true,
      yearRange: "-100:+0",
        onSelect: function(date){
            var selectedDate = new Date(date);
            var endDate = selectedDate;

        //Set Minimum Date of EndDatePicker After Selected Date of StartDatePicker
            $("#education_to_date").datepicker( "option", "minDate", endDate );
        }
    });
    $('#education_to_date').datepicker({
        format: 'dd-mm-yyyy',
        maxDate: '0',
        changeMonth: true,
      changeYear: true,
      yearRange: "-100:+0",
    });


    $("#invite-form").validate({
        rules: {
            invite_email: {
                required: true,
                checkEmail: true
            }
        },
        messages: {
            invite_email: "Please enter valid email address"
        },
        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "invite/send",
                method: 'post',
                data: $('#invite-form').serialize(),
                success: function(result) {
                    if (result.success) {
                        $("#SendInvite .close").click()
                        toastr.success('Invitation send successfully.');
                    } else {
                        toastr.error('Please Enter valid Email Address.');
                    }
                }
            });
        }
    });

    $('#SendInvite').on('hidden.bs.modal', function() {
        $(this).find('form').trigger('reset');
    });

    $(".postLike").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var u_id = $(this).data("id");

        $.ajax({
            url: "post/add-like",
            method: 'post',
            data: {
                i_id: u_id
            },
            success: function(result) {
                if (result.success) {
                    $('#postLike-' + u_id).addClass('active');
                } else {
                    $('#postLike-' + u_id).removeClass('active');
                }
            }
        });
    });

    $(".commentLike").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var u_id = $(this).data("id");
        var p_id = $(this).data("post");

        $.ajax({
            url: "comment/add-like",
            method: 'post',
            data: {
                c_id: u_id,
                p_id: p_id
            },
            success: function(result) {
                if (result.success) {
                    $('#comment-' + u_id).addClass('active');
                } else {
                    $('#comment-' + u_id).removeClass('active');
                }
            }
        });
    });

    $(".postModal").on('focus', function() {
        $('#postCreate').modal('show');
    });

    /*
     * Profile upload picture upload with croppie start
     **/
    if ($('#upload-demo').length > 0) {
        $uploadCrop = $('#upload-demo').croppie({
            enableExif: true,
            viewport: {
                width: 156,
                height: 156,
                type: 'circle'
            },
            boundary: {
                width: 200,
                height: 200
            }
        });


        $('#profile_image').on('change', function() {
            var fileTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            if ((fileTypes.indexOf(this.files[0].type) + 1)) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $uploadCrop.croppie('bind', {
                        url: e.target.result
                    }).then(function() { /* error debug */ });
                }

                reader.readAsDataURL(this.files[0]);
                $("#openImageCropPopup").trigger("click");
            } else {
                alert("Please upload image");
            }
        });

        $('.upload-result').on('click', function(ev) {
            $uploadCrop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(resp) {
                ev.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "profile/image-crop",
                    type: "POST",
                    data: { "image": resp },
                    success: function(data) {
                        if (data.success == "done") {
                            $(".rounded-circle").attr("src", data.image);
                            $(".modal-close-btn-abs").trigger("click");
                        }
                    }
                });
            });
        });
    }
    /*
     * Profile upload picture upload with croppie end
     **/

    /*
     * Cover upload picture upload with croppie start
     **/
    if ($('#cover-upload-demo').length > 0) {
        $uploadCropCover = $('#cover-upload-demo').croppie({
            enableExif: true,
            viewport: {
                width: 1356,
                height: 350,
                type: 'square'
            },
            boundary: {
                width: 1400,
                height: 400
            }
        });


        $('#cover_image').on('change', function() {
            var fileTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            if ((fileTypes.indexOf(this.files[0].type) + 1)) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $uploadCropCover.croppie('bind', {
                        url: e.target.result
                    }).then(function() { /* error debug */ });
                }

                reader.readAsDataURL(this.files[0]);
                $("#openCoverImageCropPopup").trigger("click");
            } else {
                alert("Please upload image");
            }
        });

        $('.cover-upload-save').on('click', function(ev) {
            $uploadCropCover.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(resp) {
                ev.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "profile/cover-image-crop",
                    type: "POST",
                    data: { "image": resp },
                    success: function(data) {
                        if (data.success == "done") {
                            $(".cover_image").attr("src", data.image);
                            $(".modal-close-btn-abs").trigger("click");
                        } else {
                            $(".modal-close-btn-abs").trigger("click");
                        }
                    }
                });
            });
        });
    }
    /*
     * Cover upload picture upload with croppie end
     **/

    /* network page start */

    /* my friends tab start */
    $("#my_friends_tab").click(function() {
        $(".all_close").hide();
        $(".my-friends-tab-content").show();
        $(".connexus-networks-tab-listing").find(".active").removeClass("active");
        $(this).addClass("active");
    });
    /* my friends tab end */
    /* my requests tab start */
    $("#my_requests_tab").click(function() {
        $(".all_close").hide();
        $(".my-requests-tab-content").show();
        $(".connexus-networks-tab-listing").find(".active").removeClass("active");
        $(this).addClass("active");
    });
    /* my requests tab end */

    var $searchString = "";
    var $loggedinUserId = $("#loggedin_user_id").html();

    /* search box ajax start */
    $("#search_box").keyup(function(event) {

        if (event.which == 18 ||
            event.which == 9 ||
            event.which == 27 ||
            event.which == 13 ||
            event.which == 16 ||
            event.which == 17 ||
            event.which == 36 ||
            event.which == 34 ||
            event.which == 35 ||
            event.which == 37 ||
            event.which == 38 ||
            event.which == 39 ||
            event.which == 40 ||
            event.which == 45 ||
            event.which > 112) {
            return;
        }

        if ($(this).val().length == 0) {
            $(".all_close").hide("fast");
            $(".my-friends-tab-content").show();
            $(".connexus-networks-tab-listing").find(".active").removeClass("active");
            $("#my_friends_tab").addClass("active");
        }
        if ($(this).val().length > 3) {
            $searchString = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "networks/search-friend",
                type: "POST",
                data: { "searchQuery": $(this).val() },
                success: function(data) {
                    var $searchFriendHtml = "";
                    if (data.success == "done" && !isEmpty(data.data.data)) {
                        $("#load_more").show();
                        for (var i = 0; i < data.data.data.length; i++) {

                            $searchFriendHtml += '<div class="col-md-6 my_request_friend">' +
                                '  <div class="connexuz-my-requests-block-wrap">' +
                                '      <div class="row">' +
                                '          <div class="col-md-7 col-sm-6">' +
                                '              <div class="row">' +
                                '                  <div class="col-md-4 col-5">' +
                                '                      <div class="my-request-user-image-wrap">' +
                                '                          <img src="' + data.data.data[i].avatar_location + '" class="img-fluid my-request-user-image"/>' +
                                '                      </div>' +
                                '                  </div>' +
                                '                  <div class="col-md-8 col-7">' +
                                '                      <div class="my-request-username-wrap">' +
                                '                          <h3 class="my-request-username"><a href="user/friend/' + data.data.data[i].id + '">' + data.data.data[i].first_name + ' ' + data.data.data[i].last_name + '<a/></h3>' +
                                '                      </div>' +
                                '                  </div>' +
                                '              </div>' +
                                '          </div>';

                            if (isEmpty(data.data.data[i].user_invite)) {

                                $searchFriendHtml += '<div class="col-md-5 col-sm-6">' +
                                    '<div class="row">' +
                                    '<div class="col-md-6 col-6 custom-paddinng-action-buttons">' +
                                    '<a href="javascript:;" data-action="add_friend" data-user-id="' + data.data.data[i].id + '" data-uinvite-id="" class="btn my-request-btn confirm-btn">Add as Friend</a>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                            } else {
                                if (data.data.data[i].user_invite.length > 0) {
                                    var $imNotExits = false;

                                    for (var userInviteCounter = 0; userInviteCounter < data.data.data[i].user_invite.length; userInviteCounter++) {

                                        if (data.data.data[i].user_invite[userInviteCounter].invite_user_id == parseInt($loggedinUserId)) {
                                            if (data.data.data[i].user_invite[userInviteCounter].status == "1") {
                                                $searchFriendHtml += '<div class="col-md-5 col-sm-6">' +
                                                    '<div class="row">' +
                                                    '<div class="col-md-6 col-6 custom-paddinng-action-buttons">' +
                                                    '<a href="javascript:;" data-action="remove_friend" data-user-id="' + data.data.data[i].id + '" data-uinvite-id="' + data.data.data[i].user_invite[userInviteCounter].id + '" class="btn my-request-btn delete-btn">Remove</a>' +
                                                    '</div>' +
                                                    '</div>' +
                                                    '</div>';
                                            } else if (data.data.data[i].user_invite[userInviteCounter].status == "0") {

                                                $searchFriendHtml += '<div class="col-md-5 col-sm-6">' +
                                                    '<div class="row">' +
                                                    '<div class="col-md-6 col-6 custom-paddinng-action-buttons">' +
                                                    '<a href="javascript:;" data-action="cancel_friend" data-user-id="' + data.data.data[i].id + '" data-uinvite-id="' + data.data.data[i].user_invite[userInviteCounter].id + '" class="btn my-request-btn delete-btn">Cancel</a>' +
                                                    '</div>' +
                                                    '</div>' +
                                                    '</div>';

                                            }
                                            $imNotExits = false;
                                            break;
                                        } else if (data.data.data[i].user_invite[userInviteCounter].user_id == parseInt($loggedinUserId)) {
                                            if (data.data.data[i].user_invite[userInviteCounter].status == "1") {
                                                $searchFriendHtml += '<div class="col-md-5 col-sm-6">' +
                                                    '<div class="row">' +
                                                    '<div class="col-md-6 col-6 custom-paddinng-action-buttons">' +
                                                    '<a href="javascript:;" data-action="remove_friend" data-user-id="' + data.data.data[i].id + '" data-uinvite-id="' + data.data.data[i].user_invite[userInviteCounter].id + '" class="btn my-request-btn delete-btn">Remove</a>' +
                                                    '</div>' +
                                                    '</div>' +
                                                    '</div>';
                                            } else if (data.data.data[i].user_invite[userInviteCounter].status == "0") {

                                                $searchFriendHtml += '<div class="col-md-5 col-sm-6">' +
                                                    '<div class="row">' +
                                                    '<div class="col-md-6 col-6 custom-paddinng-action-buttons">' +
                                                    '<a href="javascript:;" data-action="accept_friend" data-user-id="' + data.data.data[i].id + '"  data-uinvite-id="' + data.data.data[i].user_invite[userInviteCounter].id + '" class="btn my-request-btn confirm-btn">Accept</a>' +
                                                    '</div>' +
                                                    '<div class="col-md-6 col-6 custom-paddinng-action-buttons">' +
                                                    '<a href="javascript:;" data-action="reject_friend" data-user-id="' + data.data.data[i].id + '" data-uinvite-id="' + data.data.data[i].user_invite[userInviteCounter].id + '" class="btn my-request-btn delete-btn">Cancel</a>' +
                                                    '</div>' +
                                                    '</div>' +
                                                    '</div>';

                                            }
                                            $imNotExits = false;
                                            break;
                                        } else {
                                            $imNotExits = true;
                                        }

                                    }
                                    if ($imNotExits) {
                                        $searchFriendHtml += '<div class="col-md-5 col-sm-6">' +
                                            '<div class="row">' +
                                            '<div class="col-md-6 col-6 custom-paddinng-action-buttons">' +
                                            '<a href="javascript:;" data-action="add_friend" data-user-id="' + data.data.data[i].id + '" data-uinvite-id="" class="btn my-request-btn confirm-btn">Add as Friend</a>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>';
                                    }
                                }

                            }
                            $searchFriendHtml += '</div>' +
                                '  </div>' +
                                '  </div>';


                        }
                        if (data.data.current_page == 1) {
                            $(".append_search_result").html('');
                        }
                        if (data.data.next_page_url != null) {
                            $("#load_more").attr("data-page", data.data.next_page_url);
                        } else {
                            $("#load_more").hide();
                        }
                        $(".append_search_result").append($searchFriendHtml);
                        $(".all_close").hide();
                        $(".search-friend-tab-content").show("", "swing");

                    } else {
                        $(".search-friend-tab-content .conn-my-frd-section .row").html("No result found");
                        $("#load_more").hide();
                    }
                }
            });
        }
    });
    /* search box ajax end */

    /* load more ajax start */
    $(document).on("click", "#load_more", function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if ($.trim($("#search_box").val()) != "" && $searchString == $("#search_box").val()) {
            $.ajax({
                url: $(this).attr("data-page"),
                type: "POST",
                data: { "searchQuery": $("#search_box").val() },
                success: function(data) {
                    //                    console.log(data.data.last_page);
                    var $searchFriendHtml = "";
                    if (data.success == "done" && !isEmpty(data.data.data)) {

                        for (var i = 0; i < data.data.data.length; i++) {
                            $searchFriendHtml += '<div class="col-md-6 my_request_friend">' +
                                '  <div class="connexuz-my-requests-block-wrap">' +
                                '      <div class="row">' +
                                '          <div class="col-md-7 col-sm-6">' +
                                '              <div class="row">' +
                                '                  <div class="col-md-4 col-5">' +
                                '                      <div class="my-request-user-image-wrap">' +
                                '                          <img src="' + data.data.data[i].avatar_location + '" class="img-fluid my-request-user-image"/>' +
                                '                      </div>' +
                                '                  </div>' +
                                '                  <div class="col-md-8 col-7">' +
                                '                      <div class="my-request-username-wrap">' +
                                '                          <h3 class="my-request-username"><a href="user/friend/' + data.data.data[i].id + '">' + data.data.data[i].full_name + '<a/></h3>' +
                                '                      </div>' +
                                '                  </div>' +
                                '              </div>' +
                                '          </div>';

                            if (isEmpty(data.data.data[i].user_invite)) {

                                $searchFriendHtml += '<div class="col-md-5 col-sm-6">' +
                                    '<div class="row">' +
                                    '<div class="col-md-6 col-6 custom-paddinng-action-buttons">' +
                                    '<a href="javascript:;" data-action="add_friend" data-user-id="' + data.data.data[i].id + '" data-uinvite-id="" class="btn my-request-btn confirm-btn">Add as Friend</a>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                            } else {
                                if (data.data.data[i].user_invite.length > 0) {
                                    var $imNotExits = false;

                                    for (var userInviteCounter = 0; userInviteCounter < data.data.data[i].user_invite.length; userInviteCounter++) {

                                        if (data.data.data[i].user_invite[userInviteCounter].invite_user_id == parseInt($loggedinUserId)) {
                                            if (data.data.data[i].user_invite[userInviteCounter].status == "1") {
                                                $searchFriendHtml += '<div class="col-md-5 col-sm-6">' +
                                                    '<div class="row">' +
                                                    '<div class="col-md-6 col-6 custom-paddinng-action-buttons">' +
                                                    '<a href="javascript:;" data-action="remove_friend" data-user-id="' + data.data.data[i].id + '" data-uinvite-id="' + data.data.data[i].user_invite[userInviteCounter].id + '" class="btn my-request-btn delete-btn">Remove</a>' +
                                                    '</div>' +
                                                    '</div>' +
                                                    '</div>';
                                            } else if (data.data.data[i].user_invite[userInviteCounter].status == "0") {

                                                $searchFriendHtml += '<div class="col-md-5 col-sm-6">' +
                                                    '<div class="row">' +
                                                    '<div class="col-md-6 col-6 custom-paddinng-action-buttons">' +
                                                    '<a href="javascript:;" data-action="cancel_friend" data-user-id="' + data.data.data[i].id + '" data-uinvite-id="' + data.data.data[i].user_invite[userInviteCounter].id + '" class="btn my-request-btn delete-btn">Cancel</a>' +
                                                    '</div>' +
                                                    '</div>' +
                                                    '</div>';

                                            }
                                            $imNotExits = false;
                                            break;
                                        } else if (data.data.data[i].user_invite[userInviteCounter].user_id == parseInt($loggedinUserId)) {
                                            if (data.data.data[i].user_invite[userInviteCounter].status == "1") {
                                                $searchFriendHtml += '<div class="col-md-5 col-sm-6">' +
                                                    '<div class="row">' +
                                                    '<div class="col-md-6 col-6 custom-paddinng-action-buttons">' +
                                                    '<a href="javascript:;" data-action="remove_friend" data-user-id="' + data.data.data[i].id + '" data-uinvite-id="' + data.data.data[i].user_invite[userInviteCounter].id + '" class="btn my-request-btn delete-btn">Remove</a>' +
                                                    '</div>' +
                                                    '</div>' +
                                                    '</div>';
                                            } else if (data.data.data[i].user_invite[userInviteCounter].status == "0") {

                                                $searchFriendHtml += '<div class="col-md-5 col-sm-6">' +
                                                    '<div class="row">' +
                                                    '<div class="col-md-6 col-6 custom-paddinng-action-buttons">' +
                                                    '<a href="javascript:;" data-action="accept_friend" data-user-id="' + data.data.data[i].id + '"  data-uinvite-id="' + data.data.data[i].user_invite[userInviteCounter].id + '" class="btn my-request-btn confirm-btn">Accept</a>' +
                                                    '</div>' +
                                                    '<div class="col-md-6 col-6 custom-paddinng-action-buttons">' +
                                                    '<a href="javascript:;" data-action="reject_friend" data-user-id="' + data.data.data[i].id + '" data-uinvite-id="' + data.data.data[i].user_invite[userInviteCounter].id + '" class="btn my-request-btn delete-btn">Cancel</a>' +
                                                    '</div>' +
                                                    '</div>' +
                                                    '</div>';

                                            }
                                            $imNotExits = false;
                                            break;
                                        } else {
                                            $imNotExits = true;
                                        }

                                    }
                                    if ($imNotExits) {
                                        $searchFriendHtml += '<div class="col-md-5 col-sm-6">' +
                                            '<div class="row">' +
                                            '<div class="col-md-6 col-6 custom-paddinng-action-buttons">' +
                                            '<a href="javascript:;" data-action="add_friend" data-user-id="' + data.data.data[i].id + '" data-uinvite-id="" class="btn my-request-btn confirm-btn">Add as Friend</a>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>';
                                    }
                                }

                            }
                            $searchFriendHtml += '</div>' +
                                '  </div>' +
                                '  </div>';


                        }
                        if (data.data.current_page == 1) {
                            $(".search-friend-tab-content .conn-my-frd-section .row").html('');
                        }
                        if (data.data.next_page_url != null) {
                            $("#load_more").attr("data-page", data.data.next_page_url);
                        } else {
                            $("#load_more").hide();
                        }
                        $(".append_search_result").append($searchFriendHtml);



                    } else {
                        $(".search-friend-tab-content .conn-my-frd-section .row").html("No result found");
                        $("#load_more").hide();
                    }
                }
            });
        }
    });
    /* load more ajax end */

    $(document).on("click", ".my-request-btn", function(e) {
        var $myrequest_btn = this;
        var $action = $(this).data("action");
        var $user_id = $(this).data("user-id");
        var $uinvite_id = $(this).data("uinvite-id");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "networks/add-friend",
            type: "POST",
            data: {
                "action": $action,
                "user_id": $user_id,
                "uinvite_id": $uinvite_id
            },
            success: function(data) {
                if (data.success == "done" && !isEmpty(data.data) && data.data.id) {
                    if ($action == "add_friend") {
                        $($myrequest_btn).replaceWith('<a href="javascript:;" data-action="cancel_friend" data-user-id="' + $user_id + '" data-uinvite-id="' + data.data.id + '" class="btn my-request-btn delete-btn">Cancel</a>');
                    } else if ($action == "cancel_friend") {
                        $($myrequest_btn).replaceWith('<a href="javascript:;" data-action="add_friend" data-user-id="' + $user_id + '" data-uinvite-id="" class="btn my-request-btn confirm-btn">Add as Friend</a>');
                    } else if ($action == "reject_friend") {
                        if ($("#my_request_friend_" + $uinvite_id).length > 0) {
                            $("#my_request_friend_" + $uinvite_id).remove();
                        }
                        if ($($myrequest_btn).parents(".my_request_friend").length > 0) {
                            $($myrequest_btn).parents(".my_request_friend").remove();
                        }
                    } else if ($action == "accept_friend") {
                        $($myrequest_btn).parent(".custom-paddinng-action-buttons").siblings(".custom-paddinng-action-buttons").remove();
                        $($myrequest_btn).replaceWith('<a href="javascript:;" data-action="remove_friend" data-user-id="' + $user_id + '" data-uinvite-id="' + data.data.id + '" class="btn my-request-btn delete-btn">Remove</a>');
                        if ($("#my_request_friend_" + $uinvite_id).length > 0) {
                            $("#my_request_friend_" + $uinvite_id + ".custom-paddinng-action-buttons").remove();
                        }
                    } else if ($action == "remove_friend") {
                        $("#my_request_friend_" + $uinvite_id).remove();
                    }
                } else {}
            }
        });

    });

    $("#credit-card").validate({
        rules: {
            plan: "required",
            firstname: "required",
            lastname: "required",
            email: "required",
            cardnumber: "required",
            month: "required",
            year: "required",
            cvv: "required",

        },
        // Specify validation error messages
        messages: {
            plan: "Subscription is required.",
            firstname: "Firstname is required.",
            lastname: "Lastname is required.",
            email: "Email is required.",
            cardnumber: "Cardnumber is required.",
            month: "Month is required.",
            year: "Year is required.",
            cvv: "CVV is required.",
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    /* network page end */

    $(".signup-form").validate({
        rules: {
            email: {
                required: true,
                checkEmail: true,
            },
            first_name: {
                required: true,
                noSpace: true,
            },
            password: {
                oldPassword: true
            },
            password_confirmation: {
                equalTo: "#password"
            }

        },
        messages: {
            email: "Please enter your email id",
            first_name: "Please enter your first name",
            confirmed: "Your password missmatch",
        },
        submitHandler: function(form) {
            form.submit();
        }
    });


});

/* check is empty array or not */
function isEmpty(obj) {
    for (var key in obj) {
        if (obj.hasOwnProperty(key))
            return false;
    }
    return true;
}
