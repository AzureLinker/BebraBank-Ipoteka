<?php
namespace Zianu\BebraBankIpoteka;

class resultDown{

    public function resultMake($test_ar){
        $fileName = 'result.json';
        header("Content-Type: application/json");
        header("Content-Length: " . filesize($fileName));
        $quoted = sprintf('"%s"', addcslashes(basename($fileName), '"\\'));  // Или любое другое имя файла
        header("Content-Disposition: attachment; filename= $quoted");
        $fp = fopen($fileName, 'rb');
        fpassthru($fp);
        return $fp;
        
    }
}