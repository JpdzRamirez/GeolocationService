using CommunityToolkit.Mvvm.Messaging;
using Microsoft.Maui.Controls.Maps;
using Microsoft.Maui.Maps;
using Newtonsoft.Json;
using MobileMaui.Modal;
using MobileMaui.Model;
using System.Text;

namespace MobileMaui;

public partial class MapaServicio : ContentPage
{
    private async void Btnfin_Clicked(object sender, EventArgs e)
        {
                    btnfin.IsEnabled = false;
                    string lat, lon;
                    lat = location.Latitude.ToString("G", CultureInfo.InvariantCulture);
                    lon = location.Longitude.ToString("G", CultureInfo.InvariantCulture);
                    App.latitud = lat;
                    App.longitud = lon;
                    var content = new FormUrlEncodedContent(new[]
                    {
                        new KeyValuePair<string, string>("idservicio", servicio.id.ToString()),
                        new KeyValuePair<string, string>("idtaxista", servicio.cuentasc_id),
                        new KeyValuePair<string, string>("app", "aplicacion"),
                        new KeyValuePair<string, string>("latitud", lat),
                        new KeyValuePair<string, string>("longitud", lon),
                    });
                    var response = await clientehttp.PostAsync(App.url + "aplicaciones/geolocation/validarDistancia", content);  
        }
}