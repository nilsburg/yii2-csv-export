<?php

namespace proximity\csvexport;

/**
 * This is just an example.
 */
class CsvExport extends \yii\base\Widget
{
    /**
     * @var array Data rows
     */
    public $data = [];
    /**
     * @var bool Download csv
     */
    public $download = true;
    /**
     * @var string the directory where to save the csv file
     */
    public $saveDir = "";
    /**
     * @var string the resulting filename
     */
    public $filename = "export.csv";

    public $delimiter = ";";

    /**
     * Init widget
     */
    public function init(){
        parent::init();
        if(!$this->saveDir) $this->saveDir = \Yii::$app->basePath."/runtime";
        if(!file_exists($this->saveDir)) mkdir($this->saveDir, 0777, true);

    }

    /**
     * run Widget
     */
    public function run(){
        $filename = $this->filename;
        $res = $this->data;
        $campos = false;

        if($this->download){
            $fp = fopen('php://output', 'w');
            header("Content-type: application/vnd.ms-excel;charset=utf-8");
            header( 'Content-Disposition: attachment;filename='.$filename);
        }else{
            $fp = fopen($this->saveDir."/".$this->filename, 'w');
        }
        foreach($res as $data){
            if(!$campos){
                $campos = array_keys($data);
                fputcsv($fp, $campos, $this->delimiter);
            }
            $fila = array_map('utf8_decode', $data);
            fputcsv($fp, $fila, $this->delimiter);
        }
        fclose($fp);
    }
}
