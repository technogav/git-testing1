$(function() {

var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next1").click(function(){
		var companyName = document.getElementById("company_name").value;//easier way using a loop and .child.next???
		var venueAddress = document.getElementById("venue_address").value;
		var companyPhone = document.getElementById("company_phone").value;
		var venuePhone = document.getElementById("venue_phone").value;
		var companyEmail = document.getElementById("company_email").value;
		var setupDate = document.getElementById("setup_date").value;

		if((companyName == "") || (venueAddress == "") || (companyPhone == "") || (venuePhone == "") || (companyEmail == "") || setupDate == ""){
					
			if(companyName == ""){	
				$("#company_name").css({"border": "solid red 1px"});
			}
			if(venueAddress == ""){
				$("#venue_address").css({"border": "solid red 1px"});
			}
			if(companyPhone == ""){
				$("#company_phone").css({"border": "solid red 1px"});
			}
			if(venuePhone == ""){
				$("#venue_phone").css({"border": "solid red 1px"});
			}
			if(companyEmail == ""){
				$("#company_email").css({"border": "solid red 1px"});
			}
			if(setupDate == ""){
				$("#setup_date").css({"border": "solid red 1px"});
			}
			alert('You must complete the mandatory fields marked with \'*\'');
			return;//change the js here
		

		}else{
			if(animating) return false;
		animating = true;
		
	
		current_fs = $(this).parent();
		next_fs = $(this).parent().next();
		
		//activate next step on progressbar using the index of next_fs
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
		
		//show the next fieldset
		next_fs.show(); 
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale current_fs down to 80%
				scale = 1 - (1 - now) * 0.2;
				//2. bring next_fs from the right(50%)
				left = (now * 50)+"%";
				//3. increase opacity of next_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({'transform': 'scale('+scale+')'});
				next_fs.css({'left': left, 'opacity': opacity});
			}, 
			duration: 800, 
			complete: function(){
				current_fs.hide();
				animating = false;
			}, 
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
	} //next slide in
	
	$(".picture-box").css({"background-image": "url('form-img/computer-lab.jpg')"});
	$('.top-area p').html('Tell us about the Room Setup!');
	
});
$(".next2").click(function(){			
		var roomLayout = document.getElementById("room_layout").value;
		var powerSockets = document.getElementById("power_sockets").value;
		var locationSockets = document.getElementById("location_sockets").value;
		var accessDetails = document.getElementById("access_details").value;
		var liftAccess = document.getElementById("lift_access").value;
		
		
		if((roomLayout == "*") || (powerSockets == "*") || (locationSockets == "*") ||  (liftAccess == "*") || (accessDetails == "*")){
			
			if(roomLayout == "*"){
				$("#room_layout").css({"border": "solid red 1px"});	
			}
			if(powerSockets == "*"){
				$("#power_sockets").css({"border": "solid red 1px"});
			}
			if(locationSockets == "*"){
				$("#location_sockets").css({"border": "solid red 1px"});
			}
			
			if(accessDetails == "*"){
				$("#access_details").css({"border": "solid red 1px"});
			}
			if(liftAccess == "*"){
				$("#lift_access").css({"border": "solid red 1px"});
			}
			alert('You must complete the mandatory fields marked with \'*\'');
			return;
		}else{
			if(animating) return false;
		animating = true;
		
	
		current_fs = $(this).parent();
		next_fs = $(this).parent().next();
		
		//activate next step on progressbar using the index of next_fs
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
		
		//show the next fieldset
		next_fs.show(); 
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale current_fs down to 80%
				scale = 1 - (1 - now) * 0.2;
				//2. bring next_fs from the right(50%)
				left = (now * 50)+"%";
				//3. increase opacity of next_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({'transform': 'scale('+scale+')'});
				next_fs.css({'left': left, 'opacity': opacity});
			}, 
			duration: 800, 
			complete: function(){
				current_fs.hide();
				animating = false;
			}, 
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
	} //next slide in
	
	$(".picture-box").css({"background-image": "url('form-img/teacher.jpg')"});
	$('.top-area p').html('Almost Done! - Tell us about the Course & Trainer!');

});
$(".next3").click(function(){	
		var courseStart = document.getElementById("course_start").value;
		var trainerName = document.getElementById("trainer_name").value;
		var courseEnd = document.getElementById("course_end").value;
		var trainerPhone = document.getElementById("trainer_phone").value;
		var courseRef = document.getElementById("course_reference").value;
		var courseDesc = document.getElementById("course_description").value;
		var trainerEmail = document.getElementById("trainer_email").value;
		var pcsavy = document.getElementById("pcsavy").value;
		
		if((courseStart == "") || (trainerName == "") || (courseEnd == "") || (trainerPhone == "") || (courseRef == "") || (courseDesc = "") || (trainerEmail == "*")){
			if(courseStart == ""){
				$("#course_start").css({"border": "solid red 1px"});
			}
			if(courseEnd == ""){
				$("#course_end").css({"border": "solid red 1px"});
			}
			if(trainerPhone == ""){
				$("#trainer_phone").css({"border": "solid red 1px"});
			}
			if(trainerName == ""){
				$("#trainer_name").css({"border": "solid red 1px"});
			}
			if(courseRef == ""){
				$("#course_reference").css({"border": "solid red 1px"});
			}
			if(courseDesc == ""){
				$("#course_description").css({"border": "solid red 1px"});
			}
			if(trainerEmail == ""){
				$("#trainer_email").css({"border": "solid red 1px"});
			}
			if(pcsavy == "*"){
				$("#pcsavy").css({"border": "solid red 1px"});
			}
			alert('You must complete the mandatory fields marked with \'*\'');
			return;	

		}else{
			if(animating) return false;
		animating = true;
		
	
		current_fs = $(this).parent();
		next_fs = $(this).parent().next();
		
		//activate next step on progressbar using the index of next_fs
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
		
		//show the next fieldset
		next_fs.show(); 
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale current_fs down to 80%
				scale = 1 - (1 - now) * 0.2;
				//2. bring next_fs from the right(50%)
				left = (now * 50)+"%";
				//3. increase opacity of next_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({'transform': 'scale('+scale+')'});
				next_fs.css({'left': left, 'opacity': opacity});
			}, 
			duration: 800, 
			complete: function(){
				current_fs.hide();
				animating = false;
			}, 
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
	} //next slide in
	
	$(".picture-box").css({"background-image": "url('form-img/training.jpg')"});
	$('.top-area p').html('Now for the Business end! - <br>What equipment and software would you like?');
});
$(".next4").click(function(){	
		var pcEquipment = document.getElementById("pc_equipment").value;
		if(pcEquipment == "*"){
			$("#pc_equipment").css({"border": "solid red 1px"});
			alert('You must complete the mandatory fields marked with \'*\'');
			return;
		}else{
			if(animating) return false;
		animating = true;
		
	
		current_fs = $(this).parent();
		next_fs = $(this).parent().next();
		
		//activate next step on progressbar using the index of next_fs
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
		
		//show the next fieldset
		next_fs.show(); 
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale current_fs down to 80%
				scale = 1 - (1 - now) * 0.2;
				//2. bring next_fs from the right(50%)
				left = (now * 50)+"%";
				//3. increase opacity of next_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({'transform': 'scale('+scale+')'});
				next_fs.css({'left': left, 'opacity': opacity});
			}, 
			duration: 800, 
			complete: function(){
				current_fs.hide();
				animating = false;
			}, 
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
	} //next slide in
	
	$('.top-area p').html('Looks like we are good to go');
});
			 	
