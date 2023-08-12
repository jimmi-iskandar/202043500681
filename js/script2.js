jQuery(document).ready(function(){

    jQuery('#keyword').on('keyup', function(){
            jQuery('#container').load('jQuery/tabel2.php?keyword='+ jQuery('#keyword').val());
    });
    

});