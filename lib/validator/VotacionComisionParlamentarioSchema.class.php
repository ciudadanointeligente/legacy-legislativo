<?php

class VotacionComisionParlamentarioSchema extends sfValidatorSchema
{
  protected function configure($options = array(), $messages = array())
  {
    $this->addMessage('id_parlamentario', 'Campo Parlamentario es obligatorio.');
    $this->addMessage('voto', 'Campo Voto es obligatorio.');
  }
 
  protected function doClean($values)
  {
    $errorSchema = new sfValidatorErrorSchema($this);
 
    //count($values);
    foreach($values as $key => $value)
    {
      $errorSchemaLocal = new sfValidatorErrorSchema($this);
 
      // parlamentario rellenado pero no el campo voto
      if ($value['id_parlamentario'] && !$value['voto'])
      {
        $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'voto');
      }
 
      // voto rellenado pero no el campo parlamentario
      if ($value['voto'] && !$value['id_parlamentario'])
      {
        $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'id_parlamentario');
      }
 
      // no esta ni el parlamentario ni el voto rellando
      if (!$value['id_parlamentario'] && !$value['voto'])
      {
        unset($values[$key]);
      }
 
      // some error for this embedded-form
      if (count($errorSchemaLocal))
      {
        $errorSchema->addError($errorSchemaLocal, (string) $key);
      }
    }
 
    // throws the error for the main form
    if (count($errorSchema))
    {
      throw new sfValidatorErrorSchema($this, $errorSchema);
    }
 
    return $values;
  }
}

?>