$(".previous1").click(function(){
	$("#company_name").css({"border": "solid #ccc 1px"});
	$("#venue_address").css({"border": "solid #ccc 1px"});
	$("#company_phone").css({"border": "solid #ccc 1px"});
	$("#venue_phone").css({"border": "solid #ccc 1px"});
	$("#company_email").css({"border": "solid #ccc 1px"});
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
		
	});
	
	$(".picture-box").css({"background-image": "url('form-img/big-journeys.jpg')"});
	$('.top-area p').html('Were getting ready to set up your training center! <br>  -just a few things we need to know');
	
});
$(".previous2").click(function(){
	$("#room_layout").css({"border": "solid #ccc 1px"});
	$("#power_sockets").css({"border": "solid #ccc 1px"});	
	$("#location_sockets").css({"border": "solid #ccc 1px"});
	$("#internet_connection").css({"border": "solid #ccc 1px"});
	$("#access_details").css({"border": "solid #ccc 1px"});
	$("#lift_access").css({"border": "solid #ccc 1px"});
	
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
		
	});
	$(".picture-box").css({"background-image": "url('form-img/computer-lab.jpg')"});
	$('.top-area p').html('Tell us about the Room Setup!');
});
$(".previous3").click(function(){
	$("#course_start").css({"border": "solid #ccc 1px"});
	$("#course_end").css({"border": "solid #ccc 1px"});
	$("#trainer_phone").css({"border": "solid #ccc 1px"});
	$("#trainer_name").css({"border": "solid #ccc 1px"});
	$("#course_reference").css({"border": "solid #ccc 1px"});
	$("#course_description").css({"border": "solid #ccc 1px"});
	$("#trainer_email").css({"border": "solid #ccc 1px"});
	$("#pcsavy").css({"border": "solid #ccc 1px"});

	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
		
	});
	$(".picture-box").css({"background-image": "url('form-img/teacher.jpg')"});
	$('.top-area p').html('Almost Done! - Tell us about the Course & Trainer!');
});
$(".previous4").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
		
	});
	
	$('.top-area p').html('Now for the Business end! - <br>What equipment and software would you like?');
});


});


