<?php

/**
 * Sesion actions.
 *
 * @package    vota
 * @subpackage Sesion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SesionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->num_semanas = 8;
  
    $this->sesions = Doctrine::getTable('Sesion')
      ->createQuery('a')
      ->where('a.fecha > ?', date("m/d/Y", mktime(0,0,0,date('m'), date('d')-5*$this->num_semanas, date('Y') )))
      ->addOrderBy('a.fecha DESC, a.camara ASC')
      ->execute();
            //echo $this->sesions;
      
    //pasa el último debate destacado    
    $this->debates = Doctrine::getTable('Debate')
    ->createQuery('d')
    ->where('d.destacado_titulo IS NOT NULL AND d.destacado_texto IS NOT NULL')
    ->orderBy('d.fecha DESC')
    ->limit(3)
    //echo $this->debates;
    ->execute();
  }

  public function executeTest(sfWebRequest $request)
  {
    $this->sesions = Doctrine::getTable('Sesion')
      ->createQuery('a')
      ->where('a.fecha > ?', date("m/d/Y", mktime(0,0,0,date('m'), date('d')-5, date('Y') )))
      ->addOrderBy('a.fecha DESC, a.camara ASC')
      ->execute();
  }
  
  public function executeSemana(sfWebRequest $request)
  {
    $semana = $request->getParameter('semana');
    $this->semana = $semana;
    
    $this->sesions = Doctrine::getTable('Sesion')
      ->createQuery('a')
      ->where('a.fecha > ?', date("m/d/Y", mktime(0,0,0,date('m'), date('d')-($semana+1)*7, date('Y') )))
      ->addOrderBy('a.fecha DESC, a.camara ASC')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->sesion = Doctrine::getTable('Sesion')->find(array($request->getParameter('id_sesion')));
    $this->forward404Unless($this->sesion);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new SesionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SesionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($sesion = Doctrine::getTable('Sesion')->find(array($request->getParameter('id_sesion'))), sprintf('Object sesion does not exist (%s).', $request->getParameter('id_sesion')));
    $this->form = new SesionForm($sesion);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($sesion = Doctrine::getTable('Sesion')->find(array($request->getParameter('id_sesion'))), sprintf('Object sesion does not exist (%s).', $request->getParameter('id_sesion')));
    $this->form = new SesionForm($sesion);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($sesion = Doctrine::getTable('Sesion')->find(array($request->getParameter('id_sesion'))), sprintf('Object sesion does not exist (%s).', $request->getParameter('id_sesion')));
    $sesion->delete();

    $this->redirect('Sesion/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $sesion = $form->save();

      $this->redirect('Sesion/edit?id_sesion='.$sesion->getIdSesion());
    }
  }
}
