<?php 
namespace Faberyx\Formstrap;
 
//use View;
//use App;
class Utils {

 

	/**
     * Create a new utils instance.
     *
     * @param  Illuminate\View\Environment  $view
     * @param  Illuminate\Config\Repository  $config
     * @return void
     */
    public function __construct()
    {
     //   $this->view = $view;  	
    }

 
	 public function getfilesize($bytes) { 
   
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
 
}