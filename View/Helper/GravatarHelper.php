<?php
App::uses('AppHelper', 'View/Helper');

class GravatarHelper extends AppHelper {
    
    public $helpers = array('Html');
    
    public function image($email, $options = array()) {
        $options = array_merge(array(
            'size' => 80,
            'default' => 'mm',
            'rating' => 'g'
        ), $options);
        
        $url = 'http://www.gravatar.com/avatar/';
        $url.= md5($email);
        $url.= sprintf('?s=%d&d=%s&r=%s', $size, $default, $rating);
        
        return $this->Html->image($url, $options);
    }
}
