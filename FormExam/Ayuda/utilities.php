<?php

class Utilities
{
    public function getLastElement($list)
    {
        $countList = count($list);
        $lastElement = $list[$countList - 1];

        return $lastElement;

    }

    public function buscarPropiedad($list, $property, $value)
    {
        $filter = [];

        foreach ($list as $item) {
            if ($item->$property == $value) {
                array_push($filter, $item);
            }
        }
        return $filter;
    }

    public function cookiesTime()
    {

        return time() + 60 * 60 * 24 * 30;

    }

    public function getIndexElement($list, $property, $value)
    {

        $index = 0;

        foreach ($list as $key => $item) {

            if ($item->$property == $value) {
                $index = $key;
            }
        }
        return $index;
    }

}