<html>
    <head>
    
        <!-- jquery -->
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 
        <!-- bootstrap -->
        <link type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
 
        <!-- handlebars -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.10/handlebars.js"></script>
 
        <!-- alpaca -->
        <link type="text/css" href="//code.cloudcms.com/alpaca/1.5.23/bootstrap/alpaca.min.css" rel="stylesheet" />
        <script type="text/javascript" src="//code.cloudcms.com/alpaca/1.5.23/bootstrap/alpaca.min.js"></script>

		<link rel="stylesheet" href="flipclock.css">

		



<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>

<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

 
    </head>
    <body>



server time :
<br/>
start test time :
<br/><br/>


<div class="your-clock"></div>
		<script src="flipclock.min.js"></script>

    	<div id="number1"></div>
    	    	<div id="number2"></div>
                        <div id="answers"></div>
                           <div id="stringtosend"></div>
                                  <button id="start" type="button">Start!</button>
                        <button id="submit" type="button">Submit answer!</button>
        <div id="form"></div>

<?php

$arrayindex = 0;

$numbers[0] = [9,7,2,9,5,6,6,7,3,6,4,0,0,0,0,0,0,0,0,0,0,0,0];
$numbers[1] = [9,9,8,4,4,6,5,2,7,7,8,0,0,0,0,0,0,0,0,0,0,0,0];
$numbers[2] = [2,3,4,5,6,7,8,9,1,2,3,4,5,6,7,8,9,5,4,3,2,1,6,7,8,9,1,2,3,4,5,6,7,8,9,1,2,3,4,5,6,7,8,9,5,4,3,2,1,6,7,8,9];
$numbers[3] = [3,4,5,6,7,8,9,1,2,3,4,5,6,7,8,9,5,4,3,2,1,6,7,8,9,1,2,3,4,5,6,7,8,9,1,2,3,4,5,6,7,8,9,5,4,3,2,1,6,7,8,9];
//$numbers[4] = [4,5,6,7,8,9,1,2,3,4,5,6,7,8,9,5,4,3,2,1,6,7,8,9,1,2,3,4,5,6,7,8,9,1,2,3,4,5,6,7,8,9,5,4,3,2,1,6,7,8,9];

$answer = array();

foreach($numbers as $numberskey => $numbersvalue) {


?>
<div id="numbers<?= $numberskey ?>" style="width:50%; display:block; height:50px;" class="your-class">
	<?php
	foreach ($numbersvalue as $key => $value) {
		echo '<div style="border-style: ridge;" ><h3>'.$value .'</h3></div>';
	}

	?>
</div>
<div id="answers<?= $numberskey ?>">
</div>

<?php
}
?>
<div style="width:50%; margin-top: 100px; height:50px;" class="add-remove">

	</div>
		


        <script type="text/javascript">



//clock.trigger('interval' function() { alert('das');});



$(document).ready(function() {

$('.your-class').hide();
var index = 0;
var max = <?= sizeof($numbers)?>;
function func() {
      $('.add-remove').hide();
         $('#alpaca2').hide();
    alert('FINISH');
}
        var clock = $('.your-clock').FlipClock(30,{
          //clockFace: 'Counter'
     countdown: true,
            autoStart: false,
            interval : 1000,
            callbacks: {
              interval: function() {
                var time = this.factory.getTime().time;
                
                if((time % 30) == 0) {
                  if (index < (max - 1)) {

                  $("#numbers" + index).hide();
                  $("#answers" + index).html($("#answers").html());
                  //console.log('#anwers', $("#answers").html());
                  $("#stringtosend").append(',' + $("#answers").html());
                  $("#answers").empty();
                  index++;
                  $("#numbers" + index).show();
                  console.log('#numbers' + index);
                  this.factory.setTime(30);
                } else {
                  $("#numbers" + index).hide();
                  $("#answers" + index).html($("#answers").html());
  $("#stringtosend").append(',' + $("#answers").html());
                  //$("#answers").empty();
                  setTimeout(func, 3000);

                }
                }
              }
              
            }
});


$('#start').click(function() {

clock.start();
});

        function init()
        {
            index = 0;
        }

function myFunction() {
    //alert(index);
    index++;
   clock.reset();
   clock.start();
 //  clock.setFaceValue(0);

}


$('.your-class').on('edge', function(event, slick, direction){
  alert('edge was hit. SHOULD HALT EVERYTHING UNTIL TIMER STOPS')
});

  //  setInterval(myFunction, 5000);

  $('.your-class').slick({
  infinite: false,
  slidesToShow: 10,
  slidesToScroll: 1,
  arrows : false
  });

    $('.add-remove').slick({
  infinite: false,
  slidesToShow: 10,
  slidesToScroll: 2,
    arrows : false,
  });
                $("#form").alpaca({

                    "schema": {
                        "title":"Kraepelin Test",
                        "description":"What do you think about Alpaca?",
                        "type":"object",
                        "properties": {
                            "name": {
                                "type":"string",
                                "title":""
                            },

                        }
                    },


                });
            });



$('#submit').click(function() {
//alert($('#answers').html());



        $.post("process.php",
        {
          name: "Donald Duck",
          city: "Duckburg",
          answers: $('#stringtosend').html()
        },
        function(data,status){
            alert("Data: " + data + "\nStatus: " + status);
        });



});


$('#form').bind("enterKey",function(e){
	if ($('#alpaca2').val() !== "" && 

		$.isNumeric($('#alpaca2').val())

		&& ($('#alpaca2').val() <10)

		) {
      	//alert();
      	//clock.stop();
       $('.your-class').slick('slickNext');
       slideIndex = $('#alpaca2').val();
       $('#alpaca2').val('');
         //slideIndex++;
         //  $('#answers').html('reno');
  $('.add-remove').slick('slickAdd','<div style="border-style: ridge;"><h3>' + slideIndex + '</h3></div>', true);

  currentString = $('#answers').html();
  $('#answers').html(currentString + slideIndex);
} else {
  
	alert('INVALID VALUE');
	       $('#alpaca2').val('');

}

});


$('#form').keyup(function(e){
    if(e.keyCode == 13)
    {
        $(this).trigger("enterKey");
    }
});
        </script>


    </body>
</html>
