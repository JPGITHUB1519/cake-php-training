<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Places Searchbox</title>
    <?= $this->Html->css('vendor/bootstrap.min.css') ?>
    <?= $this->Html->css('main.css') ?>

  </head>
  <body>
    <div>
        <h1>Select a Restaurant</h1>
    </div>
    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div class="text-center">Select a Restaurant</div>
    <div id="map"></div>
    <button>Make review</button>
    <?= $this->Html->script('google_map_searcher') ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4QTVfNkjYuSfE04jlAHN4vIH7_50_X2s&libraries=places&callback=initAutocomplete"
         async defer></script>
  </body>
</html>