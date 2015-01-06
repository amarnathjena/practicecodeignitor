<?php
    include_once "header.php";
?>
<script src="//cdn.ckeditor.com/4.4.6/standard-all/ckeditor.js"></script>

<form action="<?php echo base_url();?>mailsys/mailsend" enctype="multipart/form-data" method="post">
    <fieldset>
        <legend><strong>Mail Form</strong></legend>
        <table class="tbl_list">
            <tr>
                <td>To : </td>
                <td colspan="3">
                    <input type="text" name="to" id="to" placeholder="Valid email address or name<valid email address> with comma separated"/>
                </td>
            </tr>
            <tr>
                <td>Cc : </td>
                <td colspan="3">
                    <input type="text" name="cc" id="cc" placeholder="Valid email address or name<valid email address> with comma separated"/>
                </td>
            </tr>
            <tr>
                <td>Bcc : </td>
                <td colspan="3">
                    <input type="text" name="bcc" id="bcc" placeholder="Valid email address or name<valid email address> with comma separated"/>
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Subject : </td>
                <td>
                    <input type="text" name="subject" id="subject"/>
                </td>
                <td>Attachment</td>
                <td><input type="file" name="attachment" id="attachment"/></td>
            </tr>
            <tr>
                <td style="text-align:left!important;"><b>Message</b></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3">
                    <textarea name="message" id="message" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><br/><br/>
                    <input type="submit" value="Send Mail" style="color:orange;height:50px!important;width:40%!important;">
                    <input type="button" value="Cancel" style="color:orange;height:50px!important;width:40%!important;">
                </td>
            </tr>
        </table>
    </fieldset>
</form>
<script type="text/javascript">
    $(function(){
         CKEDITOR.replace('message');
    });
</script>
<?php
    include_once "footer.php";
?>