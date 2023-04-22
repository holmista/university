<?php

trait FileOperations
{
    /**
     * @throws Exception
     */
    public function saveFile(string $tmpPath, string $destinationPath): void{
        if (!move_uploaded_file($tmpPath, $destinationPath)) {
            throw new Exception("file ".$tmpPath." could not be uploaded" );
        }
    }

    /**
     * @throws Exception
     */
    public static function deleteFile(string $path): void{
        if(file_exists($path)){
            if(!unlink($path)){
                throw new Exception("could not delete file ".$path);
            }
        }
        else{
            throw new Exception("file ".$path." does not exist");
        }
    }
}