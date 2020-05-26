<?php
    function incrementFileName($file_path,$filename){  //function to increment file name if there is a clash
              $array = explode(".", $filename);
              $file_ext = end($array);
              $root_name = str_replace(('.'.$file_ext),"",$filename);
              $file = $file_path.$filename;
              $i = 1;
              while(file_exists($file)){
                $file = $file_path.$root_name.$i.'.'.$file_ext;
                $i++;
              }
              return $file;
            }
    
      function uploadImage($name) //function to handle file upload
        {
           
           $folder ="uploads/"; 

           $image = $_FILES[$name]['name']; 

           $path = $folder.$image ; 
    
           
           $target_file=$folder.basename($_FILES[$name]["name"]);
          
 
           $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);

           $allowed=array('ico','jpeg','png' ,'jpg'); $filename=$_FILES[$name]['name']; 

             $ext=pathinfo($filename, PATHINFO_EXTENSION);
           
           if(!in_array($ext,$allowed)) 
             { 
                toast("Sorry, only JPG, JPEG, PNG & GIF  files are allowed.");

             }

        else{ 
              if (file_exists($path)) //checking if a file clash exists 
              {
                $path=incrementFileName("uploads/",$_FILES[$name]["name"]);  //handling clash that exist
              }
              move_uploaded_file($_FILES[$name]['tmp_name'], $path); 
            } 
           
?>
