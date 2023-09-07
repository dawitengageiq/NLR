<?php

namespace App\Resources;

use App\Http\Services\Helpers\Reflection;
use Illuminate\Container\Container;
use Illuminate\Database;
use Illuminate\Support;

class Resource
{
    protected $resource;

    protected $item;

    protected $with = [];

    protected $additional = [
        'type' => '',
        'status' => 200,
        'error' => false,
        'errorCode' => '',
        'message' => [
            'userMessage' => 'Success.',
            'developerMessage' => 'Success.',
            'moreInfo' => '',
        ],
    ];

    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource)
    {
        $this->resource = $resource;

        // $reflection = new Reflection;
        // $reflection->printDetails($resource);
    }

    /**
     * Transform the resource into an HTTP response.
     *
     * @param  int|null  $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function response($statusCode = null)
    {
        return $this->toResponse($statusCode);
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  int|null  $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function toResponse($statusCode = null)
    {
        $this->request = Container::getInstance()->make('request');

        return tap(response()->json(
            $this->wrap(
                $this->resolve($this->request),
                $this->with($this->request),
                $this->additional
            ),
            $this->calculateStatus($statusCode)
        ), function ($response) {
            $this->withResponse($response);
        });
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return $this->item;
    }

    /**
     * Get any additional data that should be returned with the resource array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        return $this->with;
    }

    /**
     * Add additional meta data to the resource response.
     *
     * @return $this
     */
    public function additional(array $data)
    {
        $this->additional = array_merge($this->additional, $data);

        return $this;
    }

    /**
     * Resolve the resource to an array.
     *
     * @return array
     */
    protected function resolve()
    {
        // if ($this->resource instanceof Collection) {
        $newCollection = [];
        $this->resource->each(function ($item, $index) use (&$newCollection) {
            $this->item = $item;
            $newCollection[$index] = $this->toArray($this->request);
        });
        $this->item = null;

        return collect($newCollection);
        // }
    }

    protected function withResponse($response)
    {
        // dd($response);
        return $response;
    }

    /**
     * Calculate the appropriate status code for the response.
     *
     * @param  int|null  $statusCode
     * @return int
     */
    protected function calculateStatus($statusCode = null)
    {
        if ($statusCode) {
            return $statusCode;
        }

        return $this->resource instanceof Model &&
               $this->resource->wasRecentlyCreated ? 201 : 200;
    }

    /**
     * Wrap the given data if necessary.
     *
     * @param  array  $data
     * @param  array  $with
     * @param  array  $additional
     * @return array
     */
    protected function wrap($data, $with = [], $additional = [])
    {
        if ($data instanceof Database\Eloquent\Collection
        || $data instanceof Support\Collection) {
            $data = $data->all();
        }

        $data = ['data' => $data];

        return array_merge_recursive($data, $with, $additional);
    }

    /**
     * [getValue description]
     *
     * @param  [type] $field [description]
     * @return [type]        [description]
     */
    protected function getValue($field)
    {
        if (! $this->item) {
            return '';
        }

        if (($this->resource instanceof Database\Eloquent\Collection
        || $this->resource instanceof Support\Collection) && ! is_array($this->item)) {
            return $this->item->$field;
        }

        return array_key_exists($field, $this->item) ? $this->item[$field] : '';
    }
}
