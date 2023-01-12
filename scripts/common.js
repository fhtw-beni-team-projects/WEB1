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

function room(room_id) {
  if (called) return false;
  called = true;
  let form = document.createElement('form');
  form.action = 'post';
  form.method = 'GET';
  form.innerHTML = '<input type="hidden" name="room" value="' + room_id + '">';
  document.body.append(form);
  form.submit();
}