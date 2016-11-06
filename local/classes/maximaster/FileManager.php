<?php

namespace Maximaster\Helpers;

class FileManager
{

    /**
     * @return bool|string
     */
    public function CreateFile()
    {
        $sFilePath = $_SERVER['DOCUMENT_ROOT'] . '/upload/one_agent/';
        echo self::CountFiles($sFilePath);
        if (self::CountFiles($sFilePath) >= 10) {
            return false;
        }

        $sDate = date('d.m.Y\_H;i;s');
        $sFilename = $sFilePath . $sDate . '.txt';

        mkdir($sFilePath);

        $obFile = fopen($sFilename, 'w');
        fwrite($obFile, $sDate);
        fclose($obFile);

        return "Maximaster\Helpers\FileManager::CreateFile();";
    }

    /**
     * @param String $sDir
     * @return Int $iCount
     */
    protected static function CountFiles($sDir)
    {
        $iCount = 0;
        $obDir = dir($sDir);

        while ($sFile = $obDir->read()) {
            if (is_file($sDir . '/' . $sFile)) {
                $iCount++;
            }
        }

        $obDir->close();

        return $iCount;
    }

}