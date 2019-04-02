/*

  SCRIPTS
  This is where we want to see the development of your code. Please comment all code and explain responsibilities functions, methods, etc.

*/

//Global
var term;
var page = 1;

// Returns data from API with these 2 parameters - term, page.
// term : Returns any schools containing this string in their name.
// page : A cursor for use in pagination. Returns the n-th chunk of objects (100 per page).
function ajaxCallFunction(term, page) {
  $.ajax({
      url: "https://boards-api.greenhouse.io/v1/boards/romeopower/education/schools",
      type: 'GET',
      dataType: 'JSON',
      data: {
        "term": term,
        "page": page
      },
      //ajax call success.
      success: function (data) {
        $("#schools").show();
        if (data.items.length > 4 || data.items.length === 0)
          $("#schools").css('height', '205px')
        else
          $("#schools").css('display', 'none')
        for (let i = 0; i<data.items.length; i++) {
          $('#schools').append($('<input>', {
            class: 'schools',
            id: data.items[i].id,
            value: data.items[i].text
          }));
        }
        $("#loading"+page).hide();
      }
  //ajax call failed.
  }).fail(function (data) {
      console.log("____ ajax failed ____");
      console.log(data);
  });
}

// Event scroll function
term = $("#schoolsList").val();
$("#schools").on('scroll', function() {
    if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
      $('#schools').append($('<img>', {
        id: "loading" + page,
        class: "loading",
        src: 'greenhouse/assets/images/loading.gif'
      }));
      ajaxCallFunction(term, page);
      page = page + 1;
    }
})

// When user type keys in search.
$('#schoolsList').keyup(function () {
  term = $(this).val();
  if (term.length > 3) {
    ajaxCallFunction(term, page);
  } else {
    $('#schools').empty();
    $("#schools").css('display', 'none')
  }
  // Effect hover event in searchBar.
  $(this).val().length ? $( "#searchButton" ).hide() : $( "#searchButton" ).show()
});

// When user select one of the lists
$(document).on('click', ".schools", function() {
  $("#schoolsList").val($(this).val());
  $("#schoolsList").addClass($(this).attr('id'));
  $("#schools").hide();
});

$(document).ready(function(){
  $("#schools").css('display', 'none');
});
