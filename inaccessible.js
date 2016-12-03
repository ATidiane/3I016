function bouger(div) {
    l = Math.ceil(Math.random()*(window.innerWidth));
    h = Math.ceil(Math.random()*(window.innerHeight));
    div.style.left = l+"px";
    div.style.top = h+"px";
}

function merci(button) {
    alert("Merci d'avoir dit "+button.firstChild.data);
}
