$(function() {
    var model = {

    }

    var google_place_service_url = "https://maps.googleapis.com/maps/api/place/details/json";
    var google_place_service_key = "AIzaSyB4QTVfNkjYuSfE04jlAHN4vIH7_50_X2s";
    var google_place_request_template = google_place_service_url + "?placeid={{place_id}}" + "&key=" + google_place_service_key;

    function getRestaurantId() {
        var url = window.location.href;
        var split_url = url.split('/');
        return split_url[split_url.length - 1];
    }

    function getPlaceData(callback) {
        var restaurant_id = getRestaurantId();
        //var url = "https://maps.googleapis.com/maps/api/place/details/json?placeid=ChIJd1IutYjFsY4RmiUcBTX2PCM&key=AIzaSyB4QTVfNkjYuSfE04jlAHN4vIH7_50_X2s";
        var url = google_place_request_template.replace("{{place_id}}", restaurant_id);
        var jqXHR = $.ajax({
            url: url,
            type: "POST",
            crossOrigin: true,
            dataType: "json",

            success: function(data) {
                callback(data);
            },

            error: function (xhr, status) {
                alert("error on request");
            }
        });
    }

    var octupus = {
    	init: function() {
    		viewRestaurantDetail.init();
    	}
    }

    var viewRestaurantDetail = {
    	init: function() {
            this.restaurantNameDOM = $("#restaurant-name");
            this.restaurantFormattedPhoneNumber = $("#formatted_phone_number");
            this.render();
    	},

        render: function() {
            function renderCallback(data) {
                // convert data to javascript object very important
                data = JSON.parse(data);
                console.log(data);
                this.restaurantNameDOM.text(data.result.name);
                this.restaurantFormattedPhoneNumber.text(data.result.formatted_phone_number);
            }

            getPlaceData(renderCallback.bind(this));   
        }
    }

    octupus.init();
});