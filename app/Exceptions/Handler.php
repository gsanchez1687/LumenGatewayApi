<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponser;
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        //retomando el error de modelo no encontrado
        if ($exception instanceof ModelNotFoundException) {
            $modelo =  strtolower(class_basename($exception->getModel()));
            return $this->errorResponse("No existe Ninguna Instancia del modelo {$modelo} con el id espeficico", 404);
        }

        if ($exception instanceof AuthenticationException) {
           return $this->errorResponse($exception->getMessage(),Response::HTTP_UNAUTHORIZED);
        }

        if($exception instanceof AuthorizationException ){
            return $this->errorResponse($exception->getMessage(),Response::HTTP_FORBIDDEN);
        }

        if ($exception instanceof ValidationException) {
            $errors = $exception->validator->errors()->getMessages();
            return $this->errorResponse($errors,Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if($exception instanceof ClientException){
            $message = $exception->getResponse()->getBody();
            $code = $exception->getCode();
            return $this->errorMessage($message,$code);
        }

        if( env('APP_DEBUG',false) ){
            return parent::render($request,$exception);
        }

        return $this->errorResponse('Enexpected error.Try later',Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
