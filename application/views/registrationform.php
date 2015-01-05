<script type="text/javascript">
    function validateForm(){
        var validator=$("#regform").validate({		
            rules: {
                "name": {
                    required:true
                },"username": {
                    required:true
                },"password": {
                    required:true
                },"cpassword": {
                    equalTo:"#password"
                },"email": {
                    email:true
                },"mobile": {
                    required:true
                }
            }
        });
        return validator.form();
    }
            
</script>
<div id="registration_div">
    <div id="validation_error"><?php echo validation_errors(); ?></div>
    <h2>Registration Form</h2>
    <form action="<?php echo base_url(); ?>index.php/login/registration" method="post" onSubmit="return validateForm();" name="regform" id="regform">
        <fieldset>
            <legend>Personal Details</legend>
            <div class="table">
                <div class="row">
                    <div class="cell fltrht">Name :</div>
                    <div class="cell"><?php if ($id) { ?><input type="hidden" name="id" value="<?php echo $id; ?>"> <?php } ?>
                        <input type="text" name="name" id="name" class="reg" value="<?php echo $name; ?>">
                    </div>
                    <div class="cell fltrht">Username : </div>
                    <div class="cell"><input type="text" name="username" id="username" class="reg" value="<?php echo $username . '"';
echo $username ? 'readonly="readonly' : '"'; ?>"></div>
                </div>
<?php if (!isset($id)) { ?>
                    <div class="row">
                        <div class="cell fltrht">Password : </div>
                        <div class="cell"><input type="password" name="password" id="password" class="reg" value="<?php echo $password; ?>"></div>
                        <div class="cell fltrht">Confirm Password : </div>
                        <div class="cell">
                            <input type="password" name="cpassword" id="cpassword" class="reg" value="<?php echo $password; ?>">
                            <div id="cpassworderr"></div>
                        </div>
                    </div>
<?php } ?>
                <div class="row">
                    <div class="cell fltrht">Date of Birth : </div>
                    <div class="cell"><input type="text" name="dob" id="dob" class="reg" value="<?php echo $dob ? date("d-m-Y", strtotime($dob)) : ""; ?>"></div>
                    <div class="cell fltrht">Email Address : </div>
                    <div class="cell"><input type="text" name="email" id="email" class="reg" value="<?php echo $email; ?>"></div>
                </div>
                <div class="row">
                    <div class="cell fltrht">Mobile Number : </div>
                    <div class="cell"><input type="text" name="mobile" id="mobile" class="reg" value="<?php echo $mobile; ?>"></div>
                </div>
                <div class="row">
                    <div class="cell fltrht flttop">Permanent Address :</div>
                    <div class="cell">
                        <textarea name="permanent_address" cols="31" class="reg"><?php echo $permanent_address;?></textarea>
                    </div>
                    <div class="cell fltrht flttop">Current Address : </div>
                    <div class="cell">
                        <textarea name="current_address" cols="31" class="reg"><?php echo $current_address; ?></textarea>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Professional Details</legend>
            <div class="table">
                <div class="row">
                    <div class="cell fltrht">Organization : </div>
                    <div class="cell"><input type="text" name="organization" id="organization" class="reg" value="<?php echo $organization; ?>"></div>
                </div>
                <div class="row">
                    <div class="cell fltrht">Department : </div>
                    <div class="cell"><input type="text" name="department" id="department" class="reg" value="<?php echo $department; ?>"></div>
                    <div class="cell fltrht">Designation : </div>
                    <div class="cell"><input type="text" name="designation" id="designation" class="reg" value="<?php echo $designation; ?>"></div>
                </div>
            </div>
        </fieldset>
        <div class="table">
            <div class="row">
                <div class="cell width40">&nbsp;</div>
                <div class="cell"><br/><br/><input type="submit" name="regsubmit" value="<?php echo ($id ? 'Update' : 'Submit'); ?>">
                    <input type="button" id="regresetbtn" value="Reset" onClick="reset_form();">
                    <input type="button" id="cancel" value="Cancel" onClick="javascript:window.location.href='<?php echo base_url() . 'index.php/login'; ?>'">
                </div>
            </div>
        </div>
</div>
</form>

<script type="text/javascript">
    $(function(){
        $("#dob").datepicker({
            "dateFormat":"dd-mm-yy"
        });
    });
</script>

<?php include_once "footer.php"; ?>