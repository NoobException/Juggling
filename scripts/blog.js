/*
    JS Handling the Blog page (index.php)
    
*/

var globalStyle;

//Stop space scrolling page
window.addEventListener('keydown', function(e) {
    if(e.keyCode == 32) {
      e.preventDefault();
    }
});

function togglePause(button, juggler) {
    juggler.togglePause(Date.now());
    if(juggler.paused) {
        button.innerHTML = '<i class="fas fa-play"></i>';
    }
    else {
        button.innerHTML = '<i class="fas fa-pause"></i>';
    }
}

//Load juggler intro given trickWrapper
function loadJuggler(trickWrapper) {
    let trickID = parseInt(trickWrapper.id);
    let canvas = trickWrapper.getElementsByClassName("mainCanvas")[0];

    var canvasWidth = globalStyle.getPropertyValue('--trick-width');
    var canvasHeight = globalStyle.getPropertyValue('--trick-height');
    
    canvas.width = canvasWidth.substr(0, canvasWidth.length - 2);
    canvas.height = canvasHeight.substr(0, canvasHeight.length - 2);

    let ctx = canvas.getContext("2d");

    let slider = trickWrapper.getElementsByClassName("anim-slider")[0];
    let button = trickWrapper.getElementsByClassName("anim-button")[0];

    let data = eval(trickWrapper.getElementsByClassName("trickData")[0].innerHTML);
    let time = Date.now();

    let juggler = new Juggler(data, time);
    setInterval(function(){
        let time = Date.now();
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        juggler.update(time);
        juggler.draw(ctx);

    }, 10);

    document.body.onkeyup = function(e){
        togglePause(button, juggler);
    }
    button.onclick = function(e){
        togglePause(button, juggler);
    }

    juggler.changeAnimSpeed(slider.value/1000.0, Date.now());
    slider.oninput = function(e){
        juggler.changeAnimSpeed(slider.value/1000.0, Date.now());
    }
}

function initBlogJugglers()
{
    globalStyle = getComputedStyle(document.body);
    let trickWrappers = document.getElementsByClassName("post-trick-wrapper");
    for(let i = 0; i < trickWrappers.length; i++) {
        loadJuggler(trickWrappers[i]);
    }
}