<?php
/*
   Coder  : [f][t][@inbox.ru] \ RedToor 
   Project: https://github.com/RedToor/GetDataReport
   Date   : 17/03/2016
   Version: 1.0.1 
  
   GetDataReport PLUGIN version : JSON Output   
*/

error_reporting(0);       
error_log(0);            

function OS(){
    $system="unknow";                
    $os=array(
        '/Windows NT 10.0/i'    =>  'Windows 10'            , '/windows nt 6.4/i'     =>  'Windows 10'   , '/windows nt 6.3/i'     =>  'Windows 8.1',
        '/windows nt 6.2/i'     =>  'Windows 8'             , '/windows nt 6.1/i'     =>  'Windows 7'    , '/windows nt 6.0/i'     =>  'Windows Vista',
        '/windows nt 5.2/i'     =>  'Windows Server 2003/XP', '/windows nt 5.1/i'     =>  'Windows XP'   , '/windows me/i'         =>  'Windows ME',
        '/windows nt 5.0/i'     =>  'Windows 2000'          , '/win98/i'              =>  'Windows 98'   , '/win95/i'              =>  'Windows 95',
        '/windows nt 4.0/i'     =>  'Windows NT 4.0'        , '/windows nt 3.51/i'    =>  'Windows NT 3.51', '/windows nt 3.5/i'   =>  'Windows NT 3.5',
        '/windows nt 3.1/i'     =>  'Windows NT 3.1'        , '/windows nt 3.11/i'    =>  'Windows 3.11' ,  '/linux/i'             =>  'Linux',
        '/android/i'            =>  'Android'               , '/android 1.6/i'        =>  'Android 1.6'  , '/android 2.0/i'        =>  'Android 2.0',
        '/android 2.0.1/i'      =>  'Android 2.0.1'         , '/android 2.1/i'        =>  'Android 2.1' , '/android 2.2/i'         =>  'Android 2.2',
        '/android 2.2.1/i'      =>  'Android 2.2.1'         , '/android 2.2.2/i'      =>  'Android 2.2.2', '/android 2.2.3/i'      =>  'Android 2.2.3',
        '/android 2.2.4/i'      =>  'Android 2.2.4'         , '/android 2.3/i'        =>  'Android 2.3', '/android 2.3.0/i'        =>  'Android 2.0.3',
        '/android 2.3.1/i'      =>  'Android 2.3.1'         , '/android 2.3.3/i'      =>  'Android 2.3.3', '/android 2.3.4/i'      =>  'Android 2.3.4',
        '/android 2.3.5/i'      =>  'Android 2.3.5'         , '/android 2.3.6/i'      =>  'Android 2.3.6', '/android 2.3.7/i'      =>  'Android 2.3.7',
        '/android 3.0/i'        =>  'Android 3.0'           , '/android 3.1/i'        =>  'Android 3.1', '/android 3.2/i'          =>  'Android 3.1',
        '/android 3.2.1/i'      =>  'Android 3.2.1'         , '/android 3.2.2/i'      =>  'Android 3.2.2', '/android 3.2.3/i'      =>  'Android 3.2.3',
        '/android 3.2.4/i'      =>  'Android 3.2.4'         , '/android 4.0/i'        =>  'Android 4.0', '/android 4.0.0/i'        =>  'Android 4.0.0',
        '/android 4.0.1/i'      =>  'Android 4.0.1'         , '/android 4.0.2/i'      =>  'Android 4.0.2', '/android 4.0.3/i'      =>  'Android 4.0.3',
        '/android 4.0.4/i'      =>  'Android 4.0.4'         , '/android 4.2.1/i'      =>  'Android 4.2.1', '/android 4.2.2/i'      =>  'Android 4.2.2',
        '/android 4.3/i'        =>  'Android 4.3'           , '/android 4.4/i'        =>  'Android 4.4', '/android 4.4.1/i'        =>  'Android 4.4.1',
        '/android 4.4.2/i'      =>  'Android 4.4.2'         , '/android 4.4.3/i'      =>  'Android 4.4.3', '/android 4.4.4/i'      =>  'Android 4.4.4',
        '/android 5.0/i'        =>  'Android 5.0'           , '/macintosh|mac os x/i' =>  'Mac OS X', '/mac_powerpc/i'             =>  'Mac OS 9',
        '/ubuntu/i'             =>  'Ubuntu'                , '/SymbianOS/i'          =>  'SymbianOS', '/iphone/i'                 =>  'iPhone',
        '/ipod/i'               =>  'iPod'                  , '/ipad/i'               =>  'iPad', '/tablet os/i'                   =>  'Table OS',
        '/blackberry/i'         =>  'BlackBerry'            , '/bb/i'                 =>  'BlackBerry', '/webos/i'                 =>  'Mobile');
        foreach($os as $regex => $value){if(preg_match($regex, $_SERVER['HTTP_USER_AGENT'])){$system=$value;}}return $system;}

