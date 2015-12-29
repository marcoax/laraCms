var gmarkers = []; 
var map;
var gMap = function () {
    	
	function loadMap() {
	
	    var centerMap = new google.maps.LatLng(lat, long);
	
	    var myOptions = {
	        zoom: zoomLevel,
	        center: centerMap,
	        mapTypeId: google.maps.MapTypeId.ROADMAP,
	        styles: [{
	            stylers: [
	                      {saturation: -60 },
	                      {hue: '#9B9F22'},
	            ]
	          }]
	    }
	
	    map = new google.maps.Map(document.getElementById("map"), myOptions);
	
	    setMarkers(map, sites);
	    
	    infowindow = new google.maps.InfoWindow({
	            content: "loading..."
	    });
	
	    var bikeLayer = new google.maps.BicyclingLayer();
		bikeLayer.setMap(map);
			
	}
	// end loadmap
		
    function setMarkers(map, markers) {
    	
		// Add markers to the map
		// Marker sizes are expressed as a Size of X,Y
		// where the origin of the image (0,0) is located
		// in the top left of the image.
		// Origins, anchor positions and coordinates of the marker
		// increase in the X direction to the right and in
		// the Y direction down.
 		var image = new google.maps.MarkerImage(mapIcons,
		// This marker is 20 pixels wide by 32 pixels tall.
		new google.maps.Size(50, 52),
		// The origin for this image is 0,0.
		new google.maps.Point(0,0),
		// The anchor for this image is the base of the flagpole at 0,32.
		new google.maps.Point(0, 32));
		var shadow = new google.maps.MarkerImage(mapIcons,
		// The shadow image is larger in the horizontal dimension
		// while the position and offset are the same as for the main image.
      	new google.maps.Size(37, 32),
      	new google.maps.Point(0,0),
      	new google.maps.Point(0, 32));
      	// Shapes define the clickable region of the icon.
     	 // The type defines an HTML &lt;area&gt; element 'poly' which
      	// traces out a polygon as a series of X,Y points. The final
      	// coordinate closes the poly by connecting to the first
      	// coordinate.
		var shape = {
	      coord: [1, 1, 1, 20, 18, 20, 18 , 1],
	      type: 'poly'
		};
		var curMarker='';
		var bounds = new google.maps.LatLngBounds();
      	for (var i = 0; i < markers.length; i++) {
	        //iconImge=(sites[6])?sites[6]:image;
	        var sites = markers[i];
	        iconImage=(sites[6])?sites[6]:'<?php echo DIR_WS_IMAGES?>pointer.png';
	    	var image = new google.maps.MarkerImage(iconImage,
			new google.maps.Size(50,50),
      		// The origin for this image is 0,0.
      		new google.maps.Point(0,0),
      		// The anchor for this image is the base of the flagpole at 0,32.
      		new google.maps.Point(25, 50));
	        var siteLatLng = new google.maps.LatLng(sites[1], sites[2]);
	        var marker = new google.maps.Marker({
	            position: siteLatLng,
	            map: map,
	            animation: google.maps.Animation.DROP,
	          
	            
	            title: sites[0],
	            zIndex: (sites[5]==id_page)?1000:sites[3],
	            html: sites[4].replace(/\\/g,"")
	        });
	        gmarkers.push(marker)
	        
	
			if(sites[5]==id_page){   
			   	curMarker=marker;
			}
			
			
			var contentString = "Some content";
				infowindow = new google.maps.InfoWindow({
				content: "loading..."
			});
				
			
	
	        google.maps.event.addListener(marker, "click", function () {
					infowindow.setContent(this.html);
					infowindow.open(map, this);
			});
	
			bounds.extend(siteLatLng);
			map.fitBounds(bounds);
			
	        if(markers.length==1){
				zoomChangeBoundsListener = google.maps.event.addListenerOnce(map, 'bounds_changed', function(event) {
					if (map.getZoom()) {
						map.setZoom(zoomLevel);
					}
				});
				setTimeout(function() {google.maps.event.removeListener(zoomChangeBoundsListener)}, 2000);
			}
	 	}
			 
			 
		if(curMarker!=''){
			var infowindow = new google.maps.InfoWindow({
				 content: curMarker.html
			});
		 
			//infowindow.setContent(marker.html);
			infowindow.open(map, curMarker);
			map.panTo(curMarker.getPosition());
		}	
		map.setCenter(marker.getPosition())
	}
    // end setMarkers
    
    function myclick(i) {
       
 	   google.maps.event.trigger(gmarkers[i], "click");
 	   map.setCenter(gmarkers[i].getPosition())
 	   map.setZoom(10);
 	  
    }

    
    // init 
	return {
    init: function () {
         loadMap();
        
     },
    mapOpen: function (i) {
         myclick(i);
        
     },
         
    };
   
}();
//]]>
   function myclick(i) {
	   google.maps.event.trigger(gmarkers[i], "click");
	   map.setCenter(gmarkers[i].getPosition())
	   map.setZoom(10);
   }

