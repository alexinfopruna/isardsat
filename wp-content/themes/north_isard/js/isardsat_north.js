/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(window).load(function ($) {
    jQuery('#calendar_wrap td:has(a)').addClass('calendar-post-day');

    jQuery(".filter-group-li ul").hide("slow");
    jQuery(".filter-group-link").click(function (){ 
        $parent = jQuery(this).parent();
        $parent.find("ul").toggle("slow", function () {
            // Animation complete.
            if (jQuery(this).is(":visible")) {
                
            }
            else {
                var filters = [];
                jQuery(this).parent().find(".option-set a.selected").each(function () {
                     jQuery(this).removeClass('selected');
                });
                
                jQuery('.filter-group  .option-set a.selected').each(function () {
                    value = jQuery(this).attr('data-option-value');
                   
                    filters.push(value);
                });

                filters = filters.join('');
                $container.isotope({filter: filters});
            }
            
            controlaParents();
        });
    });


    var $container = jQuery('.portfolio-items');
    
    $container.isotope('destroy');
    $container.isotope({
        //masonry: { columnWidth: $container.width() / 5 },
        itemSelector: '.item',
  columnWidth: '.item'
    });

    var $optionSets = jQuery('.filter-group .option-set'),
            $optionLinks = $optionSets.find('a');
    $optionLinks.click(function () {
        return false;
    });
    $optionLinks.live('click', function () {
        return false;
    });
    $optionLinks.unbind('click');
    $optionLinks.off('click');
    $optionLinks.off();
    /************************************/
    $optionLinks.click(function (e) {
        var $this = jQuery(this);
        var value;
/////////////


        if ($this.attr('data-option-value') == '*') {
            jQuery('.filter-group  .option-set a.selected').removeClass('selected');
            jQuery('.filter-group  a.option-set.selected').removeClass('selected');
            jQuery(".filter-group-li ul").hide();
        }
        if ($this.hasClass('selected')) {
            $this.removeClass('selected');
        }
        else {
            $this.addClass('selected');
            jQuery('.filter-group  .option-set a[data-option-value="*"]').removeClass('selected');
            
        }
        /////////////////////   

        var filters = [];
        jQuery('.filter-group  .option-set a.selected').each(function () {
            value = jQuery(this).attr('data-option-value');

            filters.push(value);
        });

        filters = filters.join('');
        $container.isotope({filter: filters});
        
        controlaParents();
    });

    function controlaParents(){
        jQuery("ul#filter-group-1 a.filter-group-link").removeClass("selected");
        jQuery("ul#filter-group-2 a.filter-group-link").removeClass("selected");
        jQuery("ul#filter-group-3 a.filter-group-link").removeClass("selected");
        jQuery('.filter-group  .option-set a[data-option-value="*"]').removeClass('selected');
        
        var $f1=jQuery("#filter-group-1 #options a.selected").length;
        var $f2=jQuery("#filter-group-2 #options2 a.selected").length;
        var $f3=jQuery("#filter-group-3 #options3 a.selected").length;
        
        if ($f1) jQuery("ul#filter-group-1 a.filter-group-link").addClass("selected");
        if ($f2) jQuery("ul#filter-group-2 a.filter-group-link").addClass("selected");
        if ($f3) jQuery("ul#filter-group-3 a.filter-group-link").addClass("selected");
        if (!$f1 && !$f2 && !$f3)  jQuery('.filter-group  .option-set a[data-option-value="*"]').addClass('selected');
    }
    
    controlaParents();
    
    jQuery(function () {
        
        if (jQuery('#sidebar').length !== 0) {
            sidebar_height();
        }

        if (jQuery('.archive').length !== 0) {
            jQuery(".archive article .loop-entry-details").dotdotdot({height: 85});
        }
    });

    jQuery(window).resize(sidebar_height);

    function sidebar_height() {
        if (!jQuery("body").hasClass("archive") && !jQuery("body").hasClass("single-post")) return;
        //return;
        var v1 = jQuery("#sidebar").height();
        if (!jQuery("#sidebar").is(':visible')) {
            jQuery('#toggle-wrap').show()
            v1 = jQuery("#sidebar").height();
            jQuery('#toggle-wrap').hide();
        }
        var v2 = jQuery("#ccprimary").height();
        var v3 = jQuery("#sidebar-right").height();
        var v4 = jQuery(".page-layout-82").height();
        var max = Math.max(v1, v2, v3, v4)
        jQuery("#page-content").height(max + 50);
    }
   
    jQuery(".lang_sel_sel").unbind();
    jQuery(".lang_sel_sel").on( "click",function(ev){ev.preventDefault();});
    
});

function ajax_load(page, selector){
	alert("holaaaaa "+selector);
	jQuery(selector).html("Loading...");
}

//j \d\e F \d\e Y