<?php
global $wpdb;
$tablename = $wpdb->prefix . "kpower_configs";
$entriesList = $wpdb->get_results("SELECT * FROM " . $tablename );
$entry=$entriesList[0];

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
.slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 25px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover  {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  background: #04AA6D;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #04AA6D;
  cursor: pointer;
}


</style>
<h1><?php echo $entry->mainTitle ?></h1>
<div class="panel panel-default">
  <div class="panel-body">
    <h3 style="text-align: center;"><?php echo $entry->subTitle ?></h3>
  <div class="slidecontainer">
  <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
  <p  style="text-align: center;">Units : <span id="demo" style="font-size: 20px;"></span></p>
  <p  style="text-align: center;">Your monthly bill amount</p>
  <p  style="text-align: center;"><?php echo $entry->currencyType ?>: <span id="bill" style="font-size: 20px;"></span></p>
</div>
  </div>
</div>
<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
var bill = document.getElementById("bill");
output.innerHTML = slider.value;
bill.innerHTML = <?php echo $entry->unitChargers ?>;
slider.oninput = function() {
  output.innerHTML = this.value;
  bill.innerHTML = this.value * <?php echo $entry->unitChargers ?>;
}
</script>