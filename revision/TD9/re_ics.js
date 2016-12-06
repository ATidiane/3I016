var re_jour = /^ *[0-9]{4}[0-1][0-9][0-3][0-9] *$/;

var re_heure = /^ *[0-2][0-9][0-5][0-9][0-5][0-9] *$/;

var re_ics = new RegExp('^ */?([\\w]+\/)*[\\w]+[.]ics *$');

var re_mail = '[A-Z]\\w*';
re_mail = re_mail + "(-" + re_mail + ")*";
re_mail = re_mail + "[.]" + re_mail + "@\\w+([.]\\w+)*";
re_mail = new RegExp("^(" + re_mail + "|[^<]*<" + re_mail + ">)$");
