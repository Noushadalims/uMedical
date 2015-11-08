$(document).ready(function($) {
    var somevar;
    $("#myinv").on("click", function(event) {
        event.preventDefault();
        $("#investigation-display").append("<div class='form-group'><input autocomplete='off' type='text' class='form-control investigation-css' id='investigationFieldSuggest' name='investigation[]' placeholder='Investigation'/>                <input autocomplete='off' type='text' class='form-control investigation-amount-css' name='investigation-amount[]' disabled placeholder='Amount'/> <button class='btn btn-default fa fa-minus-square remove-inv' onclick='return false;'></button></div>");
    });


    $(document).on("click", ".remove-inv", function() {
        $(this).parent().remove();
    });

    $(".add-doc").on("click", function(event) {
        event.preventDefault();
        $(".display-doc").append("<div class='form-group'><input autocomplete='off' type='text' class='form-control investigation-css' id='CounsultDoctorRef' name='CounsultDoctorRef' placeholder='Type Counsult Doctor Name'/>                <input autocomplete='off' type='text' class='form-control investigation-amount-css' id='CounsultDoctorRefAmount' disabled name='subject' placeholder='Amount'/> <button class='btn btn-default fa fa-minus-square remove-doc' onclick='return false;'></button></div>");
    });


    $(document).on("click", ".remove-doc", function() {
        $(this).parent().remove();
    });

    $(document).on("keyup", "#investigationFieldSuggest", function() {
        var pos = $(this).position();
        $("#investigationSuggest").css({
            "display": "block",
            "top": pos.top + 34,
            "left": pos.left
        });
        somevar = this;
        ajaxCallInv($(this).val());
    });

    $(document).on("click", ".remove-inv", function(event) {
        event.preventDefault();
        $("#investigationSuggest").css({
            "display": "none"
        });
    });


    $(document).on("click", ".doctorRef-suggest-data", function(event) {
        event.preventDefault();
        var data = String($(this).parent().attr("value"));
        som = data.replace(/^'|'$/g, "").split(/\s*\|\s*/g);
        $(somevar).val(som[0]);
        $(somevar).parent().find(".investigation-amount-css").val(som[2]);
        $(somevar).parent().append("<input type='hidden' name='doctorRefId' value='" + som[1] + "' />");
        $("#doctorSuggest").css({
            "display": "none"
        });
    });

    $(document).on("keyup", "#CounsultDoctorRef", function(event) {
        var pos = $(this).position();
        $("#doctorSuggest").css({
            "display": "block",
            "top": pos.top + 34,
            "left": pos.left
        });
        somevar = this;
        ajaxCallDoc($(this).val());
        $("#investigationSuggest").css({
            "display": "none"
        });
    });

    $(document).on("click", ".investigation-suggest-data", function(event) {
        event.preventDefault();
        var data = String($(this).parent().attr("value"));
        som = data.replace(/^'|'$/g, "").split(/\s*\|\s*/g);
        $(somevar).val(som[0]);
        $(somevar).parent().find(".investigation-amount-css").val(som[1]);
        $(somevar).parent().append("<input type='hidden' name='investigation_id[]' value='" + som[2] + "' />");
        $("#doctorSuggest").css({
            "display": "none"
        });
    });

    $(document).on("blur", ".investigation-css", function(event) {
        var invData = $("#investigation-display").html();

        //setCookie("invData", invData, 1);
    });



    $("body").click(function() {
        $("#investigationSuggest").css({
            "display": "none"
        });

        $(".investigation-suggest").css({
            "display": "none"
        });
        
    });

    $("#patentPhoneNo, #patentMobileNo, #searchPatentId, #patentAge").on('keypress', function(event){
        if (event.keyCode < 48 || event.keyCode > 57)
            return false;
    });

    $("#patentFirstName, #patentLastName").on('keypress', function(event){
        if (event.keyCode < 57 && event.keyCode > 48){
            return false;
        }
        
    });

    var registrationValidation = function(){

        if($("#searchPatentId").val()==""){
            if($("#patentFirstName").val()==""){
            $("#patentFirstName").focus();
              return false;
            }

            if($("#patentAge").val()==""){
                $("#patentAge").focus();
                return false;
            }
        }

        if($("#CounsultDoctorRef").length==0){
            alert("Please Add Consult Docotor");
            return false;
        }

        if($("#CounsultDoctorRef").length>0){
            if($("#CounsultDoctorRef").val()==""){
                alert("Please enter Consult Docotor name");
                $("#CounsultDoctorRef").focus();
                return false;
            }
        }

        if($("#investigationFieldSuggest").length==0){
            alert("Please Add Test Record");
            return false;
        }

        if($("#investigationFieldSuggest").length>0){
            if($("#investigationFieldSuggest").val()==""){
                alert("Please Type Test Record");
                $("#investigationFieldSuggest").focus();
                return false;
            }
        }

        {
            return true;
        }
       
    }


    $("#SubmitCreateVisitor").on("click", function() {
        if(registrationValidation()){
            var FormName = $("#createVisitor");
            postForm(FormName, successCallback, errorCallback);
        }
    });

    $("#SubmitCreateDoctor").click(function() {
        var FormName = $("#FormCreateDoctor");
        var formFields = ["DoctorFirstName", "DoctorMobileNo", "DoctorAddress", "DoctorCity", "DoctorPinCode", "DoctorState"];
        if (formValidation(formFields, errorCall, FormName)) {
            postForm(FormName, successCallback, errorCallback);
        }
    });


    $("#SubmitCreateInvestigation").click(function() {
        var FormName = $("#FormCreateInvestigation");
        var formFields = ["InvestigationName", "InvestigationFee"];
        if (formValidation(formFields, errorCall, FormName)) {
            postForm(FormName, successCallback, errorCallback);
        }
    });

    $("#SubmitUpdateInvestigation").click(function() {
        var FormName = $("#FormUpdateInvestigation");
            postForm(FormName, successCallback, errorCallback);
    });

    $("#SubmitCreateUser").click(function() {
        var FormName = $("#CreateUserForm");
        var formFields = ["UserName", "UserPassword", "RepeatPassword"];
        if (formValidation(formFields, errorCall, FormName)) {
            postForm(FormName, successCallback, errorCallback);
        }
    });



    $(document).on("click", "#removeInvestigation", function() {
        valu = $(this);
        removeInvestigation($(this));
    });



    $("#submitLoginButton").click(function() {
        //$("#login-box-container").effect("shake");
        var FormName = $("#userLoginForm");
        postForm(FormName, successCallbacka, errorCallbacka);


    });

    $("#session-logout").click(function() {
        var FormName = $("#logout");
        postForm(FormName, logoutSuccessCallback, errorCallback);
    });

});

