<?php
    function rmdir_recurse($path) {
        $path= rtrim($path, '/').'/';
        $handle = opendir($path);
        for (;false !== ($file = readdir($handle));)
            if($file != "." and $file != ".." ) {
                $fullpath= $path.$file;
                if( is_dir($fullpath) ) {
                    rmdir_recurse($fullpath);
                } else {
                    unlink($fullpath);
                }
        }
        closedir($handle);
        rmdir($path);
    }
    
     
?>