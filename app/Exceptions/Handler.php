<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use View;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        ValidationException::class,
        HttpException::class,
        ModelNotFoundException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        switch ($exception) {

            case $exception instanceof CampaignListsResolverException:

                View::share('data', ['message' => $exception->getMessage()]);
                View::share('redirect_url', $request->get('redirect_url'));
                View::share('reload_parent_frame', $request->get('reload_parent_frame'));

                return response()->view('api.campaign_list');
                break;

            case $exception instanceof ModelNotFoundException:

                $e = $this->NotFoundHttpException($exception->getMessage(), $exception);

                return parent::render($request, $e);
                break;

            default:

                return parent::render($request, $exception);
        }
    }
}
