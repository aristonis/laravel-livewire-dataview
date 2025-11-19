<?php

namespace Aristonis\LaravelLivewireDataview\Traits;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Aristonis\LaravelLivewireDataview\Exceptions\InvalidQueryException;

trait HasQuery
{
    /**
     * Holds the developer-defined base query.
     *
     * @var EloquentBuilder|QueryBuilder|null
     */
    protected $baseQuery = null;



    /**
     * Assign the query instance (called inside child component).
     *
     * @param EloquentBuilder|QueryBuilder $query
     */
    protected function setQuery($query): void
    {
        $this->baseQuery = $query;
    }

    /**
     * Retrieve the assigned query or fallback to component-level query() method.
     *
     * @return EloquentBuilder|QueryBuilder
     *
     * @throws InvalidQueryException
     */
    protected function getQuery()
    {
        if ($this->baseQuery) {
            return $this->validateQuery($this->baseQuery);
        }

        if (! method_exists($this, 'query')) {
            throw InvalidQueryException::becauseQueryIsNotDefined($this);
        }

        $query = $this->query();

        return $this->validateQuery($query);
    }

    /**
     * Ensure the query is a valid Builder instance.
     *
     * @param mixed $query
     * @return EloquentBuilder|QueryBuilder
     *
     * @throws InvalidQueryException
     */
    protected function validateQuery($query)
    {
        if ($query instanceof EloquentBuilder || $query instanceof QueryBuilder) {
            return $query;
        }

        throw InvalidQueryException::becauseQueryIsNotBuilder($this);
    }
    public function buildQuery()
    {
        $q = $this->getQuery();

        if ($this->isPaginagtionEnable()) {
            return $q->paginate($this->getPerPage());
        }

        return $q->get();
    }
}
