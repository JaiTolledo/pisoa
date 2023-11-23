<table class="table" id="capturas">
    <thead>
        <tr>
            <th rowspan="2" class="text-center">Categoria</th>
            <th class="text-center" colspan="4">Datos generales</th>
            <th class="text-center" colspan="4">Licitacion</th>
            <th class="text-center" colspan="4">Contrato</th>
            <th class="text-center" colspan="4">Partidas</th>
            <th class="text-center" colspan="4">Programa de avances</th>
            <th class="text-center" colspan="4">Programación de pagos</th>
        </tr>
        <tr>
            <th class="text-center">Pendiente</th>
            <th class="text-center">Enviado</th>
            <th class="text-center">Revisado</th>
            <th class="text-center">Observado</th>
            <th class="text-center">Pendiente</th>
            <th class="text-center">Enviado</th>
            <th class="text-center">Revisado</th>
            <th class="text-center">Observado</th>
            <th class="text-center">Pendiente</th>
            <th class="text-center">Enviado</th>
            <th class="text-center">Revisado</th>
            <th class="text-center">Observado</th>
            <th class="text-center">Pendiente</th>
            <th class="text-center">Enviado</th>
            <th class="text-center">Revisado</th>
            <th class="text-center">Observado</th>
            <th class="text-center">Pendiente</th>
            <th class="text-center">Enviado</th>
            <th class="text-center">Revisado</th>
            <th class="text-center">Observado</th>
            <th class="text-center">Pendiente</th>
            <th class="text-center">Enviado</th>
            <th class="text-center">Revisado</th>
            <th class="text-center">Observado</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($general as $key => $m) :

        ?>
            <tr>
                <td class="text-center"><?= $m->categoria ?></td>
                <td class="text-center"><?= $m->Datos_pendientes_accion ?></td>
                <td class="text-center"><?= $m->Datos_enviado_accion ?></td>
                <td class="text-center"><?= $m->Datos_revisado_accion ?></td>
                <td class="text-center"><?= $m->Datos_observado_accion ?></td>
                <td class="text-center"><?= $m->licitacion_pendientes_accion ?></td>
                <td class="text-center"><?= $m->licitacion_enviado_accion ?></td>
                <td class="text-center"><?= $m->licitacion_revisado_accion ?></td>
                <td class="text-center"><?= $m->licitacion_observado_accion ?></td>
                <td class="text-center"><?= $m->contrato_pendientes_accion ?></td>
                <td class="text-center"><?= $m->contrato_enviado_accion ?></td>
                <td class="text-center"><?= $m->contrato_revisado_accion ?></td>
                <td class="text-center"><?= $m->contrato_observado_accion ?></td>
                <td class="text-center"><?= $m->partidas_pendientes_accion ?></td>
                <td class="text-center"><?= $m->partidas_enviado_accion ?></td>
                <td class="text-center"><?= $m->partidas_revisado_accion ?></td>
                <td class="text-center"><?= $m->partidas_observado_accion ?></td>
                <td class="text-center"><?= $m->prog_avances_pendientes_accion ?></td>
                <td class="text-center"><?= $m->prog_avances_enviado_accion ?></td>
                <td class="text-center"><?= $m->prog_avances_revisado_accion ?></td>
                <td class="text-center"><?= $m->prog_avances_observado_accion ?></td>
                <td class="text-center"><?= $m->prog_pagos_pendientes_accion ?></td>
                <td class="text-center"><?= $m->prog_pagos_enviado_accion ?></td>
                <td class="text-center"><?= $m->prog_pagos_revisado_accion ?></td>
                <td class="text-center"><?= $m->prog_pagos_observado_accion ?></td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<br><br>
<?php foreach ($captura as $key => $m) :
?>
    <table class="table">
        <thead>
            <tr>
                <th colspan="25" class="text-center"><?= $m->ejecutora_nombre ?></th>
            </tr>
            <tr>
                <th rowspan="2" class="text-center">Categoria</th>
                <th class="text-center" colspan="4">Datos generales</th>
                <th class="text-center" colspan="4">Licitacion</th>
                <th class="text-center" colspan="4">Contrato</th>
                <th class="text-center" colspan="4">Partidas</th>
                <th class="text-center" colspan="4">Programa de avances</th>
                <th class="text-center" colspan="4">Programación de pagos</th>
            </tr>
            <tr>
                <th class="text-center">Pendiente</th>
                <th class="text-center">Enviado</th>
                <th class="text-center">Revisado</th>
                <th class="text-center">Observado</th>
                <th class="text-center">Pendiente</th>
                <th class="text-center">Enviado</th>
                <th class="text-center">Revisado</th>
                <th class="text-center">Observado</th>
                <th class="text-center">Pendiente</th>
                <th class="text-center">Enviado</th>
                <th class="text-center">Revisado</th>
                <th class="text-center">Observado</th>
                <th class="text-center">Pendiente</th>
                <th class="text-center">Enviado</th>
                <th class="text-center">Revisado</th>
                <th class="text-center">Observado</th>
                <th class="text-center">Pendiente</th>
                <th class="text-center">Enviado</th>
                <th class="text-center">Revisado</th>
                <th class="text-center">Observado</th>
                <th class="text-center">Pendiente</th>
                <th class="text-center">Enviado</th>
                <th class="text-center">Revisado</th>
                <th class="text-center">Observado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($m->capturas as $n) :


            ?>
                <tr>
                    <td class="text-center"><?= $n->categoria ?></td>
                    <td class="text-center"><?= $n->Datos_pendientes_accion ?></td>
                    <td class="text-center"><?= $n->Datos_enviado_accion ?></td>
                    <td class="text-center"><?= $n->Datos_revisado_accion ?></td>
                    <td class="text-center"><?= $n->Datos_observado_accion ?></td>
                    <td class="text-center"><?= $n->licitacion_pendientes_accion ?></td>
                    <td class="text-center"><?= $n->licitacion_enviado_accion ?></td>
                    <td class="text-center"><?= $n->licitacion_revisado_accion ?></td>
                    <td class="text-center"><?= $n->licitacion_observado_accion ?></td>
                    <td class="text-center"><?= $n->contrato_pendientes_accion ?></td>
                    <td class="text-center"><?= $n->contrato_enviado_accion ?></td>
                    <td class="text-center"><?= $n->contrato_revisado_accion ?></td>
                    <td class="text-center"><?= $n->contrato_observado_accion ?></td>
                    <td class="text-center"><?= $n->partidas_pendientes_accion ?></td>
                    <td class="text-center"><?= $n->partidas_enviado_accion ?></td>
                    <td class="text-center"><?= $n->partidas_revisado_accion ?></td>
                    <td class="text-center"><?= $n->partidas_observado_accion ?></td>
                    <td class="text-center"><?= $n->prog_avances_pendientes_accion ?></td>
                    <td class="text-center"><?= $n->prog_avances_enviado_accion ?></td>
                    <td class="text-center"><?= $n->prog_avances_revisado_accion ?></td>
                    <td class="text-center"><?= $n->prog_avances_observado_accion ?></td>
                    <td class="text-center"><?= $n->prog_pagos_pendientes_accion ?></td>
                    <td class="text-center"><?= $n->prog_pagos_enviado_accion ?></td>
                    <td class="text-center"><?= $n->prog_pagos_revisado_accion ?></td>
                    <td class="text-center"><?= $n->prog_pagos_observado_accion ?></td>

                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <br>
<?php endforeach; ?>