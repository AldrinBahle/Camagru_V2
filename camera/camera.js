//Global variables
var canvas = document.getElementById('canvas'),
context = canvas.getContext('2d'),
photo = document.getElementById('photo'),
video = document.querySelector('video');

(function() {
    navigator.getMedia = (navigator.getUserMedia || navigator.webkitGetUserMedia ||
        navigator.moGetUserMedia || navigator.msGetUserMedia);

    navigator.getMedia({
        video: true,
        audio: false
    }, function(stream){
        video.srcObject = stream;
        video.play();

    }, function(){
    });
    context.drawImage(video, 0, 0, 400, 300);
    photo.value = canvas.toDataURL('image/png');

    //upload pic to canvas
    document.getElementById('file').onchange = function(e) {
    var img = new Image();
    img.onload = draw;
    img.onerror = failed;
    img.src = URL.createObjectURL(this.files[0]);
};

function draw() {
    context.drawImage(this, 0, 0, 400, 300);
    photo.value = canvas.toDataURL('image/png');
};

function failed() {
    console.error("The file chosen could not be loaded as an image");
};
})();

//emojis
function insertEmo(id){
    var img = document.getElementById(id);
    context.drawImage(img, 0, 0, 400, 300);
    photo.value = canvas.toDataURL('image/png');
}

// clear canvas
function clearCanvas(){
    context.clearRect(0, 0, canvas.width, canvas.height);
    photo.value = "";
}

//capture image from video
function capture(){
    context.drawImage(video, 0, 0, 400, 300);
    photo.value = canvas.toDataURL('image/png');
};
