<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\ParameterBag;

class LowerCaseTrimData
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->isJson()) {
            $this->clean($request->json());
        } else {
            $this->clean($request->request);
        }

        return $next($request);
    }

    /**
     * Clean the request
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $bag
     * @return void
     */
    private function clean(ParameterBag $bag)
    {
        $bag->replace($this->cleanData($bag->all()));
    }

    /**
     * Check the parameters and set value to lowercase if is present in the array.params
     *
     * @param array $data
     * @return array
     */
    private function cleanData(array $data)
    {
        $params = array('state', 'type' ,'severity', 'client_impact', 'report_medium');

        return collect($data)->map(function ($value, $key) use ($params) {
            if (in_array($key, $params)) {
                return strtolower($value);
            } else {
                return $value;
            }
        })->all();
    }
}
