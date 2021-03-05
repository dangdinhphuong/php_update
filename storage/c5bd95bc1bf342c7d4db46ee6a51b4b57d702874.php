<script src='<?php echo e(THEME_FONTEND_URL); ?>js/jquery.js'></script>
<script src='<?php echo e(THEME_FONTEND_URL); ?>js/plugins.js'></script>
<script src='<?php echo e(THEME_FONTEND_URL); ?>js/scripts.js'></script>
<script src="https://cdn.tiny.cloud/1/ld34vclndumv7xny2s3pnsrpxwoe9floxn96fpbl57r085kv/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src='<?php echo e(THEME_FONTEND_URL); ?>js/masonry.pkgd.min.js'></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
   // Add active class to the current button (highlight it)
   var header = document.getElementById("myDIV");
   var btns = header.getElementsByClassName("button2");
   for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function() {
         var current = document.getElementsByClassName("active");
         current[0].className = current[0].className.replace(" active", "");
         this.className += " active";
      });
   }
</script>

<?php /**PATH O:\xampp\htdocs\PHP2\Assment\app\views\frontend/layout/script.blade.php ENDPATH**/ ?>