<?php
   
// use Carbon\Carbon;
  
/**
 * Write code on Method
 *
 * @return response()
 */
if (! function_exists('formatFullName')) {
    function formatFullName($lastName, $firstName, $middleName = '') {
        $fullName = $lastName . ' ';
        $fullName .= mb_substr($firstName, 0, 1) . '.';
        
        if ($middleName) {
            $fullName .= ' ' . mb_substr($middleName, 0, 1) . '.';
        }
        
        return $fullName;
    }
}