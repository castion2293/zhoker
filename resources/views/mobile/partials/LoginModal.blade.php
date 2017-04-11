
<!--SignIn and SignUp Error show-->
<script>
    $(function () {
        @if (count($errors) > 0)
            @foreach($errors->all() as $error)
            var status = '{{ $error }}';
            var form_name = "";

            // get the error message
            switch(status) {
                case 'These credentials do not match our records.':
                    error_show = error_show.concat(status).concat('<br>');
                    form_name = "SignIn Form";
                    break;
                case 'The email has already been taken.':
                    error_show = error_show.concat(status).concat('<br>');
                    form_name = "SignUp Form";
                    break;
                case 'The phone number must be a number.':
                    error_show = error_show.concat(status).concat('<br>');
                    form_name = "SignUp Form";
                    break;
                case 'The password confirmation does not match.':
                    error_show = error_show.concat(status).concat('<br>');
                    form_name = "SignUp Form";
                    break;
                case 'We can&#039;t find a user with that e-mail address.':
                    error_show = error_show.concat(status).concat('<br>');
                    form_name = "Forgot Form";
                    break;
                case 'Not Authicated':
                    $("#myModal").modal();
                default:
                    break;
            }
            @endforeach

            //show the error message
            switch(form_name) {
                case "SignIn Form":
                $("#sign_in_wmsg").html(error_show);
                $("#myModal").modal();//失敗後的顯示
                break;
                case "SignUp Form":
                $("#sign_up_wmsg").html(error_show);
                $("#signupModal").modal();//失敗後的顯示
                break;
                case "Forgot Form":
                $("#Forgot_pwd_wmsg").html(error_show);
                $("#forgotModal").modal();//失敗後的顯示
                break;
                default:
                break;
            }

        @endif

        //re post to shopping cart
        @if (Session::has('repost'))
            
            //set default value
            $("#people_order").val("{{ Session::get('people_order') }}");
            $("#method_way").val("{{ Session::get('method_way') }}")
            
            {{ Session::forget('people_order') }}
            {{ Session::forget('method_way') }}

            $("#add-to-cart").trigger("click");
            return false;
        @endif
    });
</script>