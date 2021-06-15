<!DOCTYPE html>

<html>

<head>

  <title>JQuery HTML5 QR Code Scanner using Instascan JS Example - ItSolutionStuff.com</title>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta name="apple-mobile-web-app-capable" content="yes">

  <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>


</head>

<body>

  <center>
    <h1>QR Code Scanner</h1>
    <video width="20%" id="preview"></video>
  </center>
  <script type="text/javascript">
    let scanner = new Instascan.Scanner({
      video: document.getElementById('preview')
    });

    scanner.addListener('scan', function(content) {

      $.get("../engine.php", {
        checkqr: content,
      }, function(data) {
        if (data == "in") {
          console.log("DATA OK")
          $.get("../engine.php", {
            change: 1,
          })
          alert("Welcome")
        }else if(data == "out"){
          console.log("DATA OK")
          $.get("../engine.php", {
            change: 1,
          })
          alert("Goodbye")
        } else {
          console.log("NO DATA")
          console.log(data)
        }
      })

    });

    Instascan.Camera.getCameras().then(function(cameras) {

      if (cameras.length > 0) {

        scanner.start(cameras[0]);

      } else {

        console.error('No cameras found.');

      }

    }).catch(function(e) {

      console.error(e);

    });
  </script>



</body>

</html>