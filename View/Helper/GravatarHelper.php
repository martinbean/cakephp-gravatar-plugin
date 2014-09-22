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
        
        if ($this->validateGravatar($email)) {
            return $this->Html->image($url, $options);
        } else {
            $options['title'] = 'Click here to obtain a gravatar.';
            return $this->Html->link($this->Html->image($url,$options),
                'http://www.gravatar.com', array('target'=>'_blank','escape'=>false));
        }
    }

    /** 
     * Returns true if user has an uploaded gravatar, else false.
     *
     * A function that checks if user has an uploaded gravatar. If he/she does not then it will return 
     * false and will tell image() to create an image link that opens the gravatar website on a new page.
     */
    function validateGravatar($email) 
    {
        $hash = md5(strtolower(trim($email)));
        $uri = 'http://www.gravatar.com/avatar/' . $hash . '?d=404';
        $headers = @get_headers($uri);
        if (!preg_match('|200|', $headers[0])) {
            $has_valid_avatar = false;
        } else {
            $has_valid_avatar = true;
        }
        return $has_valid_avatar;
    }
}
