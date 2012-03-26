<?php
if (IN_serendipity !== true) {
    die ("Don't hack!");
}

class serendipity_event_nl2br extends serendipity_event {
    function introspect(&$propbag) {
        global $serendipity;

        $propbag->add('name',          'nl2br');
        $propbag->add('event_hooks', array('frontend_display' => true));
    }

    function event_hook($event, &$bag, &$eventData) {
        global $serendipity;

        $hooks = &$bag->get('event_hooks');
        if (isset($hooks[$event])) {
            switch($event) {
              case 'frontend_display':
                $eventData['body'] = nl2br($eventData['body']);
                return true;
                break;

              default:
                return false;
            }
        } else {
            return false;
        }
    }
}
