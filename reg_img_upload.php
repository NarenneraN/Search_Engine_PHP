<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Preview Image Before Upload | CodingNepal</title>
      <link rel="stylesheet" href="reg_img_upload.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
     <?php
include "reg_user_navbar.php";
      ?>
      <div class="container">
         <div class="wrapper">
            <div class="image">
              <?php
              if(@$_REQUEST['upload']=="image"){
             echo " <img src='' alt=''>";
             }
             else if(@$_REQUEST['upload']=="videos"){
            echo "<video width='320' height='240' controls>
                  <source src='' type=''>
                </video>";
            }
            else if(@$_REQUEST['upload']=="audios"){
           echo "<audio controls>
  <source src='' type=''>
</audio>";
           }
               ?>

            </div>
            <div class="content">
               <div class="icon">
                  <i class="fas fa-cloud-upload-alt"></i>
               </div>
               <div class="text">
                  No file chosen, yet!
               </div>
            </div>
            <div id="cancel-btn">
               <i class="fas fa-times"></i>
            </div>
            <div class="file-name">
               File name here
            </div>
         </div>
         <button onclick="defaultBtnActive()" id="custom-btn">Choose a file</button>
         <?php
         if(@$_REQUEST['upload']=="image"){
        echo "<input id='default-btn' type='file' hidden accept='image/*'>";
          echo "<script>const img = document.querySelector('img')</script>";
        }
        else if(@$_REQUEST['upload']=="videos"){
       echo "<input id='default-btn' type='file' hidden accept='video/*'>";
       echo "<script>const img = document.querySelector('video')</script>";
       }
       else if(@$_REQUEST['upload']=="audios"){
      echo "<input id='default-btn' type='file' hidden accept='audio/*'>";
       echo "<script>const img = document.querySelector('audio')</script>";
      }
          ?>

      </div>
      <script>
         const wrapper = document.querySelector(".wrapper");
         const fileName = document.querySelector(".file-name");
         const defaultBtn = document.querySelector("#default-btn");
         const customBtn = document.querySelector("#custom-btn");
         const cancelBtn = document.querySelector("#cancel-btn i");


         let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
         function defaultBtnActive(){
           defaultBtn.click();
         }
         defaultBtn.addEventListener("change", function(){
           const file = this.files[0];
           if(file){
             const reader = new FileReader();
             reader.onload = function(){
               const result = reader.result;
               img.src = result;
               wrapper.classList.add("active");
             }
             cancelBtn.addEventListener("click", function(){
               img.src = "";
               wrapper.classList.remove("active");
             })
             reader.readAsDataURL(file);
           }
           if(this.value){
             let valueStore = this.value.match(regExp);
             fileName.textContent = valueStore;
           }
         });
      </script>
   </body>
</html>
