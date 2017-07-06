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


<div class="your-clock"></div>
		<script src="flipclock.min.js"></script>

    	<div id="number1"></div>
    	    	<div id="number2"></div>
        <div id="form"></div>

<?php

$numbers = [1,2,3,4,5,6,7,8,9,1,2,3,4,5,6,7,8,9,5,4,3,2,1,6,7,8,9];

?>
<div style="width:50%; height:50px;" class="your-class">
	<?php
	foreach ($numbers as $key => $value) {
		echo '<div style="border-style: ridge;" ><h3>'.$value .'</h3></div>';
	}

	?>
</div>

<div style="width:50%; margin-top: 100px; height:50px;" class="add-remove">

	</div>
		


        <script type="text/javascript">

        var clock = $('.your-clock').FlipClock({
});

function myFunction() {
    //alert('Hello');
   clock.stop();
   clock.setFaceValue(0);
   clock.start();
}

            $(document).ready(function() {

setInterval(myFunction, 30000);

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
                        "title":"Kraepelin",
                        "description":"What do you think about Alpaca?",
                        "type":"object",
                        "properties": {
                            "name": {
                                "type":"string",
                                "title":""
                            },

                        }
                    },

                    "options": {
                        "form":{
                            "attributes":{
                                "action":"http://httpbin.org/post",
                                "method":"post"
                            },
                            "buttons":{
                            	"start":{
                            		   "title": "Start",
                            	},
                                "submit":{
                                    "title": "Send Form Data",
                                    "click": function() {
                                        var val = this.getValue();
                                        if (this.isValid(true)) {
                                            alert("Valid value: " + JSON.stringify(val, null, "  "));
                                            this.ajaxSubmit().done(function() {
                                                alert("Posted!");
                                            });
                                        } else {
                                            alert("Invalid value: " + JSON.stringify(val, null, "  "));
                                        }
                                    }
                                }
                            }
                        }

                    },

                });
            });

$('#form').bind("enterKey",function(e){
	if ($('#alpaca2').val() !== "" && 

		$.isNumeric($('#alpaca2').val())

		&& ($('#alpaca2').val() <10)

		) {
      	//alert();
      	clock.stop();
       $('.your-class').slick('slickNext');
       slideIndex = $('#alpaca2').val();
       $('#alpaca2').val('');
         //slideIndex++;
  $('.add-remove').slick('slickAdd','<div style="border-style: ridge;"><h3>' + slideIndex + '</h3></div>', true);

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
