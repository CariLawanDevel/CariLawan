<?php
session_start();

include "_config.php";

if(isset($_SESSION['id_member'])){
    $id_member = $_SESSION['id_member'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Website Cari Lawan</title>

    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <?php include '_header.php'; ?>

    <?php include '_banner.php'; ?>    

    <div class="container">

        <?php include '_kategori.php'; ?>

        <?php include '_latestevent.php'; ?>

        <?php include '_maps.php'; ?>

        <?php include '_closestevent.php'; ?>
        
    </div>

    <?php include '_footer.php'; ?>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        var customLabel = {
            futsal: {
                label: 'F'
            },
            jogging: {
                label: 'J'
            },
            voli: {
                label: 'V'
            },
            badminton: {
                label: 'B'
            }
        };

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: new google.maps.LatLng(-6.927353, 107.716890),
                zoom: 12
            });
            var infoWindow = new google.maps.InfoWindow;

            // Change this depending on the name of your PHP or XML file
            downloadUrl('_location.php', function(data) {
                var xml = data.responseXML;
                var markers = xml.documentElement.getElementsByTagName('marker');
                Array.prototype.forEach.call(markers, function(markerElem) {
                    var id = markerElem.getAttribute('id_lokasi');
                    var name = markerElem.getAttribute('nama_event');
                    var address = markerElem.getAttribute('alamat_lokasi');
                    var type = markerElem.getAttribute('kategori');
                    var point = new google.maps.LatLng(
                        parseFloat(markerElem.getAttribute('lat')),
                        parseFloat(markerElem.getAttribute('lng')));
                    var infowincontent = document.createElement('div');
                    var strong = document.createElement('strong');
                    strong.textContent = name
                    infowincontent.appendChild(strong);
                    infowincontent.appendChild(document.createElement('br'));
                    var text = document.createElement('text');
                    text.textContent = address
                    infowincontent.appendChild(text);
                    var icon = customLabel[type] || {};
                    var marker = new google.maps.Marker({
                        map: map,
                        position: point,
                        label: icon.label
                    });
                    marker.addListener('click', function() {
                        infoWindow.setContent(infowincontent);
                        infoWindow.open(map, marker);
                    });
                });
            });
        }

        function downloadUrl(url, callback) {
            var request = window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest;

        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }

    function doNothing() {}

    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ&callback=initMap"></script>
    <!-- <script src="js/custom.js"></script> -->

</body>
</html>