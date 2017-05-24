window.onload = function () {
	getLocation();
    loadJSON();
    
    
    var dances;
    var location1 = document.getElementById("location1");
    var location2 = document.getElementById("location2");
    
    function loadJSON(){
        var request = new XMLHttpRequest();
        var data = "stuff.json";
        
        request.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var dances = JSON.parse(this.responseText);
                for (var i = 0; i< dances.event.length; i++){
                    var newEvent = new createDance(dances.event[i].title,dances.event[i].location.lat,dances.event[i].location.lon,dances.event[i].time,dances.event[i].date.day,dances.event[i].date.month,dances.event[i].date.year,dances.event[i].type);
                    showEvent(newEvent);
                }
            }
        };
        request.open("GET", data,  true);
        request.send();
    }
    
//     var creation = document.getElementById("creation");
//     creation.addEventListener("click",function(e){
//         var form = document.getElementById("form");
//         var error = 0;
//         /*for(var i =0; i < form.childElementCount; i++){
//             if( form.children[i] == ""){
//                 error = 1;
//             }
//         }
//         if(error = 1){
//             document.getElementById("error").innerHTML = "Please fill out the form";
//         }*/
// //        else{
//             document.getElementById("error").innerHTML = "";
//             var title = document.getElementById("title");
//             var time = document.getElementById("time");
//             var date = document.getElementById("date");
//             var year = date.value.substr(0,4);
//             var month = date.value.substr(5,2);
//             var day = date.value.substr(8,2);
//             var type = document.getElementById("type");
//             var lat = location1.innerHTML;
//             var long = location2.innerHTML;
//             var newEvent = new createDance(title,lat,long,time,day,month,year,type);
//             addEvent(newEvent);
//             addSpacing();
//             openDance();
//             document.getElementById("form").reset();
//        }
    
    /*function addSpacing(){
        var danceLocation = document.getElementById("dance");
        var spacing = document.createElement('div');
        spacing.innerHTML = "<br><br><br>";
        danceLocation.appendChild(spacing);
    }
    
    function showEvent(newEvent){
        
        var danceLocation = document.getElementById("dance");
        var content = document.createElement('div');
                    
        content.innerHTML = newEvent.title + "</br>Time: " + newEvent.time + "</br>Date: " + newEvent.date.month + "/"+ newEvent.date.day + "/" + newEvent.date.year + "<br>Latitude: " + newEvent.location.lat + "<br>Longitude: " + newEvent.location.long + "</br>Type: " + newEvent.type + "</br> </br>";
        
        danceLocation.appendChild(content);
    }
    
    function addEvent(newEvent){
        
        var danceLocation = document.getElementById("dance");
        var content = document.createElement('div');
        
        //content.style.padding= "0px 0px 0px 140px";
                    
        content.innerHTML = newEvent.title.value + "</br>Time: " + newEvent.time.value + "</br>Date: " + newEvent.date.month + "/"+ newEvent.date.day+ "/" + newEvent.date.year + "<br>Latitude: " + newEvent.location.lat + "<br>Longitude: " + newEvent.location.long + "</br>Type: " + newEvent.type.value + "</br> </br>";
        
        danceLocation.appendChild(content);
    }*/

    function getLocation() {
       if(navigator.geolocation) {
           navigator.geolocation.getCurrentPosition(showPosition);
       }
       else{
           location1.innerHTML = "Geolocation is not supported";
       }
    }

    function showPosition(position){
        location1.innerHTML = position.coords.latitude;
        location2.innerHTML = position.coords.longitude;
    }
    function createDance(title, lat, long, time,day,month,year, type){
        this.title = title;
        this.location = {lat,long};
        this.time = time;
        this.date = {day,month,year}
        this.type = type;
    }
    
}

function openDance(){
        document.getElementById("dance").style.display = "inline";
        document.getElementById("create").style.display = "none";
    }

function openCreate(){
    var createSpot = document.getElementById("create");
    document.getElementById("dance").style.display = "none";
    createSpot.style.display = "inline";
}



