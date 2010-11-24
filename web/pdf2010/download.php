<?php
    require("sesion.php");
    require("cnx.php");
    require("controlador.php");
    $coneccion = coneccion();
    $o = new Controlador();
    $o->setQry("SELECT count(*) value1 FROM beca");
    if($o->selectQ()>0):
        $date=date('YmdHms');
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=grant-$date.xls");
        $campos="number, name, email, country, type, anwser1, anwser2, anwser3";
        $fields="id number, concat(nombre,' ',apellido) name, correo email, pais country, tipo_organizacion type, pregunta1 anwser1, pregunta2 anwser2, pregunta3 anwser3";
        $elements=explode(", ",$campos);
        $qry="SELECT $fields FROM beca ORDER BY fecha_creacion ASC";
        $o->setQry($qry);
        $o->setElements($elements);
        $bucle=$o->ciclo();
        echo "<table border=1><tr>";
        foreach($elements as $row):
            echo "<td bgcolor='#999999'>$row</td>";
        endforeach;
        echo "</tr>";
        unset($row);
        foreach($bucle as $array):
            echo "<tr>";
            foreach($array as $row):
                echo "<td>$row</td>";
            endforeach;
            echo "</tr>";
        endforeach;
        echo "</table>";
    else:
        header("location: home.php");
    endif;
?>