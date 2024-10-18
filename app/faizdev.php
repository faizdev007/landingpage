<?php

    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\File;
    use Intervention\Image\ImageManager;
    use Intervention\Image\Drivers\Gd\Driver;
    use Intervention\Image\Exceptions\DecoderException;

    function uploadFile($file,$path,$typ=null,$title=null,$width=null) {
        //Move Uploaded File to public folder
        $destinationPath = '/storage/'.$path;
        if(isset($title)){
            $imgexten = $file->getClientOriginalExtension();
            $filesave = $title.'.'.$imgexten;
        }else{
            $filesave = $file->getClientOriginalName();
        }

        directorymaker($destinationPath);

        // Check if the file already exists
        if (file_exists(storage_path('..'.$destinationPath.'/'.$filesave))) {
            $filesave = getUniqueFilename($destinationPath,$filesave);
        }

        $filesave = str_replace(' ','',$filesave);

        if($typ === 'image'){
            $filepath = scaldownpicture($file,$destinationPath,$filesave,$width);
        }else{
            $file->move(storage_path('..'.$destinationPath), $filesave);
            
            $filepath = '/storage/'.$path.'/'.$filesave;
        }
        
        if($typ === 'image' && $width === null){
            $thumbpath = scaldownpicture($file,$destinationPath.'/thumbs',$filesave,640);
        }

        $filepaths = [0=>$filepath,1=>$thumbpath??null];
    
        return $filepaths;
    }


    function getUniqueFilename($directoryPath, $filename)
    {
        // Check if the file already exists
        if (File::exists(storage_path('..'.$directoryPath . '/' . $filename))) {
            
            // Split the filename into name and extension
            $filenameParts = explode('.', $filename);
            // Append a random number to the name part
            $filenameParts[0] .= mt_rand(0, 99);
            // Reassemble the filename
            $newFilename = implode('.', $filenameParts);
            // Recursively call this function to check the new filename
            return getUniqueFilename($directoryPath, $newFilename);
        }
        // If the file does not exist, return the original filename
        return $filename;
    }

    function scaldownpicture($link, $path=null,$file=null,$width=null){
        $manager = new ImageManager(new Driver());
        
        $img = $manager->read(file_get_contents($link));
    
        // $img->resize(320, 240); // this is for resize image 
    
        $width = $width ? $width : ($img->width() > 1920 ? 1920 : $img->width()); // check if the width is given or not is not given then get file with and check if its more then 1920px or not
        
        $img->scaleDown(width: $width);
    
        directorymaker($path);
    
        $img->toJpeg()->save(storage_path('..'.$path.'/'.$file));
        
        return $path.'/'.$file;
    }

    function directorymaker($directoryPath){
        if (!File::exists(storage_path('..'.$directoryPath))) {
            File::makeDirectory(storage_path('..'.$directoryPath), 0755, true);
        }
    }
?>