<?php
// $Id: main.php,v 1.5 2007/06/11 09:40:37 mithyt2 Exp $
define("_PROFILE_MA_ERRORDURINGSAVE", "Fehler beim Speichern");
define('_PROFILE_MA_USERREG','User Registration');
define('_PROFILE_MA_NICKNAME','Username');
define('_PROFILE_MA_REALNAME', 'Echter Name');
define('_PROFILE_MA_EMAIL','Email');
define('_PROFILE_MA_ALLOWVIEWEMAIL','Erlaube anderen Nutzern meine Emailadresse zu sehen');
define('_PROFILE_MA_TIMEZONE','Zeitzone');
define('_PROFILE_MA_AVATAR','Avatar');
define('_PROFILE_MA_VERIFYPASS','Bestätige Passwort');
define('_PROFILE_MA_SUBMIT','Absenden');
define('_PROFILE_MA_USERNAME','Username');
define('_PROFILE_MA_FINISH','Fertig');
define('_PROFILE_MA_REGISTERNG','Konnte neuen User nicht registrieren.');
define('_PROFILE_MA_MAILOK','Wollen Sie den Administratoren und den Moderatoren erlauben, <br />Ihnen E-Mail-Nachrichten zu schicken ?');
define('_PROFILE_MA_DISCLAIMER','Haftungsausschluss');
define('_PROFILE_MA_IAGREE','Ich habe den Haftungsausschluß gelesen und stimme ihm zu.');
define('_PROFILE_MA_UNEEDAGREE', 'Entschuldigung, Sie müssen dem Haftungsausschluss zustimmen.');
define('_PROFILE_MA_NOREGISTER','Entschuldingung, es können im Moment keine neuen User registriert werden');
define("_PROFILE_MA_NOSTEPSAVAILABLE", "Keine Registrierungsschritte sind definiert");
define("_PROFILE_MA_REQUIRED", "Erforderlich");

// %s is username. This is a subject for email
define('_PROFILE_MA_USERKEYFOR','Useraktivierungsschlüssel für %s');
define('_PROFILE_MA_ACTLOGIN','Ihr Account wurde aktviert und Sie können sich nun mit Ihrem Login und dem Passwort einloggen');
define('_PROFILE_MA_ACTKEYNOT','Aktivierungsschlüssel ist falsch!');
define('_PROFILE_MA_ACONTACT','Der Account ist schon aktiviert!');

define('_PROFILE_MA_YOURREGISTERED','Sie sind nun registriert. Der Useraktivierungsschlüssel wurde an die angegebene Adresse geschickt. Bitte folgen Sie den Hinweisen in der E-Mail um Ihre Mitgliedschaft zu bestätigen. ');
define('_PROFILE_MA_YOURREGMAILNG','Sie sind nun registriert. Leider konnten wir durch einen internen Fehler keine Aktivierungs-E-Mails verschicken. Setzen Sie sich bitte mit dem Webmaster in Verbindung.');
define('_PROFILE_MA_YOURREGISTERED2','Sie sind nun registriert. Bitte warten Sie, bis Ihre Registrierung vom Administrator freigeschaltet wurde. Sie erhalten einmalig eine Bestätigungsmail, wenn es soweit ist. Dieser Vorgang kann unter Umständen etwas Zeit beanspruchen, bitte haben Sie Geduld.');

// %s is your site name
define('_PROFILE_MA_NEWUSERREGAT','Neuer User auf %s');
// %s is a username
define('_PROFILE_MA_HASJUSTREG','%s hat sich soeben registriert!');

