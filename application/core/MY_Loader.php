<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends MX_Loader {
    
    public function __construct() {
        parent::__construct();
        
    }
    
    public function parseTemplate()  
    {
        $this->themes       = $this->config->item('themes');
        $this->web_title    = $this->config->item('web_title');
                
        $data = array(
           'SITE_URL'       => site_url(),
           'BASE_URL'       => base_url(),
           'THEMES_PAGE'    => base_url('themes/'.$this->themes)
        );        
        
        $data['HEADER_SECTION']     = $this->parser->parse($this->themes.'/layout/menu/main_menu', $data, true);
        $data['HEADER_SECTION']     .= $this->parser->parse($this->themes.'/layout/header/header', $data, true);
        $data['BODY_SECTION']       = $this->parser->parse($this->themes.'/layout/content/body_layout', $data, true);
        $data['FOOTER_SECTION']     = $this->parser->parse($this->themes.'/layout/footer/footer', $data, true);
        
        $this->parser->parse($this->themes.'/layout/main_layout', $data);
    }   
    
    public function parseMemberTemplate()
    {
        
    }
    
}