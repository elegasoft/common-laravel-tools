<?php

namespace Elegasoft\CommonLaravelTools;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class CommonExceptionHandler
{
    /**
     * @var \Exception
     */
    protected $exception;
    public $exception_caught = false;
    protected $resolvedWith;

    /**
     * @var array
     */
    protected $exceptions_list = [
        'Illuminate\Session\TokenMismatchException'=>'tokenMismatchException',
        'Symfony\Component\HttpKernel\Exception\NotFoundHttpException'=>'missingRouteException',
        'Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException'=>'methodNotAllowedException',
        'Illuminate\Auth\Access\AuthorizationException'=>'authorizationException',
    ];

    /**
     * @var Collection
     */
    protected $handlers;

    public function __construct(\Exception $exception)
    {
        $this->exception = $exception;
        $this->handleException();
        $this->handlers = new Collection($this->exceptions_list);
    }

    public function catchesException()
    {
        return $this->exception_caught;
    }

    public function resolve()
    {
        return $this->resolvedWith;
    }

    protected function handleException()
    {
        foreach ($this->exceptions_list as $exception => $handler){
            if($this->exception instanceof $exception){
                if(config('common-laravel-tools.'.$handler) === true && config('common-laravel-tools.handle_exceptions') === true){
                    $this->exception_caught = true;
                    $this->$handler();
                }
            }
        }
    }

    protected function tokenMismatchException()
    {
        session()->flash('token_mismatch','You\'re session has expired, please try again.');
        $this->resolvedWith = redirect()->back()->with('alert-warning','You\'re session has expired, please try again.');
    }

    protected function authorizationException()
    {
        $responsiveView = View::exists('errors.401') ? 'errors.405' :'common-laravel-tools::errors.401';
        $this->resolvedWith = Response::make(view($responsiveView),401);
    }

    protected function missingRouteException()
    {
        $responsiveView = View::exists('errors.404') ? 'errors.404' :'common-laravel-tools::errors.404';
        $this->resolvedWith = Response::make(view($responsiveView),404);
    }

    protected function methodNotAllowedException()
    {
        $responsiveView = View::exists('errors.405') ? 'errors.405' :'common-laravel-tools::errors.405';
        $this->resolvedWith = Response::make(view($responsiveView),405);
    }

}
