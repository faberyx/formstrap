<?php

return array(

    'scriptview' => 'formstrap::javascript',

    'validationtranslations' =>  array(
			'required' 		=> 'notEmpty',
			'email' 		=> 'emailAddress',
			'min' 			=> 'stringLength|min',
			'alpha_num' 	=> 'regexp|alphanum',
			'same' 			=> 'identical|field'
			),

	'validationregex' => array(
			'alphanum' 	=> 'regexp|/^[a-z\d\-_\s]+$/i'
			)
);