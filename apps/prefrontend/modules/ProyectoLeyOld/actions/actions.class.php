<?php

/**
 * ProyectoLey actions.
 *
 * @package    vota
 * @subpackage ProyectoLey
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProyectoLeyActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $leyes = Doctrine::getTable('ProyectoLey')
      ->createQuery('p')
      ->limit(1)
      ->execute();

    $this->proyecto_ley = $leyes[0];
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->proyecto_ley = Doctrine::getTable('ProyectoLey')->find(array($request->getParameter('id_proyecto_ley')));
    $this->getResponse()->addMeta('title', ($this->proyecto_ley->getTituloSesion() != null) ? trim($this->proyecto_ley->getTituloSesion()) : ucfirst(strtolower(trim($this->proyecto_ley->getTitulo()))));
    $this->getResponse()->addMeta('description', ($this->proyecto_ley->getTituloSesion() != null) ? 'Sigue el debate del proyecto '.trim($this->proyecto_ley->getTituloSesion()) : 'Sigue el debate del proyecto '.ucfirst(strtolower(trim($this->proyecto_ley->getTitulo()))));
    //$this->getResponse()->setTitle('Análisis legislativo - Proyecto en discusión: '.$this->proyecto_ley->getTitulo(),false);  
    $this->forward404Unless($this->proyecto_ley);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ProyectoLeyForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ProyectoLeyForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($proyecto_ley = Doctrine::getTable('ProyectoLey')->find(array($request->getParameter('id_proyecto_ley'))), sprintf('Object proyecto_ley does not exist (%s).', $request->getParameter('id_proyecto_ley')));
    $this->form = new ProyectoLeyForm($proyecto_ley);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($proyecto_ley = Doctrine::getTable('ProyectoLey')->find(array($request->getParameter('id_proyecto_ley'))), sprintf('Object proyecto_ley does not exist (%s).', $request->getParameter('id_proyecto_ley')));
    $this->form = new ProyectoLeyForm($proyecto_ley);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($proyecto_ley = Doctrine::getTable('ProyectoLey')->find(array($request->getParameter('id_proyecto_ley'))), sprintf('Object proyecto_ley does not exist (%s).', $request->getParameter('id_proyecto_ley')));
    $proyecto_ley->delete();

    $this->redirect('ProyectoLey/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $proyecto_ley = $form->save();

      $this->redirect('ProyectoLey/edit?id_proyecto_ley='.$proyecto_ley->getIdProyectoLey());
    }
  }

  /******************************************************/
  public function executeVotaciones(sfWebRequest $request)
  {
    $this->proyecto_ley = Doctrine::getTable('ProyectoLey')->find(array($request->getParameter('id_proyecto_ley')));
    $this->forward404Unless($this->proyecto_ley);
  }

  public function executeBuscar(sfWebRequest $request)
  {
    $frases = explode(" ",$request->getParameter('frase'));

    //buscar por boletin
    $q = Doctrine_Query::create()->from('ProyectoLey p');
    if (count($frases) == 1) $q = $q->where('p.nro_boletin LIKE ?', $frases[0].'-%');

    //buscar por título
    for ($i=0; $i<count($frases); $i++){
      if ($i==0) $q = $q->orWhere('p.titulo LIKE ?', '%'.$frases[$i].'%');
      else $q = $q->andWhere('p.titulo LIKE ?', '%'.$frases[$i].'%');
    }

    //buscar por materia
    $m = Doctrine_Query::create()->select('m.id_materia')->from('Materia m');
    for ($i=0; $i<count($frases); $i++){
      if ($i==0) $m = $m->where('m.nombre LIKE ?', '%'.$frases[$i].'%');
      else $m = $m->orWhere('m.nombre LIKE ?', '%'.$frases[$i].'%');
    }
    $materias = $m->execute();
    for ($i=0; $i<count($materias); $i++){
      if ($i==0) $q = $q->orWhere('p.id_materia = ?', $materias[$i]->getIdMateria());
      else $q = $q->orWhere('p.id_materia = ?', $materias[$i]->getIdMateria());
    }

    //execute  
    $max = sfConfig::get('app_max_proyectos_por_etapa');
    $this->proyecto_leys = $q->addOrderBy('p.fecha_ingreso DESC')->execute();

    $this->pager = new sfDoctrinePager('ProyectoLey',$max);
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }
  
  public function executeSituacion(sfWebRequest $request)
  {
    $q = $this->getQueryPorFecha($request);
    $this->proyecto_leys = $q->execute();
    
    $this->pager = new sfDoctrinePager('ProyectoLey',sfConfig::get('app_max_proyectos_por_etapa'));
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }
  public function executeLeeproyectos(sfWebRequest $request)
  {
    $q = Doctrine_Query::create()
      ->from('ProyectoLey')
      ->limit(20);
    $this->proyectoley = $q->execute();

    /*$pl = new ProyectoLey();
    $pl->nro_boletin = "1111";
    //$user->bord_date = date("d-m-Y",strtotime('1974-02-11'));
    $pl->save();*/
    //$this->getMateria('123');
    
  }
    

  public function executeFilter(sfWebRequest $request)
  {
    //base query por etapas y periodos
    $q = $this->getQueryPorFecha($request);
    
    //query por amterias
    $materias = explode(",",$request->getParameter('materia'));
    if ($materias[0] != 0){
      foreach ($materias as $i=>$materia){
        if ($i == 0) $q_str = 'p.id_materia = ?';
        else $q_str .= ' OR p.id_materia = ?';
        $q_val[] = $materia;
      }
      $q = $q->andWhere($q_str, $q_val);
      $super = Doctrine_Query::create()->from('Materia m')->where('m.id_materia = ?',$q_val[0])->execute();
      $this->supermateria = $super[0]->getSuperMateria();
    }
    
    //query por parlamentario o partido
    $id_parl = $request->getParameter('id_parl');
    $id_part = $request->getParameter('id_part');
    $autores = null;
    if ($id_parl != 0){
      $autores = Doctrine_Core::getTable('Autor')->createQuery('a')->where('a.id_parlamentario = ?', $id_parl)->execute();
      $this->parlamentario = Doctrine_Core::getTable('Parlamentario')->findOneByIdParlamentario($id_parl);
      $this->parlamentario = $this->parlamentario->getNombre().' '.$this->parlamentario->getApellidos();
    }
    else if ($id_part != 0){
      $parls = Doctrine_Core::getTable('Parlamentario')->createQuery('x')->where('x.id_partido = ?', $id_part)->execute();
      if (count($parls) > 0){
        foreach ($parls as $i=>$parl){
          if ($i == 0) $q_str3 = 'a.id_parlamentario = ?';
          else $q_str3 .= ' OR a.id_parlamentario = ?';
          $q_val3[] = $parl->getIdParlamentario();
        }
        $autores = Doctrine_Core::getTable('Autor')->createQuery('a')->where($q_str3, $q_val3)->execute();
      }
      $this->partido = Doctrine_Core::getTable('Partido')->findOneByIdPartido($id_part)->getSigla();
    }

    //proyectos ley por parlamentario o partido
    if ($id_part != 0 || $id_parl != 0){
      if (count($autores) > 0){
        foreach ($autores as $i=>$autor){
          $leyes = $autor->getAutorProyectoLey();
          if (count($leyes) > 0){
            foreach ($leyes as $j=>$ley){
              if ($i == 0 && $j == 0) $q_str2 = 'p.id_proyecto_ley = ?';
              else $q_str2 .= ' OR p.id_proyecto_ley = ?';
              $q_val2[] = $ley->getIdProyectoLey();
            }
          }
        }
        $q = $q->andWhere($q_str2, $q_val2);
      }
      else {
        $q = $q->andWhere('p.id_proyecto_ley = 0');
      }
    }
    $this->proyecto_leys = $q->execute();
    
    $this->pager = new sfDoctrinePager('ProyectoLey',sfConfig::get('app_max_proyectos_por_etapa'));
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }
  public function executeBalance(sfWebRequest $request)
  {
    $leyes = Doctrine::getTable('ProyectoLey')
      ->createQuery('p')
      ->limit(1)
      ->execute();

    $this->proyecto_ley = $leyes[0];
  }  
    
  public function executeBalancelist(sfWebRequest $request)
  {
    //variables POST del formulario
    if (isset($_POST["var1"])) $var1 = $_POST["var1"]; else $var1=null; //proyectos
    if (isset($_POST["var2"])) $var2 = $_POST["var2"]; else $var2=null; //año
    if (isset($_POST["var3"])) $var3 = $_POST["var3"]; else $var3=null; //autor
    if (isset($_POST["var4"])) $var4 = $_POST["var4"]; else $var4=null; //cámara
    if (isset($_POST["var5"])) $var5 = $_POST["var5"]; else $var5=null; //materia
    if (isset($_POST["var6"])) $var6 = $_POST["var6"]; else $var6=null; //estado

    //recuperar valores del formulario escondido
    if ($var2 != null) $var2 = explode(",",$var2);
    if ($var3 != null) $var3 = explode(",",$var3);
    if ($var4 != null) $var4 = explode(",",$var4);
    if ($var5 != null) $var5 = explode(",",$var5);
    if ($var6 != null) $var6 = explode(",",$var6);

    //default ingresados del 2010
    if ($var1==null) $var1='Ingresados';
    $this->var1 = $var1;
    
    $v=array();  
    $v = $this->countVars($var2,2,$v);
    $v = $this->countVars($var3,3,$v);
    $v = $this->countVars($var4,4,$v);
    $v = $this->countVars($var5,5,$v);
    $v = $this->countVars($var6,6,$v);
    
    $a2=0;
    for ($i=2; $i<7; $i++){
      if ($v[$i] == 2) $a2++;
    }
    
    if ($a2==0){
      //selecciona var2
      $var2[0]=2006;
      $var2[1]=2007;
      $var2[2]=2008;
      $var2[3]=2009;
      $var2[4]=2010;
      //selecciona var3
      $var3[0]='Mensaje';
      $var3[1]='Moción';
    }
    else if ($a2==1){
      //selecciona primera variable sin seleccionar
      for ($i=2; $i<7; $i++){
        if ($v[$i] == 0){
          switch ($i){
          case 2:
            //selecciona var2
            $var2[0]=2006;
            $var2[1]=2007;
            $var2[2]=2008;
            $var2[3]=2009;
            $var2[4]=2010;       
            break;
          case 3:
            //selecciona var3
            $var3[0]='Mensaje';
            $var3[1]='Moción';
            break;
          case 4:
            //selecciona var4
            $var4[0]='C.Diputados';
            $var4[1]='Senado';    
            break;
          case 5:
            //selecciona var5
            $var5[0]='Defensa';
            $var5[1]='Hacienda, Economía, Impuesto y Empresas';
            $var5[2]='Relaciones Exteriores';
            $var5[3]='Administrativo, Regionalización, Zonas Extremas y Asuntos Indígenas';
            $var5[4]='Salud';
            $var5[5]='Medio Ambiente, Recursos Naturales y Derechos Animales';
            $var5[6]='Obras Públicas, Vivienda, Telecomunicaciones y Transporte';
            $var5[7]='Trabajo y Protección Social';
            $var5[8]='Educación, Deportes y Cultura';
            $var5[9]='Transparencia y Probidad';
            $var5[10]='Participación y Elecciones';
            $var5[11]='Familia';
            $var5[12]='Seguridad';
            $var5[13]='Derechos Fundamentales, Nacionalidad, Ciudadanía';
            $var5[14]='Reconstrucción Terremoto';
            break;
          case 6:
            //selecciona var6
            $var6[0]='1';
            $var6[1]='2';
            $var6[2]='3';
            $var6[3]='4';
            $var6[4]='5';
            break;
          }
          break;
        }
      }
    }

    //base query
    $q = Doctrine_Query::create()
      ->from('ProyectoLey p');

    //filtrar por periodos de ingreso
    if ($var2 != null){
      if ($var1 == 'Ingresados') {
        foreach ($var2 as $i=>$year){
          if ($i == 0) $q_str = 'p.fecha_ingreso >= ? AND p.fecha_ingreso <= ?';
          else $q_str .= ' OR p.fecha_ingreso >= ? AND p.fecha_ingreso <= ?';
          if ($year=='2006') $q_val[] = date($year.'-03-11'); else $q_val[] = date($year.'-01-01');
          if ($year=='2010') $q_val[] = date($year.'-03-10'); else $q_val[] = date($year.'-12-31');
        }
        $q = $q->andWhere($q_str, $q_val);
        $q = $q->addOrderBy('p.fecha_ingreso DESC');
      } 
      else if ($var1 == 'Publicados') {
        foreach ($var2 as $i=>$year){
          if ($i == 0) $q_str = 'p.fecha_publicacion >= ? AND p.fecha_publicacion <= ?';
          else $q_str .= ' OR p.fecha_publicacion >= ? AND p.fecha_publicacion <= ?';
          $q_val[] = date($year.'-01-01');
          $q_val[] = date($year.'-12-31');
        }
        $q = $q->andWhere($q_str, $q_val);
        $q = $q->addOrderBy('p.fecha_publicacion DESC');
      }
    }

    //filtrar por iniciativas
    if ($var3 != null && count($var3)==1) $q = $q->andWhere('p.iniciativa = ?', $var3[0]);
    
    //filtrar por camara de origen
    if ($var4 != null && count($var4)==1) $q = $q->andWhere('p.camara_origen = ?', $var4[0]);

    //filtrar por materias
    if ($var5 != null) {
      echo $var5[0];
      foreach ($var5 as $j=>$super) {
        /*
        foreach (explode(",",$super) as $i=>$materia) {
          if ($i==0 && $j==0) $q_str2 = 'p.id_materia = ?';
          else $q_str2 .= ' OR p.id_materia = ?';
          $q_val2[] = $materia;
        }*/
        $materias = Doctrine_Query::create()
          ->select('m.*')
          ->from('Materia m')
          ->where('m.super_materia = ?', $super)
          ->execute();
        foreach ($materias as $i=>$materia) {
          if ($i==0 && $j==0) $q_str2 = 'p.id_materia = ?';
          else $q_str2 .= ' OR p.id_materia = ?';
          $q_val2[] = $materia->getIdMateria();
        }
      }
      $q = $q->andWhere($q_str2, $q_val2);
    }

    //filtrar por etapas
    if ($var1 == 'Ingresados'){
      if ($var6 != null){
        $q = $this->getQueryPorEtapa($var6, $q);
      }
    }
    else $q = $this->getQueryPorEtapa(array(1), $q);

    $this->proyecto_leys = $q->execute();
    
    $this->pager = new sfDoctrinePager('ProyectoLey',sfConfig::get('app_max_proyectos_por_etapa'));
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }
  
  /*********** function de ayuda *********************************/
  public function getQueryPorFecha(sfWebRequest $request)
  {
    //separar por periodos de ingreso
    $limit = '-03-10';
    $start = $request->getParameter('start');
    $end = $request->getParameter('end');
    if ($start != null && $end != null) {
      $f1 = date($start.$limit);
      $f2 = date($end.$limit);
    } else {
      $f1 = date('1990'.$limit);
      $f2 = date('1994'.$limit);
    }

    //base query
    $q = Doctrine_Query::create()
      ->from('ProyectoLey p')
      ->where('p.fecha_ingreso > ? AND p.fecha_ingreso <= ?', array($f1,$f2))
      ->addOrderBy('p.fecha_ingreso DESC');

    $etapa = $request->getParameter('etapa');
    $q = $this->getQueryPorEtapa(array($etapa), $q);

    return $q;
  }

  public function getQueryPorEtapa($etapas, $q)
  {
    $q_str = '';
    $q_val = array();
    
    foreach ($etapas as $i=>$etapa){
      //separar por estados de la ley
      $state = null; $state1 = null; $state2 = null; $state3 = null; $state4 = null; $state5 = null; $state6 = null; $state7 = null; $state8 = null; $state9 = null; $state10 = null; $state11 = null; $state12 = null; $state13 = null; $state14 = null;
      $substate = null; $substate1 = null; $substate2 = null;
      switch($etapa){
        case 1: 
          $state = 'Tramitación terminada';
          $substate = ' ';
          break;
        case 2: 
          $state = 'Tramitación terminada';
          $substate = 'Inconstitucional';
          $substate1 = 'Inadmisible'; 
          $substate2 = 'Rechazado'; 
          break;
        case 3: 
          $state = 'Primer trámite constitucional'; 
          $state1 = 'Segundo trámite constitucional'; 
          $state2 = 'Tercer trámite constitucional'; 
          $state3 = 'Trámite de aprobacion presidencial';
          $state4 = 'Discusión veto en Cámara Revisora';
          $state5 = 'Comisión Mixta por rechazo de modificaciones';
          $state6 = 'Trámite en Tribunal Constitucional';
          $state7 = 'Trámite finalización en Cámara de Origen';
          $state8 = 'Comisión Mixta por rechazo de idea de legislar';
          $state9 = 'Disc. informe C.Mixta por rechazo de modif. C. Revisora';
          $state10 = 'Disc. informe C.Mixta por rechazo idea de legislar C. Origen';
          $state11 = 'Disc. Informe C.Mixta por rechazo idea de legislar C. Revis.';
          $state12 = 'Discusión veto en Cámara de Origen';
          $state13 = 'En espera de insistencia';
          $state14 = 'Insistencia';
          break;
        case 4: 
          $state = 'Tramitación terminada';
          $substate = 'Retirado'; 
          break;
        case 5: 
          $state = 'Archivado';
          $state1= 'Solicitud de archivo';
          break;
        case 0:
        default:
      }

      //build query según estado
      if ($state14 != null) {
        if ($i > 0) $q_str .= ' OR ';
        $q_str .= 'p.etapa = ? OR p.etapa = ? OR p.etapa = ? OR p.etapa = ? OR p.etapa = ? OR p.etapa = ? OR p.etapa = ? OR p.etapa = ? OR p.etapa = ? OR p.etapa = ? OR p.etapa = ? OR p.etapa = ? OR p.etapa = ? OR p.etapa = ? OR p.etapa = ?';
        $q_val = array_merge($q_val,array($state,$state1,$state2,$state3,$state4,$state5,$state6,$state7,$state8,$state9,$state10,$state11,$state12,$state13,$state14));
      }
      else if ($state1 != null) {
        if ($i > 0) $q_str .= ' OR ';
        $q_str .= 'p.etapa = ? OR p.etapa = ?';
        $q_val[] = $state;
        $q_val[] = $state1;
      }
      else if ($state != null) {
        if ($i > 0) $q_str .= ' OR ';
        $q_str .= 'p.etapa = ?';
        $q_val[] = $state;
        //sub-etapas
        if ($substate2 != null) {
          $q_str .= 'AND p.sub_etapa = ? OR p.sub_etapa = ? OR p.sub_etapa = ?';
          $q_val[] = $substate;
          $q_val[] = $substate1;
          $q_val[] = $substate2;
        }
        else if ($substate != null) {
          //$q = $q->andWhere('p.sub_etapa = ?', $substate);
          $q_str .= 'AND p.sub_etapa = ?';
          $q_val[] = $substate;
        }
      }
    }
    if (count($q_val)>0) $q = $q->andWhere($q_str, $q_val);
    
    return $q;
  }
  
  private function countVars($var,$pos,$v){
    if ($var==null) $v[$pos]=0;
    else if (count($var)==1) $v[$pos]=1;
    else if (count($var)>1) $v[$pos]=2;
    return $v;
  }
  function getMateria($nroBoletin){
	// Primero buscamos en la tabla ProyectoLey_tmp
        $q = Doctrine_Query::create()
            ->select('if(count(nro_boletin)>0,1,0)')
            ->from('ProyectoLey')
            ->where('nro_boletin='.$nroBoletin)
            ->limit('1')
            ->execute();
        echo $q->getSqlQuery();


        /*
	if ($nroBoletin != null){
		$materia = null;
		$idMateria = "NULL";
		$sql = "SELECT materia FROM ProyectoLey_tmp WHERE nro_boletin='".$nroBoletin."'";
		$rs = mysql_query($sql, $cn);

		// Si existe obtiene el id
		if(!$rs){
			// Si no existen registros se busca en la tabla ProyectoLey_publicado_tmp
			$sql = "SELECT materia FROM ProyectoLey_publicado_tmp WHERE nro_boletin='".$nroBoletin."'";
			$rs = mysql_query($sql, $cn);

			if($rs){
				$fila = mysql_fetch_array($rs);
				$materia = trim($fila[0]);
			}
		}else{
			$fila = mysql_fetch_array($rs);
			$materia = trim($fila[0]);
		}

		if($materia){
			$sql = "SELECT id_materia FROM Materia WHERE nombre = '".$materia."'";
			$rs = mysql_query($sql, $cn);

			if($rs){
				$fila = mysql_fetch_array($rs);
				$idMateria = $fila[0];
			}
		}
		//echo "<br>Materia:".$materia." - id:".$idMateria."<br>";
		return $idMateria;
	}
	else return "NULL";*/
    }
}
