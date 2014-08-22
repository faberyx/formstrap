<?php 
namespace Faberyx\Formstrap;
 
use Config;
use View;
use App;
class Validation {

	/**
	 * An array of rules translation
	 *
	 * @var array
	 */
	protected $bootstrapvalidationrules = array();
	/**
	 * An array of rules translation
	 *
	 * @var array
	 */
	protected $validationrules;
	/**
	 * An array of rules translation
	 *
	 * @var array
	 */
	protected $ruletranslation;

	/**
	 * An array of regex rules translation
	 *
	 * @var array
	 */
	protected $regextranslation;

 	/**
     * @var String The view used to render the javascript
     */
    protected $scriptview;


    function __construct($validationrules)
    {
        $this->ruletranslation = Config::get('formstrap::validationtranslations');
        $this->regextranslation = Config::get('formstrap::validationregex');
        $this->scriptview = Config::get('formstrap::scriptview');
     	$this->validationrules = $validationrules;   
    }

 
	public function setrules(){
 
 		$bootstrapvalidationrules = array();
		// Parse the rules according to Laravel conventions
		if (isset($this->validationrules)){

			foreach ($this->validationrules as $name => $fieldRules) {
				
				$expFieldRules = $fieldRules;
				
				if (!is_array($expFieldRules)) {
					$expFieldRules = explode('|', $expFieldRules);
					$expFieldRules = array_map('trim', $expFieldRules);
				}

				$ruletranslated = array();
				

				foreach ($expFieldRules as $rule) {
					
					if (($colon = strpos($rule, ':')) !== false) {
						$param = substr($rule, $colon + 1);
						$rule = substr($rule, 0, $colon);	
					}	
					
					if (isset($this->ruletranslation[$rule])){
					
						if (($colon = strpos($this->ruletranslation[$rule], '|')) !== false) {
							$parameters = array();
							$ex = explode('|', $this->ruletranslation[$rule]);
					
							if (isset($this->regextranslation[$ex[1]])){
								$x = explode('|', $this->regextranslation[$ex[1]]);
								$parameters[$x[0]] =  $x[1];
							}
					
							if (isset($this->ruletranslation[$ex[1]]) || $ex[1] == 'field'){
								$parameters[$ex[1]] = '"' . $param . '"';
							}
					
							$bootstrapvalidationrules[$name][$ex[0]] = $parameters;
					
						}else{
							$bootstrapvalidationrules[$name][$this->ruletranslation[$rule]] = 'enabled:true';
						} 
				
					} 
				}
			}
		}
		$this->bootstrapvalidationrules = $bootstrapvalidationrules;
	}

	public function with($rule){
 
		App::make("debugbar")->info($rule);

		return $this;
	}

	public function validate()
    {
    	
        return View::make($this->scriptview,array(
            'rules'   =>  $this->bootstrapvalidationrules
            
        ));
    }
 
}