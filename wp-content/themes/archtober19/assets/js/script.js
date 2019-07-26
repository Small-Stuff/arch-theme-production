var Site = {};
Site.visited = false;
Site.starting_namespace = "";
Site.target_day = 0;
Site.event_type = [];
Site.institutions = [];
Site.partner_type = [];


Site.menuInteraction = function(){
	document.querySelectorAll(".menu_header").forEach(function(menu_button){
		menu_button.onclick = function(){
			document.querySelector("#arch_menu").classList.toggle("open")
		}
	})
}

Site.homepageToggle = function(){
	if(document.querySelector("#recent_events .section_title") != null){
		document.querySelector("#recent_events .section_title").onclick = function(){
			document.querySelector("#recent_events").classList.toggle("open")
			TweenMax.to(window, 0.75, {scrollTo: "#recent_events"})
		}
	}
}

Site.emailSubmission = function(){
	// console.log, submission
	// borrowed from 2018 theme
	var subscribe = $('#subscribe');

	$('#subscribe form').submit(function(e) {
    var data, form, message, messageContents;
    e.preventDefault();
    form = $(this);
    message = form.find('.arch_message');
    messageContents = "Thank you for Subscribing!";
    data = $(this).serializeObject();
    console.log("data", data)

    if(data.email == ""){
    	form.addClass('error');
    	messageContents = "Please provide a valid email address.";
    	message.html(messageContents);
    	return;
    }else if(data.last_name == ""){
    	form.addClass('error');
    	messageContents = "Please provide a last name.";
    	message.html(messageContents);
    	return;
    }else if(data.first_name == ""){
    	form.addClass('error');
    	messageContents = "Please provide a first name.";
    	message.html(messageContents);
    	return;
    }

    form.removeClass('error success');
    message.html('Submitted');
    return $.ajax({
      url: subscribe.data('form'),
      method: this.method,
      dataType: 'json',
      data: data,
      error: function(jqXHR, textStatus, errorThrown) {
        console.log("subscribe a", jqXHR, textStatus, errorThrown);
        form.addClass('error');
        return message.html(messageContents);
      },
      success: function(data, textStatus, jqXHR) {
        console.log("success, subscribe b", data, textStatus, jqXHR);
        form.addClass(data.status);
        if (data.result) {
          console.log(data.result)
          return message.html(messageContents);
        }
      }
    });
  });

  $.fn.serializeObject = function() {
    var a, o;
    o = {};
    a = this.serializeArray();
    $.each(a, function() {
      if (o[this.name]) {
        if (!o[this.name].push) {
          o[this.name] = [o[this.name]];
        }
        return o[this.name].push(this.value || '');
      } else {
        return o[this.name] = this.value || '';
      }
    });
    return o;
  };

}

Site.up_to = function(current_day, botd_array){
	// show up-to current day silhouette
	// for each silhoutte check it in comparison to the current day, if it is <=, then show, else hide
	botd_array.forEach(function(this_botd){
		var this_botd_day = parseInt(this_botd.getAttribute("data-silhouetteday"));
		if(this_botd_day <= current_day){
			this_botd.classList.remove("botd_hidden")
		}else{
			this_botd.classList.add("botd_hidden")
		}
	})
	document.querySelector(".archtober_logo").classList.remove("botd_hidden")
	TweenMax.set(".botd_filter", {opacity: 0.9})
}

Site.fadeInPage = function(archtober_logo_fadein, this_delay){
	var next_step = this_delay + 0.5,
			open_menu_step = next_step + 0.5;
	TweenMax.to(".archtober_logo", archtober_logo_fadein, {opacity: 1, delay: this_delay, ease: Power4.easeInOut})
	TweenMax.to(".botd_filter", 1.5, {opacity: 0.9, delay: next_step, ease: Power4.easeInOut})
	TweenMax.to("#open_menu", 1.5, {marginTop: 0, delay: open_menu_step, ease: Power4.easeInOut, onComplete: function(){
			document.querySelector("#open_menu").classList.add("visited")
			TweenMax.set("#open_menu", {clearProps: "marginTop"})
		}
	})
}

Site.intro_load_alt = function(){
	console.log("logo animation")
	var arch_logos = document.querySelectorAll(".arch_logo_animation");
	if(arch_logos !== undefined && arch_logos.length > 0){
		arch_logos.forEach(function(this_logo, index){
			TweenMax.to(this_logo, 0.25, {opacity: 1, delay: index*0.25 })
		})
	}
	TweenMax.to(".arch_logo_animation", 0.25, {opacity: 0, delay: 1.75})
	Site.fadeInPage(0.25, 1.75)
}

