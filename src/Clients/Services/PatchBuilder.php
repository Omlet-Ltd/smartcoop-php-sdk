<?php

namespace Omlet\SmartCoop\Clients\Services;

use Omlet\SmartCoop\Interfaces\Arrayable;

class PatchBuilder
{
    public static function buildRequestArray(Arrayable $obj1, Arrayable $obj2): array
    {
        $differences = [];
        self::recursiveCompare($obj1->toArray(), $obj2->toArray(), $differences);
        return $differences;
    }

    private static function recursiveCompare(array $arr1, array $arr2, array &$differences = [], array $path = []): void
    {
        foreach ($arr1 as $key => $value) {
            if (!array_key_exists($key, $arr2)) {
                $differences[$key] = $value;
            } elseif (is_array($value) && is_array($arr2[$key])) {
                $nestedDifferences = [];
                self::recursiveCompare($value, $arr2[$key], $nestedDifferences, array_merge($path, [$key]));
                if (!empty($nestedDifferences)) {
                    $differences[$key] = $nestedDifferences;
                }
            } elseif ($value !== $arr2[$key]) {
                $differences[$key] = $arr2[$key];
            }
        }
        foreach ($arr2 as $key => $value) {
            if (!array_key_exists($key, $arr1)) {
                $differences[$key] = $value;
            }
        }

        if (empty($differences) && !empty($path)) {
            $parentKey = array_pop($path);
            unset($differences[$parentKey]);
        }
    }
}