<?php abstract class Main_C
{
    
     public $template = null;




     public function __construct() 
      {
          $this->template = View::factory('main/template_v');
          
          
          echo $this->template->render();
      }
      
      
      public function index() 
      {
          
      }
      
      
      public function before()
      {
          
      }
      
      
      public function after()
      {
          
      }
    
}

