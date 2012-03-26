<?php
if (IN_serendipity !== true) {
    die ("Don't hack!");
}

class serendipity_event_helloworld extends serendipity_event {
    function introspect(&$propbag) {
        global $serendipity;
        $propbag->add('name',        'Ereignis-Plugin: Hello world!');
        $propbag->add('description', 'Ereignis-Plugin Beschreibung');
        $propbag->add('event_hooks', array('entries_header' => true, 
                                           'entry_display'  => true));
        $propbag->add('configuration', array('headline', 'pagetitle'));
        $propbag->add('author', 'Garvin Hicking');
        $propbag->add('version', '4.8.15.16.23.42');
        $propbag->add('requirements',  array(
            'serendipity' => '0.8',
            'smarty'      => '2.6.7',
            'php'         => '4.1.0'
        ));
        $propbag->add('groups', array('FRONTEND_EXTERNAL_SERVICES'));
        $propbag->add('stackable', true);
    }

    function introspect_config_item($name, &$propbag) {
        global $serendipity;

        switch($name) {
            case 'headline':
                $propbag->add('type',        'string');
                $propbag->add('name',        'Seitentitel');
                $propbag->add('description', '');
                $propbag->add('default',     'Beispiel');
                break;

            case 'pagetitle':
                $propbag->add('type',        'string');
                $propbag->add('name',        'URL-Variable');
                $propbag->add('description', '');
                $propbag->add('default',     'beispiel');
                break;

            default:
                return false;
        }
        return true;
    }

    function show() {
        global $serendipity;

        if ($this->selected()) {
            if (!headers_sent()) {
                header('HTTP/1.0 200');
            }

            $serendipity['smarty']->assign('staticpage_pagetitle', 
              preg_replace('@[^a-z0-9]@i', '_',
                $this->get_config('pagetitle')));
            echo '<h4 class="serendipity_title"><a href="#">' . 
              $this->get_config('headline') . '</a></h4>';
            
            echo '<div>Bitte gib mir nur ein: Oh!</div>';
        }
    }

    function selected() {
        global $serendipity;
        if ($serendipity['GET']['subpage'] == $this->get_config(
'pagetitle') ||
            preg_match('@^' . preg_quote($this->get_config('permalink')) 
              . '@i', $serendipity['GET']['subpage'])) {
            return true;
        }

        return false;
    }

    function event_hook($event, &$bag, &$eventData, $addData = null) {
        global $serendipity;

        $hooks = &$bag->get('event_hooks');

        if (isset($hooks[$event])) {
            switch($event) {
                case 'entry_display':
                    if ($this->selected()) {
                        if (is_array($eventData)) {
                            $eventData['clean_page'] = true;
                        } else {
                            $eventData = array('clean_page' => true);
                        }
                    }

                    return true;
                    break;

                case 'entries_header':
                    $this->show();

                    return true;
                    break;

                default:
                    return false;
                    break;
            }
        } else {
            return false;
        }
    }
}
