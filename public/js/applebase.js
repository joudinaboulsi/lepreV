function callMe() {
    document.getElementById("demo").style.display = 'block';

}

function callMe2() {
    document.getElementById("demoo").style.display = 'block';
    document.getElementById("demoo").style.marginTop = '100px';
}

function closed() {
    document.getElementById("demo").style.visibility = "hidden";
}

function closed2() {
    document.getElementById("demoo").style.visibility = "hidden";
}


function fading() {
    var increment = 0.045;
    var opacity = 0;
    var instance = window.setInterval(function() {
        document.getElementById('firstslide').style.opacity = opacity
        opacity = opacity + increment;
        if (opacity > 1) {
            window.clearInterval(instance);
        }
    }, 100)
}

fading();
