$(document).ready(function(){
  $('.article-title-list > .at-list > div').on('click', function () {
     const id = $(this).data('id');
      $.get( "/article/?id=" + id, function( data ) {
          $( ".article-body" ).html( data );
      });
      $.get( "/comment/?article_id=" + id, function( data ) {
          $( ".comment-body" ).html( data );
      });
  })

    $('#save-article').on('click', function () {
        var formData = new FormData();
        formData.append("title", $('#edit-article-title').val());
        formData.append("text", $('#edit-article-text').val());
        formData.append("user_id", 1);
        formData.append( 'Article[imageFile]', $('#inputGroupFile01')[0].files[0]);

        $.ajax({
            url: '/article/create',
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(){
                document.location.reload();
            }
        });
    })

    $('#save-comment').on('click', function () {
        var formData = new FormData();
        formData.append("text", $('#edit-comment-text').val());
        formData.append("user_id", 1);
        formData.append("article_id", $('#edit-comment-article-id').val());

        $.ajax({
            url: '/comment/create',
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(value){
                $('.comment-body').append(value);
            }
        });
    })
})