define('_PROFILE_MA_INVALIDMAIL','FEHLER: Ungültige E-Mail-Adresse!');
define('_PROFILE_MA_EMAILNOSPACES','FEHLER: E-Mail-Addresse enthält Leerzeichen!');
define('_PROFILE_MA_INVALIDNICKNAME','FEHLER: Unzulässiger Spitzname!');
define("_PROFILE_MA_INVALIDDISPLAYNAME", "FEHLER: Unzulässiger Spitzname!");
define('_PROFILE_MA_NICKNAMETOOLONG','Spitzname ist zu lang! Er darf maximal %s Zeichen haben.');
define('_PROFILE_MA_DISPLAYNAMETOOLONG','Anzeigename ist zu lang! Er darf maximal %s Zeichen haben.');
define('_PROFILE_MA_NICKNAMETOOSHORT','Spitzname ist zu kurz! Er muss mindestens %s Zeichen haben.');
define('_PROFILE_MA_DISPLAYNAMETOOSHORT','Anzeigename ist zu kurz! Er muss mindestens %s Zeichen haben.');
define('_PROFILE_MA_NAMERESERVED','FEHLER: Dieser Username ist bereits reserviert!');
define('_PROFILE_MA_DISPLAYNAMERESERVED','FEHLER: Dieser Anzeigename ist bereits vergeben!');
define('_PROFILE_MA_NICKNAMENOSPACES','Der Username darf keine Leerzeichen enthalten!');
define('_PROFILE_MA_DISPLAYNAMENOSPACES','Der Anzeigename darf keine Leerzeichen enthalten!');
define('_PROFILE_MA_NICKNAMETAKEN','FEHLER: Dieser Username ist bereits vergeben!');
define('_PROFILE_MA_DISPLAYNAMETAKEN','FEHLER: Dieser Anzeigename ist bereits vergeben!');
define('_PROFILE_MA_EMAILTAKEN','FEHLER: Diese E-Mail-Adresse befindet sich bereits in unserer Datenbank!');
define('_PROFILE_MA_ENTERPWD','FEHLER: Sie müssen ein Passwort angeben!');
define('_PROFILE_MA_SORRYNOTFOUND','Keine entsprechenden Userinformationen gefunden!');
define("_PROFILE_MA_WRONGPASSWORD", "Fehler: Falsches Passwort!");
define("_PROFILE_MA_USERALREADYACTIVE", "Der Account mit dieser Email ist schon aktiviert!");

// %s is your site name
define('_PROFILE_MA_YOURACCOUNT', 'Ihr Konto auf %s');

// %s is a username
define('_PROFILE_MA_ACTVMAILNG', 'Fehler beim Versenden der Aktivierungs-E-Mail an %s');
define('_PROFILE_MA_ACTVMAILOK', 'Aktivierungs-E-Mail an %s verschickt.');

define("_PROFILE_MA_DEFAULT", "Basisinformation");

//%%%%%%		File Name userinfo.php 		%%%%%
define('_PROFILE_MA_SELECTNG','Kein User ausgewählt, bitte gehen Sie zurück und wählen erneut');
define('_PROFILE_MA_PM','PN');
define('_PROFILE_MA_EDITPROFILE','Bearbeite Profil');
define('_PROFILE_MA_LOGOUT','Logout');
define('_PROFILE_MA_INBOX','Eingang');
define('_PROFILE_MA_ALLABOUT','Alles über %s');
define('_PROFILE_MA_STATISTICS','Statistiken');
define('_PROFILE_MA_MYINFO','Meine Info');
define('_PROFILE_MA_BASICINFO','Basis Informationen');
define('_PROFILE_MA_MOREABOUT','Mehr über mich');
define('_PROFILE_MA_SHOWALL','Zeige alles');

