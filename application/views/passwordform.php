<?php //include_once 'header.php'; ?>
<h4>Change Password</h4>
<form action="<?php echo base_url(); ?>index.php/login/chngpwd" method="post" onSubmit="return validateFormPwd(this);" name="regform" id="regform">
    <fieldset>
        <div class="table">
            <div class="row">
                <div class="cell fltrht">Current Password :</div>
                <div class="cell"><input type="password" name="currentpassword" id="currentpassword" class="reg" autofocus></div>
            </div>
            <div class="row">
                <div class="cell fltrht">New Password : </div>
                <div class="cell"><input type="password" name="newpassword" id="newpassword" class="reg"></div>
                <div class="cell fltrht">Confirm Password : </div>
                <div class="cell"><input type="password" name="confirmpassword" id="confirmpassword" class="reg"></div>
            </div>
            <div class="row">
                <div class="cell fltrht"></div>
                <div class="cell"><input type="checkbox" id="showpassword" onClick="showPasswords(this);"><label for="showpassword"> : <span id="sp">Show</span> Passwords</label></div>
            </div>
            <div class="row">
                <div class="cell fltrht"></div>
                <div class="cell"><input type="submit" value="Change Password">
                <input type="button" onclick="javascript:window.location.href='<?php echo base_url()."index.php/login/listing";?>'" value="Cancel"></div>
            </div>
        </div>
    </fieldset>
</form>
<script type="text/javascript">
    function showPasswords(curobj){
        var newprop = "password";
        var sp = "Show";
        if($(curobj).prop("checked")){
            newprop = "text";
            sp = "Hide";
        }
        $(".reg").each(function(){
            $(this).prop("type", newprop); 
        });
        $("#sp").html(sp);
    }
    
    function validateFormPwd(objfrm){
        var validator=$(objfrm).validate({		
            rules: {
                "currentpassword": {
                    required:true
                },"newpassword": {
                    required:true
                },"confirmpassword": {
                    equalTo:"#newpassword"
                }
            }
        });
        return validator.form();
    }
</script>
<?php include_once 'footer.php'; ?>