<script>
body{
  overflow: hidden;
  padding: 0;
  margin: 0;
  transition: all 1s ease;
}
body{
    background: url('http://extrawall.net/images/wallpapers/378_1920x1080_abstract_city.jpg') no-repeat fixed center;
  background-size: cover;
}

body::before{
  content: '';
  background: rgba(0,0,0,0.2);
  position: absolute;
  top: 0;
  bottom: 0;
  width: 100%;
}

a{
  color: #fff;
  text-decoration: none;
}

.timeline{
  position: absolute;
  bottom: 0;
  top: 100;
  width: 3000px;
  height: 50px;
  background: rgba(0,0,0,0.5);
  border-top: 1px solid #fff;
  padding-left: 80px;
}

.date{
  color: #fff;
  float: left;
  width: 150px;
  height: 50px;
  /*padding-left: 80px;*/
}
.date::before{
  content: '';
  position: absolute;
  height: 100vh;
  width: 1px;
  background: rgba(255,255,255,0.7);
  background: -webkit-linear-gradient(top,rgba(0,0,0,0.5),rgba(0,0,0,1)); /*Safari 5.1-6*/
  background: -o-linear-gradient(bottom,rgba(0,0,0,0.5),rgba(0,0,0,1)); /*Opera 11.1-12*/
  background: -moz-linear-gradient(bottom,rgba(0,0,0,0.5),rgba(0,0,0,1)); /*Fx 3.6-15*/
  background: linear-gradient(to bottom, rgba(0,0,0,0.5), rgba(255,255,255,1)); /*Standard*/
  margin-top: -100vh;
}
p.focus{
  position: absolute;
  top: 0;
  margin-left: -14px;
  padding-top: 10px;
}
p.focus::before{
  content: '';
  width: 20px;
  height: 20px;
  border: 1px solid #fff;
  border-radius: 50%;
  position: absolute;
  top: -10px;
  left: 3.5px;
}

p.focus::after{
  content: '';
  position: absolute;
  width: 10px;
  height: 10px;
  background: #fff;
  border-radius: 50%;
  top: -5px;
  left: 9px;
}

.goal_wrap{
  position: absolute;
  width: 50px;
  height: 50px;
  border: 2px solid #fff;
  text-align: center;
  border-radius: 50%;
  line-height: 50px;
  top:-100px;
  margin-left: -24px;
  font-size: 24px;
  transition: all 0.5s ease;
}

.goal_wrap:hover{
  width: 60px;
  height: 60px;
  line-height: 60px;
  margin-left: -30px;
  font-size: 30px;
  cursor: pointer;
}

.goal_wrap.active{
  top: -160px;
  width: 80px;
  height: 80px;
  line-height: 80px;
  margin-left: -40px;
  font-size: 40px;
  cursor: pointer;
}

.bounce {
  animation: bounce 1s .5s;
  transform: scale(0.85);
}

@keyframes bounce {
  0% { transform: scale(0.85); opacity: 1; }
  50% { transform: scale(0.95); opacity: .7; }
  60% { transform: scale(0.6); opacity: 1; }
  80% { transform: scale(1.6) }
  100% { transform: scale(1.1) }
}
</script>
<div class="structure" ng-app="app" ng-controller="HomeController">

<div class="preloaderimg">
  <img src="https://wallpaperscraft.com/image/tropics_sea_palm_trees_vacation_84858_2412x1810.jpg" alt="" style="display: none;" />
  <img src="http://extrawall.net/images/wallpapers/378_1920x1080_abstract_city.jpg" alt="" style="display: none;" />
  <img src="http://www.churchmilitant.com/images/uploads/2015-06-12-niles-x.jpg" alt="" style="display: none;"/>
</div>

<div class="timeline"></div>

<div class="timeline">
   <div ng-repeat="date in dates track by $index" class="date date-{{$index}}">
      <div class="goal_wrap goal_real_estate" ng-show="goal_real_estate_{{date}}">
       <i class="fa fa-building" aria-hidden="true"></i>
     </div>
      <div class="goal_wrap goal_involve" ng-show="goal_involve_{{date}}">
       <i class="fa fa-graduation-cap" aria-hidden="true"></i>
     </div>
      <div class="goal_wrap goal_retirement" ng-show="goal_retirement_{{date}}">
       <i class="fa fa-leaf" aria-hidden="true"></i>
     </div>
    <p class="focus">
      <a href="#">{{date}}</a>
    </p>
  </div>
</div>

  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1>{{goal_title}}</h1>
      </div>
    </div>
  </div>
</div>

<script>
var app = angular.module('app', []);

app.controller('HomeController', function($scope) {

  $scope.goal_title = "Investing in real estate";

  $scope.dates = [
    2016,2017,2018,2019,2020, 2021,       2022, 2023, 2024, 2025, 2026
  ];

  $scope.goal_real_estate = false;

  for (x in $scope.dates) {
      if($scope.dates[x]== 2016){
        $scope.goal_real_estate_2016 = true;
      }else if($scope.dates[x]== 2021){
        $scope.goal_retirement_2021 = true;
      }else if($scope.dates[x]== 2018){
        $scope.goal_involve_2018 = true;
      }
  }

});

$(document).ready(function(e) {
  var viewport =Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
  console.log(viewport);


  $('a').click(function(e){
    e.preventDefault()
  })

  $('.goal_wrap').click(function(){
    var diff = $(this).parent()[0].offsetLeft;
    $('.date .goal_wrap').removeClass('active bounce');
    $(this).addClass('active bounce');
    console.log(diff);
    console.log((viewport - diff));
TweenLite.to($('.date').parent(), 1, {x:((viewport*0.5) - diff), onComplete:function(){
        console.log('success');
        /*TweenLite.to($('.timeline'), 1, {top:"50%"});*/
      }});
  });

  $('.goal_real_estate').click(function(){
    console.log('goal click');
$('body').fadeTo('ease', 0.3, function()
{
    $(this).css('background-image', 'url(http://extrawall.net/images/wallpapers/378_1920x1080_abstract_city.jpg)');
}).fadeTo('slow', 1);

  });

$('.goal_retirement').click(function(){
    console.log('goal click');
$('body').fadeTo('ease', 0.3, function()
{
    $(this).css('background-image', 'url(https://wallpaperscraft.com/image/tropics_sea_palm_trees_vacation_84858_2412x1810.jpg)');
}).fadeTo('slow', 1);

  });

$('.goal_involve').click(function(){
    console.log('goal click');
$('body').fadeTo('ease', 0.3, function()
{
    $(this).css('background-image', 'url(http://www.churchmilitant.com/images/uploads/2015-06-12-niles-x.jpg)');
}).fadeTo('slow', 1);

  });


});


</script>