function browser(){
    $navegator="unknow";
    $browser=array(
        '/msie/i'       =>  'Internet Explorer','/firefox/i'    =>  'Firefox'  , '/safari/i'     =>  'Safari',
        '/chrome/i'     =>  'Chrome'           ,'/opera/i'      =>  'Opera'    , '/netscape/i'   =>  'Netscape',
        '/maxthon/i'    =>  'Maxthon'          ,'/BrowserNG/i'  =>  'BrowserNG', '/konqueror/i'  =>  'Konqueror',
        '/ie/i'         =>  'Internet Explorer','/mobile/i'     =>  'Handheld Browser');            
        foreach($browser as $regex => $value){if(preg_match($regex, $_SERVER['HTTP_USER_AGENT'])){$navegator=$value;}}return $navegator;}

function architecture(){
    $arqui="32Bits";
    $architecture=array(
        '/x86_64/i'     => '64Bits', '/amd64/i'     => '64Bits',
        '/x86-64/i'     => '64Bits', '/x64_64/i'    => '64Bits',
        '/x64/i'        => '64Bits', '/WOW64/i'     => '64Bits');
        foreach($architecture as $regex => $value){if(preg_match($regex, $_SERVER['HTTP_USER_AGENT'])){$arqui=$value;}}return $arqui;}

function device($unix){
    $device="Computer";
    $unix=strtoupper($unix);
    if(strstr($unix,     'ANDROID')==true)    {$device="Phono";}
    elseif(strstr($unix, 'IPHONE')==true)     {$device="Phono";}
    elseif(strstr($unix, 'BLACKBERRY')==true) {$device="Phono";}
    elseif(strstr($unix, 'WEBOS')==true)      {$device="Phono";}
    elseif(strstr($unix, 'SYMBIAOS')==true)   {$device="Phono";}
    elseif(strstr($unix, 'TABLET')==true)     {$device="Tablet";}
    elseif(strstr($unix, 'IPAD')==true)       {$device="Tablet";}
    elseif(strstr($unix, 'IPOD')==true)       {$device="Portable media players ";}return $device;}

function geo(){
    $g=unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR'].''));
    $data= 'COUNTRY:"'.$g['geoplugin_countryName'].'"';
    $data.=',REGION:"'.$g['geoplugin_region'].'"';
    $data.=',CITY:"'.$g['geoplugin_city'].'"';
    $data.=',LOGITUDE_no_exact:"'.$g['geoplugin_longitude'].'"';
    $data.=',LATITUDE_no_exact:"'.$g['geoplugin_latitude'].'"';
    return $data;
}


function java(){
    echo '
        <script type="text/javascript">
            if(navigator.javaEnabled()==true){JAVA=true}else{JAVA=false}
            if(navigator.cookieEnabled==true){COOKIE=true}else{COOKIE=false}
            document.write("{getdatareport:{JAVA:\""+JAVA+"\",");
            document.write("COOKIE:\""+COOKIE+"\",");
            document.write("HEIGHT:\""+window.screen.height+"\",");
            document.write("WIDTH:\""+window.screen.width+"\",");
        </script>';
}
java();
print   'IP:"'.$_SERVER['REMOTE_ADDR'].'",OS:"'.OS().'",BROWSER:"'.browser().'",
        ARCHITECTURE:"'.architecture().'",DEVICE:"'.device().'",LANGUAGE:"'.$_SERVER['HTTP_ACCEPT_LANGUAGE'].'", PROVETOR:"'.gethostbyaddr($_SERVER['REMOTE_ADDR']).'",
        AGENT:"'.$_SERVER['HTTP_USER_AGENT']. '",'.geo().',REFERER:"'.$_SERVER['HTTP_REFERER'].'",DATE:"'.date("Y/m/d").'",HOUR:"'.date("g;ia").'"}}'

?>