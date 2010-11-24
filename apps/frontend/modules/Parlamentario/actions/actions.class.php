<?php

/**
 * Parlamentario actions.
 *
 * @package    vota
 * @subpackage Parlamentario
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ParlamentarioActions extends sfActions
{
  public function executeList(sfWebRequest $request)
  {
    $this->parlamentarios = Doctrine::getTable('Parlamentario')
      ->createQuery('a')
      ->where('a.activo = ?', 1)
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->parlamentario = Doctrine::getTable('Parlamentario')->find(array($request->getParameter('id_parlamentario')));
    $this->forward404Unless($this->parlamentario);
  }

  public function executeVotaciones(sfWebRequest $request)
  {
    $this->parlamentario = Doctrine::getTable('Parlamentario')->find(array($request->getParameter('id_parlamentario')));
    $this->forward404Unless($this->parlamentario);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ParlamentarioForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ParlamentarioForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($parlamentario = Doctrine::getTable('Parlamentario')->find(array($request->getParameter('id_parlamentario'))), sprintf('Object parlamentario does not exist (%s).', $request->getParameter('id_parlamentario')));
    $this->form = new ParlamentarioForm($parlamentario);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($parlamentario = Doctrine::getTable('Parlamentario')->find(array($request->getParameter('id_parlamentario'))), sprintf('Object parlamentario does not exist (%s).', $request->getParameter('id_parlamentario')));
    $this->form = new ParlamentarioForm($parlamentario);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($parlamentario = Doctrine::getTable('Parlamentario')->find(array($request->getParameter('id_parlamentario'))), sprintf('Object parlamentario does not exist (%s).', $request->getParameter('id_parlamentario')));
    $parlamentario->delete();

    $this->redirect('Parlamentario/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $parlamentario = $form->save();

      $this->redirect('Parlamentario/edit?id_parlamentario='.$parlamentario->getIdParlamentario());
    }
  }

  public function executeIndex()
  {
    $this->parlamentarios = Doctrine::getTable('Parlamentario')
      ->createQuery('p')
      ->where('p.activo = ?', 1)
      ->orderBy('p.apellidos')
      ->execute();
  }
}
