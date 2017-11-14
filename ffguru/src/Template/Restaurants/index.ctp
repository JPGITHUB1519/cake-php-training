<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Places Searchbox</title>
    <?= $this->Html->css('vendor/bootstrap.min.css') ?>
    <?= $this->Html->css('main.css') ?>
    <?= $this->Html->script('vendor/jquery-3.2.1.min') ?>

  </head>
  <body>    
    <div class="text-center"><h1>Find a Restaurant</h1></div>
    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id="map"></div>
    <div style="padding: 1em; text-align: center;">
        <button id="btn-review" class="btn btn-default" disabled="disabled">
            Select Restaurant
            <?php echo $this->Html->link("", ["controller" => "Restaurants", "action"=>"view", 4]) ?>
        </button>
    </div>
    <?= $this->Html->script('google_map_searcher') ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4QTVfNkjYuSfE04jlAHN4vIH7_50_X2s&libraries=places&callback=initAutocomplete"
         async defer></script>
  </body>

  <?= $this->Html->script('google_map') ?>
</html>