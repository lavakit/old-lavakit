<?php

namespace Inspire\Base\Exceptions;

use App\Exceptions\Handler as ExceptionHandler;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class Handler
 * @package Inspire\Base\Exceptions
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
            AuthorizationException::class,
            HttpException::class,
            ModelNotFoundException::class,
            TokenMismatchException::class,
            ValidationException::class
    ];

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Exception $ex
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $ex)
    {
        if (config('app.debug') === false) {
            if ($ex instanceof ModelNotFoundException) {
                $ex = new NotFoundHttpException($ex->getMessage(), $ex);
            }

            if ($ex instanceof NotFoundHttpException) {
                $ex = new NotFoundHttpException($ex->getMessage(), $ex);
            }

            if ($this->isHttpException($ex)) {
                switch ($ex->getStatusCode()) {
                    case 404:
                        if ($request->is(locate() . '/' . config('base.base.admin-prefix') . '/*')) {
                            return response()->view('backend::errors.404', [], 404);
                        } else {
                            return response()->view('theme::errors.404', [], 404);
                        }
                        break;

                    case 500:
                    case 503:
                        if ($request->is(locate() . '/' . config('base.base.admin-prefix') . '/*')) {
                            return response()->view('backend::errors.500', [], 500);
                        } else {
                            return response()->view('theme::errors.500', [], 500);
                        }
                        break;
                }
            }
        }

        return parent::render($request, $ex);
    }
}