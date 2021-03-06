// # HOME/INDEX screen controller
var scrollDiv = function(divId, depl) {
    var scroll_container = document.getElementById(divId);
    scroll_container.scrollLeft -= depl;
};

var launchScroll = function(divId, depl) {
    var time = 0
    for (i=0; i<240; i++) {
        setTimeout('scrollDiv("'+divId+'", '+depl+')', time);
        time++;
    }
};

document.observe("dom:loaded", function() {    
       document.getElementById('slider0_next').onclick = function() { launchScroll('slider0', -4); }
       document.getElementById('slider0_previous').onclick = function() { launchScroll('slider0', 4); }
       
       document.getElementById('hero_next').onclick = function() {
       		launchScroll('slider1', -4);
       		launchScroll('slider2', -4);
       	}
		
		document.getElementById('hero_previous').onclick = function() {
       		launchScroll('slider1', 4);
       		launchScroll('slider2', 4);
       	}
});
