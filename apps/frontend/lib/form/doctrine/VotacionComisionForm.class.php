<?php

/**
 * Votacion form.
 *
 * @package    vota
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VotacionComisionForm extends BaseVotacionComisionForm
{
  public function configure()
  {
    $num_votos = 5;
  
    unset(
      $this['created_at'], $this['updated_at'], $this['parlamentario_list']
    );
    
    if (sfContext::getInstance()->getRouting()->getCurrentRouteName() == 'votacion_comision_edit') {
      $this->embedRelation('VotacionComisionParlamentario AS Voto');
    }    
    else {
      $subForm = new sfForm();
      for ($i = 0; $i < $num_votos; $i++)
      {
        $VotacionParlamentario = new VotacionComisionParlamentario();
        $VotacionParlamentario->VotacionComision = $this->getObject();
     
        $form = new VotacionComisionParlamentarioForm($VotacionParlamentario);
     
        $subForm->embedForm($i, $form);
      }
      $this->embedForm('Voto', $subForm);  
    }
  }

  public function saveEmbeddedForms($con = null, $forms = null)
  {
    if (null === $forms)
    {
      $votos = $this->getValue('Voto');
      $forms = $this->embeddedForms;
      foreach ($forms['Voto'] as $id_votacion => $form)
      {
        if (!isset($votos[$id_votacion]))
        {
          unset($forms['Voto'][$id_votacion]);
        }
      }
    }
   
    return parent::saveEmbeddedForms($con, $forms);
  }
}
