<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_MODEL {

  
  function getStores()
  {
  $sql = "EXEC sp_get_all_ssc";
  $query = $this->db->query($sql)->result();
  return $query;
  }

  function getAllPlans()
  {
  $sql = "EXEC sp_get_allplans";
  $query = $this->db->query($sql)->result();
  return $query;
  }

  function getSignaturePlans()
  {
  $sql = "EXEC sp_get_signature_plan";
  $query = $this->db->query($sql)->result();
  return $query;
  }

  function getPhoneByStore($data)
  {
  $sql = "EXEC sp_get_phones_by_store @store_id = N'{$data}'";
  $query = $this->db->query($sql)->result();
  return $query;
  }

  function checkIP($data)
  {
  $sql = "EXEC sp_check_ip @l_ipaddress = N'{$data}'";
  $query = $this->db->query($sql)->row();
  return $query;
  }
  
  function insertIP($data)
  {
    if($data['l_ipaddress']){
      $sql = "EXEC sp_insert_ip
            @l_ipaddress = '{$data['l_ipaddress']}',
            @l_store = '{$data['l_store']}'";
  
      $query = $this->db->query($sql)->row();
      return $query;
    }
  }
  
  function insertReports($data)
  {
    if($data['ipaddress']){
      $sql = "EXEC sp_insert_reports
            @ipaddress = '{$data['ipaddress']}',
            @phone_id = '{$data['phone_id']}',
            @plan_id = '{$data['plan_id']}'";
            
      $query = $this->db->query($sql)->row();
      return $query;
    }
  }
  

}

?>