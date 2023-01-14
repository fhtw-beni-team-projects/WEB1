var called = false; // idk what this is, but it works

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

function open_room(room_id) {
  if (called) return false;
  called = true;
  let form = document.createElement('form');
  form.action = '';
  form.method = 'GET';
  form.innerHTML = '<input type="hidden" name="room" value="' + room_id + '" />';
  document.body.append(form);
  form.submit();
}

function open_article(news_id) {
  if (called) return false;
  called = true;
  let form = document.createElement('form');
  form.action = '';
  form.method = 'GET';
  form.innerHTML = '<input type="hidden" name="article" value="' + news_id + '" />';
  document.body.append(form);
  form.submit();
}

function noClick() {
  if (called) return false;
  called = true;
  reload();
}

function edit_article(id) {
  if (called) return false;
  called = true;
  let form = document.createElement('form');
  form.action = '?article=' + id + '&edit';
  form.method = 'POST';
  form.innerHTML = '<input type="hidden" name="url" value="' + window.location.href + '" />';
  document.body.append(form);
  form.submit();
}

function new_article(id) {
  if (called) return false;
  called = true;
  let form = document.createElement('form');
  form.action = '?new';
  form.method = 'POST';
  form.innerHTML = '<input type="hidden" name="url" value="' + window.location.href + '" />';
  document.body.append(form);
  form.submit();
}

function delete_article(id) {
  if (called) return false;
  called = true;

  $("#delete_article, .darkener").show();

  $("#deletePostConfirm").click(function() {
    $.post("/delete.php", {
      delete: 1,
      id: id,
    }, function(success) {
      if (success) {
        $("#article_" + id).detach();
        $("#deletePost, .darkener").hide();
      };
    });
  });

  reload();
}

function reload() {
  var head = document.getElementsByTagName('head')[0];
  var script = document.createElement('script');
  script.src = '../scripts/common.js';
  head.appendChild(script);
}