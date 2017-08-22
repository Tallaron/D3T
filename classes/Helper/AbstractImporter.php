<?php

namespace Helper;

abstract class AbstractImporter {
    
    /**
     * Explodes <b>$data</b> usind the given <b>$delimiter</b>. The delimiter
     * param is optional and defaults to '/'.
     * @param String $data
     * @param String $delimiter
     * @return String Returns the last piece of the String
     */
    public static function getLastElement($data, $delimiter = '/') {
        return self::getElement($data, -1, $delimiter);
    }
    
    /**
     * Explodes <b>$data</b> usind the given <b>$delimiter</b>. The delimiter
     * param is optional and defaults to '/'.
     * @param String $data
     * @param String $delimiter
     * @param int $element
     * @return String Returns the piece of the String on <b>$element</b>'s
     * position. If <b>$element</b> is <i>-1</i> the last element will be
     * returned. While pointing to an invalid position the method returns false.
     */
    public static function getElement($data, $element = -1, $delimiter = '/') {
        $split = explode($delimiter, trim($data, $delimiter));
        if($element < -1 || $element > count($split)-1) {
            return false;
        }
        return $element == -1 ? $split[count($split)-1] : $split[$element];
    }
    
    /**
     * 
     * @param String $data The String that shall modified
     * @param int $elements Number of Elements to cut of at the front of the data String
     * @param String $delimiter
     * @return String
     */
    public static function cutElementsAtFront($data, $elements = 1, $delimiter = '/') {
        $split = explode($delimiter, trim($data, $delimiter));
        return implode($delimiter, array_slice($split, $elements));
    }

    /**
     * Loads the data from the given <b>$url</b> and returns it as a DomDocument.
     * @param String $url
     * @return \DomDocument
     */
    public static function loadDomData($url) {
        $dom = new \DomDocument();
        $dom->load($url);
        return $dom;
    }
    
    
    
}
