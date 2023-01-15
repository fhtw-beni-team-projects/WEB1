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

function change_order(id, change) {
  if (called) return false;
  called = true;

  $.post("/order.php", {
    change: change,
    id: id,
  }, function(success) {
    if (success) {
      // TODO: change html
    };
  });

  reload();
}

function change_user(id, change) {
  if (called) return false;
  called = true;

  $.post("/user.php", {
    change: change,
    id: id,
  }, function(success) {
    if (success) {
      // TODO: change html
    };
  });

  reload();
}

function check_password(form) {
  pwd1 = form.pwd.value;
  pwd2 = form.pwd2.value;

  if (pwd1 == '') {
    alert ("Please enter Password");
  } else if (pwd2 == '') {
    alert ("Please enter confirm password");
  } else if (pwd1 != pwd2) {
    alert ("\nPassword did not match: Please try again...")
    return false;
  } else { 
    return true;
  }
}