
<div class="alert alert-success text-center shadow" id="alert-bienvenido" role="alert">
    Bienvenido <?php echo $nombre ?>!
</div>

<?php  
echo 
    '<script>  
        $("#alert-bienvenido").fadeTo(3000, 500).slideUp(1000);
    </script>'; 
?> 