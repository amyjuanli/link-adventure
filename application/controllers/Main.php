<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    public function index() {
        $this->load->view('adventures/index.php');
    }
    public function process_money() {
        if(!$this->session->userdata('money')) {
            $this->session->set_userdata('money', 0);
       
        }
        if(!$this->session->userdata('activities')) {
            $this->session->set_userdata('activities', Array());
        } 
        $date = date("Y/m/d h:i a", time());
        // cut grass button clicked 
        if($this->input->post('grass')) {
            $value = rand(1,5);
            require('snippets/addMoney.php');
            
            $activity = "Earned " . $value . " Rupees from cutting grass. " . "(" . $date . ")";
           require('snippets/addActivity.php'); 
        }
        // open a chest button clicked
        if($this->input->post('chest')) {
            $value = rand(5,10);
            require('snippets/addMoney.php');

            $activity = "Earned " . $value . " Rupees from openning opening chest. " . "(" . $date . ")";
            require('snippets/addActivity.php'); 
        }
        // // mission button clicked
        if($this->input->post('mission')) {
            $value = rand(-30, 30);
            require('snippets/addMoney.php'); 

            if($value < 0) {
                $activity = "<span style='color: red;'>Lost " . $value . " Rupees from a mission. " . "(" . $date . ")</span>";
            } else {
                $activity = "Earned " . $value . " Rupees from  completing a mission. " . "(" . $date . ")";
            }
            require('snippets/addActivity.php'); 
        }
        // // battle button clicked 
        if($this->input->post('battle')) {
            $value = rand(-50, 50);
            require('snippets/addMoney.php'); 

            if($value < 0) {
                $activity = "<span style='color: red;'>Lost " . $value . " Rupees in a battle. " . "(" . $date . ")</span>";
            } else {
                $activity = "Earned " . $value . " Rupees in a battle. " . "(" . $date . ")";
            }
            require('snippets/addActivity.php'); 
        }
        // restart button clicked 
        if($this->input->post('destroy_session')) {
            $this->session->unset_userdata('activities');
            $this->session->unset_userdata('money');
        }

        redirect('/');
    }
}
