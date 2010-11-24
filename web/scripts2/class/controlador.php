<?
class Controlador{
	var $coneccion;
	var $debug;
	var $query;
	var $qry;
	var $elements;
	var $r;
	var $formateaContenido;
	var $perfiles;
	var $campos;
	var $numero;
	var $variable;
	var $result;
	var $checked;
	var $sufijo;
	var $valor;
	var $li;
	var $event;
	var $nameId;
	var $sel;
	var $selected;
	var $combo;
	var $contenido;
	var $f;
	var $value;
	var $fecha;
	var $largo;
	var $fs;
    var $i;
    var $n;
    var $x;
    var $c;
	var $inc;
	var $max;
	var $max2;
	var $max3;	
	function Controlador(){
		$this->coneccion = null;
		$this->query = "";
		$this->debug = 0;
		$this->result = 0;
		$this->mensaje = "";
		$this->variable = "";
		$this->titulo = "";
		$this->i = 0;
		$this->inc = 0;
		$this->x = 0;
		$this->c = 0;
		$this->max = 0;
		$this->max2 = 0;
		$this->max3 = 0;
		$this->sufijo = "";
		
	}
	function clear(){
		unset($this->result);
		$this->c1=0;
		$this->c2=0;
		$this->c3=0;
		$this->max1=0;
		$this->max2=0;
		$this->max3=0;
	}
	function cnx(){
		
	}
	function execute(){
            global $coneccion;
            $coneccion->debug = false;
            if($coneccion->Execute($this->qry) === false)
                return 1;
            else
                return 0;
	}
	function menu(){
		global $coneccion;
		$this->Controlador();
		$coneccion->debug = false;
		$registro = $coneccion->Execute($this->qry);
		$this->c1=0;
		while (!$registro->EOF){
			for($this->c3=1; $this->c3<8; $this->c3++){
				$this->value[$this->c1][$this->c3]=$this->formateaContenido($registro->fields['value'.$this->c3]);
			}
			$registro->MoveNext();
			$this->c1++;
		}
		return $this->value;
    }
    function sheet(){
		global $coneccion;
		$coneccion->debug = false;
		$registro = $coneccion->Execute($this->qry);
		$this->max1=count($this->elements);
		if (!$registro->EOF){
			for($this->c1=0; $this->c1 < ($this->max1); $this->c1++)
				$this->value[$this->elements[$this->c1]] = $this->formateaContenido($registro->fields[$this->elements[$this->c1]]);
		}
		return $this->value;
    }
    function armaResult(){
    	//$this->clear();
		global $coneccion;
		$this->Controlador();
		$coneccion->debug = false;
		$registro = $coneccion->Execute($this->qry);
		$this->c1=0;
		while (!$registro->EOF){
			$this->c2=0;
			while($this->c2<8){
				$this->c3=($this->c2)+1;
				$this->value[$this->c1][$this->c2]=$this->formateaContenido($registro->fields['value'.$this->c3]);
				if(strlen($registro->fields['value'.$this->c3]==0))
					$this->c2=8;
				$this->c2++;
			}
			$registro->MoveNext();
			$this->c1++;
		}
		return $this->value;
    }
    function ciclo(){
    	$this->clear();
		global $coneccion;
		$coneccion->debug = false;
		$registro = $coneccion->Execute($this->qry);
		$this->max1=count($this->elements);
		unset($this->value);
		while (!$registro->EOF){
			for($this->c2=0; $this->c2 < ($this->max1); $this->c2++){
				$this->f=strpos($this->elements[$this->c2],'.');
				if($this->f>0)
					$this->elements[$this->c2]=substr($this->elements[$this->c2],$this->f+1);
				$this->value[$this->c1][$this->elements[$this->c2]] = $this->formateaContenido($registro->fields[$this->elements[$this->c2]]);
			}
			$registro->MoveNext();
			$this->c1++;
		}
		return $this->value;
    }
    function cicloClear(){
    	$this->clear();
		global $coneccion;
		$coneccion->debug = false;
		$registro = $coneccion->Execute($this->qry);
		$this->max1=count($this->elements);
		while (!$registro->EOF){
			for($this->c2=0; $this->c2 < ($this->max1); $this->c2++)
				$this->value[$this->c1][$this->elements[$this->c2]] = 0;
			$registro->MoveNext();
			$this->c1++;
		}
    }
    function listar(){
		$this->clear();
    	$this->max1=count($this->variable);
    	for($this->c1=0; $this->c1<$this->max1; $this->c1++){
    		foreach($this->variable[$this->c1] as $key => $this->valor){
        		$this->result.="<li style='margin-left:20px;'>".$this->valor."</li>";
    		} 
    	}
    	return $this->result;
    }
	function selectQMulti(){
		global $coneccion;
		$coneccion->debug = false;
		$registro = $coneccion->Execute($this->qry);
		$this->i=0;
		while(!$registro->EOF){
			$this->combo[$this->i]= $registro->fields['value1'];
			$registro->MoveNext();
			$this->i++;
		}
		return $this->combo;
	}
	function selectQMulti2($nameId,$event,$sel){
		global $coneccion;
		$coneccion->debug = false;
		$registro = $coneccion->Execute($this->qry);
		$this->i=0;
		while(!$registro->EOF){
			$this->combo[0][$this->i]= $registro->fields['value1'];
			$this->combo[1][$this->i]= $registro->fields['value2'];
			$registro->MoveNext();
			$this->i++;
		}
		$this->valor=$this->combo;
		$this->li=count($this->valor[0]);
		if(strlen($event)>0)
			$event=" $event";
		unset($this->result);
		$this->result.="\n<select name='".$nameId."' id='".$nameId."'".$event." class=\"input\">";
		$this->result.="\n\t<option value='0'>Seleccione</option>";
		for($this->c1=0; $this->c1<($this->li); $this->c1++){
			if($this->valor[0][$this->c1]==$sel)
				$this->selected=" selected='selected'";
			else
				unset($this->selected);
			$this->result.="\n\t<option value='".$this->valor[0][$this->c1]."'".$this->selected.">".$this->valor[1][$this->c1]."</option>";
		}
		$this->result.="\n</select>";
		return $this->result;
	}
	function resultadoBusqueda(){
		$this->clear();
    	$this->max1=count($this->variable);
    	for($this->c1=0; $this->c1<$this->max1; $this->c1++){
    		foreach($this->variable[$this->c1] as $key => $this->valor){
        		$this->result[$this->c2]=$this->encode($this->valor);
        		$this->c2++;
    		} 
    	}
    	return $this->result;
    }
    function checkbox(){
    	$this->clear();
    	$this->perfiles=$this->ciclo();
    	$this->campos=explode(", ",$this->campos);
    	$this->max1=count($this->perfiles);
    	$this->max2=count($this->campos);
    	$this->max3=count($this->variable);
		for($this->c1=0; $this->c1<($this->max1); $this->c1++){
			for($this->c2=0; $this->c2<($this->max2); $this->c2++){
				if($this->c2%2 == 0){
					unset($this->checked);
					for($this->c3=0; $this->c3<($this->max3); $this->c3++){
						if($this->variable[$this->c3][$this->campos[$this->c2]]==$this->perfiles[$this->c1][$this->campos[$this->c2]])
							$this->checked=" checked=\"checked\"";
					}
 					$this->result.="<input type='checkbox' name='".$this->sufijo.$this->c1."' id='".$this->sufijo.$this->c1."' value='".$this->perfiles[$this->c1][$this->campos[$this->c2]]."'".$this->checked." />";
				}else
					$this->result.=$this->encode($this->perfiles[$this->c1][$this->campos[$this->c2]])."<br />\n";
			}
		}
		return $this->result;
    }   
	function combobox($nameId,$event,$sel){
		$this->valor=$this->armaResult();
		$this->li=count($this->valor);
		if(strlen($event)>0)
			$event=" $event";
		unset($this->result);
		$this->result.="\n<select name='".$nameId."' id='".$nameId."'".$event." class=\"input\">";
		$this->result.="\n\t<option value='0'>Seleccione</option>";
		for($this->c1=0; $this->c1<($this->li); $this->c1++){
			if($this->valor[$this->c1][0]==$sel)
				$this->selected=" selected='selected'";
			else
				unset($selected);
			$this->result.="\n\t<option value='".$this->valor[$this->c1][0]."'".$this->selected.">".$this->valor[$this->c1][1]."</option>";
		}
		$this->result.="\n</select>";
		return $this->result;
	}
	function combobox2($nameId,$event,$sel){
		$this->valor=$this->armaResult();
		$this->li=count($this->valor);
		if(strlen($event)>0)
			$event=" $event";
		unset($this->result);
		$this->result.="\n<select name='".$nameId."' id='".$nameId."'".$event.">";
		$this->result.="\n\t<option value='0'>Seleccione</option>";
		for($this->c1=0; $this->c1<($this->li); $this->c1++){
			if($this->valor[$this->c1][0]==$sel)
				$this->selected=" selected='selected'";
			else
				unset($this->selected);
			$this->result.="\n\t<option value='".$this->valor[$this->c1][0]."'".$this->selected.">".$this->valor[$this->c1][1]."</option>";
		}
		$this->result.="\n</select>";
		return $this->result;
	}	
	function selectQ(){
		global $coneccion;
		$coneccion->debug = false;
		$registro = $coneccion->Execute($this->qry);
		if (!$registro->EOF)
			 $this->combo= $registro->fields['value1'];
		return $this->combo;
	}
	function formateaContenido($contenido){
		$this->contenido=nl2br(htmlentities($contenido));
		return $this->contenido;
	}
	function encode($contenido){
		$this->contenido=utf8_encode($contenido);
		return $this->contenido;
	}
	function fechaFormatea($fecha){
		$this->clear();
		$this->f=$fecha;
		$this->fecha=split(" ",$this->f);
		$this->largo=count($this->fecha);
	    for($this->c1=0; $this->c1<($this->largo); $this->c1++){
	      if($this->c1==0){
	        $this->fs=split('-',$this->fecha[$this->c1]);
	        for($this->c2=2; $this->c2>=0; $this->c2--){
	        	if($this->c2 == 0)
					$this->result.=$this->fs[$this->c2];
				else
		          	$this->result.=$this->fs[$this->c2]."-";
	        }
	      }else{
	        $this->result.=" ".$this->fecha[$this->c1];
	      }
		}
		return $this->result;
	}
	/* SETTER */	
	function setQry($qry){
		$this->qry = $qry;
	}
	function setElements($elements){
		unset($this->elements);
		$this->elements = $elements;
	}
    function setObj($variable){
    	$this->variable = $variable;
    }	
	function setVariable($variable){
		$this->variable = $variable;
	}
	function setCampos($campos){
		$this->campos = $campos;
	}
	function setSufijo($sufijo){
		$this->sufijo = $sufijo;
	}
	/* GETTER */
	function getQry(){
		return $this->qry;
	}
	function getElements(){
		return $this->elements;
	}
    function getObj(){
    	return $this->variable;
    }		
	function getVariable(){
		return $this->variable;
	}
	function getCampos(){
		return $this->campos;
	}
	function getSufijo(){
		return $this->sufijo;
	}
}
?>