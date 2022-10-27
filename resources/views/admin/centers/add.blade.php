@extends('admin.layouts.app', ['page' => 'centers'])

@section('title', 'إضافة مركز جديد')
@push('styles')
<style>
     #map {
      height: 400px;
      margin: 0px;
      padding: 0px
    }
  </style> 
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">إضافة مركز جديد</h3>
            </div>

            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.centers.store') }}">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">اسم المركز</label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            required
                            placeholder="اسم المركز"
                            value="{{ old('name') }}"
                            id="name"
                        >
                    </div>
                    <div class="form-group">
                        <label for="address">موقع المركز</label>
                        <input type="text"
                            class="form-control"
                            name="address"
                            required
                            placeholder="موقع المركز"
                            value="{{ old('address') }}"
                            id="address"
                        >
                    </div>                  
                    <div class="form-group">
                        <label for="latitude">إحداثيات الطول</label>
                        <input type="number" class="form-control" name="latitude" required placeholder="إحداثيات الطول"
                            value="{{ old('latitude') }}" step="any" id="latitude">
                    </div>
                    
                    <div class="form-group">
                        <label for="longitude">إحداثيات العرض</label>
                        <input type="number" class="form-control" name="longitude" required placeholder="إحداثيات العرض"
                            value="{{ old('longitude') }}" step="any" id="longitude">
                    </div>                
                    <div id="latclicked"></div>
                    <div id="longclicked"></div>
                    <div hidden="true" id="latmoved"></div>
                    <div hidden="true" id="longmoved"></div>
                    <div style="padding:10px">
                        <div id="map"></div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">حفظ</button>

                    <a href="{{ route('admin.centers.index') }}" class="btn btn-default">
                        إلغاء
                    </a>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    var map;
    function initMap()
    {
        var latitude = 32.8872;
        var longitude = 13.1913; // YOUR LONGITUDE VALUE
        var myLatLng = {
            lat: latitude,
            lng: longitude
        };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 7,
            center: myLatLng
        });
        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: myLatLng
        });
        google.maps.event.addListener
        (marker, 'dragend', function(marker)
            {
                currentLatitude = this.getPosition().lat();
                currentLongitude = this.getPosition().lng();
                document.getElementById('latitude').setAttribute('value', currentLatitude);
                document.getElementById('longitude').setAttribute('value', currentLongitude);
            }
        );
    }
    function loadScript() {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?v=3' + 
        '&signed_in=true&callback=initMap';
        document.body.appendChild(script);
    }
    window.onload = loadScript;  
</script>
