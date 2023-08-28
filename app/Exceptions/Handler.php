<?php

namespace App\Exceptions;

use View;
use Exception;
use App\Exceptions\ChartResolverException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
        ModelNotFoundException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
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
		switch($exception){
            
            case ($exception instanceof CampaignListsResolverException):

                View::share('data', ['message' => $exception->getMessage()]);
                View::share('redirect_url', $request->get('redirect_url'));
                View::share('reload_parent_frame', $request->get('reload_parent_frame'));

                return response()->view('api.campaign_list');
                break;

            case ($exception instanceof ModelNotFoundException):

                $e = $this->NotFoundHttpException($exception->getMessage(), $exception);
                return parent::render($request, $e);
                break;

            default:

                return parent::render($request, $exception);
        }
    }
}
