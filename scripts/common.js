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
  form.action = 'post';
  form.method = 'GET';
  form.innerHTML = '<input type="hidden" name="room" value="' + room_id + '">';
  document.body.append(form);
  form.submit();
}

function open_article(news_id) {
  if (called) return false;
  called = true;
  let form = document.createElement('form');
  form.action = 'post';
  form.method = 'GET';
  form.innerHTML = '<input type="hidden" name="arcticle" value="' + news_id + '">';
  document.body.append(form);
  form.submit();
}

function noClick() {
  if (called) return false;
  called = true;
  reload();
}

function deletePost(id) {
  if (called) return false;
  called = true;

  $("#deletePost, .darkener").show();

  $("#deletePostConfirm").click(function() {
    $.post("/", {
      delete: 1,
      postid: id,
    }, function(success) {
      if (success) {
        $("#article_" + id).detach();
        $("#deletePost, .darkener").hide();
      };
    });
  });

  reload();
}