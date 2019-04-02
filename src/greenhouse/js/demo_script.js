/*
 DEMO

*/

$(function () {
  $('#demo-form').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  })
  .on('form:submit', function() {

    console.log("LOG THE VALUE OF THE SEARCH FIELD HERE.");
    console.log($("#schoolsList").attr('class'));
    return false; // Don't submit form for this demo
  });
});
