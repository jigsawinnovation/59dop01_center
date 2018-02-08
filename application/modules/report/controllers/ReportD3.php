<?php

/**
 * Created by PhpStorm.
 * User: sanitkeawtawan
 * Date: 6/19/2017 AD
 * Time: 14:54
 */
include_once("Main.php");
class ReportD3 extends Main_Controller {
    private $data=null;
    public function __construct(){
        parent::__construct();
        $param= $this->getParam();
        $this->data = array(
            'content_view'=>'reportD3',
            'title'=>'แบบสอบถามความต้องการฯ (D3)',
            'res'=>$this->report_mock->reportD3($param['id'])
        );
        if(!$this->data['res']){
            $this->dataempty();
        }
    }
    function index(){
        $this->template->load('index_page',$this->data);
    }
    function pdf(){
        $this->generate('report_template/index_pdf',$this->data,$this->preview,'report_d3.pdf');
    }
}