var deleteCookie = function(cname) {
    document.cookie = cname + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
}

var errorCall = function(ErrorField) {
    alert("Please Fill \"" + ErrorField + "\" Fields");
}

var errorCallback = function() {
    alert("Whoops, looks like Something went wrong");
}

var successCallback = function(data, returnValue, form) {
    if (returnValue) {
        $("#SuccessMsg").html("Your Data has been saved successfully");
        $("#SuccessMsg").fadeIn();
        form[0].reset();
        $("#investigation-display").html("");

        setTimeout(function() {
            $("#SuccessMsg").fadeOut();
        }, 3000);
    } else {
        alert(0);
        errorCallback();
    }

}

var postForm = function(form, successCallback, errorCallback) {
    var postData = form.serializeArray();
    var formURL = form.attr('action');
    $.ajax({
        url: applicationUrl + formURL,
        type: "POST",
        data: postData,
        success: function(data, textStatus, jqXHR) {
            successCallback(data, textStatus, form);
        },
        error: function(data, textStatus, jqXHR) {
            errorCallback();
        }
    });
}

var formValidation = function(SomeArray, errorCall) {
    var Status = 1;
    var length = SomeArray.length;
    var ErrorField = "";
    for (i = 0; i < length; i++) {
        var Process = $("#" + SomeArray[i]).val();
        if (Process == null || Process == "" || Process == " ") {
            ErrorField = ErrorField + ", " + SomeArray[i];
            Status = 0;
        }

    }
    if (!Status) {
        errorCall(ErrorField);
    }
    return Status;
}

var removeInvestigation = function(SelectedElement) {
    var response = confirm("Are you sure you want to remove Investigation Record");
    if (response) {
        var id = $(valu).parents('tr').find('#investigationId').val();
        removeFromDb(id, SelectedElement, removeSuccessCallback)
    }
}

var removeSuccessCallback = function(data, SelectedElement) {
    if (data == "Success") {
        $(SelectedElement).parents('tr').remove();
    }
}

var removeFromDb = function(id, SelectedElement, successCallback) {
    $.get(applicationUrl + "remove/investigation/" + id, function(data) {
        successCallback(data, SelectedElement);
    });
}




var successCallbacka = function(data, textStatus, form) {
    if (data == "Error") {
        errorCallbacka(form);
    } else {
        window.location = applicationUrl;
    }

}

var errorCallbacka = function(form) {
    $("#username, #password").css({
        "border": "1px solid red"
    });
    $("#login-box-container").effect("shake", function() {
        form[0].reset();
    });

}

var logoutSuccessCallback = function() {
    window.location = applicationUrl;
}

function ajaxCallInv(data) {
    $.ajax({
        url: applicationUrl + "info/inv/" + data,
    }).done(function(html) {
        if (html) {
            $("#investigationSuggest").html(html);
        } else {
            $("#investigationSuggest").html("<li><a href='#'>No Match Found</a></li>");
        }

    });;
}

var getAjax = function(url,param,successCallback,errorCallback){
        $.ajax({
            url: url,
            type: "GET",
            data: param,
            success: function(data, textStatus, jqXHR) {
                successCallback(data, textStatus);
            },
            error: function(data, textStatus, jqXHR) {
                errorCallback();
            }
        });
}

var ajaxCallDoc = function(data) {
    $.ajax({
        url: applicationUrl + "info/doctorInfo/" + data,
    }).done(function(html) {
        if (html) {
            $("#doctorSuggest").html(html);
        } else {
            $("#doctorSuggest").html("<li><a href='#'>No Match Found</a></li>");
        }

    });;
}


function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

var getCookie = function(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length, c.length);
    }
    return "";
}
