<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Gox_acl
{
	public $CI;
	public $mySession;
	public $is_super = 5;
	public $granted = 1;

	public $create = 'create';
	public $read = 'read';
	public $update = 'update';
	public $delete = 'delete';
	public $report = 'report';

	function __construct()
	{
		$this->CI = &get_instance();
		$this->CI->load->library('session', 'database');
		$this->CI->load->helper(array('url', 'language'));
		$this->CI->lang->load('en', 'english');
		$this->CI->load->model('model_acl');
	}

	public function getMySession() {
		$this->mySession = $this->CI->session->userdata('user_info');

		if(empty($this->mySession)) {		
			redirect(''); // Redirect to Home Page
		} else {
			if(!isset($this->mySession->username) OR empty($this->mySession->username))
				redirect(''); // Redirect to Home Page
			else if(!isset($this->mySession->level_id) OR empty($this->mySession->level_id))
				redirect(''); // Redirect to Home Page
		}
	}

	public function noAccess($params = array()) {
		// ** Get Menu Name for a better Feedback ** //
		$func = $params['function'];
		$class = $params['classname'];
		$opr = $params['operation'];

		if(!empty($func))
			$this->CI->db->where('func_name', $func);

		$this->CI->db->where('class_name', $class);

		$menu = $this->CI->db->get('menu')->row();

		$naparams = array('operation' => $opr);
		if(count($menu) > 0)
			$naparams['menu_name'] = lang('onMenu').' '.$menu->name;

		if(!empty($naparams)) {
			$langname = 'msg_op_'.$naparams['operation'];
			$message = lang('msg_nopermission_menu').' '.lang($langname);
			if(!empty($naparams['menu_name']))
				$message .= ' '.$naparams['menu_name'];
		} else {
			$message = lang('msg_nopermission_menu');
		}

		if(!requestFromAjax()) {
			$this->CI->session->set_flashdata('flash_message', $message);
			redirect('admin');
		} else {
			echo '<script>';
			echo '$("#flash-message div.flash-message-text").html("'.$message.'");';
			echo '$("#flash-message").delay(500).fadeIn().delay(3500).fadeOut();';
			echo '$(".modal").modal("hide");';
			echo 'setTimeout(function() { $("#flash-message div.flash-message-text").html(""); }, 5000);';
			echo '</script>';
			die();
		}

		die();
	}

	public function isAllGranted() {
		$this->CI->db->select('u.username, g.nama');
		$this->CI->db->where('u.username', $this->mySession->username);
		$this->CI->db->where('g.grant_all_access', $this->granted);

		$this->CI->db->join('user_group ug', 'ug.id_user = u.id');
		$this->CI->db->join('group g', 'ug.id_group = g.id');

		$query = $this->CI->db->get('users u')->result();

		if(!empty($query))
			return true;
		else
			return false;
	}

	public function isGroupGranted($params) {
		$this->CI->db->select('
			u.username, g.nama, m.name,
			m.class_name, m.func_name,
			ga.create, ga.read, ga.update,
			ga.delete, ga.report
			');
		$this->CI->db->where('u.username', $this->mySession->username);
		$this->CI->db->where('m.class_name', $params['classname']);
		$this->CI->db->where('ga.'.$params['operation'], $this->granted);

		if(isset($params['function']) && !empty($params['function']))
			$this->CI->db->where('m.func_name', $params['function']);

		$this->CI->db->join('user_group ug', 'u.id = ug.id_user');
		$this->CI->db->join('group g', 'ug.id_group = g.id');
		$this->CI->db->join('group_acl ga', 'g.id = ga.id_group');
		$this->CI->db->join('menu m', 'ga.id_menu = m.id');

		$query = $this->CI->db->get('users u')->result();

		if(!empty($query))
			return true;
		else
			return false;
	}

	public function isUserGranted($params = array()) {
		$this->CI->db->select('
			u.username, m.name, m.class_name,
			m.func_name, ua.create, ua.read,
			ua.update, ua.delete, ua.report
			');

		$this->CI->db->where('u.username', $this->mySession->username);
		$this->CI->db->where('m.class_name', $params['classname']);
		$this->CI->db->where('ua.'.$params['operation'], $this->granted);

		if(isset($params['function']) && !empty($params['function']))
			$this->CI->db->where('m.func_name', $params['function']);

		$this->CI->db->join('user_acl ua', 'u.id = ua.id_user');
		$this->CI->db->join('menu m', 'ua.id_menu = m.id');

		$query = $this->CI->db->get('users u')->result();

		if(!empty($query))
			return true;
		else
			return false;
	}

	public function operationGranted($class, $acl_name = '', $func = '') {
		$this->getMySession();
		$isAllGranted = $this->isAllGranted();

		if($isAllGranted === true)
			return true;

		// ** Checking Group Privileges **
		$gparams = array('classname' => $class, 'operation' => $acl_name, 'function' => $func);
		$isGroupGranted = $this->isGroupGranted($gparams);

		if($isGroupGranted === true)
			return true;

		// ** Checking Personal Privileges ** //
		$isUserGranted = $this->isUserGranted($gparams);

		if($isUserGranted === true)
			return true;

		$this->noAccess($gparams);
	}

	// ******* VALIDATE ******* //
	// Docs
	// Just fill $func_name parameters when you has been register the function name in acl table
	public function validate_read($func_name = '', $classname = '') {
		if(empty($classname)) {
			$classname = getClassName();
		}
		$granted = $this->operationGranted($classname, $this->read, $func_name);
	}

	public function validate_create($func_name = '', $classname = '') {
		if(empty($classname)) {
			$classname = getClassName();
		}
		$granted = $this->operationGranted($classname, $this->create, $func_name);
	}

	public function validate_update($func_name = '', $classname = '') {
		if(empty($classname)) {
			$classname = getClassName();
		}
		$granted = $this->operationGranted($classname, $this->update, $func_name);
	}

	public function validate_delete($func_name = '', $classname = '') {
		if(empty($classname)) {
			$classname = getClassName();
		}
		$granted = $this->operationGranted($classname, $this->delete, $func_name);
	}

	public function validate_report($func_name = '', $classname = '') {
		if(empty($classname)) {
			$classname = getClassName();
		}
		$granted = $this->operationGranted($classname, $this->report, $func_name);
	}
}
