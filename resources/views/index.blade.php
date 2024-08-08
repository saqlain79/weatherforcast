
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hourly Weather Card</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="index-box0" style="margin-top: 50px">
        <div class="weather-card-solo">
            <div class="hourly">
                <div class="hour">
                    <h2>Time</h2>
                    <strong><span id="current-time">{{$currenttime}}</span></strong>
                    <h2>Date</h2>
                    <strong>{{$currentdate}}</strong>
                </div>
            </div>
        </div>
        <div class="weather-card-solo">
            <div class="hourly">
                <div class="hour">
                    <h2>Last Updated</h2>
                    <Strong>{{$date}}</Strong>
                </div>
            </div>
        </div>
    </div>
    <div id="index-box1">
        <div class="day-selector">
            <div class="day-card active" onclick="selectDay('now')">Temperature Index</div>
        </div>
        <div class="weather-card-solo">
            <h2>{{$currentWeather['name']}}</h2>
            <p>{{$currentWeather['sys']['country']}}</p>
            <div class="hourly">
                <div class="hour">
                    <div class="temperature">{{(int)$currentWeather['main']['temp']}}°C</div>
                    <p>Feels like: {{(int)$currentWeather['main']['feels_like']}}°C</p>
                    <p>Highest: {{(int)$currentWeather['main']['temp_max']}}°C</p>
                    <p>Lowest: {{(int)$currentWeather['main']['temp_min']}}°C</p>
                    <p class="conditions">Condition: {{ucfirst($currentWeather['weather'][0]['description'])}}</p>
                    <p>Humidity: {{(int)$currentWeather['main']['humidity']}}%</p>
                    <p>Wind: {{(int)$currentWeather['wind']['speed']}} m/sec</p>
                </div>
                <!-- Add more hourly weather data here -->
            </div>
        </div>
    </div>
    <div id="index-box2">
        <div class="day-selector">
            <div class="day-card active" onclick="selectDay('now')">Air Pollution Index</div>
        </div>
        <div class="weather-card-solo">
            <h2>{{$currentWeather['name']}}</h2>
            <p>Air Quality Index: {{$airpol['list'][0]['main']['aqi']}}</p>
            <div class="hourly">
                <div class="hour">
                    <p>Concentration of CO: {{$airpol['list'][0]['components']['co']}} μg/m3</p>
                    <p>Concentration of NO: {{$airpol['list'][0]['components']['no']}} μg/m3</p>
                    <p>Concentration of NO2: {{$airpol['list'][0]['components']['no2']}} μg/m3</p>
                    <p>Concentration of O3: {{$airpol['list'][0]['components']['o3']}} μg/m3</p>
                    <p>Concentration of SO2: {{$airpol['list'][0]['components']['so2']}} μg/m3</p>
                    <p>Concentration of PM2.5: {{$airpol['list'][0]['components']['pm2_5']}} μg/m3</p>
                    <p>Concentration of PM10: {{$airpol['list'][0]['components']['pm10']}} μg/m3</p>
                    <p>Concentration of NH3: {{$airpol['list'][0]['components']['nh3']}} μg/m3</p>
                <!-- Add more hourly weather data here -->
            </div>
        </div>
    </div>
    <script>
        function updateTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('current-time').innerText = `${hours}:${minutes}:${seconds}`;
        }

        setInterval(updateTime, 1000);
        updateTime(); // Call immediately to set the initial time
    </script>
</body>
</html>
