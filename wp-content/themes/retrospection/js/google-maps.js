var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 8
  });
}

src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARNe6pnLx1fu-mhkkxfR65HnGPiGrQXGc&callback=initMap";

console.log("file loaded");