let map;

function getLocation() {
  return navigator.geolocation.getCurrentPosition(showPosition);
}

function showPosition(position) {
  const pos = { lat: position.coords.latitude, lng: position.coords.longitude };
  map = new google.maps.Map(document.getElementById("map"), {
    center: pos,
    zoom: 16
  });
  const marker = new google.maps.Marker({
  position: pos,
  map: map
  });
}
// function initMap() {
//   const pos ={ lat: 36.86695028365619, lng: -6.17892511582757 };
//   map = new google.maps.Map(document.getElementById("map"), {
//     center: pos,
//     zoom: 16,
//   });
//   const marker = new google.maps.Marker({
//   position: pos,
//   map: map
//   });
// }
