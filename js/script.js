jQuery(document).ready(function(){




    jQuery('#keyword').on('keyup', function(){
            jQuery('#container').load('jQuery/tabel.php?keyword='+ jQuery('#keyword').val());
    });

});