Site.intro_load = function(current_day, botd_array){
	document.querySelector(".archtober_logo").classList.add("botd_hyper_vis");
	// logo animation
	
	if(document.querySelector(".archtober_logo").classList.contains("logo_animation")){
		Site.intro_load_alt();
		return;
	}

	// BOTD animation
	botd_array.forEach(function(this_botd, index){
		TweenMax.to(this_botd, 1/botd_array.length, {opacity: 1, delay: index/botd_array.length, ease: Power4.easeInOut, onComplete: function(){
				this_botd.classList.remove("botd_hidden")
				TweenMax.set(this_botd, {clearProps: "opacity"})
			}
		})
	})
	var archtober_logo_fadein = (botd_array.length > 0) ? 1/botd_array.length : 0.25;
	Site.fadeInPage(archtober_logo_fadein, 1)
}

Site.botd_load = function(pageNameSpace){
	var botd_array = Array.prototype.slice.call(document.querySelectorAll(".botd_image"));
	var current_day = (document.querySelector(".day_current") != null) ? parseInt(document.querySelector(".day_current").getAttribute("data-current_day")) : 31;

	if(pageNameSpace == "home"){
		if(Site.visited == false){
			// first homepage visit: animation
			Site.intro_load(current_day, botd_array)
		}else if(Site.visited == true){
			// already visited
			document.querySelector("#open_menu").classList.add("visited")
			Site.up_to(current_day, botd_array)
		}
	}else if(pageNameSpace == "event"){
		// show just event silhouette
		// get day: show, hide all others
		var event_day = document.querySelector(".event_header").getAttribute("data-silhouetteday");
		botd_array.forEach(function(this_botd){
			this_botd.classList.add("botd_hidden")
		})
		var thisEvent = botd_array.filter(function(this_botd, index){
			return (parseInt(this_botd.getAttribute("data-silhouetteday")) == parseInt(event_day)) 
		})
		if(thisEvent.length > 0){ thisEvent[0].classList.remove("botd_hidden") }
		document.querySelector(".archtober_logo").classList.remove("botd_hidden")
		TweenMax.set(".botd_filter", {opacity: 0.9})
	}else{
		Site.up_to(current_day, botd_array)
	}
}

/* SITE TO-DOS */

Site.pageLeave = function(){
	// generic to-do for pages leaving
	document.querySelector("#arch_menu").classList.remove("open")
	TweenMax.set('body', {opacity :0})
	// TweenMax.set(window, {scrollTo: 0})
}

Site.pageEnter = function(upcoming_namespace){
	// generic to-do for pages leaving
	var animation = new TimelineLite()
			animation.set(window, {scrollTo: 0})
	             .to("body", 1, {opacity :1})
	             .set("body", {clearProps: "opacity"});

	Site.botd_load(upcoming_namespace)
	Site.menuInteraction()
	Site.crosspage_event_filter()

}

/* CROSS PAGE NAVIGATION */
Site.calendar = function(){

	document.querySelectorAll("a.cal_day").forEach(function(cal_button){
		cal_button.onclick = function(event){
			var mainNameSpace = document.querySelector("main").getAttribute("data-barba-namespace");
			console.log("mainNameSpace:", mainNameSpace)
			if(mainNameSpace == "home"){ // if we are starting on the homepage
				event.preventDefault();
				document.querySelector("#arch_menu").classList.remove("open") // exit menu
				if(cal_button.classList.contains("day_recent")){ // if its a hidden day
					document.querySelector("#recent_events").classList.add("open");
				}else{
					if(document.querySelector("#recent_events") != null){
						document.querySelector("#recent_events").classList.remove("open");
					}
				}
				var target_day_id = "#october_" + cal_button.getAttribute("data-targetday");
				TweenMax.to(window, (parseInt(cal_button.getAttribute("data-targetday"))/20) + 0.5, {scrollTo: {y: target_day_id, autoKill: false}, delay: 0.25});
				// TweenMax.set(window, {scrollTo: {y: target_day_id, autoKill: false}, delay: 0.25, onComplete: function(){
				// 	setTimeout(function(){alert(target_day_id);}, 1000)
				// }});
			}else{ // cross page navigation:
				Site.target_day = parseInt(cal_button.getAttribute("data-targetday"));
				console.log(Site.target_day)
			}
		}
	})
}

Site.crosspage_event_filter = function(){
	// if you click an event type from a different page, save that event type
	document.querySelectorAll("a.event_type_filter").forEach(function(this_event_filter){
		this_event_filter.onclick = function(event){
			Site.event_type = []; //clear event list
			Site.event_type.push(this_event_filter.getAttribute("data-eventtype"));
		}
	})
}

Site.ui_update = function(filter_array){
	if(filter_array.length == 0){
		document.querySelector("ul.arch_filter_list").classList.remove("active")
		document.querySelector(".index_sections").classList.remove("active")
	}else{
		document.querySelector("ul.arch_filter_list").classList.add("active")
		document.querySelector(".index_sections").classList.add("active")
		// update list tag

		filter_array.forEach(function(filter, index){
			document.querySelector("#eventtype_" + filter).classList.add("active")
		})

		// filter listed events
		document.querySelectorAll(".index_section").forEach(function(this_section){
			// console.log(this_section)
			var this_event_type_list = JSON.parse(this_section.getAttribute("data-eventtype"));
			var active_status = false;
			this_event_type_list.forEach(function(this_event_type, index){
				if(filter_array.includes(this_event_type)){
					this_section.classList.add("active")
					active_status = true;
				}

				if(index == this_event_type_list.length - 1 && active_status == false){
					this_section.classList.remove("active")
				}
			})
		})
	}
}

