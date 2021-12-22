$(document).ready(function () {


    // register form validation 
    var uppercase = new RegExp('[A-Z]');
    var number = new RegExp('[0-9]');

    var user_error = true;
    var email_error = true;
    var password_error = true;
    var confirmpassword_error = true;

    // error function
    // show and clear error for User name 
    function show_error(id, msg) {
        id.html(msg);
        id.css('color', 'red');
    }
    function clear_error(id) {
        id.html('');
    }
    // show and clear error for confirm pasword 
    var cpSpan = $('#cPerr');
    function show_cp_error() {
        //   alert('errror..');
        //   alert(id);
        cpSpan.html('Password are not matched');
        cpSpan.css('color', 'red');
    }
    function clear_cp_error() {
        cpSpan.html('');

    }




    var uname = $('#uname');
    $(uname).keyup(function () {
        var value = uname.val();
        value = value.trim();
        var err = $('#Nerr');

        check_username(value, err);
    });


    function check_username(value, err) {

        if (value.length == '') {
            // alert('what happend');
            show_error(err, 'please fill the username');
            user_error = false;
            return false;
        } else {
            if ((value.length < 3) || (value.length > 25)) {
                // alert('what happend');
                show_error(err, 'Username must be between 3 to 25 charecters');
                return false;

            } else {
                // clear_error(err);
                if (value.match(number)) {
                    show_error(err, 'Username must be contain with only alphabet');
                    return false;
                }
                else {
                    // clear_error(err);
                    if (/^[a-zA-Z0-9- ]*$/.test(value) == false) {
                        show_error(err, 'Username must be contain with only alphabet');
                        user_error = false;
                        return false;
                    } else {
                        clear_error(err);
                        user_error = true;
                        return true;
                    }
                }
            }
        }





    }

    // email 
    var uemail = $('#uemail');
   
    $(uemail).keyup(function () {
        check_useremail();
    });
    
    function check_useremail() {
        var emailError = $('#emError');
        if (uemail.val() == '') {
            $(emailError).html('please fill the email');
            $(emailError).css('color', 'red');
            email_error = false;
            return false
        }else{
            $(emailError).html('');
            email_error = true;
            return true;
        }
    }





    // Password validation 
    var pass = $('.rgpwd');

    $(pass).keyup(function () {
        var password = pass.val();
        password = password.trim();
        password_Check(password);
    });

    function password_Check(password) {
        var check = true;

        if ((password.length >= 8) && (password.length < 12)) {

            $('.maxlength').css('color', 'green');
        }
        else {
            $('.maxlength').css('color', 'red');
            check = false;
            // return false;
        }

        if (password.match(uppercase)) {
            $('.upcase').css('color', 'green');
        }
        else {
            $('.upcase').css('color', 'red');
            check = false;
            // return false;
        }
        if (password.match(number)) {
            $('.oneNum').css('color', 'green');
        }
        else {
            $('.oneNum').css('color', 'red');
            check = false;
            // return false;
        }
        if (/^[a-zA-Z0-9- ]*$/.test(password) == false) {
            $('.onespcial').css('color', 'green');
        }
        else {
            $('.onespcial').css('color', 'red');
            check = false;
            // return false;
        }

        if (check != true) {
            password_error = false;
            return false;
        } else {
            password_error = true;
            return true;
        }

    }

    // confirm Password validation 
    var cnfrmpass = $('.rgcpwd');

    $(cnfrmpass).keyup(function () {
        // var err = $('#cPerr');
        // var Confrimpassword = cnfrmpass.val();
        Confrimpassword_check();
    });

    function Confrimpassword_check() {
        var password = pass.val();
        var Confrimpassword = cnfrmpass.val();

        if (password != Confrimpassword) {
            // alert('Password are not matched');
            // show_error(err, 'Password are not matched');
            show_cp_error();
            confirmpassword_error = false;
            return false;
        }
        else {
            // clear_error(err);
            clear_cp_error();
            confirmpassword_error = true;
            return true;
        }

    }

    // submiting 

    $('#rgBtn').click(function () {
        check_useremail()
        Confrimpassword_check()
        if ((user_error == true) && (email_error == true) && (password_error == true) && (confirmpassword_error == true)) {

            reg_from();
            // alert ('trueee');

        } else {
            // alert('false');
            return false;
        }

    });

    // registeration from  ajax 

    function reg_from() {
        var username = uname.val();
        var useremail = uemail.val();
        var usercpassword = cnfrmpass.val();
        $.ajax({
            url: 'operation/register_process.php',
            data:  {Name : username, Email : useremail, Pass : usercpassword},
            type: 'post',

            success:  function (data,status) {
                    if (status) {
                        // alert(data);
                        $('#msg').html(data).slideDown();
                        $('#regForm').trigger('reset');
                        
                    }else{
                        $('#msg').html('some error occurred reload and try again').slideDown();
                        $('#regForm').trigger('reset');
                    }
                }
        });
    }


    // login form 
    $('#lgBtn').click(function () {
        var l_email = $('#lguname').val();
        var l_pass =  $('.lgpwd').val();
        $.ajax({
            url: 'operation/login_process.php',
            data: {email : l_email, pass : l_pass},
            type: 'post',


            success: function (data, status) {
                if (status) {
                    // alert(data);
                    $('#lgmsg').html(data).slideDown();
                    $('#lgform').trigger('reset');
                   

                }else{
                    $('#lgmsg').html('some error occurred reload and try again').slideDown();
                    $('#lgform').trigger('reset');
                }
            }
        });
    });












});





















