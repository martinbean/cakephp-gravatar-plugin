# CakePHP Gravatar plugin

This is a simple Gravatar plugin for CakePHP 2.0 and above.

## Installation

To install, either clone this repository or add it add a submodule to your project. Both are done in a command line client from the root of your project.

### Cloning the repository

The simplest way is to clone the respository. The command for this is:

    ~ git clone git@github.com:martinbean/cakephp-gravatar-plugin.git app/Plugin/Gravatar

### Adding as a submodule

Alternatively, you can add the plugin as a submodule to your project if it’s already version-controlled with Git. To do this, run the following commands:

    ~ git submodule add git@github.com:martinbean/cakephp-gravatar-plugin.git app/Plugin/Gravatar
    ~ git submodule init

For more information on submodules in Git, read http://git-scm.com/book/en/Git-Tools-Submodules.

## Using the helper

To use the helper, first enable the plugin in your **/app/Config/bootstrap.php** file by adding the following line to the bottom:

```php
CakePlugin::load('Gravatar');
```

Alternatively, you can just use the following if you have many plugins:

```php
CakePlugin::loadAll();
```

The first step is to enable it in your controllers:

```php
<?php
class AppController extends Controller {

    public $helpers = array(
        'Gravatar.Gravatar',
        // and any other helpers you need app-wide
    );
}
```

And then call it in your views:

```php
<?php
    echo $this->Gravatar->image('someone@example.com', array('size' => 80));
?>
```

All you have to do is pass an email address as the first parameter. You do not need to manually hash it as the plugin takes care of that.