function codeAddress() {
  var geocoder = new google.maps.Geocoder();
  var street = document.getElementById('street').value;
  var postcode = document.getElementById('postcode').value;
  var city = document.getElementById('city').value;
  var address = street+', '+postcode+' '+city;
  console.log(address);
  // add some form field checking
  geocoder.geocode( { 'address': address}, function(results, status) {
	if (status == google.maps.GeocoderStatus.OK) {      
	  document.getElementById('latitude').value = results[0].geometry.location.lat();
	  document.getElementById('longitude').value = results[0].geometry.location.lng();
	  document.getElementById('addressform').submit();
	} else {
	  alert("Geocode was not successful for the following reason: " + status);    
	}
  });
}