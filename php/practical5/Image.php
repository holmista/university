<?php

require "FileOperations.php";

class Image{
    use FileOperations;
    private $file;
    protected $max_size = 100 * 1024;
    protected $mime_types = array(
        'image/png',
        'image/jpeg',
        'image/gif'
    );
    static $upload_path = "uploads/";

    /**
     * @throws Exception
     */
    public function __construct($file){
        if (!$this->isValidType($file) || !$this->isValidSize($file)) {
            throw new Exception("Invalid file");
        }
        $this->file = $file;
    }

    private function get_file_type($file):string{
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $fileTmpName = $file['tmp_name'];
        return $finfo->file($fileTmpName);
    }
    private function IsValidType($file): bool{
        $file_type = $this->get_file_type($file);
        return in_array($file_type, $this->mime_types);
    }
    private function IsValidSize($file): bool{
        return $file["size"] <= $this->max_size;
    }
    private function get_file_idx(): int{
        $files = scandir(Image::$upload_path);
        var_dump(count($files));
        return count($files) === 2 ? 1 : (int)$files[count($files) - 1][0]+1;
    }
    public function generate_file_name(): string{
        $file_name = $this->get_file_idx();
        $file_name .= "-" . date("d-m-Y") . '.' . explode('/', $this->get_file_type($this->file))[1];
        return $file_name;
    }

}