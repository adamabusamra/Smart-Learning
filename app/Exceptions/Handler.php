<?php

namespace App\Exceptions;

use Exception;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Auth;

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
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        if ($request->is('teacher') || $request->is('dashboard/teacher/*') || $request->is('dashboard/teacher')) {
            return redirect()->guest('dashboard/login');
        }
        if ($request->is('student') || $request->is('dashboard/student/*') || $request->is('dashboard/student')) {
            return redirect()->guest('dashboard/login');
        }
        return redirect()->guest(route('login'));
    }
}
