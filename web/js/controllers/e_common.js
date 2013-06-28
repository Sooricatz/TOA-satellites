// # COMMON screen controller
document.observe("dom:loaded", function() {

     if ($('hero') == undefined) {
     	var submenu_offset = 116;
     } else {
     	var submenu_offset = 596;
     }
 
     new ScrollSpy({
               container: window,
               min: submenu_offset,
               onEnter: function(c) {
                  $('submenu-content').setStyle({'position':'fixed'});
                  $('submenu-content').setStyle({'left':'50%'});
                  $('submenu-content').setStyle({'top':'5px'});
                  $('submenu-content').setStyle({'margin':'0 0 0 -480px'});
                  $('sect').setStyle({'margin':'0 8px 0 -6px'});
                  $('login-bg').setStyle({'borderBottom':'1px solid #dedede'});
				},
                  
               onLeave: function(c) {
                  $('submenu-content').setStyle({'position':'relative'});
                  $('submenu-content').setStyle({'left':'0'});
                  $('submenu-content').setStyle({'top':'7px'});
                  $('submenu-content').setStyle({'margin':'0'});
                  $('sect').setStyle({'margin':'0 8px 0 12px'});
                  $('login-bg').setStyle({'borderBottom':'none'});

               }
     });
          
     new ScrollSpy({
               container: window,
               min: 82,
               onEnter: function(c) {
                  $('hero_background').setStyle({'position':'fixed'});
                  $('hero_background').setStyle({'top':'30px'});
                  $('hero_background').setStyle({'left':'50%'});
                  $('hero_background').setStyle({'margin':'0 0 0 -480px'});
				},
                  
               onLeave: function(c) {
                  $('hero_background').setStyle({'position':'static'});
                  $('hero_background').setStyle({'top':'auto'});
                  $('hero_background').setStyle({'left':'auto'});
                  $('hero_background').setStyle({'margin':'0'});
               }
     });
     
     new ScrollSpy({
               container: window,
               min: 580,
               onEnter: function(c) {
                  $('hero').setStyle({'visibility': 'Hidden'});

				},
                  
               onLeave: function(c) {
                  $('hero').setStyle({'visibility': 'visible'});
               }
     });

});