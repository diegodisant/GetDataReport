<?php

include('../vendor/autoload.php');
include("./GetDataPlugin.php");

echo "<h1>Redireccionador de noticias externo del Imparcial Oaxaca</h1>";
echo "<b> Redireccionando a tu noticia, unos momentos...</b>";

$data = new GetDataPlugin();

echo "<br>IP               ".$data->ip();
echo "<br>Operative System ".$data->os();
echo "<br>Browser          ".$data->browser();
echo "<br>Language         ".$data->language();
echo "<br>Architecture     ".$data->architecture();
echo "<br>Device           ".$data->device();
echo "<br>Country          ".$data->geo('country');
echo "<br>Region           ".$data->geo('region');
echo "<br>Continent        ".$data->geo('continent');
echo "<br>City             ".$data->geo('city');
echo "<br>Logitude         ".$data->geo('logitude');
echo "<br>Latitude         ".$data->geo('latitude');
echo "<br>Currency         ".$data->geo('currency');
echo "<br>Provetor         ".$data->provetor();
echo "<br>Agent            ".$data->agent();
echo "<br>Referer          ".$data->referer();
echo "<br>Date             ".$data->getdate();

