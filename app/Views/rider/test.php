<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body onload="main()">
    <div class="video-wrap">
        <video playsinline autoplay id="video"></video>
    </div>
    <div class="controller">
        <button id="snap">Capture</button>
    </div>
    <canvas id="canvas" width="640" height="480"></canvas>
    <script>
        const video = document.querySelector('#video');
        const canvas = document.querySelector('#canvas');
        const snap = document.querySelector('#snap');

        let context = null;
        let videoContainer = null;
        let scaler = 0.6;
        let size = {
            x:0,
            y:0,
            width:0,
            height:0
        }

        const constraints = {
            audio: true,
            video: {
                width: 1280,
                height: 720
            }
        };

        function main() {
            context = canvas.getContext('2d');
            let promise = navigator.mediaDevices.getUserMedia({
                video: true
            })

            promise.then(function (signal) {
                video.srcObject = signal;
                video.play();
                video.onloadeddata = function() {
                    handleResize();
                    window.addEventListener('resize', handleResize);
                    // updateCanvas();
                }
            }).catch(function(err) {
                alert("Camera error: " + err)
            })
        }

        function handleResize() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;

            let resizer = scaler * Math.min(
                window.innerWidth/video.videoWidth,
                window.innerWidth/video.videoWidth
            );

            size.width = resizer*video.videoWidth;
            size.height = resizer*video.videoHeight;
            size.x = window.innerWidth/2-size.width/2;
            size.y = window.innerHeight/2-size.height/2;
        }

        function updateCanvas() {
            context.drawImage(
                video,
                size.x,
                size.y,
                size.width,
                size.height
            );

            window.requestAnimationFrame(updateCanvas);
        }

        // async function init() {
        //     try {
        //         const stream = await navigator.mediaDevices.getUserMedia(constraints);
        //         handleSuccess(stream);
        //     } catch (err) {
        //         console.log(err)
        //         // errorMsgElement.innerHTML = `navigator.getUserMedia.error:${e.toString()}`;
        //     }
        // }

        // function handleSuccess(stream) {
        //         window.stream = stream;
        //         video.srcObject = stream;
        // }

        // init();

        var contexts = canvas.getContext('2d');
        snap.addEventListener("click", function() {
            contexts.drawImage(video, 0,0,640, 480);
        })
    </script>
</body>
</html>