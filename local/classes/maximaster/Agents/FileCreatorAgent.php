<?php

namespace Maximaster\Agents;

/**
 * Class SyncSymlinkCommand
 * ����� ��� �������� ����� � ����� ������� ������
 * @package Maximaster\Agents
 */

class FileCreatorAgent
{
    /**
     * ������ ������
     * @return string
     */
    public function StartAgent()
    {
        $sFilePath = $_SERVER['DOCUMENT_ROOT'] . '/upload/one_agent/';

        mkdir($sFilePath);

        if (self::CountFilesDir($sFilePath) >= 10) {
            return '';
        }

        self::CreateDateFile($sFilePath);

        return __METHOD__ . '();';
    }


    /**
     * �������� ����� � ������� �����
     * @param $sDir
     */
    public static function CreateDateFile($sDir)
    {
        $sDate = date('d.m.Y\_H;i;s');
        $sFilename = $sDir . $sDate . '.txt';

        $obFile = fopen($sFilename, 'w');
        fwrite($obFile, $sDate);
        fclose($obFile);
    }

    /**
     * ������� ���-�� ������ � ����������
     * @param $sDir
     * @return int
     */
    protected static function CountFilesDir($sDir)
    {
        $iCount = 0;
        $obDir = dir($sDir);

        while ($sFile = $obDir->read()) {
            if (is_file($sDir . '/' . $sFile)) {
                ++$iCount;
            }
        }

        $obDir->close();

        return $iCount;
    }

}