  $(document).ready(function(){
    $('.modal').modal();
    $('.sidenav').sidenav();
    $('select').formSelect();
    $('.datepicker').datepicker();
    $('.tabs').tabs();
    $('.dropdown-button').dropdown();
    $('.carousel').carousel();
    $('.carousel').carousel('next');
    $('.carousel').carousel('next', 3);
    $('.carousel').carousel('prev');
    $('.carousel').carousel('prev', 4);
    $('.carousel').carousel('set', 4);
    $('.carousel').carousel('prev');
    $('.carousel').carousel('indicators', true);

  });

  function readURL(input) {
    if (input.files && input.files[0]) {
  
      var reader = new FileReader();
  
      reader.onload = function(e) {
        $('.image-upload-wrap').hide();
  
        $('.file-upload-image').attr('src', e.target.result);
        $('.file-upload-content').show();
  
        $('.image-title').html(input.files[0].name);
      };
  
      reader.readAsDataURL(input.files[0]);
  
    } else {
      removeUpload();
    }
  }
  
  function removeUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();
  }
  $('.image-upload-wrap').bind('dragover', function () {
          $('.image-upload-wrap').addClass('image-dropping');
      });
      $('.image-upload-wrap').bind('dragleave', function () {
          $('.image-upload-wrap').removeClass('image-dropping');
  });









  function play(id){


    $.ajax({url: '/song/'+id,
    success: function(results){
    
        var audio = [
          {
            name: results.song_name,
            artist: results.artist_name,
            url: '../music/'+results.song,
            cover: '../uploads/'+results.cover_image
          },
        ]
  
        const ap = new APlayer({
          container: document.getElementById('aplayer'),
          listFolded: true,
          mini: false,
          autoplay: true,
          theme: '#1a237e',
          
          audio: audio
      });
  
    }});

    updateStream(id);
  }

  function updateStream($song_id){
    $.ajax({url: '/streams/'+$song_id,
    success: function(results){
      console.log(results)
    }});
  }