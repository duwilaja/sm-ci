<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MasterData extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MGeneral','mg');
        
    } 

   

}

/* End of file MasterData.php */
