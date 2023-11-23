<table class="table">
    <thead>
    <tr>
            <th style="text-align: center;">Id</th>
            <th style="text-align: center;">Categoria</th>
            <th style="text-align: center;">Total de documentos</th>
            <th style="text-align: center;">Total de documentos que lleva hasta la fecha</th>
            <th style="text-align: center;">Total de documentos que deberia llevar hasta la fecha</th>
            <th style="text-align: center;">Total de documentos restantes hasta la fecha</th>
        </tr>
    </thead>
    <?php foreach ($data as $key => $m) :
    ?>

        <tr>
            <td style="text-align: center;"> <?= $m->universo_id ?> </td>
            <td style="text-align: center;"> <?= $m->categoria ?> </td>
            <td style="text-align: center;"> <?= $m->total_documentos ?> </td>
            <td style="text-align: center;"> <?= $m->total_enviados ?> </td>
            <td style="text-align: center;"> <?= $m->total_pendientes ?> </td>
            <td style="text-align: center;"> <?= $m->diferencia ?> </td>
        </tr>
    <?php endforeach ?>
</table>