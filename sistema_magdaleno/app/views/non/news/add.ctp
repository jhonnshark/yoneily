<h1>Crear Noticias</h1>
<div>
    <h1 id="usu"><?php echo $html->link('Volver a la vista de consulta',array('action' => '/'));?></h1>
</div>
<?php
    echo $javascript->codeBlock(
        "function fileBrowserCallBack(field_name, url, type, win) {
            browserField = field_name;
            browserWin = win;
            window.open('".Helper::url(array('controller' => 'archivos','action' =>'add'))."', 'browserWindow', 'modal,width=600,height=400,scrollbars=yes');
        }"
    );
?>

<?php
    echo $javascript->codeBlock(
        "tinyMCE.init({
            mode : 'exact',
            elements : 'contenido',
            theme : 'advanced',
            plugins : 'safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,autosave,advlist,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,imagemanager,filemanager',
            /*theme_advanced_buttons1 : 'forecolor, bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,|,undo,redo,|,link,unlink,|,image,emotions,code',
            theme_advanced_buttons2 : '',
            theme_advanced_buttons3 : '',*/
            theme_advanced_buttons1 : 'save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect',
            theme_advanced_buttons2 : 'cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor',
            theme_advanced_buttons3 : 'tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen',
            theme_advanced_buttons4 : 'insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,restoredraft,|,insertfile,insertimage',
            theme_advanced_toolbar_location : 'top',
            theme_advanced_toolbar_align : 'left',
            theme_advanced_path_location : 'bottom',
            extended_valid_elements : 'a[name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]',
            file_browser_callback: 'fileBrowserCallBack',
            width: '620',
            height: '480',
            relative_urls : true
        });"
    );
?> 
<?php
 //pr($parent);
   echo $form->create('News');
   echo $form->input('titulo_contennoticias',array('label'=>'Titulo de la noticia'));
   echo $form->input('sumario_contennoticias',array('label'=>'Sumario','type'=>'text'));
   echo $form->input('texto_contennoticias',array('label'=>'texto','id'=>'contenido'));
   echo $form->input('status_contennoticias',array('label'=>'Publicar','type'=>'checkbox'));
   echo $form->input('categorias_id_categorias',array('options'=>array($parent),'label'=>'Categoria Padre'));
   //echo $form->input('groups_idgrupos', array('options' =>array($groups),'label'=>'Perfil'));
  echo $form->input('usuario_id_usuario', array('type'=>'hidden','value'=>$session->read('Auth.User.id_usuario')));
  echo $form->end('Crear Noticias');
?>


