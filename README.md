#Geolocation 

<p>  Lo primero mas importante es el como capturamos la ubicacion gps del telefono</p>
<code>
                    lat = location.Latitude.ToString("G", CultureInfo.InvariantCulture);
                    lon = location.Longitude.ToString("G", CultureInfo.InvariantCulture);
                    App.latitud = lat;
                    App.longitud = lon;
</code>

<p>Lo segundo es calcular la distancia entre dos puntos, es indispensable tener el destino ya previamente y esto se puede hacer ya forma premeditada o dinamica solicitandolo en un formulario </p>

<h1>Ecuación Haversine</h1>

<table border="1">
        <tr>
            <td><img src="https://github.com/user-attachments/assets/ad909a80-6516-47ed-bc0d-989606b15ef7" alt="Ecuación Haversine 1" width="300"></td>
            <td style="background-color: white; "><img src="https://github.com/user-attachments/assets/e81a5c10-0fbb-4183-bc6c-78e21d671d92" alt="Ecuación Haversine 2" width="300"></td>
        </tr>
</table>
    
