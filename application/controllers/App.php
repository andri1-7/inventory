<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* This is App Controller
*/
class App extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        // $this->template->write_view('sidenavs', 'template/default_sidenavs', true);
        // $this->template->write_view('navs', 'template/default_topnavs.php', true);
        // $this->template->set_template('webcring');
        $this->load->model(array (
            'm_barang'
        ));
    }   

    function index() {
        $this->dashboard();
    }

    function simple_template() {
        $this->template->set_template('default');
        $this->template->write('header', 'This is Header');
        $this->template->write('title', 'My Simple Template', TRUE);
        $this->template->write_view('content', 'tes/mypage', '', true);

        $this->template->render();
    }

    function dashboard() {
        LOAD_NAVBAR('Dashboard');
        $this->template->write_view('content', 'tes/dashboard', '', true);

        $this->template->render();
    }

    function form_ex() {
        LOAD_NAVBAR('Form Example');
        $this->template->write('header', 'This is Header', true);
        $this->template->write_view('content', 'tes/form', '', true);

        $this->template->render();
    }

    function table_ex() {
        LOAD_NAVBAR('Table Example');
        $this->template->write('header', 'Table <small>Some examples</small>', true);
        $this->template->write_view('content', 'tes/table', '', true);

        $this->template->render();

    }
    function table_dyn_ex() {
        LOAD_NAVBAR('Table Dynamics Example');
        $this->template->write('header', 'Table Dynamics <small>Some examples</small>', true);
        $this->template->write_view('content', 'tes/table_dynamic', '', true);

        $this->template->render();

    }

    function login ()
    {
    	$this->template->set_template('simple');
        $this->template->write('header', 'Table Dynamics <small>Some examples</small>', true);  
        $this->template->write_view('content', 'app/login', '', true);

        $this->template->render();
    }

    function akses_login()
    {
        $submit = $this->input->post('submit');

        if($submit)
        {
            //encryp password to md5
            $passwd = md5($this->input->post('passwd'));
            $login_data = array(
                'username' => $this->input->post('username'),
                'passwd' => $this->input->post('passwd')
            );
            
            //lookup user
            $user_data = $this->m_barang->validate_member($login_data);

            if (!empty($user_data)) {
                // //set session value
                // $this->session->set_userdata('user_info', $user_data);
                $addon = array('redirect' => base_url('barang'));
                JSONRES(_SUCCESS, lang('LoginSuccess'), $addon);
            }else{
                $addon = array('redirect' => base_url('app/login'));
                JSONRES(_SUCCESS, lang('LoginSuccess'), $addon);
            }
        }
    }
}