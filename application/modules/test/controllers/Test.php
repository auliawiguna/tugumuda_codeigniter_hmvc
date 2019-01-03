<?php
class Test extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('test/test_model');
        // $this->load->driver('cache', ['adapter' => 'redis','backup' => 'file']);
        $this->load->driver('cache', ['adapter' => 'file']);
    }
     
    public function index() {
        $save = $this->cache->save('key', 'Some Value',300);
        $cached = $this->cache->get('key');
        echo $cached;
        $this->load->view('test/index');
    }
}