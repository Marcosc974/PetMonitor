/**
 * Adds a polyline between Dublin, London, Paris and Berlin to the map
 *
 * @param  {H.Map} map      A HERE Map instance within the application
 */
function addPolylineToMap(map) {

    var lineString = new H.geo.LineString();

    lineString.pushPoint({lat: -15.7312, lng: -48.29135});
    lineString.pushPoint({lat: -15.7272, lng: -48.28452});
    lineString.pushPoint({lat: -15.73631, lng: -48.29032});

    map.addObject(new H.map.Polyline(
            lineString, {style: {lineWidth: 4}}
    ));
}

/**
 * Boilerplate map initialization code starts below:
 */

//Step 1: initialize communication with the platform
// In your own code, replace variable window.apikey with your own apikey
var platform = new H.service.Platform({
    apikey: '8iKJu_XJbrkCl-q-mzpeWXhkTzfDqZtSJgydReCV2mc'
});
var defaultLayers = platform.createDefaultLayers();
function moveMapToBrasilia(map) {
    map.setCenter({lat: -15.7312, lng: -48.29135});
    map.setZoom(16);
}
//Step 2: initialize a map - this map is centered over Europe
var map = new H.Map(document.getElementById('map'),
        defaultLayers.vector.normal.map, {
            center: {lat: 50, lng: 5},
            zoom: 5,
            pixelRatio: window.devicePixelRatio || 1
        });
// add a resize listener to make sure that the map occupies the whole container
window.addEventListener('resize', () => map.getViewPort().resize());

//Step 3: make the map interactive
// MapEvents enables the event system
// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

// Create the default UI components
var ui = H.ui.UI.createDefault(map, defaultLayers, 'pt-BR');
// Now use the map as required...

addPolylineToMap(map);
window.onload = function () {
    moveMapToBrasilia(map);
}