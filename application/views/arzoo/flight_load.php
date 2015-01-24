<form name="frmname" action="<?php echo base_url();?>index.php/arzooxml/flight-oneway" onsubmit="javascript:return ray.ajax()" method="post">
    <input type="hidden" name="rnd_one" value="<?php echo $searching_data['rnd_one']; ?>" />
    <input type="hidden" name="origin" value="<?php echo $searching_data['origin']; ?>" />
    <input type="hidden" name="destination" value="<?php echo $searching_data['destination']; ?>" />
    <input type="hidden" id="dep_time" name="dep_time" value="0" />
    <input type="hidden" name="depart_date" value="<?php echo $searching_data['depart_date']; ?>" />
    <input type="hidden" name="return_date" value="<?php echo $searching_data['return_date']; ?>" />
    <input type="hidden" name="adults" value="<?php echo $searching_data['adults']; ?>" />
    <input type="hidden" name="childs" value="<?php echo $searching_data['childs']; ?>" />
    <input type="hidden" name="infants" value="<?php echo $searching_data['infants']; ?>" />
    <input type="hidden" name="class" value="<?php echo $searching_data['class']; ?>" />
    <?php
    foreach ($searching_data['airline'] as $val) {
        if ($val == "All") {
            $FlAll = array('AI', '9W', 'S2', 'IT', 'G8', 'IC', '6E', '9H', 'I7', 'SG');
            foreach ($FlAll as $val) {
                echo '<input type="hidden" name="airline[]" value="' . $val . '" />';
            }
        } else {
            foreach ($searching_data['airline'] as $val) {
                echo '<input type="hidden" name="airline[]" value="' . $val . '" />';
            }
        }
    }
    ?>
    <input type="hidden" name="searchid" value="search<?php echo $sid; ?>" />
</form>