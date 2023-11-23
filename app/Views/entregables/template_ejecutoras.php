
<table class="table" id="tablita">
    <thead>
    <?php
        $total_obra=0;
        $total_general_enviados=0;
        $total_general_pendientes=0;
        $total_general_diferencia=0;
    foreach ($data as $key => $n) :

    $total=$n->total_documentos;
    $total_obra=$total_obra+$total;

    $total2=$n->total_enviados;
    $total_general_enviados=$total_general_enviados+$total2;

    $total3 =$n->total_pendientes;
    $total_general_pendientes=$total_general_pendientes+$total3;

    $total4= $n->total_diferencia;
    $total_general_diferencia= $total_general_diferencia+$total4;
    ?>

        <?php endforeach ?>


    <tr>
            <th colspan="2">Total de documentos</th>
            <th ><?= $total_obra?></th>
            <th ><?= $total_general_enviados?></th>
            <th ><?= $total_general_pendientes?></th>
            <th ><?= $total_general_diferencia?></th>


        </tr>
        <tr>
            <th style="text-align: center;">Id Ejecutora</th>
            <th style="text-align: center;">Nombre de la ejecutora</th>
            <th style="text-align: center;">Total de documentos por obra </th>
            <th style="text-align: center;">Total de documentos que lleva hasta la fecha</th>
            <th style="text-align: center;">Total de documentos que deberia llevar hasta la fecha</th>
            <th style="text-align: center;">Total de documentos restantes hasta la fecha</th>
        </tr>
    </thead>
    <?php foreach ($data as $key => $m) :
    ?>



        <tr>
            <td style="text-align: center;"><a> <?= $m->ejecutora_id ?> </a></td>
            <td style="text-align: center;"> <?= $m->ejecutora_nombre ?> </td>
            <td style="text-align: center;"> <?= $m->total_documentos ?> </td>
            <td style="text-align: center;">
                <?= $m->total_enviados ?>
            </td>
            <td style="text-align: center;">
                <?= $m->total_pendientes ?>
            </td>
            <td style="text-align: center;">
                <?= $m->total_diferencia ?>
            </td>
        </tr>
    <?php endforeach ?>
</table>
