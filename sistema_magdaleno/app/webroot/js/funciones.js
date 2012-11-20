function nuevoAjax(){
  var xmlhttp=false;
  try {
   // Creación del objeto ajax para navegadores diferentes a Explorer
   xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
   // o bien
   try {
     // Creación del objet ajax para Explorer
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); } catch (E) {
     xmlhttp = false;
   }
  }

  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
   xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}

function limpiar(div){
   
    //document.getElementById(div).innerHTML="";
    if(document.getElementById){
        var el = document.getElementById(div);
        el.style.display = (el.style.display == 'none') ? 'block' : 'none';
    }
}

function con (){
	var p_rif = document.getElementById('rif').value;
	var mostrar = document.getElementById('mostrar');
	ajax = nuevoAjax();
  ajax.open("GET","../../sistema_magdaleno/app/webroot/funcion.php?p_rif="+p_rif,true);
  ajax.onreadystatechange=function() {
      if (ajax.readyState==4) {
         mostrar.innerHTML = ajax.responseText
      }
    }
    ajax.send(null)
}

