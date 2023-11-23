        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Descripcion</th>
                    <th class="text-center">Mótivo</th>
                    <th class="text-center">Persona que solicita</th>
                    <th class="text-center">Fecha Realizado</th>
                    <th class="text-center">Persona que Atendió</th>
                    <th class="text-center">Fecha Actualizado</th>
                </tr>
            <tbody>
                <?php foreach ($data as $key => $m) :

                    $fecha_cadena = $m->fecha_creacion;
                    


                ?>
                    <tr>
                        <td class="text-center"><?= $m->id_ticket ?> </td>
                        <td class="text-center"><?= $m->descripcion ?> </td>
                        <td class="text-center"><?= $m->id_tipo ?> </td>
                        <td class="text-center"><?= $m->usuario_ticket ?> </td>
                        <td class="text-center"><?= formato_fecha($m->fecha_creacion,1) ?> </td>
                        <td class="text-center"><?= $m->usuario_ticket ?> </td>
                        <td class="text-center"><?= formato_fecha($m->fecha_actualizacion,1) ?> </td>

                    </tr>
                <?php endforeach; ?>
        </table>