$(document).ready( function () {
    $('.delete-btn').on('click',function(e){
        let answer = confirm('Are you sure you want to delete this item?');

        if(answer){
         $(this).parents("form").submit();
        }
        else{
         e.preventDefault();      
        }
    });
});