<footer class="footer">
    <div class="footer-content">
        <div id="map" class="map"></div>
        <div class="footer-section">
            <h3>Mentions légales</h3>
            <p><a href="#">Lire les mentions</a></p>
            <p><a href="#">© 2024 SolePied. Tous droits réservés.</a></p>
        </div>
        <div class="footer-section">
            <h3>Siège social :</h3>
            <p>Av. du Parc,<br>95000 Cergy,<br>France</p>
        </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfck7hjNcq0hP_kq_dXY80On8DPdpNOL4&callback=initMap" async defer></script>
    <script type="text/javascript">
        function initMap() {
            var cergyPontoise = { lat: 49.03510463134828, lng: 2.0698900761890275 };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: cergyPontoise
            });
            var marker = new google.maps.Marker({
                position: cergyPontoise,
                map: map
            });
        }
    </script>
</footer>
