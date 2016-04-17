
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Listagem dos Eventos
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Morada</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Categoria</th>
                            <th>Ocorrência</th>
                            <th>Local</th>
                            <th>Data/Hora</th>
                            <th>Opções</th>
                        </tr>
                        </thead>
                        <tbody>
                        {events}
                        <tr class="gradeU">
                            <td>{id}</td>
                            <td>{address}
                            <td class="center">{lat}
                            <td  class="center">{long}
                            <td class="center">{sub_category->category->description}
                            <td class="center">{description}
                            <td class="center">{local_type->description}
                            <td class="center">{created_at}
                            <td class="center">-</td>
                        </tr>
                       {/events}
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->