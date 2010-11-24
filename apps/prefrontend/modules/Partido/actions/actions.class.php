<?php

/**
 * Partido actions.
 *
 * @package    vota
 * @subpackage Partido
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PartidoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->partidos = Doctrine::getTable('Partido')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->partido = Doctrine::getTable('Partido')->find(array($request->getParameter('id_partido')));
    $this->forward404Unless($this->partido);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PartidoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PartidoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($partido = Doctrine::getTable('Partido')->find(array($request->getParameter('id_partido'))), sprintf('Object partido does not exist (%s).', $request->getParameter('id_partido')));
    $this->form = new PartidoForm($partido);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($partido = Doctrine::getTable('Partido')->find(array($request->getParameter('id_partido'))), sprintf('Object partido does not exist (%s).', $request->getParameter('id_partido')));
    $this->form = new PartidoForm($partido);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($partido = Doctrine::getTable('Partido')->find(array($request->getParameter('id_partido'))), sprintf('Object partido does not exist (%s).', $request->getParameter('id_partido')));
    $partido->delete();

    $this->redirect('Partido/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $partido = $form->save();

      $this->redirect('Partido/edit?id_partido='.$partido->getIdPartido());
    }
  }
}
