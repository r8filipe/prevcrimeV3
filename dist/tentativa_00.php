<!DOCTYPE HTML>
<html>
<head>
    <title>OpenLayers Simplest Example</title>
</head>
<body>
<div id="Map" style="height:250px"></div>
<script src="OpenLayers.js"></script>
<script>
    var zoom           = 18;

    var fromProjection = new OpenLayers.Projection("EPSG:4326");   // Transform from WGS 1984
    var toProjection   = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
    var positions = [new OpenLayers.LonLat(8.43609, 47.35387).transform( fromProjection, toProjection), new OpenLayers.LonLat(9.43609, 48.35387).transform( fromProjection, toProjection)];

    map = new OpenLayers.Map("Map");
    var mapnik         = new OpenLayers.Layer.OSM();
    map.addLayer(mapnik);

    var markers = new OpenLayers.Layer.Markers( "Markers" );
    map.addLayer(markers);
    markers.addMarker(new OpenLayers.Marker(positions[0]));
    markers.addMarker(new OpenLayers.Marker(positions[1]));
    map.setCenter(position, zoom);
</script>
</body>
</html>