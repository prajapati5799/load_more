
jQuery(document).ready(function () {
  // var action = jQuery('#loadMore').data('action');
  // var call_action = '';
  // if (action == 'findmore') {
  //   call_action = 3;
  // }

  // jQuery("#loadMore").hide();
  // let currentPage = 1;
  // jQuery('#loadMore').click(function () {
  //   currentPage++;
  //   jQuery.ajax({
  //     type: 'POST',
  //     url: localajax.ajaxurl,
  //     dataType: 'json',
  //     data: {
  //       action: 'data_fetch',
  //       btn_action: call_action,
  //       paged: currentPage,
  //     },
  //     success: function (res) {

  //       var html = '';

  //       jQuery.each(res.data, function (index, value) {
  //         html += '<div class="col-md-3 box_data_input" data-attid="">' +
  //           '<div class="news-box">' +
  //           '<div class="img col-md-6"><img width="120" height="120" src="'+value.box_data.img_url+'" alt=""></div>' +
  //           '<div class="info col-md-6" >' +
  //           '<div class="news-title"><input placeholder="Enter title" type="text" class="cTitle"  name="cTitle" value=""></div>' +
  //           '<div class="post-col"><input placeholder="Enter Alter text" type="text"  class="cAlt" name="cAlt" value=""></div>' +
  //           '</div>' +
  //           '</div>' +
  //           '</div>';
  //       });
  //       jQuery('.data_class').append(html);
  //     }
  //   });
  // });

  get_data_ajax = function (e) {


    jQuery("#loadMore").show();
    let currentPage = 1;

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
      currentPage++;
      box_data.push({
        cTitle: cTitle,
        cAlt: cAlt,
        attid: attid,
      });
    });

    
    jQuery.ajax({
      url: localajax.ajaxurl, // this will point to admin-ajax.php
      dataType: 'json',
      type: 'POST',
      data: {
        'action': 'data_fetch',
        'btn_action': call_action,
        'box_data': box_data,
      },
      success: function (response) {


        // console.log(response);
        // return false;

        jQuery(".find").hide();
        // jQuery(".data_class").html(response);
        var html = '';

        if (call_action == 1) {
          jQuery.each(response.data, function (index, value) {
            html += '<div class="col-md-3 box_data_input" data-attid="">' +
              '<div class="news-box">' +
              '<div class="img col-md-6"><img width="120" height="120" src="'+value.box_data.img_url+'" alt=""></div>' +
              '<div class="info col-md-6" >' +
              '<div class="news-title"><input placeholder="Enter title" type="text" class="cTitle"  name="cTitle" value=""></div>' +
              '<div class="post-col"><input placeholder="Enter Alter text" type="text"  class="cAlt" name="cAlt" value=""></div>' +
              '</div>' +
              '</div>' +
              '</div>';
          });
          jQuery('.data_class').append(html);
        }
        
        

        // if (call_action == 1) {
        //   //jQuery(".find").hide();
        //   if (jQuery('.data_class').children().length == 0) {
        //     var mystruct = '<h2 class="data_not_available fail">Data Not Found</h2>';
        //     jQuery(".data_class").html(mystruct);
        //   }
        // }
        // else {
        //   var mystructs = '<h2 class="data_not_available pass">Data sucessfully Add</h2>';
        //   jQuery(".data_class").html(mystructs);
        // }


      }
    });

  }

});





