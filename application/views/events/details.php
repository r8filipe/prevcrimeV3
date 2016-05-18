<?php
/**
 * Created by PhpStorm.
 * User: Henrique
 * Date: 18/04/2016
 * Time: 01:46
 */
//Obtain User language
if (isset($_SESSION['language'])) {
    $idiom = $_SESSION['language'];
} else {
    $idiom = $this->config->item('language');
}
//Load of language file
$this->lang->load('details_lang', $idiom);
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $this->lang->line('details_title'); ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $this->lang->line('details_containerTitle'); ?>
            </div>
            <div class="panel-body" >
                <div class="row">
                    <div class="col-lg-6">
                        {event}
                        <label><?php echo $this->lang->line('details_address'); ?></label>
                        <p>{address}</p>
                        <label><?php echo $this->lang->line('details_category'); ?></label>
                        <p>{category}</p>
                        <label><?php echo $this->lang->line('details_subCategory'); ?></label>
                        <p>{occurrence}</p>
                        {/event}
                    </div>
                    <div class="col-lg-6">
                        {event}
                        <label><?php echo $this->lang->line('details_coordinates'); ?></label>
                        <p>{lat}, {long}</p>
                        <label><?php echo $this->lang->line('details_registerBy'); ?></label>
                        <p>user do evento</p>
                        <label><?php echo $this->lang->line('details_createdAt'); ?></label>
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
                <?php echo $this->lang->line('details_containerObs'); ?>
            </div>
            <div class="panel-body">
                {event}
                <form role="form" method="post" action="<?php echo base_url() . "Events/editEvent" ?>">
                    <input type="hidden" name="id" value="{id}">
                    <div class="form-group">
                        <textarea name="obs" class="form-control" rows="10" style="resize: none">{obs}</textarea>
                    </div>
                    <button type="submit"
                            class="btn btn-default"><?php echo $this->lang->line('details_submitBtn'); ?></button>
                </form>
                {/event}
            </div>
        </div>
    </div>
    <!-- /.col-lg-6 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $this->lang->line('details_containerPhotos'); ?>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="min-height:300px ">
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
                <div class="row">

                    <?php echo form_open_multipart('events/uploadPhoto'); ?>
                    {event}
                    <input type="hidden" name="event_id" value="{id}"/>
                    {/event}

                    <input type="file" name="userfile" multiple>
                    <button type="submit"
                            class="btn btn-default"><?php echo $this->lang->line('details_submitBtn'); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.col-lg-6 -->
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $this->lang->line('details_map'); ?>
            </div>
            <div class="panel-body" style="height: 400px">
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
                            center: ol.proj.transform([{long}, {lat}], 'EPSG:4326', 'EPSG:3857'),
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
                    {/event}
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
    <!-- /.col-lg-6 -->
</div>
<!-- /.row -->
