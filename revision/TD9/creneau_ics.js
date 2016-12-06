var focus = false;

function memorisefocus(noeud, re) {
    focus = signaleErreur(noeud, re) ? false : noeud;
}

function redonnefocus() {
    if (focus) focus.focus();
    pas_question = false;
}
