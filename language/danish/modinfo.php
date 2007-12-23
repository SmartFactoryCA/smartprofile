<?php
define("_PROFILE_MI_NAME", "Brugerprofiler");
define("_PROFILE_MI_DESC", "Modul til at styre brugere og bruger-felter");

//Main menu links
define("_PROFILE_MI_EDITACCOUNT", "Rediger Konto");
define("_PROFILE_MI_CHANGEPASS", "Skift Password");
define("_PROFILE_MI_CHANGEMAIL", "Skift Email");

//Admin links
define("_PROFILE_MI_INDEX", "Forside");
define("_PROFILE_MI_CATEGORIES", "Kategorier");
define("_PROFILE_MI_FIELDS", "Felter");
define("_PROFILE_MI_USERS", "Brugere");
define("_PROFILE_MI_STEPS", "Registrerings trin");
define("_PROFILE_MI_PERMISSIONS", "Permissions");

//User Profile Category
define("_PROFILE_MI_CATEGORY_TITLE", "Brugerprofil");
define("_PROFILE_MI_CATEGORY_DESC", "Til brugerfelter");

//User Profile Fields
define("_PROFILE_MI_AIM_TITLE", "AIM");
define("_PROFILE_MI_AIM_DESCRIPTION", "America Online Instant Messenger Klient ID");
define("_PROFILE_MI_ICQ_TITLE", "ICQ");
define("_PROFILE_MI_ICQ_DESCRIPTION", "ICQ Instant Messenger ID");
define("_PROFILE_MI_YIM_TITLE", "YIM");
define("_PROFILE_MI_YIM_DESCRIPTION", "Yahoo! Instant Messenger ID");
define("_PROFILE_MI_MSN_TITLE", "MSN");
define("_PROFILE_MI_MSN_DESCRIPTION", "Microsoft Messenger ID");
define("_PROFILE_MI_FROM_TITLE", "Fra");
define("_PROFILE_MI_FROM_DESCRIPTION", "");
define("_PROFILE_MI_SIG_TITLE", "Signatur");
define("_PROFILE_MI_SIG_DESCRIPTION", "Her kan du skrive en signatur til brug i forum indlæg, kommentarer mm.");
define("_PROFILE_MI_VIEWEMAIL_TITLE", "Tillad andre at se min email adresse");
define("_PROFILE_MI_BIO_TITLE", "Ekstra Info");
define("_PROFILE_MI_BIO_DESCRIPTION", "");
define("_PROFILE_MI_INTEREST_TITLE", "Interesser");
define("_PROFILE_MI_INTEREST_DESCRIPTION", "");
define("_PROFILE_MI_OCCUPATION_TITLE", "Beskæftigelse");
define("_PROFILE_MI_OCCUPATION_DESCRIPTION", "");
define("_PROFILE_MI_URL_TITLE", "Website");
define("_PROFILE_MI_URL_DESCRIPTION", "");
define("_PROFILE_MI_NEWEMAIL_TITLE", "Ny Email");
define("_PROFILE_MI_NEWEMAIL_DESCRIPTION", "Variabel til at lagre en ønsket ny email adresse indtil bekræftelse kommer via en mail. Se changemail.php");

//Configuration categories
define("_PROFILE_MI_CAT_SETTINGS", "Generelle Indstillinger");
define("_PROFILE_MI_CAT_SETTINGS_DSC", "");
define("_PROFILE_MI_CAT_USER", "Bruger Indstillinger");
define("_PROFILE_MI_CAT_USER_DSC", "");

//Configuration items
define("_PROFILE_MI_PROFILE_SEARCH", "Vis seneste indhold fra brugeren på brugerens profil?");
define("_PROFILE_MI_MAX_UNAME", "Maks. Længde af Brugernavn");
define("_PROFILE_MI_MAX_UNAME_DESC", "Maksimum antal karakterer, et brugernavn må have");
define("_PROFILE_MI_MIN_UNAME", "Min. Længde af Brugernavn");
define("_PROFILE_MI_MIN_UNAME_DESC", "Minimum antal karakterer, et brugernavn kan have");
define("_PROFILE_MI_DISPLAY_DISCLAIMER", "Vis Ansvarsfrasigelse");
define("_PROFILE_MI_DISPLAY_DISCLAIMER_DESC", "Hvis ja vil en ansvarsfrasigelse være på registrerings formularen");
define("_PROFILE_MI_DISCLAIMER", "Ansvarsfrasigelse Tekst");
define("_PROFILE_MI_DISCLAIMER_DESC", "");
define("_PROFILE_MI_BAD_UNAMES", "Skriv navne, som ikke må kunne vælges som brugernavn");
define("_PROFILE_MI_BAD_UNAMES_DESC", "Adskil hvert navn med <b>|</b>, case insensitive, regular expressions tilladt.");
define("_PROFILE_MI_BAD_EMAILS", "Skriv emails, som ikke må kunne vælges");
define("_PROFILE_MI_BAD_EMAILS_DESC", "Adskil hvert navn med <b>|</b>, case insensitive, regular expressions tilladt.");
define("_PROFILE_MI_MINPASS", "Minimum password længde");
define("_PROFILE_MI_NEWUNOTIFY", "Send email, når en ny bruger registrerer sig?");
define("_PROFILE_MI_NOTIFYTO", "Vælg gruppe, som adviseringer om nye registreringer bliver sendt til");
define("_PROFILE_MI_ACTVTYPE", "Vælg aktiverings type for nye registreringer");
define("_PROFILE_MI_USERACTV","Aktivering af bruger");
define("_PROFILE_MI_AUTOACTV","Aktiver automatisk");
define("_PROFILE_MI_ADMINACTV","Aktivering af administratorer");
define("_PROFILE_MI_ACTVGROUP", "Vælg gruppe, som aktiverings email sendes til");
define("_PROFILE_MI_ACTVGROUP_DESC", "Bruges kun, når 'Aktivering af administratorer' vælges");
define("_PROFILE_MI_UNAMELVL","Vælg niveau for brugernavn filtrering");
define("_PROFILE_MI_STRICT","Striks (kun bogstaver og tal)");
define("_PROFILE_MI_MEDIUM","Mellem");
define("_PROFILE_MI_LIGHT","Let");
define("_PROFILE_MI_ALLOWREG", "Tillad nye brugerregistreringer?");
define("_PROFILE_MI_ALLOWREG_DESC", "");
define("_PROFILE_MI_SELFDELETE", "Tillad brugere at slette deres egen konto?");
define("_PROFILE_MI_SELFDELETE_DESC", "");
define("_PROFILE_MI_ALLOWCHGMAIL", "Tillad brugere at skifte email adresse?");
define("_PROFILE_MI_ALLOWCHGMAIL_DESC", "");
define("_PROFILE_MI_SHOWEMPTY", "Vis tomme felter");
define("_PROFILE_MI_SHOWEMPTY_DESC", "Hvis sat til 'nej' vil felter uden værdi ikke blive vist på brugerprofiler");

//Pages
define("_PROFILE_MI_PAGE_INFO", "Bruger Profil");
define("_PROFILE_MI_PAGE_EDIT", "Rediger Bruger");
define("_PROFILE_MI_PAGE_SEARCH", "Søg");
?>