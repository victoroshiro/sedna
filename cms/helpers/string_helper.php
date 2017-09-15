<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

if (!function_exists('slug')){

    function slug($params = array()) {
        
    	$options = array(
    		'string' => false,
    		'type' => '-',
    		'tabela' => false,
    		'id' => false
    	);

        $params = array_merge($options, $params);

    	$CI = &get_instance();

        $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
        $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';

        $string = utf8_decode($params['string']);
        $string = strtr($string, utf8_decode($a), $b);
        $string = trim($string);
        $string = str_replace('?', '', $string);
        $string = str_replace('&', '', $string);
        $string = str_replace('(', '', $string);
        $string = str_replace(')', '', $string);
        $string = str_replace('.', '', $string);
        $string = str_replace(' – ', '-', $string);
        $string = str_replace('%', 'porcento', $string);
        $string = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $string);
        $string = str_replace(' - ', '-', $string);
        $string = str_replace(' ', '-', $string);
        $string = strtolower($string);
        $string = utf8_encode($string);

        if($params['tabela']){
            
            $unique = false;
            $count = 1;
            $slug = $string;
            
            while (!$unique) {
                $CI->db->select('COUNT(*) AS total')->from($params['tabela'])->where('slug', $slug);
                
                if ($params['id']) {
                    $CI->db->where('id !=', $params['id']);
                }
                
                $query = $CI->db->get();
                $query = $query->row();
                
                if ((int) $query->total == 0) {
                    $unique = true;
                    $string = $slug;
                } else {
                    $slug = $string.'-'.$count++;
                }
            }
        }
        
        return $string; 
    }
}