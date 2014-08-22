<?php 
namespace Faberyx\Formstrap\Facades;
 
use Illuminate\Support\Facades\Facade;
 
class Formstrap extends Facade {
 
  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor() { return 'formstrap'; }
 
}