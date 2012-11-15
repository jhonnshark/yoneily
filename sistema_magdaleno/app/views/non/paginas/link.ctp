<h1>Link Página</h1>
<?php foreach ($parchivos[0]["Parchivo"] as $parchivo):

    $cont=0;
    $nombre="";

if(strpos($parchivo["mimetype"], "image")===0)
{
?>

        <div>
            <?php echo $this->Html->image("/files/archivos/".$parchivo["name"]); ?>
        </div>
<?php
}
else if(strpos($parchivo["mimetype"], "application")===0)
{
 ?>

        <div>
             <div id="<?php echo $parchivo["id"]?>">

                    </div>
                    <script type="text/javascript">
                        var fo2 = new SWFObject("<?php echo $this->Html->url("/files/archivos/").$parchivo["name"]; ?>", "<?php echo $parchivo["name"]?>","<?php echo $parchivo["width"]?>","<?php echo $parchivo["height"]?>" ,"10", "#FFFFFF");
                        fo2.addParam("wmode", "transparent");
		fo2.write("<?php echo $parchivo["id"]?>" );
                   </script>
            
        </div>
<?php

}
endforeach; ?>




