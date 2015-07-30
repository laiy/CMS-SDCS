<?php

/**
 * Build Classes
 * @param  array   $params set of classes
 * @param  boolean $format format of return string, use %s for 
 * @return string          full classes declaration
 */
function vp_sc_build_class($params, $format = ' class="%s"') {
	$params = (array) $params;
	$params = array_filter($params);
	return str_replace('%s', implode(" ", $params), $format);
}

/**
 * Check if the value provided matches the condition, then it deserves have a class
 * @param  string $term      background color value
 * @param  array  $condition condition to be matched
 * @param  string $format    output format, use % wildcard to print the matched value
 * @return string            class string or null
 */
function vp_sc_grant_class($term = '', $format = '%', $condition = true) {
	if ( (is_array($condition) and in_array($term, $condition)) or $condition === true) {
		return str_replace('%', $term, $format);
	}
	return null;
}

/**
 * Build inline styles
 * @param  array   $params set of styles declaration
 * @param  boolean $format format of return string, use %s for 
 * @return string          full style declaration
 */
function vp_sc_build_inline_style($params, $format = ' style="%s"') {
	$params = (array) $params;
	$params = array_filter($params);
	return str_replace('%s', implode(" ", $params), $format);
}

/**
 * Give default measurement unit
 * @param  string $value the value
 * @param  string $unit  default measurement unit
 * @return string        the correct value
 */
function vp_sc_grant_default_unit($value, $unit) {
	if (is_numeric($value)) {
		return $value . $unit;
	}
	return $value;
}

/**
 * Calculate Percentage from given Value and Range
 * @param  float $min    minimal
 * @param  float $max    maximum
 * @param  float $value  value
 * @param  integer $ndec number of decimal allowed
 * @return string        the percentage
 */
function vp_sc_calculate_percentage($min, $max, $value, $ndec = 0) {
	return round(($value - $min) / ($max - $min) * 100, $ndec) . '%';
}

function vp_sc_deep_values($array, $the_key)
{
	$result = array();
	foreach ($array as $key => $value)
	{
		if (is_object($value))
		{
			$result[] = $value->$the_key;
		}
		elseif (is_array($value))
		{
			$result[] = $value[$the_key];
		}
		else
		{
			$result[] = $value;
		}
	}
	return $result;
}

/**
 * EOF
 */