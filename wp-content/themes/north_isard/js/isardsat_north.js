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


});
