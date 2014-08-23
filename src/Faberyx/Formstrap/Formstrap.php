<?php 
namespace Faberyx\Formstrap;
 
 
use App; 
class Formstrap {


    /**
     * validation class.
     *
     * @var Faberyx\Formstrap\Validation
     */
    protected $validation;		
    


    /**
     * utils class.
     *
     * @var Faberyx\Formstrap\Validation
     */
    protected $utils;  

    /**
     * Illuminate view environment.
     *
     * @var Illuminate\View\Environment
     */
    protected $view;

    /**
     * Illuminate config repository.
     *
     * @var Illuminate\Config\Repository
     */
    protected $config;

    /**
     * Create a new profiler instance.
     *
     * @param  Illuminate\View\Environment  $view
     * @param  Illuminate\Config\Repository  $config
     * @return void
     */
    public function __construct($view,  $config, $validation, $utils)
    {
        $this->view = $view;
        $this->config = $config;
        $this->validation = $validation;
        $this->utils = $utils;
    }


   
    public function validation(){

        return $this->validation;
    }    

   
    public function utils(){

        return $this->utils;
    }      
}