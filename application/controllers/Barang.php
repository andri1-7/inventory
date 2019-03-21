<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* This is App Controller
*/
class Barang extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		// $this->template->write_view('sidenavs', 'template/default_sidenavs', true);
		// $this->template->write_view('navs', 'template/default_topnavs.php', true);
		// $this->template->set_template('webcring');
		LOAD_NAVBAR('Master Barang');

		$this->load->model(array (
			'm_general',
			'm_barang'
		));
	}	

	function index() {
        // $this->acl->validate_read();
        $data = array();

        if($this->input->post('submit')) {
            unset($_POST['submit']);
            $data['records'] = $this->m_barang->get_master_barang($this->input->post());
            // die(var_dump($data['records']));
            echo $this->load->view('dashboard/barang/list_data', $data, TRUE);
            die();
        }

        $this->template->write_view('content', 'dashboard/barang/list', $data, true);
        $this->template->render();
    }

    function create() {
        // $this->acl->validate_create();

        if($this->input->post('submit')) {
            unset($_POST['submit']);

            list($iflag, $imsg) = $this->m_general->insert('barang', $this->input->post());

            JSONRES($iflag, $imsg);
        }

        $data = array();
        echo $this->load->view('dashboard/barang/add', $data, TRUE);
        die();
    }

    function update($id) {
        // $this->acl->validate_update();

        if($this->input->post('submit')) {
            // Do Update
            unset($_POST['submit']);

            list($uflag, $umsg) = $this->m_general->update('barang', $this->input->post(), array('id' => $id));

            JSONRES($uflag, $umsg);
        }

        $data = array();
        $data['records'] = $this->m_barang->get_master_barang(array('id' => $id));
        echo $this->load->view('dashboard/barang/edit', $data, TRUE);
        die();
    }

    function delete($id) {
        // $this->acl->validate_delete();
        list($dflag, $dmsg) = $this->m_general->delete('barang', array('id' => $id));

        JSONRES($dflag, $dmsg);
    }
}
