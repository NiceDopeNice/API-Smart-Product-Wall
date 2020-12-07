<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct() {
		parent::__construct();
        $this->load->model('Api_model');
        header('Access-Control-Allow-Origin: *');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    
	public function getStores()
	{
        $query = $this->Api_model->getStores();
        echo json_encode($query);
    }

	public function getAllPlans()
	{
        $query = $this->Api_model->getAllPlans();
        echo json_encode($query);
    }

	public function getSignaturePlans()
	{
        $query = $this->Api_model->getSignaturePlans();
        echo json_encode($query);
    }
    
	public function getPhoneByStore()
	{
        $param = $_GET['store_id'];
        $query = $this->Api_model->getPhoneByStore($param);
        echo json_encode($query);
    }
    
	public function checkIP()
	{
        $param = $_GET['l_ipaddress'];
        $query = $this->Api_model->checkIP($param);
        echo json_encode($query);
    }
    
	public function insertIP()
	{
        $query = $this->Api_model->insertIP($_POST);
        echo json_encode($query);
    }
    
	public function insertReports()
	{
        $query = $this->Api_model->insertReports($_POST);
        echo json_encode($query);
    }

    
}
