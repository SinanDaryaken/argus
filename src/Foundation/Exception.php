<?php

namespace Chess\Argus\Foundation;

use Chess\Argus\Models\Exception;
use Throwable;

class Exception
{
    protected $exception;

    public function __construct(Throwable $exception)
    {
        $this->exception = $exception;
    }

    public function init()
    {
        if (config('argus.exception_log') === false) {
            return;
        }
        list($file, $line) = $this->getFileAndLine();
        Exception::create([
            'exception' => get_class($this->exception),
            'message' => $this->exception->getMessage(),
            'code' => $this->exception->getCode(),
            'file' => $file,
            'line' => $line,
        ]);
    }

    private function getFileAndLine()
    {
        $file = $line = null;
        foreach ($this->exception->getTrace() as $trace) {
            $matches = [];
            if (isset($trace['file']) && preg_match("/(?<=\/app)(.*)(?=.php)/", $trace['file'], $matches)) {
                $file = 'app' . $matches[0] . '.php';
                $line = $trace['line'] ?? null;
                return [$file, $line];
            }
        }
    }

}