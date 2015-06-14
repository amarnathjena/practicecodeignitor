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
    <div class="h4">Login Form</div>
    <form action="<?php echo base_url(); ?>login/logincheck" method="post" name="loginform" id="loginform" onSubmit="return validateForm();">
        <div class="table">
            <div class="row">
                <div class="td">Username : </div>
                <div class="td"><input type="text" name="username" id="login_username" class="log form-control"></div>
            </div>
            <div class="row">
                <div class="td">Password : </div>
                <div class="td"><input type="password" name="password" id="login_password" class="log form-control"></div>
            </div>
            <div class="row">
                <div class="td">&nbsp;</div>
                <div class="td">
                    <input type="submit" name="loginsubmit" value="Login" class="btn btn-default">
                    <input type="button" id="loginresetbtn" value="Reset" class="btn btn-default" onclick="reset_form();">
                </div>
            </div>
        </div>
    </form>
</div>

<div>
    <a href="<?php echo base_url(); ?>login/registrationform" title="Click to Registration">New User ?</a>
</div>


<?php include_once "footer.php"; ?>