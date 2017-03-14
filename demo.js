function _onload()
{
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "demo.php?func=_onload", true);
    xhttp.send();
}

function _onerror()
{
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "demo.php?func=_onerror", true);
    xhttp.send();
}

function _ontimeout()
{
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "demo.php?func=_ontimeout", true);
    xhttp.send();
}

window.onload = function() {
    e = document.getElementById('detector')
    e.onload = function() { _onload(); };
    e.onerror = function() { _onerror(); };
    e.src = e.getAttribute("data")
    setTimeout(function() { _ontimeout(); }, 10000)
}

