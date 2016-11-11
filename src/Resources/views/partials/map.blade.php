<style>
    #gmap_canvas img{max-width:none!important;background:none!important}
</style>
<div class="row">
    <div class="container">
        <div class="col-md-12">
            <div class="mapa">
                <div class="main-title block">
                    <h1 class="inner centered">Find Us</h1>
                </div>
                <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAWKTse0oVjfdQXJlA_VwrcFRsACAZHfUM'></script>
                <div style='overflow:hidden;height:440px;width:100%;'>
                    <div id='gmap_canvas' style='height:440px;width:100%;'>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<script type='text/javascript'>
    var lat = "{{$product->maps['latitude']}}";
    var long ="{{$product->maps['longitude']}}";
    var title ="{{$product->maps['description']}}";
    console.log(lat);
    function init_map()
    {
        var myOptions = {zoom:10,center:new google.maps.LatLng(lat,long),mapTypeId: google.maps.MapTypeId.ROADMAP};
        map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
        marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(lat,long)});
        infowindow = new google.maps.InfoWindow({content:'<strong>'+title+'</strong>'});
        google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});
        infowindow.open(map,marker);
    }
    google.maps.event.addDomListener(window, 'load', init_map);
</script>
