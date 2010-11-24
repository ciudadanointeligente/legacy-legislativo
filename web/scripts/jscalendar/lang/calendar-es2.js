Calendar._DN = new Array
("Domingo",
 "Lunes",
 "Martes",
 "Mi&eacute;rcoles",
 "Jueves",
 "Viernes",
 "S&aacute;bado",
 "Domingo");

Calendar._SDN = new Array
("Dom",
 "Lun",
 "Mar",
 "Mi&eacute;",
 "Jue",
 "Vie",
 "S&aacute;b",
 "Dom");

Calendar._FD = 1;

Calendar._MN = new Array
("Enero",
 "Febrero",
 "Marzo",
 "Abril",
 "Mayo",
 "Junio",
 "Julio",
 "Agosto",
 "Septiembre",
 "Octubre",
 "Noviembre",
 "Diciembre");

Calendar._SMN = new Array
("Ene",
 "Feb",
 "Mar",
 "Abr",
 "May",
 "Jun",
 "Jul",
 "Ago",
 "Sep",
 "Oct",
 "Nov",
 "Dic");

Calendar._TT = {};
Calendar._TT["INFO"] = "Acerca del calendario";

Calendar._TT["ABOUT"] =
"Selector DHTML de Fecha/Hora\n" +
"\n\n" +
"Selecci&oacute;n de fecha:\n" +
"- Use los botones \xab, \xbb para seleccionar el año\n" +
"- Use los botones " + String.fromCharCode(0x2039) + ", " + String.fromCharCode(0x203a) + " para seleccionar el mes\n" +
"- Mantenga pulsado el rat&oacute;n en cualquiera de estos botones para una selecci&oacute;n r&aacute;pida.";
Calendar._TT["ABOUT_TIME"] = "\n\n" +
"Selecci&oacute;n de hora:\n" +
"- Pulse en cualquiera de las partes de la hora para incrementarla\n" +
"- o pulse las may&uacute;sculas mientras hace clic para decrementarla\n" +
"- o haga clic y arrastre el rat&oacute;n para una selecci&oacute;n m&aacute;s r&aacute;pida.";

Calendar._TT["PREV_YEAR"] = "<br><b>\xab A&ntilde;o anterior</b><br>-Mantenga presionado para desplegar men&uacute;-";
Calendar._TT["PREV_MONTH"] = "<br><b>" + String.fromCharCode(0x2039) + " Mes anterior</b><br>-Mantenga presionado para desplegar men&uacute;-";
Calendar._TT["GO_TODAY"] = "<br><b>Ir a hoy</b><br><br>";
Calendar._TT["NEXT_MONTH"] = "<br><b>Mes siguiente " + String.fromCharCode(0x203a) + "</b><br>-Mantenga presionado para desplegar men&uacute;-";
Calendar._TT["NEXT_YEAR"] = "<br><b>A&ntilde;o siguiente \xbb</b><br>-Mantenga presionado para desplegar men&uacute;-";
Calendar._TT["SEL_DATE"] = "<br><b>Seleccionar fecha</b><br><br>";
Calendar._TT["DRAG_TO_MOVE"] = "<br><b>Arrastrar para mover</b><br><br>";
Calendar._TT["PART_TODAY"] = " (HOY)";
Calendar._TT["DAY_FIRST"] = "Hacer %s primer d&iacute;a de la semana";
Calendar._TT["WEEKEND"] = "0,6";
Calendar._TT["CLOSE"] = "Cerrar";
Calendar._TT["TODAY"] = "Hoy";
Calendar._TT["TIME_PART"] = "(May&uacute;scula-)Clic o arrastre para cambiar valor";
Calendar._TT["DEF_DATE_FORMAT"] = "%d/%m/%Y";
Calendar._TT["TT_DATE_FORMAT"] = "%A, %e de %B de %Y";
Calendar._TT["WK"] = "sem";
Calendar._TT["TIME"] = "Hora:";