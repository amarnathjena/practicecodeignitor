<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Globalwings - Passenger Calendar</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url().CSS_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />
    <!-- Add custom CSS here -->
    <link href="<?php echo base_url(); ?>css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">

	<script src="<?php echo base_url(); ?>js/jquery.1.7.1.min.js"></script>
    <script src='<?php echo base_url();?>js/global.js'></script>
    <script type="text/javascript">
    
    function getPassengerCalenderUsingAjex(){
       $.ajax({
          type:'POST',
          url:'<?php echo site_url(); ?>/report/passenger_calender_search',
          data:{ year: $("#airFareYear").val(), month: $("#month").val(), date: $("#suggestionbox").val() ,module: $(":input[name='module']").val()},
          dataType: 'html',
          success: function(data) {
	    $('#demo-divs').html(data);
	  }
        }); 
        return false; 
    }
    </script>
<style type="text/css">
.calendar_tbl{
width:100%;
border-color: gray;
display:table;
border-top-width: 0px;
border-right-width: 0px;
border-bottom-width: 0px;
border-left-width: 0px;
border-spacing: 2px;
}
.calendar_td{
width: 125px;
height: 55px;
overflow: scroll;
word-wrap: break-word;
border:1px solid #F2F2F2;
}
.calendar_th{
background-color:#F2F2F2;color:#000000;font-size:16px
}
</style>       
	<script type="text/javascript">
		// Popup window code
		function newPopup(url) {
			popupWindow = window.open(
				url, 'popUpWindow', 'height=700,width=1000,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
		}
		function newPopup1(url) {
			popupWindow = window.open(
					url, 'popUpWindow', 'height=500,width=1100,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
		}
		function newPopup2(url) {
			popupWindow = window.open(
					url, 'popUpWindow', 'height=400,width=1000,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
		}
	</script>
	</head>
	<body>
	  <div id="wrapper">
	  <?php $this->load->view('header'); ?>
      <div id="page-wrapper">
		<div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
			  <li><a href="<?php echo site_url('admin/dashboard')?>"><i class="icon-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="icon-file-alt"></i> Flight Cancellation</li>
            </ol>
          </div>
        </div><!-- /.row -->
        <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" ><tr><td>
			<div id="navjam">
			
			</div>
			<div class="panes" style="padding-bottom:10px">
		
				<div id="containerdount" class="admin-innerbox" style="padding-top:15px;">

<!------------------------------------------------------------------------------------------------------->
			
			<form id="searchFrom" method="post" action=""  >
			<table border="1px" style="width:100%; border:1px solid #FFF;" >
            <tr><td bgcolor="#f2f2f2"; style="  border-right: 1px solid #F2F2F2;    color: #333333;    font-size: 14px;    margin-right: 42px;    font-weight:normal;    width: 70px;">&nbsp;&nbsp;Service :</td>
			<td style="border-right: 1px solid #F2F2F2;" ><select name="module" class="form-control" style="width:200px;" >
				<option value="flight">Flight</option>
				<option value="hotel">Hotels</option>
				<option value="holiday">Holidays</option>
			
				</select>
				</td>
				<td bgcolor="#f2f2f2" style="border-right: 1px solid #F2F2F2;">
				<select id="month" name="month" class="form-control" style="width:200px;" >
								
					
				<option <?php if(date('m') == "01"){ echo 'selected="selected" '; } ?> value="1">January</option>
				<option <?php if(date('m') == "02"){ echo 'selected="selected" '; } ?> value="2">February</option>
				<option <?php if(date('m') == "03"){ echo 'selected="selected" '; } ?>value="3">March</option>
				<option <?php if(date('m') == "04"){ echo 'selected="selected" '; } ?> value="4">April</option>
				<option <?php if(date('m') == "05"){ echo 'selected="selected" '; } ?> value="5">May</option>
				<option <?php if(date('m') == "06"){ echo 'selected="selected" '; } ?> value="6">June</option>
				<option <?php if(date('m') == "07"){ echo 'selected="selected" '; } ?> value="7">July</option>
				<option <?php if(date('m') == "08"){ echo 'selected="selected" '; } ?> value="8">August</option>
				<option <?php if(date('m') == "09"){ echo 'selected="selected" '; } ?> value="9">September</option>
				<option <?php if(date('m') == "10"){ echo 'selected="selected" '; } ?> value="10">October</option>
				<option <?php if(date('m') == "11"){ echo 'selected="selected" '; } ?> value="11">November</option>
				<option <?php if(date('m') == "12"){ echo 'selected="selected" '; } ?> value="12">December</option>
				</select>
				</td>
				<td bgcolor="#f2f2f2" style="border-right: 1px solid #F2F2F2;    color: #333333;
    font-size: 14px;font-weight:normal; width:100px">Select Year :</td>
				<td bgcolor="#f2f2f2"  style="border-right: 1px solid #F2F2F2;">
					
					<?php
				       $start_year="2012";	
				       $ending_year=date("Y")+2;
					
				
					?>
					
					
				<select name="airFareYear" id="airFareYear" class="form-control" style="width:200px;" >
				<?php
				for($i=$start_year;$i <= $ending_year;$i++){
				?>
				<option <?php if(date('Y') == $i){ echo 'selected="selected" '; } ?>  value="<?php echo $i;?>"><?php echo $i; ?></option>
				<?php } ?>
                
                 	
                 </select>	
  
				</td>
				<td bgcolor="#f2f2f2" style=" text-align:center;">
				
				<input type="button" id="undisable" class="btn btn-primary" style="cursor:pointer;" value="Get Schedule" onclick="getPassengerCalenderUsingAjex();">
				</td>
				</tr>
				<tr><td colspan="6">&nbsp;</td></tr>
				</table>
				
			
			</form>
			
			
			</div>
			<div id="demo-divs"  style="width:850px;">


</div>
				</div>
			</div>
	</div>
	
		<script>
			// perform JavaScript after the document is scriptable.
			$(document).ready(function () {
				$('[name="branch_id"]').on('change', function () {
					getStaff($(this).val());
				});
				//get staff
				function getStaff(branch_id) {
					if (parseInt(branch_id) > 0 || branch_id == 'default') {
						$.post('<?php echo base_url(); ?>/report/get_staff/'+branch_id, function(response) {
							$('[name="staff_id"]').empty().html(response.data);
						});
					}
				}
				
				//handle search
				$('#searchButton').on('click', function(e) {
					e.preventDefault();
					var searchData = $(this).closest('form').serialize();
					$.post('<?php echo base_url().'report/my_booking_search_panel' ?>', searchData, function(response) {
						$('#resultSetContainer').empty().html(response.data);
					});
					
				});
			});
			</script>
	</body>
	</html>
			   
			   
			   

