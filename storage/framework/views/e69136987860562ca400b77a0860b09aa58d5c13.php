<?php
$url = "https://api.themoviedb.org/3/movie/550?api_key=21b13176f716967f59bee59b002e6819";
//$url = "https://api.themoviedb.org/3/list/1?api_key=21b13176f716967f59bee59b002e6819&language=pt-br";
$listas = json_decode(file_get_contents($url));
echo"<pre>";
print_r($listas);
?>
<?php echo e($listas->original_title); ?>




<?php /**PATH D:\desafio\resources\views/teste.blade.php ENDPATH**/ ?>