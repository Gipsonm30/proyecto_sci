<?php require_once ("../hf/header.php"); ?>
<?php if (!isset($_SESSION['ddespacho'])){
echo "<center><h2>No tiene acceso al sistema</h2></center> ";
die();
}
?>
<!-- Menu -->
<nav id="menu">
<h2>Menu</h2>
<ul>
<li><a href="solicitud_materiales.php">Solicitar materiales</a></li>
<li><a href="solicitud_repuestos.php">Solicitar repuesto</a></li>
<li><a href="solicitud_equipoinf.php">Solicitar equipos</a></li>
<li><a href="revisar_solicitudes.php">Aprobar / Rechazar solicitudes</a></li>
<li><a href="nota_retiro.php">Notas de retiro</a></li>
<li><a href="historico_solicitudes.php">Historico de solicitudes</a></li>	
<li><a href="listado_materiales.php">Inventario materiales</a></li>		
<li><a href="listado_repuestos.php">Inventario repuesto</a></li>
<li><a href="listado_equipos.php">Inventario equipos</a></li>				
<li><a href="ddespacho.php">Pantalla principal</a></li>
<li><a href="../login/cerrar_sesion.php">Salir del sistema</a></li>						
</ul>
</nav>

<!-- Main -->
<center><h3>Solicitud de materiales</h3></center>
<section class="formulario"> 
<form method="POST" class="gestion_user">	
<input type="text" list="items" maxlength="12" placeholder="Serial Material"name="id_material">
<datalist id="items">		
<option value="011">CABLES HASTA 5.000 VOLTIOS.</option>
<option value="012">CABLES HASTA 10.000 VOLTIOS.</option>
<option value="013">CABLES HASTA 15.000 VOLTIOS.</option>
<option value="014">CABLES HASTA 34.000 VOLTIOS.</option>
<option value="016">CABLES HASTA 69.000 VOLTIOS.</option>
<option value="018">CABLES HASTA 230.000 VOLTIOS.</option>
<option value="019">CONECTORES AISLADOS.</option>
<option value="030">CABLES HASTA 600 VOLTIOS.</option>
<option value="031">CABLES HASTA 5.000 VOLTIOS.</option>
<option value="032">CABLES HASTA 10.000 VOLTIOS.</option>
<option value="033">CABLES HASTA 15.000 VOLTIOS.</option>
<option value="034">CABLES HASTA 34.000 VOLTIOS.</option>
<option value="036">CABLES HASTA 69.000 VOLTIOS.</option>
<option value="038">CABLES DE 230.000 VOLTIOS O MAS.</option>
<option value="039">CONECTORES AISLADOS, MODULADORES, ACCESO</option>
<option value="050">BARRAS DE COBRE AISLADAS.</option>
<option value="051">BARRAS DE ALUMINIO AISLADAS.</option>
<option value="054">PIEZAS DE COBRE AISLADAS PARA SALIDAS.</option>
<option value="055">PIEZAS DE ALUMINIO AISLADAS PARA SALIDAS</option>
<option value="059">ACCESORIOS, PIEZAS DE REPUESTOS Y MATERI</option>
<option value="070">BARRAS CONDUCTORAS O TUBOS CONDUCTORES N</option>
<option value="071">CABLES Y ALAMBRES NO AISLADOS.</option>
<option value="073">CONECTORES DE COMPRESION.</option>
<option value="074">CONECTORES DE TORNILLOS.</option>
<option value="075">CONECTORES SOLDADOS.</option>
<option value="076">OTROS ELEMENTOS CONECTORES.</option>
<option value="078">BARRAS, PLETINAS, PLANCHAS Y PERFILES.</option>
<option value="079">ACCESORIOS.</option>
<option value="080">BARRAS CONDUCTORAS O TUBOS CONDUCTORES N</option>
<option value="081">CABLES Y ALAMBRES NO AISLADOS.</option>
<option value="083">CONECTORES DE COMPRESION.</option>
<option value="084">CONECTORES DE TORNILLOS.</option>
<option value="085">CONECTORES SOLDADOS.</option>
<option value="086">CONECTORES BIMETALICOS.</option>
<option value="087">OTROS ELEMENTOS CONECTORES.</option>
<option value="088">BARRAS, PLETINAS, PLANCHAS Y PERFILES.</option>
<option value="089">ACCESORIOS.</option>
<option value="100">CONDUCTORES.</option>
<option value="103">CONECTORES.</option>
<option value="107">BARRAS DE TIERRA.</option>
<option value="110">ESTRUCTURAS TERMINALES PARA SUBESTACIONE</option>
<option value="113">ESTRUCTURAS PARA SOPORTE DE EQUIPOS.</option>
<option value="116">ESTRUCTURAS PARA SOPORTE DE COPAS DE CAB</option>
<option value="118">ESTRUCTURAS PARA SOPORTE DE ANTENAS.</option>
<option value="120">ANCLAS Y SUS PARTES.</option>
<option value="121">TENAZAS.</option>
<option value="122">OJOS DE SUSPENSION, TENSORES,TUERCAS CON</option>
<option value="123">ABRAZADERAS,ADAPTADORES,AMORTIGUADORES,P</option>
<option value="124">PERNOS CARRUAJE, PERNOS CON OJO, PERNOS</option>
<option value="126">CRUCETAS.</option>
<option value="128">POSTES.</option>
<option value="129">TORRES.</option>
<option value="140">AISLADORES DE SUSPENSION (TIPO PIN)</option>
<option value="142">AISLADORES TIPO BARRILITO.</option>
<option value="144">AISLADORES DE SUSPENSION (TIPO PASADOR).</option>
<option value="146">AISLADORES TIPO PALILLO.</option>
<option value="148">AISLADORES, COPAS Y CONOS PARA CABLES.</option>
<option value="149">HERRAJES PARA AISLADORES.</option>
<option value="150">AISLADORES SOPORTE.</option>
<option value="152">BUSHINGS PARA INTERRUPTORES.</option>
<option value="154">BUSHINGS PARA TRANSFORMADORES.</option>
<option value="156">PIEZAS AISLANTES SOPORTE PARA BARRAS DE</option>
<option value="159">ADAPTADORES Y ACCESORIOS PARA BUSHINGS.</option>
<option value="160">PARARRAYOS HASTA 15 KV.</option>
<option value="162">PARARRAYOS HASTA 34 KV.</option>
<option value="163">PARARRAYOS HASTA 72 KV.</option>
<option value="165">PARARRAYOS HASTA 192 KV.</option>
<option value="167">PARARRAYOS HASTA 334 KV.</option>
<option value="168">CONTADORES DE DESCARGA.</option>
<option value="169">HERRAJES PARA PARARRAYOS.</option>
<option value="170">CUCHILLAS ROMPECARGA ALTA TENSION.</option>
<option value="172">CUCHILLAS ROMPECARGA BAJA TENSION.</option>
<option value="174">CUCHILLAS SIN CAPACIDAD DE RUPTURA ALTA</option>
<option value="176">CUCHILLAS SIN CAPACIDAD DE RUPTURA BAJA</option>
<option value="177">CUCHILLAS DE ATERRAMIENTO.</option>
<option value="178">PANTOGRAFOS.</option>
<option value="179">CONTROL MECANICO DE CUCHILLAS.</option>
<option value="190">HASTA 600 V.</option>
<option value="192">DE 600 V HASTA 15 KV.</option>
<option value="194">DE 15 KV HASTA 34.5 KV.</option>
<option value="195">DE 34.5 KV HASTA 72 KV.</option>
<option value="196">DE 72 KV HASTA 230 KV.</option>
<option value="198">DE 230 KV HASTA 400 KV.</option>
<option value="200">INTERRUPTORES HASTA 600 V.</option>
<option value="202">INTERRUPTORES DE G.V.A.</option>
<option value="203">INTERRUPTORES DE P.V.A.</option>
<option value="205">INTERRUPTORES DE SOPLADO MAGNETICO.</option>
<option value="207">INTERRUPTORES DE SF6.</option>
<option value="208">INTERRUPTORES DE VACIO.</option>
<option value="209">INTERRUPTORES DIFERENTES A LOS LISTADOS</option>
<option value="220">INTERRUPTORES G.V.A.</option>
<option value="221">INTERRUPTORES P.V.A.</option>
<option value="223">INTERRUPTORES DE AIRE.</option>
<option value="225">INTERRUPTORES SF6.</option>
<option value="227">INTERRUPTORES DE VACIO.</option>
<option value="230">RECONECTADORES.</option>
<option value="235">SECCIONALIZADORES.</option>
<option value="240">PROTECTORES DE RED.</option>
<option value="249">PARTES PARA PROTECTORES DE RED.</option>
<option value="250">TRANSFORMADORES DE DISTRIBUCION TIPO INT</option>
<option value="251">TRANSFORMADORES DE DISTRIBUCION TIPO SUM</option>
<option value="252">TRANSFORMADORES DE DISTRIBUCION TIPO PED</option>
<option value="254">TRANSFORMADORES SECOS.</option>
<option value="256">TRANSFORMADORES PARA SUBESTACIONES Y DE</option>
<option value="257">TRANSFORMADORES DE POTENCIAL.</option>
<option value="258">TRANSFORMADORES DE CORRIENTE.</option>
<option value="259">AUXILIARES DE CONTROL (INSTRUMENTOS).</option>
<option value="270">REGULADORES ESTATICOS.</option>
<option value="272">REGULADORES DE AMPLIFICACION MAGNETICA.</option>
<option value="274">REGULADORES ELECTROMECANICOS.</option>
<option value="276">REGULADORES DE INDUCCION.</option>
<option value="280">CAPACITORES PARA SUBESTACIONES.</option>
<option value="285">CONDENSADORES PARA LINEAS.</option>
<option value="290">AUXILIARES.</option>
<option value="292">TEMPORIZADORES.</option>
<option value="294">RECLOSER.</option>
<option value="296">ANUNCIADORES.</option>
<option value="297">CONMUTADORES MANUALES.</option>
<option value="298">NEUMATICOS.</option>
<option value="310">SOBRECORRIENTE.</option>
<option value="312">VOLTAJE, FRECUENCIA Y SINCRONISMO.</option>
<option value="313">HILO PILOTO, COMPARADOR DE FASES Y DISTA</option>
<option value="314">TIERRA CAMPO, PERDIDA EXCITACION, NETWOR</option>
<option value="315">SOBRECORRIENTE DIRECCIONALES Y POTENCIA.</option>
<option value="316">TERMICOS, PRESION Y BUCHHOLZ.</option>
<option value="317">DIFERENCIALES Y RESIDUALES DE TIERRA.</option>
<option value="318">SUPERVISORES, TRANSFER TRIP Y MULTIFUNCI</option>
<option value="319">TIMERS, AUXILIARES, ALARMAS, BREAKER FAI</option>
<option value="330">BATERIAS.</option>
<option value="332">RECTIFICADORES.</option>
<option value="334">INVERSORES Y U.P.S.</option>
<option value="336">CARGADORES DE BATERIA.</option>
<option value="338">EQUIPOS DE PROTECCION CATODICA.</option>
<option value="339">CELDAS DE FUERZA CONTRAELECTROMOTRIZ.</option>
<option value="340">REACTORES LIMITADORES DE CORRIENTE.</option>
<option value="342">RESISTENCIAS CALEFACTORAS.</option>
<option value="344">RESISTENCIAS.</option>
<option value="346">REOSTATOS.</option>
<option value="350">VATIMETRO-HORA.</option>
<option value="354">INDICADORES DE DEMANDA Y ACCESORIOS.</option>
<option value="356">VARMETRO-HORA.</option>
<option value="360">AMPERIMETROS (LECTURA INSTANTANEA).</option>
<option value="362">VOLTIMETRO (LECTURA INSTANTANEA).</option>
<option value="364">VARMETROS Y VAR/HR (LECTURA INSTANTANEA)</option>
<option value="365">VATIMETRO Y WATT/HR (LECTURA INSTANTANEA</option>
<option value="366">FRECUENCIMETROS (LECTURA INSTANTANEA).</option>
<option value="368">OSCILOSPERTURBOGRAFOS.</option>
<option value="369">INDICADORES REGISTRADORES.</option>
<option value="370">OSCILOSCOPIOS.</option>
<option value="372">GENERADORES DE SEÑALES.</option>
<option value="375">VOLTIMETROS, AMPERIMETROS, OHMETROS, TAB</option>
<option value="377">REGISTRADORES PORTATILES.</option>
<option value="380">ACTUADORES ELECTRICOS.</option>
<option value="382">ACTUADORES HIDRAULICOS.</option>
<option value="384">CONTROLADORES NEUMATICOS.</option>
<option value="386">MODULO/TARJETA DE COMPUTO ELECTRONICO.</option>
<option value="388">POSICIONADORES.</option>
<option value="390">TOTALIZADORES, CONTADORES, INTEGRADORES.</option>
<option value="391">MANOMETROS.</option>
<option value="392">TERMOMETROS.</option>
<option value="393">ROTAMETROS.</option>
<option value="395">REGISTRADORES.</option>
<option value="410">TABLEROS PARA CONTROL Y PROTECCION.</option>
<option value="415">TABLEROS PARA INDICACION Y CONTROL.</option>
<option value="417">TABLEROS PARA INDICACION.</option>
<option value="419">PARTES PARA TABLEROS Y MIMICOS.</option>
<option value="420">GABINETES PARA CONTROL Y PROTECCION DE I</option>
<option value="421">GABINETES PARA CONTROL Y PROTECCION (INT</option>
<option value="423">GABINETES PARA BATERIAS.</option>
<option value="425">BANCO DE CAPACITORES DE DISTRIBUCION.</option>
<option value="427">METAL CLAD.</option>
<option value="429">GABINETES PARA MEDIDORES.</option>
<option value="430">OPTOELECTRONICA, TUBOS ELECTRONICOS.</option>
<option value="431">TRANSISTORES.</option>
<option value="433">CONDENSADORES, BOBINAS.</option>
<option value="435">RESISTENCIAS.</option>
<option value="437">DIODOS.</option>
<option value="439">CIRCUITOS INTEGRADOS.</option>
<option value="440">RADIOS TRANSMISORES-RECEPTORES VHF, UHF.</option>
<option value="443">MICROONDAS.</option>
<option value="445">ANTENAS.</option>
<option value="446">MONITORES DE TV, AMPLIFICADORES, MIXERS,</option>
<option value="449">CABLES COAXIALES.</option>
<option value="450">TELEFONOS.</option>
<option value="451">CENTRALES TELEFONICAS.</option>
<option value="453">SISTEMAS INTERCOMUNICADORES.</option>
<option value="455">TELETIPOS Y MODEMS.</option>
<option value="456">BLOQUEADORES.</option>
<option value="457">CABLES TELEFONICOS SUBTERRANEOS.</option>
<option value="458">CABLES TELEFONICOS AUTOSOPORTADOS.</option>
<option value="459">ACCESORIOS PARA CABLES TELEFONICOS.</option>
<option value="470">PROCESADORES DE CONTROL Y TELEMEDIDA.</option>
<option value="471">EQUIPOS PERIFERICOS PARA CONTROL Y TELEM</option>
<option value="473">EQUIPOS PERIFERICOS EN GENERAL.</option>
<option value="475">TRANSDUCTORES.</option>
<option value="476">REMOTAS.</option>
<option value="478">CONTROL DE SUPERVISION.</option>
<option value="490">LUMINARIAS.</option>
<option value="491">PARTES PARA LUMINARIAS.</option>
<option value="492">BRAZOS, SOPORTES Y SUS COMPONENTES.</option>
<option value="493">POSTES DE ALUMBRADO.</option>
<option value="494">RELOJES Y RELES CONTROLADORES CON SU PRO</option>
<option value="495">BALASTOS Y TRANSFORMADORES.</option>
<option value="510">TAPAS Y MARCOS PARA TANQUILLAS.</option>
<option value="514">SOPORTE PARA CONDUCTORES.</option>
<option value="516">SOPORTE PARA EQUIPOS.</option>
<option value="520">SWITCHES AUXILIARES DE CONTROL.</option>
<option value="521">TOMACORRIENTES, INTERRUPTORES (SWITCHES)</option>
<option value="522">TEIPES, CINTAS AISLANTES Y ANTI-INFLAMAB</option>
<option value="523">TEIPES CONDUCTORES.</option>
<option value="525">PASTAS AISLANTES.</option>
<option value="526">CONDUIT, CONDULET Y SUS ACCESORIOS.</option>
<option value="528">ABRAZADERAS PARA CABLES.</option>
<option value="540">CEMENTO, YESO, CAL, ADITIVOS, ARENA Y PI</option>
<option value="542">PLOMERIA EN GENERAL.</option>
<option value="543">PIEZAS SANITARIAS Y GRIFERIA.</option>
<option value="546">CERCAS Y SUS PARTES.</option>
<option value="547">MADERAS.</option>
<option value="549">BLOQUES, LADRILLOS DE ALBAÑILERIA Y TUBE</option>
<option value="560">CEMENTO AISLANTE Y REFRACTARIO.</option>
<option value="562">TUBOS, PANELES Y MANTAS AISLANTES TERMIC</option>
<option value="564">ADITIVOS REFRACTARIOS.</option>
<option value="569">BLOQUES REFRACTARIOS.</option>
<option value="570">ARANDELAS, CLAVOS, CUPILLAS, TORNILLOS (</option>
<option value="573">ABRAZADERAS, ANCLAJES, GRILLETES, GUARDA</option>
<option value="575">CADENAS, GUAYAS, ALAMBRES Y ALAMBRES DE</option>
<option value="577">BARRAS, PLETINAS, LAMINAS Y PERFILES (DI</option>
<option value="811">CATIONICOS.</option>
<option value="580">CUCHILLAS PARA MAQUINADO, BROCAS Y MECHA</option>
<option value="582">ESPATULAS, BROCHAS, CEPILLOS.</option>
<option value="584">PEGAMENTOS, MATERIALES SELLANTES Y MASTI</option>
<option value="585">ELECTRODOS, VARILLAS Y FUNDENTES.</option>
<option value="587">ABRASIVOS.</option>
<option value="588">CORREAS EN V" (EXCEPTO LAS UTILIZADAS P"</option>
<option value="589">MECATES DIFERENTES A LOS AISLADOS, ESTOP</option>
<option value="600">TUBERIAS Y ACCESORIOS DE ACERO AL CARBON</option>
<option value="602">TUBERIAS Y ACCESORIOS DE ACERO INOXIDABL</option>
<option value="603">TUBERIAS Y ACCESORIOS DE FUNDICIONES FER</option>
<option value="607">TUBERIAS Y ACCESORIOS DE ASBESTO-CEMENTO</option>
<option value="608">TUBERIAS Y ACCESORIOS DE FIBRA DE VIDRIO</option>
<option value="609">TUBERIAS Y ACCESORIOS DE PLASTICO.</option>
<option value="610">EQUIPOS Y PARTES REPARADAS.</option>
<option value="613">TAMBORES PARA ACEITE (VACIOS).</option>
<option value="614">CARRETES PARA CABLES (VACIOS).</option>
<option value="615">BOMBONAS PARA GASES (VACIAS).</option>
<option value="617">TRANSFORMADORES OBSOLETOS.</option>
<option value="618">METALES CHATARRA.</option>
<option value="619">MOBILIARIO CHATARRA.</option>
<option value="620">HERRAMIENTAS PARA TRABAJOS EN LINEAS ENE</option>
<option value="622">HERRAMIENTAS DE MANO.</option>
<option value="624">PRENSAS Y DADOS DE COMPRESION PARA EMPAT</option>
<option value="625">HERRAMIENTAS CALIBRADAS.</option>
<option value="627">HERRAMIENTAS PARA CONSTRUCCION, CARPINTE</option>
<option value="628">EQUIPOS DE LIMPIEZA DIFERENTES A LOS LIS</option>
<option value="629">MAQUINAS-HERRAMIENTAS.</option>
<option value="640">LINTERNAS, REFLECTORES ESPECIALES MANUAL</option>
<option value="641">AVISOS DE SEGURIDAD, TARJETAS INDICADORA</option>
<option value="644">LLAVES MAESTRAS, CANDADOS Y CERRADURAS.</option>
<option value="646">SISTEMAS ELECTRONICOS DE SEGURIDAD  Y</option>
<option value="647">SIST.DETECTORES DE FUEGO Y GASES,ALARMAS</option>
<option value="649">CASCOS,RESPIRADORES,MASCARAS,CINTURONES,</option>
<option value="660">ALUMINIOS.</option>
<option value="662">FONDOS.</option>
<option value="663">MASILLAS Y MASTIQUES.</option>
<option value="665">PINTURAS RESISTENTES A AGENTES QUIMICOS.</option>
<option value="667">PINTURAS RESISTENTES A ALTAS TEMPERATURA</option>
<option value="668">PRODUCTOS ESPECIALES.</option>
<option value="669">REMOVEDORES Y SOLVENTES.</option>
<option value="680">GASOLINA Y KEROSINA.</option>
<option value="681">FUEL OIL.</option>
<option value="683">FLUIDOS HIDRAULICOS.</option>
<option value="685">ACEITES Y GRASAS LUBRICANTES.</option>
<option value="686">ACEITES AISLANTES.</option>
<option value="687">FLUIDOS AISLANTES.</option>
<option value="689">GRASAS AISLANTES (SILICONA).</option>
<option value="690">ACIDOS, SALES Y REACTIVOS.</option>
<option value="692">GASES NO COMBUSTIBLES ENVASADOS A PRESIO</option>
<option value="694">GASES COMBUSTIBLES ENVASADOS A PRESION.</option>
<option value="696">JABONES Y SOLUCIONES PARA LIMPIEZA.</option>
<option value="698">ADITIVOS PARA COMBUSTIBLES.</option>
<option value="699">INSECTICIDAS, MATA AVISPAS, FERTILIZANTE</option>
<option value="700">MOTORES EN ALTERNA TRIFASICOS.</option>
<option value="703">MOTORES EN ALTERNA MONOFASICOS.</option>
<option value="705">MOTORES EN CONTINUA.</option>
<option value="707">BOBINAS Y CONDENSADORES SINCRONICOS.</option>
<option value="708">MOTORES GENERADORES.</option>
<option value="709">CARBONES, PORTACARBONES Y ESCOBILLAS.</option>
<option value="710">BOMBAS CENTRIFUGAS VERTICALES.</option>
<option value="711">BOMBAS CENTRIFUGAS HORIZONTALES.</option>
<option value="713">BOMBAS ROTATORIAS DE TORNILLO.</option>
<option value="714">BOMBAS ROTATORIAS DE ENGRANAJE.</option>
<option value="715">BOMBAS ROTATORIAS DE PALETAS.</option>
<option value="717">BOMBAS RECIPROCANTES DE PISTON.</option>
<option value="718">BOMBAS RECIPROCANTES DE DIAFRAGMA.</option>
<option value="719">BOMBAS ROTATORIAS PARA ACHIQUE (CON MOTO</option>
<option value="730">COMPRESORES CENTRIFUGOS.</option>
<option value="733">COMPRESORES ROTATIVOS.</option>
<option value="735">COMPRESORES RECIPROCANTES DE PISTON.</option>
<option value="736">COMPRESORES RECIPROCANTES DE DIAFRAGMA.</option>
<option value="737">SOPLETEADO DE ARENA.</option>
<option value="738">SOPLETEADO DE ABRASIVO METALICO.</option>
<option value="740">ACOPLAMIENTOS INDIRECTOS.</option>
<option value="743">ACOPLAMIENTOS DIRECTOS RIGIDOS.</option>
<option value="744">ACOPLAMIENTOS DIRECTOS FLEXIBLES.</option>
<option value="747">ACOPLAMIENTOS HIDRAULICOS.</option>
<option value="750">COJINETES RADIALES.</option>
<option value="752">COJINETES AXIALES.</option>
<option value="755">RODAMIENTOS RADIALES.</option>
<option value="757">RODAMIENTOS AXIALES.</option>
<option value="760">SELLOS DE LABERINTO Y ANILLOS.</option>
<option value="762">SELLOS MECANICOS.</option>
<option value="765">EMPAQUES.</option>
<option value="767">EMPACADURAS.</option>
<option value="780">VALVULAS DE DIAFRAGMA Y PARA FLOTANTES.</option>
<option value="782">VALVULAS DE MARIPOSA.</option>
<option value="784">VALVULAS DE SOLENOIDE Y DE USOS ESPECIFI</option>
<option value="788">VALVULAS DE COMPUERTA.</option>
<option value="789">VALVULAS DE BOLA.</option>
<option value="790">FILTROS ROTATIVOS.</option>
<option value="793">FILTROS DE CANASTA.</option>
<option value="797">FILTROS DE ELEMENTOS.</option>
<option value="800">TRAMPAS PARA AGUAS.</option>
<option value="802">TRAMPAS PARA VAPOR.</option>
<option value="805">SEPARADORES CICLONICOS.</option>
<option value="807">SEPARADORES CENTRIFUGOS.</option>
<option value="820">SECADORES MECANICOS.</option>
<option value="823">SECADORES QUIMICOS.</option>
<option value="827">SECADORES DE CICLO COMBINADO.</option>
<option value="830">EYECTORES DE VAPOR.</option>
<option value="835">EYECTORES HIDRAULICOS.</option>
<option value="840">DOSIFICADORES.</option>
<option value="845">MEZCLADORES.</option>
<option value="850">ELECTROLIZADORES.</option>
<option value="855">DESGASIFICADORES.</option>
<option value="860">INTERCAMBIADORES DE CALOR DE CONTACTO DI</option>
<option value="865">INTERCAMBIADORES DE CALOR (CARCASA Y TUB</option>
<option value="870">CALDERAS HASTA 120 TON/HR.</option>
<option value="873">CALDERAS HASTA 180 TON/HR.</option>
<option value="875">CALDERAS HASTA 300 TON/HR.</option>
<option value="877">CALDERAS HASTA 1400 TON/HR.</option>
<option value="880">TURBINAS DE VAPOR.</option>
<option value="882">TURBINAS DE GAS.</option>
<option value="884">TURBINAS HIDRAULICAS.</option>
<option value="886">TURBINAS JET (GENERADOR DE GAS).</option>
<option value="890">GENERADORES HASTA 5 MW.</option>
<option value="891">GENERADORES HASTA 10 MW.</option>
<option value="892">GENERADORES HASTA 15 MW.</option>
<option value="894">GENERADORES HASTA 50 MW.</option>
<option value="896">GENERADORES HASTA 100 MW.</option>
<option value="898">GENERADORES HASTA 500 MW.</option>
<option value="911">AUTOMOVILES.</option>
<option value="912">CAMIONETAS.</option>
<option value="913">MINIBUS DE 16 A 24 PUESTOS.</option>
<option value="914">AUTOBUS MAYOR DE 24 PUESTOS.</option>
<option value="915">MOTOS.</option>
<option value="916">RUSTICOS.</option>
<option value="917">CAMIONES.</option>
<option value="918">REMOLQUES.</option>
<option value="919">VEHICULOS ESPECIALES.</option>
<option value="930">SISTEMA ELECTRICO.</option>
<option value="932">COMBUSTIBLE, MOTOR Y ENFRIAMIENTO.</option>
<option value="934">DIRECCION Y SUSPENSION.</option>
<option value="936">EQUIPOS HIDRAULICOS ANEXOS.</option>
<option value="939">CAUCHOS, TRIPAS Y PROTECTORES, VALVULAS</option>
<option value="940">GRUAS Y SEÑORITAS.</option>
<option value="943">ASCENSORES Y ELEVADORES.</option>
<option value="947">ESCALERAS MECANICAS.</option>
<option value="950">PARTES TURBINAS.</option>
<option value="952">PARTES CAJA REDUCTORA (TRANSMISION).</option>
<option value="954">PARTES DEL FUSELAJE.</option>
<option value="956">PARTES DE INSTRUMENTACION Y COMUNICACION</option>
<option value="958">PARTES DE LA CABINA.</option>
<option value="959">EQUIPOS ASOCIADOS NO INCORPORADOS.</option>
<option value="960">A. A. COMPACTOS.</option>
<option value="962">A. A. INTEGRALES.</option>
<option value="964">VENTILADORES AXIALES.</option>
<option value="965">VENTILADORES CENTRIFUGOS.</option>
<option value="966">EXTRACTORES.</option>
<option value="968">TORRES DE ENFRIAMIENTO.</option>
<option value="970">PAPEL REGISTRO GRAFICO.</option>
<option value="972">FORMAS PREIMPRESAS.</option>
<option value="974">PAPEL BOND.</option>
<option value="975">PAPEL DE DIBUJO, COPIAS HELIOGRAFICAS Y</option>
<option value="976">PAPELES Y SOBRES TIMBRADOS.</option>
<option value="977">LAPICES, PLUMAS, MARCADORES Y TINTAS.</option>
<option value="978">ARTICULOS DE ESCRITORIO.</option>
<option value="979">ARTICULOS DE DIBUJO.</option>
<option value="991">ESCRITORIOS, MESAS, SILLAS Y TANDENES.</option>
<option value="992">ARCHIVADORES,CAJAS FUERTES,ESCAPARATES M</option>
<option value="994">CARTELERAS, PIZARRAS, RELOJES FECHADORES</option>
<option value="996">APARATOS AIRE ACONDICIONADO,CAFETERAS,CE</option>
<option value="993">BIBLIOTECAS, TELEFONERAS, MOBILIARIO ESP</option>
<option value="210">NEUMATICO.</option>
<option value="260">TAP-CHANGERS.</option>
<option value="706">PLANTAS DE EMERGENCIA.</option>
<option value="211">RESORTES.</option>
<option value="212">HIDRAULICO.</option>
<option value="213">SOLENOIDE.</option>
<option value="452">BUSCAPERSONAS.</option>
<option value="454">CAPACITADORES DE ACOPLAMIENTO, TRAMPA DE</option>
<option value="371">ANALIZADORES DE SEÑALES.</option>
<option value="373">MEDIDORES DE POTENCIA.</option>
<option value="374">FRECUENCIMETROS.</option>
<option value="376">PROBADORES DE COMPONENTES ELECTRICOS Y E</option>
<option value="378">EQUIPOS DE PRUEBAS ESPECIALES (TEST-SET)</option>
<option value="379">FUENTES DE PODER PARA LABORATORIO.</option>
<option value="077">CONECTORES BIMETALICOS.</option>
<option value="201">INTERRUPTORES PARA TRANSFERENCIA.</option>
<option value="511">OTROS MATERIALES.</option>
<option value="548">PUERTAS, VENTANAS, MARCOS Y PUERTAS META</option>
<option value="581">MATERIALES DE PLASTICO DIFERENTES A LOS</option>
<option value="586">MANGUERAS ESPECIALES.</option>
<option value="590">DE PLASTICO.</option>
<option value="591">DE PAPEL O CARTON.</option>
<option value="626">MALLAS Y CINTAS PARA CABLEADOS DE DUCTOS</option>
<option value="645">RELOJES DE SEGURIDAD.</option>
<option value="661">BARNICES, ESMALTES, LACAS Y OLEOS.</option>
<option value="682">GRASAS Y ACEITES ANTICORROSIVOS.</option>
<option value="783">VALVULAS DE RETENCION (CHECK).</option>
<option value="798">MATERIALES FILTRANTES.</option>
<option value="969">CONDENSADORES PARA AIRE ACONDICIONADO.</option>
<option value="035">CONECTORES PARA CABLES DE 33.000 VOLTIOS</option>
<option value="527">BANDEJAS, ESCALERILLAS PORTACABLES Y SUS</option>
<option value="524">OTROS MATERIALES AISLANTES</option>
<option value="481">BOMBILLOS INCANDESCENTES.</option>
<option value="482">BOMBILLOS FLUORESCENTES.</option>
<option value="483">BOMBILLOS LUZ MIXTA 220 VOLTIOS.</option>
<option value="484">BOMBILLOS LUZ MIXTA 240 VOLTIOS.</option>
<option value="432">FUSIBLES.</option>
<option value="434">CRISTALES</option>
<option value="436">CONECTORES, REGLETAS, BASES, MICAS, PINE</option>
<option value="438">RELES, TRANSFORMADORES.</option>
<option value="472">PROCESADORES ADMINISTRATIVOS Y CINTAS DE</option>
<option value="474">MICROPROCESADORES DEDICADOS (NC SCRIBER)</option>
<option value="477">FUENTES DE PODER.</option>
<option value="971">FORMAS CONTINUAS Y PAPEL TERMICO.</option>
<option value="485">BOMBILLOS DE MERCURIO.</option>
<option value="487">BOMBILLOS DE SODIO.</option>
<option value="488">BOMBILLOS DE IODO</option>
<option value="489">BOMBILLOS DE LUZ MIXTA 120 VOLTIOS.</option>
<option value="255">TRANSFORMADORES DE MEDICION.</option>
<option value="278">CONTROL DEL REGULADOR.</option>
<option value="299">CONTACTORES.</option>
<option value="361">MEDIDOR FACTOR DE POTENCIA.</option>
<option value="363">PHASE SHIFT Y TRANSFORMER.</option>
<option value="367">SINCROSCOPIO.</option>
<option value="973">DISKETTES, CINTAS, CASSETTES Y TONER</option>
<option value="621">EQUIPOS PARA TRATAMIENTO  DE  ACEITE AIS</option>
<option value="441">MODULOS</option>
<option value="442">MICROFONOS</option>
<option value="501">BOMBILLOS INCANDESCENTES.</option>
<option value="503">BOMBILLOS FLUORESCENTES.</option>
<option value="505">BOMBILLOS MINIATURA.</option>
<option value="507">BOMBILLOS INDICADORES Y SEÑALIZADORES.</option>
<option value="616">CAJAS Y PALETAS DE MADERA PARA ALMACENAM</option>
<option value="931">TRANSMISION.</option>
<option value="933">FRENOS.</option>
<option value="935">CARROCERIA Y ACCESORIOS.</option>
<option value="389">EQUIPOS DE ARRANQUE AUTOMATICO DE TURBIN</option>
<option value="716">BOMBAS ROTATORIAS DE LOBULOS.</option>
<option value="785">VALVULAS DE GLOBO.</option>
<option value="808">TRAMPAS PARA GASES.</option>
<option value="810">ANIONICOS.</option>
<option value="813">COMBINADOS.</option>
<option value="869">ROTATIVOS DE LAMINAS.</option>
<option value="444">CONECTORES.</option>
<option value="320">INTERRUPTORES DE FLUJO.</option>
<option value="321">INTERRUPTORES DE PRESION.</option>
<option value="322">INTERRUPTORES DE TEMPERATURA.</option>
<option value="323">INTERRUPTORES DE NIVEL.</option>
<option value="324">MODULOS/TARJETAS DE ALARMA.</option>
<option value="325">REGULADORES DE AIRE, AMPLIFICADORES NEUM</option>
<option value="326">FUENTE DE TENSION, CORRIENTE, AMPLIFICAD</option>
<option value="327">INTERRUPTOR NEUMATICO.</option>
<option value="400">PLACAS ORIFICIO, TUBO PITOT, VENTURI.</option>
<option value="401">TERMOCUPLAS, TERMORRESISTENCIAS.</option>
<option value="402">CONVERTIDORES.</option>
<option value="403">TRANSMISORES.</option>
<option value="404">SENSORES, CELDAS, ELECTRODOS QUIMICOS.</option>
<option value="405">ANALIZADORES QUIMICOS, MONITORES.</option>
<option value="406">DETECTORES, TRANSDUCTORES, PICK-UP.</option>
<option value="407">TERMOPOZOS.</option>
<option value="381">ACTUADORES NEUMATICOS</option>
<option value="383">CONTROLADORES ELECTRONICOS.</option>
<option value="385">MODULO DE COMPUTO NEUMATICO.</option>
<option value="387">ESTACIONES DE CONTROL A/M.</option>
<option value="394">INDICADORES.</option>
<option value="534">TERMINALES PARA CABLES DE BAJA TENSION.</option>
<option value="538">LUMINARIAS DIFERENTES A LAS LISTADAS EN</option>
<option value="938">CORREAS.</option>
<option value="229">INTERRUPTORES DIFERENTES A LOS LISTADOS</option>
<option value="236">PARTES PARA SECCIONALIZADORES.</option>
<option value="605">TUBERIAS Y ACCESORIOS DE BRONCE, COBRE Y</option>
<option value="571">ARANDELAS, CLAVOS, CUPILLAS, TORNILLOS (</option>
<option value="900">PRODUCTOS QUIMICOS.</option>
<option value="901">COMBUSTIBLE.</option>
<option value="902">AGUA.</option>
<option value="903">AIRE.</option>
<option value="904">ROMPE - PRESION.</option>
<option value="920">BOYAS Y ACCESORIOS.</option>
<option value="921">MANGUERAS, TUBERIAS Y ACOPLES.</option>
<option value="922">CADENAS.</option>
<option value="642">GUANTES ALTA/BAJA TENSION.</option>
<option value="643">MANTAS ALTA/BAJA TENSION.</option>
<option value="664">PINTURAS AL AGUA (PINTURAS DE CAUCHO).</option>
<option value="293">LOCK-OUT</option>
<option value="601">TUBERIAS Y ACCESORIOS DE ACERO AL CARBON</option>
<option value="311">SOBRECORRIENTE.(CONTINUACION).</option>
<option value="720">COMPRESORES.</option>
<option value="721">TURBINAS.</option>
<option value="722">ACCESORIOS.</option>
<option value="723">CAMARA DE COMBUSTION.</option>
<option value="724">CAJA REDUCTORA.</option>
<option value="000">MATERIALES SIN SIMBOLO NUEVO.</option>
<option value="010">CABLES HASTA 600 VOLTIOS.</option>
<option value="650">CAMISAS</option>
<option value="652">PANTALONES</option>
<option value="653">BATAS, CHAQUETAS, MONOS Y CORBATAS</option>
<option value="655">UNIFORMES DE DAMAS</option>
<option value="656">ZAPATOS</option>
<option value="231">PARTES PARA RECONECTADORES.</option>
<option value="253">PARTES PARA TRANSFORMADORES DE DISTRIBUC</option>
<option value="147">AISLADORES POLIMERICOS</option>
<option value="995">CALCULADORAS, LECTORAS DE MICROFICHAS.</option>
<option value="701">MOTORES DE COMBUSTION</option>
<option value="426">BANCO DE CAPACITORES DE TRANSMISION.</option>
<option value="21">LINEAS AEREAS</option>
<option value="22">LINEAS SUBTERRANEAS</option>		
</datalist>

<input type="text" list="unidad"  maxlength="30" placeholder="Unidad a la cual pertenece"name="unidad">
<datalist id="unidad">
<option>Despacho de carga</option>
</datalist>		
<input type="text"  maxlength="30" placeholder="Extencion Telefonica" name="ext">				
<input type="text"  maxlength="30" placeholder="Cantidad a solicitar" name="cantidad">

<button type="submit" value="ingresar" name="btn1" class="button small">Solicitar</button>

<input type="radio" id="demo-priority-low" name="demo-priority" onclick="location.href='solicitud_repuestos.php'">
<label for="demo-priority-low">Solicitar repuesto</label>											
<input type="radio" id="demo-priority-normal" name="demo-priority" onclick="location.href='solicitud_equipoinf.php'">
<label for="demo-priority-normal">Solicitud equipo informatico</label>

												
<?php
include ("../../clases/clase_solicitud.php"); 
if (isset($_POST['btn1'])) 
{			
$serial= $_POST['id_material'];
$doc = $_SESSION['ddespacho'];
$unidad = $_POST['unidad'];
$ext = $_POST['ext'];
$cantidad = $_POST['cantidad'];				
$estatus = "Aprobado";
$fecha_actual=date("d/m/Y");
$tipo="m";
gestion_solicitud::solicitud_materiales($serial,$doc,$unidad,$ext,$cantidad,$estatus,$fecha_actual,
$tipo);  	
}	 
?>
</form>
</section>

<!-- Footer -->
<?php require_once ("../hf/footer.php"); ?>
</body>
</html>