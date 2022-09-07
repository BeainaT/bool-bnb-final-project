<template>
    <div class="map">
        <div id="map-div"></div>
    </div>    
</template>

<script>
export default {
    name: 'MappComponent',

    created(){
        const API_KEY = 'Gtj5RKWvcq5LP9DUEi2JeewGgSDNceEA';
        const APPLICATION_NAME = 'My Application';
        const APPLICATION_VERSION = '1.0';

        const view_house = {lng: $house.longitude, lat: $house.latitude};
 
        var map = tt.map({
        key: API_KEY,
        container: 'map-div',
        center: view_house,
        zoom: 15
        });
        var marker = new tt.Marker().setLngLat(test_house).addTo(map);
        // pop up nome casa 
        var popupOffsets = {
        top: [0, 0],
        bottom: [0, -70],
        'bottom-right': [0, -70],
        'bottom-left': [0, -70],
        left: [25, -35],
        right: [-25, -35]
        }

        var popup = new tt.Popup({offset: popupOffsets}).setHTML(`${house.name},${house.address}`);
        marker.setPopup(popup).togglePopup();
    }
}
</script>

<style scoped>
        body, html { margin: 0; padding: 0; }
        #map-div { width: 100% }
      
</style>