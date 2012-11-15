$('document').ready(function(){
    
    /*$(".denegado").click(function(){
       $(".tilde").css("cursor","pointer")
       //alert("imagen");
    });*/

    $(".tilde").mouseover(function(){
       
       $(".tilde").css("cursor","pointer");    
    });
    
    $(".tilde").click(imgchange);

    function imgchange(){
        $.ajaxSetup ({
            cache: false
        });
        //alert("prueba");
          var permisos  = $(this).attr("alt");
          var cargador = $(this).next();
          $(cargador).css("display","inline");
          //$(this).remove();
         var texto = $(".texto");
          var img = $(this);
            $(this).css("display","none");
               $.ajax({
                   type: "POST",
                   url: "../ajax_load",
                   dataType: "json",
                   data: (permisos),
                   success: function(msg){
                     $(cargador).css("display","none");
                     //alert(msg.permisos);
                     
                     $(img).attr("alt",msg.permisos);
                     $(img).attr("src",msg.imagen);
                     $(img).parent().prev(".texto").text(msg.mensaje)
                     //alert($(texto));
                     $(img).css("display","inline");
                     //alert($(this).attr("src"));
                     //alert($(cargador).parent(".tilde").attr("alt"));//.click(imgchange);

                    }
              });
    }

});

$(function()
{
   $( "#accordion" ).accordion({collapsible: true},{clearStyle: true});
});




