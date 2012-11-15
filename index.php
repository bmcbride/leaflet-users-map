<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Leaflet Users Map</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Map showing users of the Leaflet mapping library" />
    <meta name="keywords" content="leaflet, users, map, javascript, cloudmade" />
    <meta name="author" content="Bryan R. McBride, GISP - http://bryanmcbride.com" />

    <!-- Le styles -->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Norican">
    <link type="text/css" rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="assets/leaflet/leaflet.css" />
    <!--[if lte IE 8]><link type="text/css" rel="stylesheet" href="assets/leaflet/leaflet.ie.css" /><![endif]-->
    <link type="text/css" rel="stylesheet" href="assets/leaflet/plugins/leaflet.markercluster/MarkerCluster.css" />
    <link type="text/css" rel="stylesheet" href="assets/leaflet/plugins/leaflet.markercluster/MarkerCluster.Default.css" />
    <style type="text/css">
      html, body {
        margin: 0;
        padding: 0;
        height: 100%;
        width: 100%;
        position: absolute;
        overflow:hidden;
      }
      #map {
        margin-top:40px;
        width:100%;
        height:100%;
      }
      #loading {
        position: absolute;
        width: 220px;
        height: 19px;
        top: 50%;
        left: 50%;
        margin: -10px 0 0 -110px;
        z-index: 20001;
      }
      #loading .loading-indicator {
        height: auto;
        margin: 0;
      }
      .navbar .brand {
        font-size: 25px;
        font-family: 'Norican', serif;
        font-weight: bold;
        color: white;
      }
      .navbar .nav > li > a {
        padding: 13px 10px 11px;
      }
      .navbar .btn, .navbar .btn-group {
        margin-top: 8px;
      }
      .leaflet-popup-content-wrapper, .leaflet-popup-tip {
        background: #f7f7f7;
      }
      .leaflet-control-geoloc {
        background-image: url(img/location.png);
        -webkit-border-radius: 5px 5px 5px 5px;
        border-radius: 5px 5px 5px 5px;
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script type="text/javascript">
      WebFontConfig = {
        google: {
            families: ['Norican::latin']
        }
      };
      (function () {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
      })();
      </script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#" onclick="return false;">Leaflet Users Map</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li><a href="#" onclick="$('#aboutModal').modal('show'); return false;"><i class="icon-question-sign icon-white"></i> About The Map</a></li>
              <li><a href="#" onclick="$('#contactModal').modal('show'); return false;"><i class="icon-envelope icon-white"></i> Contact Me</a></li>
              <li><a href="https://github.com/bmcbride/leaflet-users-map" target="_blank"><i class="icon-download icon-white"></i> GitHub Repo</a></li>
              <li><a href="http://leafletjs.com/" target="_blank"><i class="icon-leaf icon-white"></i> Leaflet</a></li>
            </ul>
            <form class="navbar-form pull-right">
               <span style="padding-right: 20px;"><a class='btn btn-primary btn-small' data-toggle="modal" href="#addmeModal"><i class="icon-plus-sign icon-white"></i> Add me to the map</a></span>
               <span><a class='btn btn-danger btn-small' data-toggle="modal" href="#removemeModal"><i class="icon-minus-sign icon-white"></i> Remove me</a></span>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal hide fade" id="aboutModal">
      <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Welcome to the Leaflet Users Map!</h3>
      </div>
      <div class="modal-body">
        <h3>Inspiration</h3>
          <p>This project was inspired by the <a href="http://users.qgis.org/community-map/view_users.html" target="_blank">Quantum GIS Community Map</a>.</p>
        <h3>Leaflet</h3>
          <p>
            Leaflet is a modern, lightweight open-source JavaScript library for interactive maps by <a href="http://cloudmade.com/" target="_blank">CloudMade</a>. It has an <a href="https://github.com/CloudMade/Leaflet/contributors" target="_blank">active</a> group of contributors, which has generated a loyal <a href="https://github.com/CloudMade/Leaflet/issues/400" target="_blank">user</a> base and a lot of buzz in the community.
            <ul>
              <li><a href="http://leaflet.cloudmade.com/" target="_blank">Leaflet Homepage</a></li>
              <li><a href="http://github.com/CloudMade/Leaflet" target="_blank">GitHub Repo</a></li>
              <li><a href="https://groups.google.com/forum/?fromgroups#!forum/leaflet-js" target="_blank">Official Leaflet Support Community</a></li>
              <li><a href="http://leaflet.uservoice.com/" target="_blank">Ideas & Suggestions for Leaflet</a></li>
            </ul>
          </p>
        <h3>Mapping Leaflet Users</h3>
          <p>Leaflet users... on a Leaflet map! Built using the following components:
            <ul>
              <li>User Interface: <a href="http://twitter.github.com/bootstrap/" target="_blank">Bootstrap, from Twitter</a></li>
              <li>Mapping: <a href="http://leaflet.cloudmade.com/" target="_blank">Leaflet</a></li>
              <li>Database: <a href="http://www.sqlite.org/" target="_blank">SQLite</a></li>
              <li>Scripting: <a href="http://www.php.net/" target="_blank">PHP</a> & <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a></li>
            </ul>
          </p>
        <h3>Don't Blame Me</h3>
          <p>This site was hacked together by <a href="http://bryanmcbride.com/" target="_blank">Bryan McBride</a> in March 2012. I have no formal training in any of this and have likely broken many coding standards and best practices. Feel free to report any issues over at my <a href="https://github.com/bmcbride/leaflet-users-map">GitHub Repo</a>. Built with:
            <ul>
              <li><a href="http://www.adminer.org/" target="_blank">Adminer Database Management Tools</a></li>
              <li><a href="http://code.google.com/chrome/devtools/docs/overview.html" target="_blank">Chrome Developer Tools</a></li>
              <li><a href="http://www.sublimetext.com/2" target="_blank">Sublime Text 2</a></li>
            </ul>
          </p>
      </div>
    </div>

    <div class="modal hide fade" id="contactModal">
      <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Contact Me!</h3>
      </div>
      <div class="modal-body">
        <p><strong>Email:</strong> mcbride(dot)bryan(at)gmail(dot)com</p>
        <p><strong>Twitter:</strong> <a href="https://twitter.com/#!/brymcbride">@brymcbride</a></p>
        <p><strong>Website</strong> <a href="http://bryanmcbride.com">bryanmcbride.com</a></p>
      </div>
    </div>

    <div class="modal hide fade" id="addmeModal">
      <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Add me to the map!</h3>
      </div>
      <div class="modal-body">
        <p>Click on the Go! button below to get started.</p>
        <p>Navigate to your desired location and click on the map to drop a marker and submit your information.</p>
      </div>
      <div class="modal-footer">
        <a href="#" onclick="$('#addmeModal').modal('hide'); initRegistration(); return false;"class="btn btn-primary">Go!</a>
      </div>
    </div>

    <div class="modal hide fade" id="insertSuccessModal">
      <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Success!</h3>
      </div>
      <div class="modal-body">
        <p>Thanks for joining the Leaflet Users Map!</p>
        <p>You should receive an email shortly with instructions on how to edit your information.</p>
      </div>
    </div>

    <div class="modal hide fade" id="removemeModal">
      <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Remove me</h3>
      </div>
      <div class="modal-body">
        <form class="well">
          <label>Email</label>
          <input type="text" class="span3" name="email_remove" id="email_remove">
          <label>Token</label>
          <input type="password" class="span3" name="token_remove" id="token_remove"><br>
          <button type="button" class="btn btn-primary" onclick="removeUser();">Submit</button>
        </form>
      </div>
    </div>

    <div class="modal hide fade" id="removeSuccessModal">
      <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>You have been removed</h3>
      </div>
      <div class="modal-body">
        <p>You have been removed from the Leaflet User Map.</p>
        <p>Thanks for your interest and feel free to add youself back at any time.</p>
      </div>
    </div>

    <div id="map"></div>
    <div id="loading-mask" class="modal-backdrop" style="display:none;"></div>
    <div id="loading" style="display:none;">
        <div class="loading-indicator">
            <img src="img/ajax-loader.gif">
        </div>
    </div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/leaflet/leaflet.js"></script>
    <script type="text/javascript" src="assets/leaflet/plugins/leaflet.markercluster/leaflet.markercluster.js"></script>

    <script type="text/javascript">
      var map, newUser, users, mapquest, firstLoad;

      firstLoad = true;

      //users = new L.FeatureGroup();
      users = new L.MarkerClusterGroup({spiderfyOnMaxZoom: true, showCoverageOnHover: false, zoomToBoundsOnClick: true});
      newUser = new L.LayerGroup();

      mapquest = new L.TileLayer("http://{s}.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png", {
        maxZoom: 18,
        subdomains: ["otile1", "otile2", "otile3", "otile4"],
        attribution: 'Basemap tiles courtesy of <a href="http://www.mapquest.com/" target="_blank">MapQuest</a> <img src="http://developer.mapquest.com/content/osm/mq_logo.png">. Map data (c) <a href="http://www.openstreetmap.org/" target="_blank">OpenStreetMap</a> contributors, CC-BY-SA.'
      });

      map = new L.Map('map', {
        center: new L.LatLng(39.90973623453719, -93.69140625),
        zoom: 3,
        layers: [mapquest, users, newUser]
      });

      // GeoLocation Control
      function geoLocate() {
        map.locate({setView: true, maxZoom: 17});
      }
      var geolocControl = new L.control({
        position: 'topright'
      });
      geolocControl.onAdd = function (map) {
        var div = L.DomUtil.create('div', 'leaflet-control-zoom leaflet-control');
        div.innerHTML = '<a class="leaflet-control-geoloc" href="#" onclick="geoLocate(); return false;" title="My location"></a>';
        return div;
      };
      
      map.addControl(geolocControl);
      map.addControl(new L.Control.Scale());

      //map.locate({setView: true, maxZoom: 3});

      $(document).ready(function() {
        $.ajaxSetup({cache:false});
        $('#map').css('height', ($(window).height() - 40));
        getUsers();
      });

      $(window).resize(function () {
        $('#map').css('height', ($(window).height() - 40));
      }).resize();

      function geoLocate() {
        map.locate({setView: true, maxZoom: 17});
      }

      function initRegistration() {
        map.addEventListener('click', onMapClick);
        $('#map').css('cursor', 'crosshair');
        return false;
      }

      function cancelRegistration() {
        newUser.clearLayers();
        $('#map').css('cursor', '');
        map.removeEventListener('click', onMapClick);
      }

      function getUsers() {
        $.getJSON("get_users.php", function (data) {
          for (var i = 0; i < data.length; i++) {
            var location = new L.LatLng(data[i].lat, data[i].lng);
            var name = data[i].name;
            var website = data[i].website;
            if (data[i].website.length > 7) {
              var title = "<div style='font-size: 18px; color: #0078A8;'><a href='"+ data[i].website +"' target='_blank'>"+ data[i].name + "</a></div>";
            }
            else {
              var title = "<div style='font-size: 18px; color: #0078A8;'>"+ data[i].name +"</div>";
            }
            if (data[i].city.length > 0) {
              var city = "<div style='font-size: 14px;'>"+ data[i].city +"</div>";
            }
            else {
              var city = "";
            }
            var marker = new L.Marker(location, {
              title: name
            });
            marker.bindPopup("<div style='text-align: center; margin-left: auto; margin-right: auto;'>"+ title + city +"</div>", {maxWidth: '400'});
            users.addLayer(marker);
          }
        }).complete(function() {
          if (firstLoad == true) {
            map.fitBounds(users.getBounds());
            firstLoad = false;
          };
        });
      }

      function insertUser() {
        $("#loading-mask").show();
        $("#loading").show();
        var name = $("#name").val();
        var email = $("#email").val();
        var website = $("#website").val();
        var city = $("#city").val();
        var lat = $("#lat").val();
        var lng = $("#lng").val();
        if (name.length == 0) {
          alert("Name is required!");
          return false;
        }
        if (email.length == 0) {
          alert("Email is required!");
          return false;
        }
        var dataString = 'name='+ name + '&email=' + email + '&website=' + website + '&city=' + city + '&lat=' + lat + '&lng=' + lng;
        $.ajax({
          type: "POST",
          url: "insert_user.php",
          data: dataString,
          success: function() {
            cancelRegistration();
            users.clearLayers();
            getUsers();
            $("#loading-mask").hide();
            $("#loading").hide();
            $('#insertSuccessModal').modal('show');
          }
        });
        return false;
      }

      function removeUser() {
        var email = $("#email_remove").val();
        var token = $("#token_remove").val();
        if (email.length == 0) {
          alert("Email is required!");
          return false;
        }
        if (token.length == 0) {
          alert("Token is required!");
          return false;
        }
        var dataString = 'email='+ email + '&token=' + token;
        $.ajax({
          type: "POST",
          url: "remove_user.php",
          data: dataString,
          success: function(data) {
            //console.log(data);
            if (data > 0) {
              $('#removemeModal').modal('hide');
              users.clearLayers();
              getUsers();
              $('#removeSuccessModal').modal('show');
            }
            else {
              alert("Incorrect email or token. Please try again.");
            }
          }
        });
        return false;
      }

      function onMapClick(e) {
        var markerLocation = new L.LatLng(e.latlng.lat, e.latlng.lng);
        var marker = new L.Marker(markerLocation);
        newUser.clearLayers();
        newUser.addLayer(marker);
        var form =  '<form id="inputform" enctype="multipart/form-data" class="well">'+
              '<label><strong>Name:</strong> <i>marker title</i></label>'+
              '<input type="text" class="span3" placeholder="Required" id="name" name="name" />'+
              '<label><strong>Email:</strong> <i>never shared</i></label>'+
              '<input type="text" class="span3" placeholder="Required" id="email" name="email" />'+
              '<label><strong>City:</strong></label>'+
              '<input type="text" class="span3" placeholder="Optional" id="city" name="city" />'+
              '<label><strong>Website:</strong></label>'+
              '<input type="text" class="span3" placeholder="Optional" id="website" name="website" value="http://" />'+
              '<input style="display: none;" type="text" id="lat" name="lat" value="'+e.latlng.lat.toFixed(6)+'" />'+
              '<input style="display: none;" type="text" id="lng" name="lng" value="'+e.latlng.lng.toFixed(6)+'" /><br><br>'+
              '<div class="row-fluid">'+
                '<div class="span6" style="text-align:center;"><button type="button" class="btn" onclick="cancelRegistration()">Cancel</button></div>'+
                '<div class="span6" style="text-align:center;"><button type="button" class="btn btn-primary" onclick="insertUser()">Submit</button></div>'+
              '</div>'+
              '</form>';
        marker.bindPopup(form).openPopup();
      }
    </script>

  </body>
</html>
