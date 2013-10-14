$('document').ready(function() {
    
    $('.album-delete-btn').click(function(){
        if(confirm('Are you sure you want to delete this Album?')) {
            self.location = '/index.php/album/delete/'+$(this).attr('rel');
        }
    });
    
    $('.album-edit-btn').click(function(){
        self.location = '/index.php/album/edit/'+$(this).attr('rel');
    });
    
    $('.photo-edit-btn').click(function(){
        self.location = '/index.php/photo/edit/'+$(this).attr('rel');
    });
    
    $('.photo-delete-btn').click(function(){
        var el = $(this).parent().parent();
        if(confirm('Are you sure you want to delete this Photo?')) {
            $.post('/index.php/photo/delete/'+$(this).attr('rel'),function(response){
                if(!response) {
                    $.prompt('Unable to delete!');
                } else {
                    el.remove();
                }
            });
        }
    });

});

function setPlay()
{
    var firstPhoto = $('img').first().attr('src');
    $('#play-btn').attr('href', firstPhoto);
}