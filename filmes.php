<table id="filmes" class="table table-hover table-sm">
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Ano</th>
            <th>Classificação</th>
            <th>Likes</th>
            <th>Duração</th>
            <th>Descrição</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $filmes=file_get_contents('filmes.json');
        $filmes=json_decode($filmes,true);
        foreach ($filmes as $filme) {
            print '<tr>';
            print '<td>';
            print '<a target="_blank" href="'.$filme['link'].'">'.$filme['titulo'].'</a>';
            print '</td>';
            print '<td>';
            print $filme['ano'];
            print '</td>';
            print '<td>';
            print $filme['classind'];
            print '</td>';
            print '<td>';
            print $filme['likes'];
            print '</td>';
            print '<td>';
            print $filme['duração'];
            print '</td>';
            print '<td>';
            print $filme['descrição'];
            print '</td>';
            print '</tr>';
        }
        ?>
    </tbody>
</table>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#filmes').DataTable( {
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
        },
        "lengthMenu": [4, 8, 16, "All"],
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
