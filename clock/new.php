<?php

if($_GET['q'] != ''){
  $getQuery = '?count='.$_GET['count'].'&lang=en&q='.urlencode($_GET['q']);  
  $url = 'https://api.twitter.com/1.1/search/tweets.json'.$getQuery;

}
else if($_GET['latitude'] != ''){
  $getQuery = '?count='.$_GET['count'].'&lang=en&result_type=recent&geocode='.$_GET['latitude'].','.$_GET['longitude'].',15mi';  
  $url = 'https://api.twitter.com/1.1/search/tweets.json'.$getQuery;
}
// $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json?count=100&screen_name=twitterapi';

if(isset($_GET['data'])){
  $options = array(
      'http' => array(
          'method' => 'GET',
          'header' => 'Authorization: Bearer AAAAAAAAAAAAAAAAAAAAAPEcUQAAAAAAdlMqHKIwXIg4S4tyviSIepy%2FzlU%3Df6FnvB64S3TV1Eu1mqylXvLEsuFlfkPmfQy7tQ4TZ5QmkS4vyP',
          'protocol_version' => 1.1,
      ),
  );

  // print_r($options);

  $context = stream_context_create($options);
  $result = file_get_contents($url, false, $context);

  echo $result;

  return;
}


?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Reverse Geocoding</title>
    <link href="stylesheets/screen.css" rel="stylesheet" type="text/css">
    
  </head>
  <body>
    <!-- <div id="panel">
      <input id="latlng" type="text" value="40.714224,-73.961452">
      <input type="button" value="Reverse Geocode" onclick="codeLatLng()">
    </div> -->
    
    <ul class="navigation horizontal-list clearfix">
      <li class="about" id="about"><h4>About</h4></li>
      <li class="around"><h4>Around</h4></li>
      <!-- <li class="trends"><h3>Trends</h3></li> -->
    </ul>
    
    <p class="caption-container">
    <span class="caption">what people are saying about </span><span class="keyword"></span>
    </p>
    <!-- <input type="text" id="longitude" /> -->
    <ul id="results"></ul>

    <div id="map-canvas"></div>

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script type="text/javascript" src="/scripts/app1.js"></script>

  </body>
</html>