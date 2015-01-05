<script type="text/javascript">
    function validateForm(){
        var validator=$("#loginform").validate({		
            rules: {
                "username": {
                    required:true
                },"password": {
                    required:true
                }
            }
        });
        return validator.form();
    }
</script>

<div id="login_div">
    <h4>Login Form</h4>
    <form action="<?php echo base_url(); ?>index.php/login/logincheck" method="post" name="loginform" id="loginform" onSubmit="return validateForm();">
        <table>
            <tr>
                <td>Username : </td>
                <td><input type="text" name="username" id="login_username" class="log"></td>
            </tr>
            <tr>
                <td>Password : </td>
                <td><input type="password" name="password" id="login_password" class="log"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input type="submit" name="loginsubmit" value="Login">
                    <input type="button" id="loginresetbtn" value="Reset" onclick="reset_form();">
                </td>
            </tr>
        </table>
    </form>
</div>

<div>
    <a href="<?php echo base_url(); ?>index.php/login/registrationform" title="Click to Registration">New User ?</a>
</div>


<?php include_once "footer.php"; ?>