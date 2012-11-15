<?phpApp::import('Vendor', 'tcpdf', array('file' => 'xtcpdf.php'));//App::import('Vendor', 'xtcpdf');$tcpdf = new XTCPDF();$textfont = 'freesans'; // looks better, finer, and more condensed than 'dejavusans'$tcpdf->SetAuthor("Muebles de Magdaleno");$tcpdf->SetAutoPageBreak(true, 30);$tcpdf->setHeaderFont(array($textfont, '', 20));$tcpdf->xheadercolor = array(255, 255, 255);$tcpdf->xheadertext = '';$tcpdf->xfootertext = 'Copyright � %d Muebles de Magdaleno';// add a page (required with recent versions of tcpdf)$tcpdf->AddPage("P","letter");// Now you position and print your page content// example:$tcpdf->SetTextColor(0, 0, 0);$tcpdf->SetFont($textfont, 'B', 10);$html .= '<img src="'.$html->url('/',true).'app/webroot/images/cintillo_pdf.jpg" width="770" height="100" /><br /><br /><br />';$html .='<h2 style="text-align: center; color:black;">Datos de Clientes Registrados</h2><br /><br />';$fecha=date('d-m-Y');$html .='<table style="text-align:right;"><tr><td><h3>Magdaleno, '.$fecha.'</h3></td></tr></table>';$html .= '<table border="1" cellpadding="2" width="100%" height="70%">';$html .= '<tr style="text-align: center; background-color: #78e; color: black; font-size: 75%; ">';$html .= '<th>Id</th>';$html .= '<th>Nombre y Apellido</th>';$html .= '<th>Correo Electr&oacute;nico</th>';$html .= '<th>Tel&eacute;fono</th>';$html .= '<th>Status</th></tr>';$j=1;//pr($clientes);if (isset($clientes)) {    $i = 0;    foreach ($clientes as $cliente) {        $style = ' style="text-align: center; font-size: 75%;';            if ($i++ % 2 == 0) {                $style =  $style . ' background-color: #ddd;';            }        $html .= '<tr'. $style .'"><td>' . $j++. '</td>';        $html .= '<td>' . $cliente['Register']['nombreape'] . '</td>';		$html .= '<td>' . $cliente['Register']['correo'] . '</td>';		$html .= '<td>0' . $cliente['Register']['telefono'] . '</td>';		$st=$cliente['Register']['status'];		if($st=1){ $status='Activo';}else{$status='Inactivo';}		$html .= '<td>' . $status . '</td>';        $html .= '</tr>';    }} else {    $html .= '<tr><td>No se encontraron datos</td></tr>';}$html .= '</table>';// output the HTML content$tcpdf->writeHTML($html, true, false, true, false, '');$fecha=date("d-m-Y");echo $tcpdf->Output('Clientes_registrados_' . $fecha . '.pdf', 'D');?>