$(document).ready(function(){
  $("#remove-alert-error").click(function(){
    url = $(this).attr('ref');
    $.ajax({
      url: url
    });
  });

  $(".param-edit-btn").click(function() {
    var $line = $(this).parents('tr');
    var $form = $('#form');
    $('#index').val($(this).attr('def-param'));
    $('#block').html($line.children('.block').html());
    var title = $line.children('.title').html();
    var opts = $('#title option');
    console.log("title"+title);
    console.log("Options array >>> ");
    opts.each(function(i, ele){
      var tmp = $(ele).html();
      console.log(tmp);
      if(tmp == title){
        $(ele).attr("selected", "selected");
      }
    });
  });

  $("#param-save-btn").click(function() {
    var $form = $(this).parents('tr');
    var url = $form.attr('form-target');
    var opts = $('#title option');
    var id = $('#index').val();
    var data = {
      block: $('#block').val(),
      param: $('#title').val()
    };
    if(id!="nan"){
      data['id'] = id;
    }
    $.ajax({
      type: "POST",
      url: url,
      data: data,
      success: function(data) {
        location.reload();
        $('li.active').removeClass('active');
        $('li.param').addClass('active');
      }
    });
  });

  $(".cr-edit-btn").click(function() {
  	var $line = $(this).parents('tr');
    var $form = $('#cr-form');
    $('#cr-index').val($(this).attr('cr-id'));
    $('#cr-block').html($line.children('.block').html());
    var type = $line.children('.type').html();
    var opts = $('#cr-type option');
    console.log(type);
    opts.each(function(i, ele){
      var tmp = $(ele).val();
      console.log(" >>> "+tmp);
      if(tmp == type){
        $(ele).attr("selected", "selected");
      }
    });
  });

  $("#cr-save-btn").click(function() {
    var $form = $(this).parents('tr');
    var url = $form.attr('form-target');
    var opts = $('#title option');
    var id = $('#cr-index').val();
    var data = {
      block: $('#cr-block').val(),
      type: $('#cr-type').val()
    };
    if(id!="nan"){
      data['id'] = id;
    }
    $.ajax({
      type: "POST",
      url: url,
      data: data,
      success: function(data) {
        location.reload();
        $('li.active').removeClass('active');
        $('li.param').addClass('active');
      }
    });
  });
});