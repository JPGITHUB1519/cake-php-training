$(function() {
    const GOOGLE_PLACE_API_KEY = 'AIzaSyB4QTVfNkjYuSfE04jlAHN4vIH7_50_X2s';
    const GOOGLE_MAP_API_KEY = 'AIzaSyCtppdcPte6wsoDexY-0PkqhUrUyjsq6QM'

    var model = {

    }

    var octupus = {
    	init: function() {
    		viewMap.init();
    	}
    }

    var viewMap = {
    	init: function() {
    		this.btnReview = $("#btn-review");

    		this.btnReview.click(function() {
    			console.log(mapData.places);	
    			var place_id = mapData.places[0].place_id;
    			// redirect to view restaurant
    			location.href = "/restaurants/view/" + place_id;			
    		}) ;
    	}
    }

    octupus.init();
});