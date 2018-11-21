<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use \App\Exceptions\BookNotFoundException;
use \App\Exceptions\CategoryNotFoundException;
use Illuminate\Support\Facades\Log;
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        //        if ($exception instanceof BookNotFoundException)
        //            return $exception->report($exception);
        //        if ($exception instanceof CategoryNotFoundException)
        //            return $exception->report($exception);
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception               $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if($exception instanceof BookNotFoundException) {
            return response()->json(['error' => $exception->getMessage()], 404);
        } elseif($exception instanceof CategoryNotFoundException) {
            return response()->json(['error' => $exception->getMessage()], 404);
        }
        return parent::render($request, $exception);
    }
}
