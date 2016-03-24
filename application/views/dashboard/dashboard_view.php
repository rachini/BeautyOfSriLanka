<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <title> Grab the beauty of Sri Lanka</title>
        <style type="text/css">
            html, body, #map {
                height: 100%;
                margin: 0;
                padding: 0;
            }
        </style>
    </head>
    <body>
        <div id="map"></div>

        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript">
            var element = document.getElementById("map");

            /*
            Build list of map types.
            You can also use var mapTypeIds = ["roadmap", "satellite", "hybrid", "terrain", "OSM"]
            but static lists sucks when google updates the default list of map types.
            */
            var mapTypeIds = [];
            for(var type in google.maps.MapTypeId) {
                mapTypeIds.push(google.maps.MapTypeId[type]);
            }
            mapTypeIds.push("OSM");

            var map = new google.maps.Map(element, {
                center: new google.maps.LatLng(48.1391265, 11.580186300000037),
                zoom: 11,
                mapTypeId: "OSM",
                mapTypeControlOptions: {
                    mapTypeIds: mapTypeIds
                }
            });

            map.mapTypes.set("OSM", new google.maps.ImageMapType({
                getTileUrl: function(coord, zoom) {
                    // See above example if you need smooth wrapping at 180th meridian
                    return "http://tile.openstreetmap.org/" + zoom + "/" + coord.x + "/" + coord.y + ".png";
                },
                tileSize: new google.maps.Size(256, 256),
                name: "OpenStreetMap",
                maxZoom: 18
            }));
        </script>
    </body>
    
    <div>

        <a href="http://www.facebook.com/sharer.php?u=http://localhost/VisualizeInYourWay-sliit/VisualizeInYourWay/index.php/share/share_controller/manage_share" role="button" onclick=" _gaq.push(['_trackSocial', 'facebook', 'send', 'http://localhost/VisualizeInYourWay-sliit/VisualizeInYourWay/index.php/share/share_controller/manage_share']);
                window.open(this.href, 'facebook', 'toolbar=0,status=0,width=480,height=420');
                return false;" title="Share this article in Facebook" class="btn btn-info"><i class="icon-facebook"></i> <span class="hidden-phone">Facebook</span></a>
        <a href="http://twitter.com/share?url=http://localhost/VisualizeInYourWay-sliit/VisualizeInYourWay/index.php/share/share_controller/manage_share" role="button" onclick="_gaq.push(['_trackSocial', 'twitter', 'tweet', 'http://localhost/VisualizeInYourWay-sliit/VisualizeInYourWay/index.php/share/share_controller/manage_share']);
                window.open(this.href, 'twitter', 'toolbar=0,status=0,width=480,height=360');
                return false;" title="Share this article in Twitter" class="btn btn-success"><i class="icon-twitter"></i> <span class="hidden-phone">Twitter</span></a>
        <a type="button" id="google+_btn" class="btn btn-danger" href="https://plus.google.com/share?url=http://localhost/VisualizeInYourWay-sliit/VisualizeInYourWay/index.php/share/share_controller/manage_share">Google+</a>
        
        <a<form> <input type="button" id="print_btn" value=" Print " class="btn btn-primary"
                     onclick="window.print();
                         return false;" /></form>
    </a>
   
    </div>
</html>