jQuery(document).ready(function($){
  $(".eos-dp-save-eos_dp_ecfa_" + fdp_avada.page).on("click", function () {
    $('.eos-dp-opts-msg').addClass('eos-hidden');
    var chk,str = '';
    $('.eos-dp-avada').each(function(){
      chk = $(this);
      str += !chk.is(':checked') ? ',' + $(this).attr('data-path') : ',';
    });
    eos_dp_send_ajax($(this),{
      "nonce" : $("#eos_dp_avada_" + fdp_avada.page + "_setts").val(),
      "eos_dp_avada_data" : str,
      "page" : fdp_avada.page,
      "action" : 'eos_dp_save_avada_' + fdp_avada.page + '_settings'
    });
    return false;
  });
});
