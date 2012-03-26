<?php
if (IN_serendipity !== true) {
    die ("Don't hack!");
}

class serendipity_plugin_helloworld extends serendipity_plugin {
    var $title = 'Beispiel-Plugin: Hello world!';

    function introspect(&$propbag) {
        global $serendipity;

        $this->title = $this->get_config('title', $this->title);

        $propbag->add('name',          'Beispiel-Plugin: Hello world!');
        $propbag->add('description',   'Beschreibung des Plugins');
        $propbag->add('stackable',     true);
        $propbag->add('author',        'Garvin Hicking');
        $propbag->add('version',       '47.11');
        $propbag->add('requirements',  array(
            'serendipity' => '0.8',
            'smarty'      => '2.6.7',
            'php'         => '4.1.0'
        ));
        $propbag->add('groups', array('FRONTEND_VIEWS'));
        $propbag->add('configuration', array('title', 'intro'));
    }

    function introspect_config_item($name, &$propbag) {
        switch($name) {
            case 'title':
                $propbag->add('type', 'string');
                $propbag->add('name', TITLE);
                $propbag->add('description', '');
                $propbag->add('default', $this->title);
                break;

            case 'intro':
                $propbag->add('type', 'string');
                $propbag->add('name', 'Ihr Text');
                $propbag->add('description', '');
                $propbag->add('default', 'Hallo welt!');
                break;

            default:
                return false;
        }
        return true;
    }

    function generate_content(&$title) {
        global $serendipity;
        $title       = $this->get_config('title', $this->title);
        $intro       = $this->get_config('intro');

        echo $intro . "<br />\n";
    }
}
