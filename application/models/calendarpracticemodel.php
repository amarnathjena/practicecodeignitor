<?php

class CalendarPracticeModel extends CI_Model {

    var $details;

    function __construct() {
        // Call the Model constructor
        parent::__construct();

        /////////////////// Here creating calendar configuration ///////////////////
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
////////////////////////// here ending calendar configuration //////////////


        $this->load->database();
    }

    function get_event_calendar($year='', $month='') {
        $this->load->library('calendar', $this->config);
        $year = $year ? $year : date('Y');
        $month = $month ? ($month<10?"0$month":$month) : date('m');
        
        $query1="SELECT * FROM `users` WHERE DATE_FORMAT(`dob`, '%m')='$month'";
        $query = $this->db->query($query1);
        $result = $query->result_array();
        foreach ( $result as $row) {
            $cal_content[date('m', strtotime($row['dob']))] .= $row['username']."<br/>";
        }
        print_r($cal_content);
        echo $this->calendar->generate($year, $month, $cal_content);
    }
}
