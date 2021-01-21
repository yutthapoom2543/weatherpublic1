<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeatherPublic</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
      .container {
          display: flex;
          justify-content: center;    
          padding: 3px 16px;
      }
      .card{
          background-color :ghostwhite;
          box-shadow: 0 4px 8px 0 gainsboro ;
          align-content: center;
          width: 600px;
      }
      h2{
        align-content: center;
        align-items: center;
        margin-left: 479px;
      }        
      span{
          padding-left: 50px;
      }
      h5{
           padding-left: 50px;
           padding-top: 15px;
      }
      #lat{
         margin-top: 10px;
         margin-bottom: 5px;
         margin-left: 50px;
         margin-right: 50px;
    }
    #lon{
         margin-bottom: 5px;
         margin-left: 50px;
         margin-right: 50px;
    }
    #search{
         margin-left: 200px;
         margin-right: 200px;
         margin-bottom: 6px;
         border-radius: 4px;
    }
    </style>
</head>

<body>
  <h2>WeatherPublic</h2>
  <div class="container">    
    <div class="card">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d214.2346898745562!2d99.81625856451478!3d8.421253524556711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sth!2sth!4v1611236414960!5m2!1sth!2sth" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>            
      <input type="text" id="lat" placeholder="Latitude">
      <input type="text" id="lon" placeholder="Longitude">
      <button id="search" class="btn-lm btn-primary" >Search</button>           
    </div>
<br>           

    
    <div class="dataweather">
      <h5><span id="location">Location Name : </span></h5>
      <h5><span id="country">Country : </span></h5>
      <h5><span id="temp">Temp : </span> c ํ</h5>
      <h5><span id="temp-max">Temp Max : </span> c ํ</h5>
      <h5><span id="temp-min">Temp Min : </span> c ํ</h5>
      <h5><span id="humidity">Humidity : </span> %</h5>
      <h5><span id="sun-rise">Sunrise : </span> Unix</h5>
      <h5><span id="sun-set">Sunset : </span> Unix</h5>
      <h5><span id="wind-deg">Wind Deg : </span> Degrees</h5>
      <h5><span id="wind-speed">Wind Speed : </span> M/s</h5>
      <h5><span id="cloud">Cloud: </span> %</h5>   
      </div>

      <div class="finddataweather">
        <H5><span id="location1"> </span><br></H5>
          Country is <span id="country1"> </span><br>
          Temperature is <span id="temp1"> </span> c ํ<br>
          Temperature Max is <span id="temp-max1"> </span> c ํ<br>
         Temperature Min is <span id="temp-min1"> </span> c ํ<br>
         Sunrise is <span id="sun-rise1"> </span> Unix <br>
         Sunset is <span id="sun-set1"> </span> Unix <br>
         Humidity is <span id="humidity1"> </span> % <br>
         Wind Deg is <span id="wind-deg1"></span> Degrees <br>
         Wind Speed is <span id="wind-speed1"> </span> M/s <br>
         Cloud is <span id="cloud"> </span> % <br>
 </div>
    
 <script> 
   function finddataweather(){ 
     $(".finddataweather").hide();
     var url ="https://api.openweathermap.org/data/2.5/weather?lat=8.4209334&lon=99.8159695&appid=8e0ca02e5bc5d727a876a28d0dae2ef1&units=metric";
     
           $.get(url)
            .done((data)=>{
              console.log(data)
                $("#location").append(data.name);
                $("#temp").append(data.main.temp);
                $("#temp-max").append(data.main.temp_max);
                $("#temp-min").append(data.main.temp_min);
                $("#humidity").append(data.main.humidity);
                $("#country").append(data.sys.country);
                $("#sun-rise").append(data.sys.sunrise);
                $("#sun-set").append(data.sys.sunset);
                $("#wind-deg").append(data.wind.deg);
                $("#wind-speed").append(data.wind.speed);
                $("#cloud").append(data.clouds.all);
                      })         
           .fail((xhr, status, err)=>{
                    console.log("error")
                });      
          }
   function findweather(){ 
            $(".Dataweather").hide();
            $(".finddataweather").show();
           var url ="https://api.openweathermap.org";
           var a = $("#lat").val();
           var b = $("#lon").val();

           url = url + "/data/2.5/weather?lat=" + a + "&lon=" + b +"&appid=8e0ca02e5bc5d727a876a28d0dae2ef1"; 
           
            $.getJSON(url)
            .done((data)=>{
              console.log(data)
              $("#location1").append(data.name);
              $("#temp1").append(data.main.temp);
              $("#temp-max1").append(data.main.temp_max);
              $("#temp-min1").append(data.main.temp_min);
              $("#humidity1").append(data.main.humidity);
              $("#country1").append(data.sys.country);
              $("#sun-rise1").append(data.sys.sunrise);
              $("#sun-set1").append(data.sys.sunset);
              $("#wind-deg1").append(data.wind.deg);
              $("#wind-speed1").append(data.wind.speed);
              $("#cloud").append(data.clouds.all);
                      })         
           .fail((xhr, status, err)=>{
                    console.log("error")
                });
          }      
     function removing(){
         $("#location1").empty();
         $("#temp1").empty();
         $("#temp-max1").empty();
         $("#temp-min1").empty();
         $("#humidity1").empty();
         $("#country1").empty();
         $("#sun-rise1").empty();
         $("#sun-set1").empty();
         $("#wind-deg1").empty();
         $("#wind-speed1").empty();
         $("#cloud").empty(); //
    }
    $(()=>{ 
            finddataweather();
            $("#Finding").click(()=>{ 
                findweather();
            });
            $("#Finding").click(()=>{
                removing();
            }); 
            
     });
   </script>        
  </body>
</html>