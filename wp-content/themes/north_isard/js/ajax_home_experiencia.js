/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(document).ready(function () {

    jQuery.ajaxSetup({cache: false});
    jQuery(".ajax-exp-link").click(function (e) {
        jQuery.ajaxSetup({cache: false});
        e.preventDefault();
        var post_link = jQuery(this).attr("href");
        jQuery("#expertise-detail-ajax").css('border','none');
        jQuery("#expertise-detail-ajax").html("");
        jQuery("#expertise-detail-ajax").html('<div class="colio-loader" style="display: block;"><i></i></div>');
        jQuery("#expertise-detail-ajax").show();
        

        jQuery.ajax({
            //url: ajaxexperiencia.ajaxurl,
            url: post_link,
            type: 'post',
            data: {
                action: 'ajax_experiencia',
                desti: post_link
            },
            success: function (result) {
                jQuery("#expertise-detail-ajax").hide();
                 jQuery("#expertise-detail-ajax").css('border','#5E5F5F dashed 2px');
                jQuery("#expertise-detail-ajax").html(result);
                jQuery("#expertise-detail-ajax").fadeIn(1000,function(){
                    
                    jQuery('html, body').animate({
    scrollTop: jQuery("#sar-imaging-btn").offset().top
}, 1000);
                });

              

jQuery("#expertise-close-ajax").on("click",function(e){e.preventDefault();jQuery("#expertise-detail-ajax").fadeOut(1000)})
            }
        })


        return false;
    });

});


function ajax_load(post_link, selector) {
    //alert(post_link+" ... "+selector);
    jQuery(selector).html("Loading...");
    jQuery(selector).load(post_link);
}

    