Site.event_filter = function(filter_array){
	Site.ui_update(filter_array);
	// if has selected filter(s): show
	document.querySelectorAll("li.arch_filter").forEach(function(this_event_filter){
		this_event_filter.onclick = function(event){
			var this_slug = this_event_filter.getAttribute("data-eventtype");
			if(filter_array.includes(this_slug)){
				// already has this filter on so i need to remove it via splice
				this_event_filter.classList.remove("active")
				filter_array.splice(filter_array.indexOf(this_slug), 1);
			}else{
				// enact filter
				filter_array.push(this_slug);
				this_event_filter.classList.add("active")
			}
			// update overall status
			Site.ui_update(filter_array);
		}
	})
}

window.onload = function(){
	console.log("Archtober 2019  👀\nSmall Stuff & Lukas Eigler-Harding")
	// load ui
	Site.starting_namespace = document.querySelector("main").getAttribute("data-barba-namespace");
	Site.menuInteraction();
	Site.emailSubmission();
	Site.calendar();
	// possibly create open cal and menu cal functions?
	Site.crosspage_event_filter();
	Site.botd_load(Site.starting_namespace)
	Site.visited = true;

	//page dependent functions
	if(Site.starting_namespace == "events-archive"){
		Site.event_filter(Site.event_type)
	}else if(Site.starting_namespace == "exhibitions"){
		Site.event_filter(Site.institutions)
	}else if(Site.starting_namespace == "partners"){
		Site.event_filter(Site.partner_type)
	}else if(Site.starting_namespace == "home"){
		Site.homepageToggle();
	}

	// barba transitions
	barba.init({
		transitions: [{
			name: 'target_day',
			sync: true,
			to: {
				namespace: [
					'home'
				]
			},
			beforeLeave(){
				// console.log("target_day, leaving")
				Site.pageLeave()
			},
			afterEnter(data){
				// console.log("homepage entered!")
				if(Site.target_day > 0 && Site.target_day < 32){
					if(document.querySelector("#archtober_" + Site.target_day).classList.contains("day_recent")){ // if its a hidden day
						document.querySelector("#recent_events").classList.add("open")
					}else{
						// if(document.querySelector("#recent_events") != null){ // if recent events exist but happen to be open
						// 	document.querySelector("#recent_events").classList.remove("open")
						// }
					}

					document.querySelector("#open_menu").classList.add("visited")
					
					TweenMax.set(window, {scrollTo: {y: "#october_" + Site.target_day, autoKill: false}, delay:0.25, onComplete: function(){
							Site.target_day = 0; // clear day
							TweenMax.to("body", 1, {opacity :1, onComplete: function(){
								TweenMax.set("body", {clearProps: "all"})
							}})
						}
					})
				}else{
					Site.pageEnter(data.next.namespace);
				}
				Site.calendar();
				Site.homepageToggle();
			}
		},
		{
			name: 'target_event_type',
			sync: true,
			to: {
				namespace: [
					'events-archive'
				]
			},
			beforeLeave(){
				Site.pageLeave()
			},
			afterEnter(data){
				Site.pageEnter(data.next.namespace)
				Site.event_filter(Site.event_type) // filter for event type
			}
		},
		{
			name: 'target_event',
			sync: true,
			to: {
				namespace: [
					'event'
				]
			},
			beforeLeave(data){
				Site.pageLeave();
			},
			afterEnter(data){
				Site.pageEnter(data.next.namespace);
				Site.calendar();
			}
		},
		{
			name: 'target_exhibitions',
			sync: true,
			to: {
				namespace: [
					'exhibitions'
				]
			},
			beforeLeave(data){
				Site.pageLeave()
			},
			afterEnter(data){
				Site.pageEnter(data.next.namespace)
				Site.event_filter(Site.institutions)
			}
		},
		{
			name: 'target_partners',
			sync: true,
			to: {
				namespace: [
					'partners'
				]
			},
			beforeLeave(data){
				Site.pageLeave()
			},
			afterEnter(data){
				Site.pageEnter(data.next.namespace)
				Site.event_filter(Site.partner_type)
			}
		},
		{
			name: 'basic_transition',
			sync: true,
			beforeLeave(data){
				// console.log("basic_transition, leaving", data.current.namespace, data.next.namespace)
				Site.pageLeave()
			},
			afterEnter(data){
				Site.pageEnter(data.next.namespace)
			}
		}]
	})
}