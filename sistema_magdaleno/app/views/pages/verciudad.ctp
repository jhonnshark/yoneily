<?php
    //error_reporting(0);
    for($i=0;$i<count($ciud);$i++)
    {
?>
    <option value="<?php echo $ciud[$i]['Ciudade']['nombre']?>"><?php echo $ciud[$i]['Ciudade']['nombre'];?></option>
<?php
    }
?>
