<?php
class MY_pagination extends CI_Pagination {

    public function __construct() {
        parent::__construct();

        $this->first_tag_open		= '<li>';
	$this->first_tag_close	        = '</li>';
	$this->last_tag_open		= '<li>';
	$this->last_tag_close		= '</li>';
	$this->cur_tag_open		= '<li class="active"><a href="javascript:void(0)">';
	$this->cur_tag_close		= '<span class="sr-only">(current)</span></a></li>';
	$this->next_tag_open		= '<li>';
	$this->next_tag_close		= '</li>';
	$this->prev_tag_open		= '<li>';
	$this->prev_tag_close		= '</li>';
	$this->num_tag_open		= '<li>';
	$this->num_tag_close		= '</li>';
    }
}