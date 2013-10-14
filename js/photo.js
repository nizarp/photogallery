$('document').ready(function() {
    
    $('.photo-edit-btn').click(function(){
        self.location = '/index.php/photo/edit/'+$(this).attr('rel');
    });
    
    $('.photo-delete-btn').click(function(){
        var el = $(this).parent().parent();
        if(confirm('Are you sure you want to delete this Photo?')) {
            //self.location = '/index.php/photo/delete/'+$(this).attr('rel');
            $.post('/index.php/photo/delete/'+$(this).attr('rel'),function(response){
                if(!response) {
                    $.prompt('Unable to delete!');
                } else {
                    el.remove();
                }
            });
        }
    });
    
    $('#rating').change(function(){
        var rating = $(this).val();
        var user_id = $(this).attr('rel');
        var photo_id = $('#photo_id').val();
        if(rating != '') {
            var data = {
                'rating' : rating,
                'user_id' : user_id,
                'photo_id' : photo_id
            };
            $.post('/index.php/photo/rate/', {'data': data}, function(response){
                if(response) {
                    $.prompt('Saved successfully!');
                    $('#avg_rating').text(response);
                }
            });
        }
    });
    
    $('.comment-delete-btn').click(function(){
        var commentId = $(this).attr('rel');
        if(confirm('Are you sure you want to delete this Comment?')) {            
            $.post('/index.php/photo/deletecomment/'+commentId, function(response){
                if(response) {
                    $('#comment_'+commentId).remove();
                }
            });
        }
    });
    
    $('#add-comment-btn').click(function(){
        var photo_id = $('#photo_id').val();
        var user_id = $(this).attr('rel');
        var comment = $.trim($('#comment').val());
        
        if(comment != '') {
            
            var data = {
                'comment' : comment,
                'user_id' : user_id,
                'photo_id' : photo_id
            };
            
            $.post('/index.php/photo/comment/', {'data': data}, function(response){
                if(response) {
                    self.location = '/index.php/photo/display/'+photo_id;
                }
            });
        }
    });

});