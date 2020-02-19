<?php

namespace App\Models;

use ReflectionClass;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    /**
     * @var array
     */
    protected $filters = ['name'];

    /**
     * @return array
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * @param $query
     * @param $value
     *
     * @return mixed
     */
    public function scopeWithName($query, $value)
    {
        if (!empty($value)) {
            return $query->where('name', 'like', "%{$value}%");
        }
        return $query;

    }

    public function syncOneToMany($relation, $options = [])
    {
        $oldOptionsIDs = [];
        // create new options
        $newOptions = [];
        foreach ($options as $option) {
            if (!isset($option['id'])) {
                $newOptions[] = $this->$relation()->getModel()->newInstance($option);
            } else {
                $oldOptionsIDs[] = $option['id'];
            }
        }

        // delete removed options
        $allOptionsIDs = $this->$relation->lists('id');
        $allOptionsIDs = $allOptionsIDs->all();
        if (!empty($allOptionsIDs)) {
            $removedOptionsIDs = array_diff($allOptionsIDs, $oldOptionsIDs);
            $this->$relation()->whereIn('id', $removedOptionsIDs)->delete();
        }

        // save new options after delete removed options
        $this->$relation()->saveMany($newOptions);
    }

    public static function getConstants($keyContains = null, $returnCount = false)
    {
        // Get all constants
        $constants = (new ReflectionClass(get_called_class()))->getConstants();

        // Return filtered constansts based on constants names filter
        if (!empty($keyContains)) {
            $constants = array_filter($constants, function ($k) use ($keyContains) {
                return strpos($k, $keyContains) === 0;
            }, ARRAY_FILTER_USE_KEY);
        }

        if ($returnCount) {
            return count($constants);
        }
        return $constants;
    }

}
