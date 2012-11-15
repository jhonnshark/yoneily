<?php
    //error_reporting(0);
    for($i=0;$i<count($esta);$i++)
    {
?>
    <option value="<?php echo $esta[$i]['Estado']['estadoId']?>"><?php echo $esta[$i]['Estado']['nombre'];?></option>
<?php
    }
?>
