<?php

class CalendarPracticeModel extends CI_Model{
    var $details;
    
    function __construct(){
        // Call the Model constructor
        parent::__construct();
        
        ///////////////////  Here creating calendar configuration  ///////////////////
$this->config = array(
    'start_day' => 'monday', //you could specify whatever day you'd prefer
    'day_type' => 'long'
   // 'show_next_prev' => true, //this is to show the Next and Previous buttons which we are going to work with ajax
   // 'next_prev_url' => base_url() . 'index.php/branchcalender/ajax_calendar'
  );
  //here is the template for your calendar
  $this->config['template'] = '{table_open}<table border="0" cellpadding="0" cellspacing="2" class="calendar_tbl">{/table_open}

   {heading_row_start}<tr>{/heading_row_start}

   {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
   {heading_title_cell}<th colspan="{colspan}" class="calendar_th">{heading}</th>{/heading_title_cell}
   {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

   {heading_row_end}</tr>{/heading_row_end}

   {week_row_start}<tr>{/week_row_start}
   {week_day_cell}<td class="calendar_td_week">{week_day}</td>{/week_day_cell}
   {week_row_end}</tr>{/week_row_end}

   {cal_row_start}<tr>{/cal_row_start}
   {cal_cell_start}<td class="calendar_td">{/cal_cell_start}

   {cal_cell_content}<a >{day}</a><br/>{content}{/cal_cell_content}
   {cal_cell_content_today}<div class="highlight"><a >{day}</a><br/>{content}</div>{/cal_cell_content_today}

   {cal_cell_no_content}{day}{/cal_cell_no_content}
   {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

   {cal_cell_blank}&nbsp;{/cal_cell_blank}

   {cal_cell_end}</td>{/cal_cell_end}
   {cal_row_end}</tr>{/cal_row_end}

   {table_close}</table>{/table_close}';
//////////////////////////  here ending calendar configuration //////////////
        
        
        $this->load->database();
    }
    
    function get_event_calendar($year,$month){
		
  $this->load->library('calendar',$this->config);

  		$mn=$month+1;
  		
  		
		
  		
		$date=$year."-".$month."-01";
		$end=$year."-".$mn."-01";	
		
		
			
		  //$query1="SELECT * FROM `holi_bookinginfo` WHERE `create_date` >= '".$date."' AND `create_date` <  '".$end."' ";
		
		$query=$this->db->query($query1);
		
		//$reult=$query->result();
//mutiple date function
   $test01="";
   $test02="";
   $test03="";
   $test04="";
   $test05="";
   $test06="";
   $test07="";
   $test08="";
   $test09="";
   $test10="";
   $test11="";
   $test12="";
   $test13="";
   $test14="";
   $test15="";
   $test16="";
   $test17="";
   $test18="";
   $test19="";
   $test20="";
   $test21="";
   $test22="";
   $test23="";
   $test24="";
   $test25="";
   $test26="";
   $test27="";
   $test28="";
   $test29="";
   $test30="";
   $test31="";



$data8="";
foreach($query->result() as $row){
	
	$data5=explode("-",$row->form_date);
	$data7=site_url()."report/holiday_voucher/".$row->holi_book_id;
	
   echo "<script> function data".$row->holi_book_id."(){
	
window.open('".$data7."','popup','width=750,height=750,resizable=0,scrollbars=1,left=50'); 

}
</script>";

	
	   switch($data5[2]){
   
   case 01:
   
   $test01.=$row->holi_bookno."<br/>";
   break;
   case 02:
   $test02.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 03:
   $test03.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 04:
   $test04.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 05:
   $test05.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</a><br/><br/>";
   break;
   case 06:
   $test06.="<a href='#' onclick='return data".$row->hotel_booking_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 07:
   $test07.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 08:
   $test08.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 09:
   $test09.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 10:
   $test10.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 11:
   $test11.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 12:
   $test12.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 13:
   $test13.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 14:
   $test14.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 15:
   $test15.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 16:
   $test16.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 17:
   $test17.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 18:
   $test18.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 19:
   $test19.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 20:
   $test20.="<a href=#'' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 21:
   $test21.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 22:
   $test22.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 23:
   $test23.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 24:
   $test24.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 25:
   $test25.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 26:
   $test26.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 27:
   $test27.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 28:
   $test28.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/> <br/>";
   break;
   case 29:
   $test29.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 30:
   $test30.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   case 31:
   $test31.="<a href='#' onclick='return data".$row->holi_book_id."();'><span style='background-color:#568BCF;color:#FFFFFF;'>".$row->holi_bookno."</span></a><br/><br/>";
   break;
   
   }
	

	
}

    
   $result5= array(1=>$test01,2=>$test02,
   3=>$test03,
   4=>$test04,5=>$test05,
   6=>$test06,7=>$test07,
   8=>$test08,9=>$test09,
   10=>$test10,11=>$test11,
   12=>$test12,13=>$test13,
   14=>$test14,15=>$test15,
   16=>$test16,17=>$test17,
   18=>$test18,19=>$test19,
   20=>$test20,21=>$test21,
   22=>$test22,23=>$test23,
   24=>$test24,25=>$test25,
   26=>$test26,27=>$test27,
   28=>$test28,29=>$test29,
   30=>$test30,31=>$test31
   );
  
 // print_r($result5);
 
  return $this->calendar->generate($year,$month,$result5);
  
 unset($result5);

	}
}


