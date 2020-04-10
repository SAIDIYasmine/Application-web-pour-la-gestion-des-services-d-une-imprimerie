<?php
function number_images($directory){
//$directory = "themes/images/ladies/";
$filecount = 0;
$files = glob($directory . "*");
if ($files){
 $filecount = count($files);
}
return $filecount;
}
//echo 'There were'. number_images("themes/images/ladies/") .'files';


//number des pages en fichier
function getNumPagesInPDF($file) 
{
    //http://www.hotscripts.com/forums/php/23533-how-now-get-number-pages-one-document-pdf.html
    if(!file_exists($file))return null;
    if (!$fp = @fopen($file,"r"))return null;
    $max=0;
    while(!feof($fp)) {
            $line = fgets($fp,255);
            if (preg_match('/\/Count [0-9]+/', $line, $matches)){
                    preg_match('/[0-9]+/',$matches[0], $matches2);
                    if ($max<$matches2[0]) $max=$matches2[0];
            }
    }
    fclose($fp);
    return (int)$max;

}
?>