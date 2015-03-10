<?php include "header.php"; ?>
<h3>User Listing</h3>
<fieldset class="tbl">
<table id="jquery_searching_id" border="0" class="tbl_list" style="text-align: center;">
    <thead
        <tr>
            <th>
                Name
            </th>
            <th>
                Date of Birth
            </th>
            <th>
                Permanent Address
            </th>
        </tr>
    </thead>
    <tbody>
<?php 
foreach($result as $key=>$val){
    echo "<tr>
        <td>
            ".ucwords($val->username)."
        </td>
        <td>
            ".(($val->dob && $val->dob!="0000-00-00")?date("d-m-Y", strtotime($val->dob)):'')."
        </td>
        <td>
            ".ucfirst($val->permanent_address)."
        </td>
    </tr>";
}
echo "</tbody></table></fieldset>";

/*********************  jquery searching  **************/
?>
<script type="text/javascript">
    $(document).ready(function() {
            $('#jquery_searching_id').dataTable({
                    "bPaginate": false,
                    "bInfo": false
            });
    });
</script>
<script src="<?php echo base_url()?>assets/js/jquery.dataTables.js"></script>
<?php
/*******************************************************/

include_once "footer.php";?>