//%%%%%%		File Name edituser.php 		%%%%%
define('_PROFILE_MA_PROFILE','Profil');
define('_PROFILE_MA_DISPLAYNAME','Anzeigename');
define('_PROFILE_MA_SHOWSIG','Ihre Signatur immer anzeigen');
define('_PROFILE_MA_CDISPLAYMODE','Kommentaransicht');
define('_PROFILE_MA_CSORTORDER','Reihenfolge der Kommentare:');
define('_PROFILE_MA_PASSWORD','Passwort');
define('_PROFILE_MA_TYPEPASSTWICE','(Geben Sie Ihr neues Passwort 2x mal ein um es zu ändern)');
define('_PROFILE_MA_SAVECHANGES','Änderungen sichern');
define('_PROFILE_MA_NOEDITRIGHT',"Verzeihung, Sie haben nicht die entsprechenden Zugriffsrechte zum ändern dieser Userinformation.");
define('_PROFILE_MA_PASSNOTSAME','Beide Kennwörter sind verschieden. Sie müssen identisch sein.');
define('_PROFILE_MA_PWDTOOSHORT','Das Passwort muss mindestens <b>%s</b> Zeichen lang sein.');
define("_PROFILE_MA_NOPASSWORD", "Bitte geben Sie ein Passwort an");
define('_PROFILE_MA_PROFUPDATED','Ihr Konto wurde aktualisiert!');
define('_PROFILE_MA_USECOOKIE','Soll Ihr Username für ein Jahr in einem Cookie gespeichert werden?');
define('_PROFILE_MA_NO','Nein');
define('_PROFILE_MA_DELACCOUNT','Lösche Account');
define('_PROFILE_MA_MYAVATAR', 'Mein Avatar');
define('_PROFILE_MA_UPLOADMYAVATAR', 'Lade Avatar hoch');
define('_PROFILE_MA_MAXPIXEL','max. Bildgröße');
define('_PROFILE_MA_MAXIMGSZ','max. Dateigröße');
define('_PROFILE_MA_SELFILE','Durchsuchen');
define('_PROFILE_MA_OLDDELETED','Ihr altes Avatarbild wird dann gelöscht!');
define('_PROFILE_MA_CHOOSEAVT', 'Wählen Sie einen Avatar aus der Liste!');

define('_PROFILE_MA_PRESSLOGIN', 'Klicken Sie auf den untenstehenden Button um sich einzuloggen');

define('_PROFILE_MA_ADMINNO', 'User in der Webmastergruppe können nicht entfernt werden');
define('_PROFILE_MA_GROUPS', 'Gruppe des Users');

define('_PROFILE_MA_NOPERMISS','Entschuldigung, Sie haben nicht die nötigen Rechte für diese Aktion!');
define('_PROFILE_MA_SURETODEL','Sind Sie sicher das Sie Ihren Account löschen wollen??');
define('_PROFILE_MA_REMOVEINFO','Das wird alle Ihre Informationen aus der Datenbank löschen.');
define('_PROFILE_MA_BEENDELED','Ihr Account wurde gelöscht.');

//changepass.php
define("_PROFILE_MA_CHANGEPASSWORD", "Ändere Passwort");
define("_PROFILE_MA_PASSWORDCHANGED", "Das Passwort wurde geändert");
define("_PROFILE_MA_OLDPASSWORD", "Aktuelles Passwort");
define("_PROFILE_MA_NEWPASSWORD", "Neues Passwort");

//search.php
define("_PROFILE_MA_SORTBY", "Sortiere nach");
define("_PROFILE_MA_ORDER", "Order");
define("_PROFILE_MA_PERPAGE", "User pro Seite");
define("_PROFILE_MA_LATERTHAN", "%s is later than");
define("_PROFILE_MA_EARLIERTHAN", "%s is earlier than");
define("_PROFILE_MA_LARGERTHAN", "%s ist größer als");
define("_PROFILE_MA_SMALLERTHAN", "%s ist kleiner als");

define("_PROFILE_MA_NOUSERSFOUND", "Keine User gefunden");
define("_PROFILE_MA_RESULTS", "Suchergebnisse");

//changemail.php
define("_PROFILE_MA_CHANGEMAIL", "Ändere Email");
define("_PROFILE_MA_NEWMAIL", "Neue Emailadresse");

define("_PROFILE_MA_NEWEMAILREQ", "New Email Address Request");
define("_PROFILE_MA_NEWMAILMSGSENT", "Der Emailaktivierungsschlüssel wurde an die angegebene Adresse geschickt. Bitte folgen Sie den Hinweisen in der E-Mail um Ihre Email zu bestätigen");
define("_PROFILE_MA_EMAILCHANGED", "Ihre Emailadresse wurde geändert");
define("_PROFILE_ERROR1", "Der Code ist falsch");

define("_PROFILE_MA_DEACTIVATE", "Deaktiviere");
define("_PROFILE_MA_ACTIVATE", "Aktiviere");
define("_PROFILE_MA_CONFCODEMISSING", "Bestätigungscode fehlt");
define("_PROFILE_MA_SITEDEFAULT", "Seitenstandard");


define("_PROFILE_MA_USERINFO","User profile");
define("_PROFILE_MA_REGISTER","Registration form");
?>