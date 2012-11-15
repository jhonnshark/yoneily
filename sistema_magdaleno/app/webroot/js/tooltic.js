var theObj="";  
		function toolTip(text,me) {  
			   theObj=me;  
			   theObj.onmousemove=updatePos;  
			   document.getElementById('toolTipBox').innerHTML=text;  
			   document.getElementById('toolTipBox').style.display="block";  
			   window.onscroll=updatePos;  
		}  
		function updatePos() {  
			   var ev=arguments[0]?arguments[0]:event;  
			   var x=ev.clientX;  
			   var y=ev.clientY;  
			   diffX=24;  
			   diffY=0;  
			   document.getElementById('toolTipBox').style.top  = y-2+diffY+document.body.scrollTop+ "px";  
			   document.getElementById('toolTipBox').style.left = x-2+diffX+document.body.scrollLeft+"px";  
			   theObj.onmouseout=hideMe;  
		}  
		function hideMe() {  
			   document.getElementById('toolTipBox').style.display="none";  
		}
		
		//el numero 2
		
		function toolTip1(text,me) {  
			   theObj=me;  
			   theObj.onmousemove=updatePos1;  
			   document.getElementById('toolTipBox1').innerHTML=text;  
			   document.getElementById('toolTipBox1').style.display="block";  
			   window.onscroll=updatePos1;  
		}  
		function updatePos1() {  
			   var ev=arguments[0]?arguments[0]:event;  
			   var x=ev.clientX;  
			   var y=ev.clientY;  
			   diffX=24;  
			   diffY=0;  
			   document.getElementById('toolTipBox1').style.top  = y-2+diffY+document.body.scrollTop+ "px";  
			   document.getElementById('toolTipBox1').style.left = x-2+diffX+document.body.scrollLeft+"px";  
			   theObj.onmouseout=hideMe1;  
		}  
		function hideMe1() {  
			   document.getElementById('toolTipBox1').style.display="none";  
		}