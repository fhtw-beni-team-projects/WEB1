function openForm(form) {
  $("#" + form + ", .darkener").show();
}

function closeForm() {
  $(".popup, .darkener").hide();
}

function changeForm(form) {
  $(".popup").hide();  
  $("#" + form).show();
}

function switchFeed(feed) {
  $(".feed").hide();  
  $("#" + feed).show();
}