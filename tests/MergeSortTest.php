<?php

namespace Sokil\Algo\Sort;

class MergeSortTest extends \PHPUnit_Framework_TestCase
{
    public function getInputArrayDataProvider()
    {
        return [
            // empty array
            [
                [],
                [],
            ],
            // odd array
            [
                [6, 5, 3, 1, 8, 7, 2, 4],
                [1, 2, 3, 4, 5, 6, 7, 8],
            ],
            // even array
            [
                [6, 5, 3, 9, 1, 8, 7, 2, 4],
                [1, 2, 3, 4, 5, 6, 7, 8, 9],
            ],
        ];
    }

    /**
     * @dataProvider getInputArrayDataProvider
     */
    public function testSort($inputArray, $expectedArray)
    {
        $mergeSort = new MergeSort();

        $actualArray = $mergeSort->sort($inputArray);

        $this->assertSame(
            $expectedArray,
            $actualArray
        );
    }
}