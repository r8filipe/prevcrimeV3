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

    <!-- /.col-lg-6 -->
<!--    <div class="col-lg-6">-->
<!--        <div class="panel panel-default">-->
<!--            <div class="panel-heading">-->
<!--                Um gráfico de uma estatistica-->
<!--            </div>-->
<!--            <div class="panel-body">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <!-- /.col-lg-6 -->
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Fotografias
            </div>
            <div class="panel-body" style="height: 330px">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php
                        for ($i = 0; $i < count($photos); $i++) {
                            echo ' <li data-target="#myCarousel" data-slide-to="' . $i . '"></li> ';
                        }

                        ?>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">


                        <?php
                        for ($i = 0; $i < count($photos); $i++) {
//                            var_dump($photos[$i]['photo']);
                            $photo = $photos[$i]['photo'];
                            echo ($i == 0) ? '<div class="item active" >' : '<div class="item">';
                            echo "<img src='" . base_url() . "images/$photo' height=\"300\"/>";
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Localização do Evento
            </div>
            <div class="panel-body" style="height: 330px">
                <div id="map" class="map">
                    <div id="popup"></div>
                </div>
                <script>
                    var vectorSource = new ol.source.Vector({});
                    {event}

                    var iconFeature = new ol.Feature({
                        geometry: new ol.geom.Point(ol.proj.transform([{long}, {lat}], 'EPSG:4326',
                            'EPSG:3857')),
                        name: "{address}",
                        population: 4000,
                        rainfall: 500
                    });
                    var iconStyle = new ol.style.Style({
                        image: new ol.style.Icon(/** @type {olx.style.IconOptions} */ ({
                            anchor: [0.5, 0.75],
                            scale: 1,
                            opacity: 0.75,
                            src: ' <?php echo base_url(); ?>dist/ol/icons/{icon}.png'
                        }))
                    });
                    iconFeature.setStyle(iconStyle);
                    vectorSource.addFeature(iconFeature);
                    {/event}
                    var vectorLayer = new ol.layer.Vector({
                        source: vectorSource,
                        style: iconStyle
                    });

                    var rasterLayer = new ol.layer.Tile({
                        source: new ol.source.TileJSON({
                            url: 'http://api.tiles.mapbox.com/v3/mapbox.geography-class.json'
                        })
                    });

                    var map = new ol.Map({
                        layers: [rasterLayer, vectorLayer],
                        target: document.getElementById('map'),
                        view: new ol.View({
                            center: ol.proj.transform([-8.6191053, 41.1579438], 'EPSG:4326', 'EPSG:3857'),
                            zoom: 14,
                            minZoom: 13
                        }),

                        layers: [
                            new ol.layer.Tile({
                                source: new ol.source.BingMaps({
                                    imagerySet: 'Road',
                                    key: 'AkGbxXx6tDWf1swIhPJyoAVp06H0s0gDTYslNWWHZ6RoPqMpB9ld5FY1WutX8UoF'
                                })
                            }),
                            vectorLayer
                        ]
                    });

                    var element = document.getElementById('popup');

                    var popup = new ol.Overlay({
                        element: element,
                        positioning: 'bottom-center',
                        stopEvent: false
                    });
                    map.addOverlay(popup);

                    // display popup on click
                    map.on('click', function (evt) {
                        var feature = map.forEachFeatureAtPixel(evt.pixel,
                            function (feature, layer) {
                                return feature;
                            });
                        if (feature) {
                            var geometry = feature.getGeometry();
                            var coord = geometry.getCoordinates();
                            popup.setPosition(coord);
                            $(element).popover({
                                'placement': 'top',
                                'html': true,
                                'content': feature.get('name')
                            });
                            $(element).popover('show');//nem sei se isto dos popups tem a ver com OL3
                        } else {
                            $(element).popover('destroy');
                        }
                    });

                    // change mouse cursor when over marker
                    $(map.getViewport()).on('mousemove', function (e) {
                        var pixel = map.getEventPixel(e.originalEvent);
                        var hit = map.forEachFeatureAtPixel(pixel, function (feature, layer) {
                            return true;
                        });
                        if (hit) {
                            map.getTarget().style.cursor = 'pointer';
                        } else {
                            map.getTarget().style.cursor = '';
                        }
                    });
                </script>
            </div>
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.row -->
</div>