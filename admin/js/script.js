/*$(document).ready(function(){

    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.error( error );
    } );

  

});*/
tinymce.init({selector:'textarea'});
$(document).ready(function(){


    $('#selectAllBoxes').click(function(event){

        if(this.checked){

            $('.checkBoxes').each(function(){

                this.checked=true;

            });
        } else{

            $('.checkBoxes').each(function(){

                this.checked=false;

            });
        }




    });
    




});

    

