$(document).ready(function() {
	$("#update").hide();
	$("#add").show();
	$("#delete").hide();
	
	$("#ad").click(function(){
	var flightno = document.getElementById("flightno_1").value;	
	var pilot = document.getElementById("pilot_1").value;	
	var copilot = document.getElementById("copilot_1").value;	
	var attendant1 = document.getElementById("attendant1_1").value;	
	var attendant2 = document.getElementById("attendant2_1").value;	
	var attendant3 = document.getElementById("attendant3_1").value;	
	var attendant4 = document.getElementById("attendant4_1").value;	
	var attendant5 = document.getElementById("attendant5_1").value;	
	var attendant6 = document.getElementById("attendant6_1").value;	
	
	
	xmlhttp = new XMLHttpRequest();	
	xmlhttp.onreadystatechange = function() {
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var content = xmlhttp.responseText;
                
                if(content != "0")
                {
             	   alert(content);
             	   
             	  }
             	   else
             	   {	
             	   alert("Crew added!");
             	   $(':input','#addf')
 		 .not(':button, :submit, :reset, :hidden')
  		.val('');
             	   }
            }
        }
        
        xmlhttp.open("GET","Crewadd.php?flightno="+flightno+"&pilot="+pilot+"&copilot="+copilot+"&attendant1="+attendant1+"&attendant2="+attendant2+"&attendant3="+attendant3+"&attendant4="+attendant4+"&attendant5="+attendant5+"&attendant6="+attendant6,true);
        xmlhttp.send();      
        
	});

	$("#up").click(function(){
	var flightno = document.getElementById("flightno_2").value;	
	var pilot = document.getElementById("pilot_2").value;	
	var copilot = document.getElementById("copilot_2").value;	
	var attendant1 = document.getElementById("attendant1_2").value;	
	var attendant2 = document.getElementById("attendant2_2").value;	
	var attendant3 = document.getElementById("attendant3_2").value;	
	var attendant4 = document.getElementById("attendant4_2").value;	
	var attendant5 = document.getElementById("attendant5_2").value;	
	var attendant6 = document.getElementById("attendant6_2").value;		

	xmlhttp = new XMLHttpRequest();	
	xmlhttp.onreadystatechange = function() {
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var content = xmlhttp.responseText;
                
                if(content != "0")
                {
             	   alert(content);
             	   
             	  }
             	   else
             	   {	
             	   alert("Crew updated!");
             	   $(':input','#result')
 		 .not(':button, :submit, :reset, :hidden')
  		.val('');
             	   }
            }
        }
        
        xmlhttp.open("GET","Crewupdate.php?flightno="+flightno+"&pilot="+pilot+"&copilot="+copilot+"&attendant1="+attendant1+"&attendant2="+attendant2+"&attendant3="+attendant3+"&attendant4="+attendant4+"&attendant5="+attendant5+"&attendant6="+attendant6,true);
        xmlhttp.send();      
        
	});

	$("#de").click(function(){
		var flightno = document.getElementById("flightno_2").value;	
		xmlhttp = new XMLHttpRequest();	
	xmlhttp.onreadystatechange = function() {
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var content = xmlhttp.responseText;
                
                if(content != "0")
                {
             	   alert(content);
             	   
             	  }
             	   else
             	   {	
             	   alert("Crew deleted!");
             	   $(':input','#result')
 		 .not(':button, :submit, :reset, :hidden')
  		.val('');
             	   }
            }
        }
        
        xmlhttp.open("GET","Crewdelete.php?flightno="+flightno,true);
        xmlhttp.send();      
        $(':input','#result')
 	 .not(':button, :submit, :reset, :hidden')
  	.val('');
	});
	
	$("#ad1").hover(function(){
		xmlhttp = new XMLHttpRequest();	
	xmlhttp.onreadystatechange = function() {
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var content = xmlhttp.responseText;
                	document.getElementById("detail").innerHTML = content;
             	 	$("#detail").show();
             	 	
            }
        }
        
        xmlhttp.open("GET","Admindetail1.php",true);
        xmlhttp.send();      
	}, function(){
		$("#detail").hide();
	});
	
	$("#ud1").hover(function(){
		xmlhttp = new XMLHttpRequest();	
	xmlhttp.onreadystatechange = function() {
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var content = xmlhttp.responseText;
                	document.getElementById("detail1").innerHTML = content;
             	 	$("#detail1").show();
             	 	
            }
        }
        
        xmlhttp.open("GET","Admindetail1.php",true);
        xmlhttp.send();      
	}, function(){
		$("#detail1").hide();
	});
	
	$("#ud2").hover(function(){
		xmlhttp = new XMLHttpRequest();	
	xmlhttp.onreadystatechange = function() {
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var content = xmlhttp.responseText;
                	document.getElementById("udetail2").innerHTML = content;
             	 	$("#udetail2").show();
             	 	
            }
        }
        
        xmlhttp.open("GET","Admindetail2.php",true);
        xmlhttp.send();      
	}, function(){
		$("#udetail2").hide();
	});
	
	$("#ud3").hover(function(){
		xmlhttp = new XMLHttpRequest();	
	xmlhttp.onreadystatechange = function() {
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var content = xmlhttp.responseText;
                	document.getElementById("udetail3").innerHTML = content;
             	 	$("#udetail3").show();
             	 	
            }
        }
        
        xmlhttp.open("GET","Admindetail2.php",true);
        xmlhttp.send();      
	}, function(){
		$("#udetail3").hide();
	});
	
	$("#ad2").hover(function(){
		xmlhttp = new XMLHttpRequest();	
	xmlhttp.onreadystatechange = function() {
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var content = xmlhttp.responseText;
                	document.getElementById("adetail2").innerHTML = content;
             	 	$("#adetail2").show();
             	 	
            }
        }
        
        xmlhttp.open("GET","Admindetail2.php",true);
        xmlhttp.send();      
	}, function(){
		$("#adetail2").hide();
	});
	
	$("#ad3").hover(function(){
		xmlhttp = new XMLHttpRequest();	
	xmlhttp.onreadystatechange = function() {
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var content = xmlhttp.responseText;
                	document.getElementById("adetail3").innerHTML = content;
             	 	$("#adetail3").show();
             	 	
            }
        }
        
        xmlhttp.open("GET","Admindetail2.php",true);
        xmlhttp.send();      
	}, function(){
		$("#adetail3").hide();
	});
	
	
	$("#a").click(function(){
		$("#update").hide();
		$("#add").show();
	});
	$("#u").click(function(){
		$(':input','#result')
 	 .not(':button, :submit, :reset, :hidden')
  	.val('');
  	$("#number").val('');
		$("#update").show();
		$("#add").hide();
		$("#de").hide();
		$("#up").show();;
	});
	$("#d").click(function(){
		$("#number").val('');
		$(':input','#result')
 	 .not(':button, :submit, :reset, :hidden')
  	.val('');
		$("#update").show();
		$("#add").hide();
		$("#de").show();
		$("#up").hide();
	});
});