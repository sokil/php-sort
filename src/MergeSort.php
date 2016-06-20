<?php

namespace Sokil\Algo\Sort;

class MergeSort implements SortInterface
{
    public function sort($array)
    {
        $arrayCount = count($array);
        if ($arrayCount === 0 || $arrayCount === 1) {
            return $array;
        }

        // divide
        $leftArrayCount = floor($arrayCount / 2);
        $rightArrayCount = $arrayCount - $leftArrayCount;

        $leftArray = array_slice($array, 0, $leftArrayCount);
        $rightArray = array_slice($array, $leftArrayCount);

        // sort chunks
        if (count($leftArray) > 1) {
            $leftArray = $this->sort($leftArray);
        }

        if (count($rightArray) > 1) {
            $rightArray = $this->sort($rightArray);
        }

        // merge
        $sortedArray = [];

        $leftArrayIndex = 0;
        $rightArrayIndex = 0;

        for ($sortedArrayIndex = 0; $sortedArrayIndex < $arrayCount; $sortedArrayIndex++) {
            if ($rightArrayIndex >= $rightArrayCount) {
                $sortedArray[$sortedArrayIndex] = $leftArray[$leftArrayIndex];
                $leftArrayIndex++;
            } elseif ($leftArrayIndex >= $leftArrayCount) {
                $sortedArray[$sortedArrayIndex] = $rightArray[$rightArrayIndex];
                $rightArrayIndex++;
            } else if ($leftArray[$leftArrayIndex] < $rightArray[$rightArrayIndex]) {
                $sortedArray[$sortedArrayIndex] = $leftArray[$leftArrayIndex];
                $leftArrayIndex++;
            } else {
                $sortedArray[$sortedArrayIndex] = $rightArray[$rightArrayIndex];
                $rightArrayIndex++;

                // Algorithms: Design and Analysis Part 1, Coursera
                // $this->inversionsCount += $leftArrayCount - $leftArrayIndex;
            }
        }

        return $sortedArray;
    }
}
