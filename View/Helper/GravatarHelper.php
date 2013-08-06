<?php
App::uses('AppHelper', 'View/Helper');

class GravatarHelper extends AppHelper {
    
    public $helpers = array('Html');
    
    public function image($email, $options = array()) {
        $defaults = array(
            'size' => 80,
            'default' => 'mm',
            'rating' => 'g'
        );
        $options = array_merge($defaults, $options);
        
        $url = 'http://www.gravatar.com/avatar/';
        $url.= md5($email);
        $url.= sprintf('?s=%d&d=%s&r=%s', $options['size'], $options['default'], $options['rating']);
        
        return $this->Html->image($url, $options);
    }
}
