<?php
//Obtain User language
$idiom = 'portuguese';
//Load of language file
$this->lang->load('map_lang', $idiom);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $this->lang->line('map_containerTitle'); ?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div id="map" class="map" style="height: 500px">
                    <div id="popup"></div>
                </div>
                <script>
                    var vectorSource = new ol.source.Vector({
                    });
                    {events}
                    console.log({long} + ' '+ {lat});
                    var iconFeature = new ol.Feature({
                        geometry: new ol.geom.Point(ol.proj.transform([{long}, {lat}], 'EPSG:4326',
                        'EPSG:3857')),
                    name: '{{son_encode(address)}',
                        population: 4000,
                        rainfall: 500
                    });
                    var iconStyle = new ol.style.Style({
                        image: new ol.style.Icon(/** @type {olx.style.IconOptions} */ ({
                            anchor: [0.5, 0.75],
                            scale: 1,
                            opacity: 0.75,
                            src: '<?php echo base_url(); ?>dist/ol/icons/marker.png'
                        }))
                    });
                    iconFeature.setStyle(iconStyle);
                    vectorSource.addFeature(iconFeature);
                    {/events}
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
                            center: ol.proj.transform([-8.6291053, 41.1579438], 'EPSG:4326', 'EPSG:3857'),
                            zoom: 14
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
                    map.on('click', function(evt) {
                        var feature = map.forEachFeatureAtPixel(evt.pixel,
                            function(feature, layer) {
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
                    $(map.getViewport()).on('mousemove', function(e) {
                        var pixel = map.getEventPixel(e.originalEvent);
                        var hit = map.forEachFeatureAtPixel(pixel, function(feature, layer) {
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
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->