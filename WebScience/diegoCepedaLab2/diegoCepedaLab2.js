
var BASE_URL = "http://api.openweathermap.org/data/2.5/weather?";
var UrlParams = "&units=imperial&type=accurate&mode=json";
// forecast URL
var Forecast_URL = "http://api.openweathermap.org/data/2.5/forecast/daily?";
var ForeCast_Params = "&cnt=5&units=imperial&type=accurate&mode=json&appid=9a9f08806342101a9c49d3efcd419e99";
// Image base URL
var IMG_URL = "http://openweathermap.org/img/w/";

/* Initial function call to determine the user location using GeoLocation API */
function getLocation() {
	if (navigator.geolocation) {
		var timeoutVal = 10 * 1000 * 1000;
		navigator.geolocation.getCurrentPosition(getCurrentWeatherData,
				displayError, {
					enableHighAccuracy : true,
					timeout : timeoutVal,
					maximumAge : 0
				});
	} else {
		alert("Geolocation is not supported by this browser");
	}
}
// get the Current Weather for User location
function getCurrentWeatherData(position) {
	// Build the OpenAPI URL for current Weather
	var WeatherNowAPIurl = BASE_URL + "lat=" + position.coords.latitude
			+ "&lon=" + position.coords.longitude + UrlParams;
	var WeatherForecast_url = Forecast_URL + "lat=" + position.coords.latitude
			+ "&lon=" + position.coords.longitude + ForeCast_Params;
	// OpenWeather API call for Current Weather
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var JSONobj = JSON.parse(xmlhttp.responseText);
			Parse(JSONobj);
		}
	}
	xmlhttp.open("GET", WeatherNowAPIurl, true);
	xmlhttp.send();

	// OpenWeather API call for Forecast Weather
	var xmlhr = new XMLHttpRequest();
	xmlhr.onreadystatechange = function() {
		if (xmlhr.readyState == 4 && xmlhr.status == 200) {
			var JSobj = JSON.parse(xmlhr.responseText);
			Forecast(JSobj);
		}
	}
	xmlhr.open("GET", WeatherForecast_url, true);
	xmlhr.send();

}
// Error Handler
function displayError(error) {
	var errors = {
		1 : 'Permission denied',
		2 : 'Position unavailable',
		3 : 'Request timeout'
	};
	alert("Error: " + errors[error.code]);
}

var currentTemp
var sky
// display forecasts for next 5 Days
function Forecast(obj) {
	
	currentTemp = ((obj.list[0].temp.min + obj.list[0].temp.max)/2).toFixed(1);
	sky = obj.list[0].weather[0].description;
	
	document.getElementById("currDiv").innerHTML = "<h2>It is " + currentTemp + "&deg;F and outside: " + sky + "</h2>";
	document.getElementById("thermo").innerHTML = currentTemp + "&deg;F";
	document.getElementById("thermo").style.background = "-webkit-linear-gradient(top, #fff 0%, #fff "+ (100-currentTemp)+"%, #db3f02 "+(100-currentTemp)+"%, #db3f02 100%)";
	
	document.getElementById("day1div").innerHTML = "<img src='" + IMG_URL
			+ obj.list[0].weather[0].icon + ".png'> " + "<br>Min Temp:"
			+ obj.list[0].temp.min + " F<br>" + "Max Temp:"
			+ obj.list[0].temp.max + " F<br>" + "Weather :"
			+ obj.list[0].weather[0].description + "<br>" + "Cloudiness:"
			+ obj.list[0].clouds + " %<br>" + "Wind:" + obj.list[0].speed
			+ " mph <br>";

	document.getElementById("day2div").innerHTML = "<img src='" + IMG_URL
			+ obj.list[1].weather[0].icon + ".png'> " + "<br> Min Temp:"
			+ obj.list[1].temp.min + " F<br>" + "Max Temp:"
			+ obj.list[1].temp.max + " F<br>" + "Weather :"
			+ obj.list[1].weather[0].description + "<br>" + "Cloudiness:"
			+ obj.list[1].clouds + " %<br>" + "Wind:" + obj.list[1].speed
			+ " mph <br>";
	document.getElementById("day3div").innerHTML = "<img src='" + IMG_URL
			+ obj.list[2].weather[0].icon + ".png'> " + "<br>Min Temp:"
			+ obj.list[2].temp.min + " F<br>" + "Max Temp:"
			+ obj.list[2].temp.max + " F<br>" + "Weather :"
			+ obj.list[2].weather[0].description + "<br>" + "Cloudiness:"
			+ obj.list[2].clouds + " %<br>" + "Wind:" + obj.list[2].speed
			+ " mph <br>";
	document.getElementById("day4div").innerHTML = "<img src='" + IMG_URL
			+ obj.list[3].weather[0].icon + ".png'> " + "<br>Min Temp:"
			+ obj.list[3].temp.min + " F<br>" + "Max Temp:"
			+ obj.list[3].temp.max + " F<br>" + "Weather :"
			+ obj.list[3].weather[0].description + "<br>" + "Cloudiness:"
			+ obj.list[3].clouds + " %<br>" + "Wind:" + obj.list[3].speed
			+ " mph <br>";
	document.getElementById("day5div").innerHTML = "<img src='" + IMG_URL
			+ obj.list[4].weather[0].icon + ".png'> " + "<br> Min Temp:"
			+ obj.list[4].temp.min + " F<br>" + "Max Temp:"
			+ obj.list[4].temp.max + " F<br>" + "Weather :"
			+ obj.list[4].weather[0].description + "<br>" + "Cloudiness:"
			+ obj.list[4].clouds + " %<br>" + "Wind:" + obj.list[4].speed
			+ " mph <br>";
}

