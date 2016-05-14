/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(window).load(function ($) {
    jQuery('#calendar_wrap td:has(a)').addClass('calendar-post-day');


    jQuery(".filter-group-li ul").hide("slow");
    jQuery(".filter-group-link").click(function () {
        $parent = jQuery(this).parent();
        $parent.find("ul").toggle("slow", function () {
            // Animation complete.
            if (jQuery(this).is(":visible")) {
                //jQuery(this).find("a.selected").removeClass("selected");
            }
            else {
                jQuery(this).find("a.selected").removeClass("selected");
                var filters = [];
                jQuery('.filter-group  .option-set a.selected').each(function () {
                    value = jQuery(this).attr('data-option-value');

                    filters.push(value);
                });

                filters = filters.join('');
                $container.isotope({filter: filters});
            }
        });
    });


    var $container = jQuery('.portfolio-items');
    $container.isotope('destroy');
    $container.isotope({
        //masonry: { columnWidth: $container.width() / 5 },
        itemSelector: '.item'
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
    });




    jQuery(function () {
        if (jQuery('#sidebar').length !== 0) {
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
            jQuery("#page-content").height(max + 200);
            //alert(v1+" * "+v2+" * "+v3+" * "+v4);
        }

        if (jQuery('.archive').length !== 0) {
            jQuery(".archive article .loop-entry-details").dotdotdot({height: 120});
        }
    });
});