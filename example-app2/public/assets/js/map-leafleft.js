$(function() {
	'use strict';
	
	// Leftlet Maps
	var map = L.map('leaflet1').setView([51.505, -0.09], 13);
	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; مشارکت کنندگان<a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> '
	}).addTo(map);

	
	// Adding a Popup
	var map = L.map('leaflet2').setView([51.505, -0.09], 13);
	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; مشارکت کنندگان <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> '
	}).addTo(map);
	L.marker([51.5, -0.09]).addTo(map)
		.bindPopup('یه پاپ آپ خوشگل<br> کاملاً شخصی سازی شده.')
		.openPopup();

	
	// Adding a Circle
	var map = L.map('leaflet3').setView([51.505, -0.09], 13);
	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; مشارکت کنندگان <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> '
	}).addTo(map);
	L.circle([51.508, -0.11], {
		color: 'red',
		fillColor: '#f03',
		fillOpacity: 0.5,
		radius: 500
	}).addTo(map);
	
});