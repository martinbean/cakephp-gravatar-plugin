<?php
App::uses('AppHelper', 'View/Helper');

class GravatarHelper extends AppHelper {
    
    public $helpers = array('Html');
    
    public function image($email, $options = array()) {
        $size = 80;
        $default = 'mm';
        $rating = 'g';
        
        if (isset($options['size'])) {
            $size = intval($options['size']);
            unset($options['size']);
        }
        if (isset($options['default'])) {
            $default = $options['default'];
            unset($options['default']);
        }
        if (isset($options['rating'])) {
            $rating = $options['rating'];
            unset($options['rating']);
        }
        
        $url = 'http://www.gravatar.com/avatar/';
        $url.= md5($email);
        $url.= sprintf('?s=%d&d=%s&r=%s', $size, $default, $rating);
        
        return $this->Html->image($url, $options);
    }
}