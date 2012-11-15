<div class="span-19 last">
    <div class="span-19 last" style="height: 100px;" align="left">
    </div>
    <?php
    if ($session->check('Message.flash')) {
    ?>
    <div class="success span-17 last" align="center">
        <?php echo $session->flash(); ?>
    </div>
    <?php
    }
    if (!$enviado) {
    ?>
    <div class="span-5" style="height:40px;visibility: hidden;">
       space
    </div>
    <div class="span-8 bold texto14" align="center" style="margin-left:60px;">
        Coloca tu correo electrónico y te enviaremos una nueva contraseña para que puedas ingresar.
    </div>
    <div class="span-6 last" style="height:4px;visibility: hidden;">
         space
    </div>
    <hr class="space"/>
    <div class="span-5" style="height:40px;visibility: hidden;">
        space
    </div>
    <div class="span-12" align="right">
        <?php

            echo $form->create('Register', array('action' => 'recordar'));
            ?>
        <div class="span-4 bold">
        Correo electrónico:
        </div>
        <div class="span-7 last" style="margin-left:-60px;">
        <?php
        echo $form->input('confcorreo', array('label' => false, 'div'=>false,'style' => 'margin-bottom:5px;'));
        ?>
        </div>
        <div class="span-8 last bold" style="margin-left: 70px;">
        <?php
            echo $form->end(array('label'=>'Enviar','div'=>false,'style'=>'background-color:#ff9600; width:80px; color:#fff;'));
        ?>
         </div>
        <?php
        }
        ?>

    </div>
    <div class="span-6 last" style="height:40px;visibility: hidden;">
        space
    </div>
</div>
