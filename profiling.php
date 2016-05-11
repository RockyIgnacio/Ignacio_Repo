<?php
date_default_timezone_set('Asia/Manila');

class Profiling
{
    public $startTime;
    public $startMemory;
    public $saveFile;
    public $fp;

    public function __construct($file)
    {
        $this->startTime = microtime(true);
        $this->startMemory = memory_get_usage();
        if (is_writable($file)) {
            $this->saveFile = $file;
            $this->fp = fopen($this->saveFile, 'a+');
            $this->log('==== Starting log sequence using ' . number_format(($this->startMemory/1000000), 2) . 'MB of memory ====', true);
        } else {
            throw new Exception('Unable to create file at location: ' . $file);
        }
    }

    public function log($message, $skipSpace = false)
    {
        $microtime = explode('.', microtime(true));
        $decimal = $microtime[1];
        fwrite($this->fp, PHP_EOL . '[' . date('Y-m-d H:i:s') . '.' . $decimal . '] ' . $message);
    }

    public function finish()
    {
        $finishTime = microtime(true);
        $finishMemory = memory_get_usage();
        $usedTime = number_format($finishTime - $this->startTime, 6);
        $usedMemory = number_format(($finishMemory - $this->startMemory) / 1000000, 2);
        $this->log('Finishing log sequence (Using ' . $usedMemory . 'MB now, peaked at ' . number_format((memory_get_peak_usage()/1000000), 2) . 'MB)');
        fwrite($this->fp, PHP_EOL);
    }

    public function __deconstruct()
    {
        fclose($this->fp);
    }
}