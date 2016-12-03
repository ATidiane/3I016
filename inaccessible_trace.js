function ajax(url, flux, rappel, method) {
        var r = window.XMLHttpRequest ? new XMLHttpRequest() :
            (window.ActiveXObject ?  new ActiveXObject("Microsoft.XMLHTTP") : '');
        if (!r) return false;
        r.onreadystatechange = function () {rappel(r);}
        r.open(method ? method : 'GET', url, true);
        if (flux)
            r.setRequestHeader("Content-Type", 
                               "application/x-www-form-urlencoded; ");
        r.send(flux);
        return true;
    }

function bouger(div) {
    ajax("inaccessible.php?left="+div.style.left+"&top="+div.style.top,'',function (xhr){},'GET');
    
    l = Math.ceil(Math.random()*(window.innerWidth));
    h = Math.ceil(Math.random()*(window.innerHeight));
    div.style.left = l+"px";
    div.style.top = h+"px";
}

function rep (xhr) {
    if (xhr.readyState != 4) {return;}
    if (xhr.status != 200) {
        alert('Retour en Erreur'+xhr.status);
    }
    alert(xhr.responseText);
}

function merci(button) {
    alert("Merci d'avoir dit "+button.firstChild.data);
    ajax("inaccessible.php",'',rep,'GET');
    
}
