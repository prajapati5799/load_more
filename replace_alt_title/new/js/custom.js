jQuery(document).ready(function(){
  get_data_ajax('find');
});
let currentPage = 1;
var call_action = 3;
  jQuery("#LoadMore").click(function(){
   currentPage++; // Do currentPage + 1, because we want to load the next page
   jQuery.ajax({
        type: 'POST',
        url: localajax.ajaxurl,
        dataType: 'html',
        data: {
          'action': 'data_fetch',
          'btn_action': call_action,
          'paged': currentPage,
        },
        success: function (response) {
          // alert(response)
          console.log(response);
          return false;
          if(!response) {
            jQuery('#LoadMore').hide();
          }
          jQuery(".data_class").append(response);
        }
      });
    

  });



get_data_ajax = function (e) {

  var ajaxurl = localajax.ajaxurl;
  var action = jQuery(e.target).data('action');
  var call_action = 1;
  

  if (action == 'update') {
    call_action = 2;
  }

  var box_data = new Array();
  jQuery('.data_class').find('.box_data_input').each(function (i) {
    var cTitle = jQuery(this).find('.cTitle').val();
    var cAlt = jQuery(this).find('.cAlt').val();
    var attid = jQuery(this).attr('data-attid');
    
    box_data.push({
      cTitle: cTitle,
      cAlt: cAlt,
      attid: attid,
    });
  });
  jQuery.ajax({
    url: localajax.ajaxurl, // this will point to admin-ajax.php
    dataType: 'html',
    type: 'POST',
    data: {
      'action': 'data_fetch',
      'btn_action': call_action,
      'box_data': box_data,
    },
    success: function (response) {
      jQuery(".data_class").html(response);

      if (call_action == 1) {
        if (jQuery('.data_class').children().length == 0) {
          var mystruct = '<h2 class="data_not_available fail">Data Not Found</h2>';
          jQuery(".data_class").html(mystruct);
        }
      }
      else{
        var mystructs = '<h2 class="data_not_available pass">Data sucessfully Add</h2>';
        jQuery(".data_class").html(mystructs);
      }
    }
  });

}


