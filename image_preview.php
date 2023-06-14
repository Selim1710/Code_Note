<?php
/*

///////////////// Preview image before upload using javascript /////////////////

// Step-1: 
      
{{-- image --}}
 <input type="file" name="image" id="image" onchange="previewImage(event)"
 class="form-control">
<div id="preview"></div>

// Step-2:
<script>
    function previewImage(event) {
        // console.log(event);
        var image = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById('preview');
        var newImage = document.createElement('img');
    preview.innerHTML = "";
        newImage.src = image;
        newImage.width = "150";
        newImage.height = "80";
        preview.appendChild(newImage);
    }
</script>