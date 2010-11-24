<?php
/*
 * array2xml() will convert any given array into a XML structure.
 *
 * Version:     1.0
 *
 * Created by:  Marcus Carver � 2008
 *
 * Email:       marcuscarver@gmail.com
 *
 * Link:        http://marcuscarver.blogspot.com/
 *
 * Arguments :  $array      - The array you wish to convert into a XML structure.
 *              $name       - The name you wish to enclose the array in, the 'parent' tag for XML.
 *              $standalone - This will add a document header to identify this solely as a XML document.
 *              $beginning  - INTERNAL USE... DO NOT USE!
 *
 * Return:      Gives a string output in a XML structure
 *
 * Use:         echo array2xml($products,'products');
 *              die;
*/

function array2xml($array, $name='array', $standalone=TRUE, $beginning=TRUE) {

  global $nested;

  if ($beginning) {
    if ($standalone) header("content-type:text/xml;charset=utf-8");
    $output .= '<'.'?'.'xml version="1.0" encoding="UTF-8"'.'?'.'>';
    $output .= '<' . $name . '>';
    $nested = 0;
  }
 
  // This is required because XML standards do not allow a tag to start with a number or symbol, you can change this value to whatever you like:
  $ArrayNumberPrefix = 'ARRAY_NUMBER_';
 
   foreach ($array as $root=>$child) {
    if (is_array($child)) {
      $output .= str_repeat(" ", (2 * $nested)) . '  <' . (is_string($root) ? $root : $ArrayNumberPrefix . $root) . '>';
      $nested++;
      $output .= array2xml($child,NULL,NULL,FALSE);
      $nested--;
      $output .= str_repeat(" ", (2 * $nested)) . '  </' . (is_string($root) ? $root : $ArrayNumberPrefix . $root) . '>';
    }
    else {
      $output .= str_repeat(" ", (2 * $nested)) . '  <' . (is_string($root) ? $root : $ArrayNumberPrefix . $root) . '><![CDATA[' . $child . ']]></' . (is_string($root) ? $root : $ArrayNumberPrefix . $root) . '>';
    }
  }
 
  if ($beginning) $output .= '</' . $name . '>';
 
  return $output;
}
?>