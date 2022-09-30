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