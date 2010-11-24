<?php

/**
 * VotacionParlamentario form.
 *
 * @package    vota
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VotacionComisionParlamentarioForm extends BaseVotacionComisionParlamentarioForm
{
  public function configure()
  {    
    $this->mergePostValidator(new VotacionComisionParlamentarioSchema());
  }
}
