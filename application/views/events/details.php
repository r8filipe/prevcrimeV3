<?php
/**
 * Created by PhpStorm.
 * User: Henrique
 * Date: 18/04/2016
 * Time: 01:46
 */
error_reporting(0);
?>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Dados
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        {event}
                        <label>Endereço</label>
                        <p>{address}</p>
                        <label>Coordenadas (Latitude, Longitude)</label>
                        <p>{lat}, {long}</p>
                        <label>Categoria</label>
                        <p>{category}</p>
                        <label>Sub Categoria</label>
                        <p>{occurrence}</p>
                        <label>Registado por</label>
                        <p>user do evento</p>
                        <label>Criado em</label>
                        <p>{created_at}</p>
                        {/event}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Por um mapa com a localização do Evento
            </div>
            <div class="panel-body">

            </div>
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Um gráfico de uma estatistica
            </div>
            <div class="panel-body">

            </div>
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
</div>
<!-- /.row -->
