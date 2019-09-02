<?php
/**
 * Created by PhpStorm.
 * User: Caleb
 * Date: 8/30/2019
 * Time: 7:43 AM
 */


class FileUpload
{
    protected $encryptFile = FALSE;
    protected $fileName;
    protected $allowed;
    protected $size;
    protected $fullPath;

    public function __construct ($encryptFile, $allowed, $size)
    {
        $this->encryptFile = $encryptFile;
        $this->allowed = $allowed;
        $this->size = $size;
    }

    /**
     * @param string $dir
     * @param string $fileName
     * @param string $fileTmpName
     * @param int $fileSize
     * @return bool
     */
    public function upload($dir='', $fileName='', $fileTmpName='', $fileSize=0)
    {
        if(!empty($dir) && !empty($fileName) && !empty($fileTmpName) && !empty($fileSize))
        {
            $fileExt = explode('.',$fileName);
            $fileType = strtolower (end($fileExt));
            if(!in_array($fileType, $this->allowed)){
                return false;
            }
            if($fileSize > $this->size){
                return false;
            }
            else{
                if($this->encryptFile == TRUE){
                    $this->fileName = uniqid ('',true) .'.' . $fileType;
                } else{
                    $this->fileName = $fileName;
                }
                // upload file
                try {
                    $this->fullPath = $dir . basename ( $this->fileName );
                    move_uploaded_file ( $fileTmpName , $this->fullPath );
                    return true;
                } catch (Exception $e) {
                    echo $e;
                }
            }
        }else {
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @return mixed
     */
    public function getFullPath()
    {
        return $this->fullPath;
    }

}