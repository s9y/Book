<?php
echo "DRAFT! WORK IN PROGRESS! PROOF OF CONCEPT! DUMMY! GO Ahead, improve it\n";

function latex_convert($content, $depth = 0) {
    global $texcommands;

    static $ignore_file = array('osp-hyphenation' => true);
    
    $content = preg_replace('@^(\s*%.*)$@imsU', '', $content);

    preg_match_all('@(\\\\include\{([^\}]+)\})@i', $content, $m);

    if (is_array($m[2])) {
        foreach($m[2] AS $idx => $include) {
            if (isset($ignore_file[$include])) {
                echo "Ignore include of " . $include . ".tex...\n";
                $content = str_replace($m[0][$idx], 
                  '<!-- IGNORE INCLUDE: ' . $include . '-->' . "\n",
                  $content); 
                continue;
            }

            echo "Parsing include of " . $include . ".tex...\n";
            $content = str_replace($m[0][$idx], 
              '<!-- INCLUDE: ' . $include . '-->' . "\n" 
                . latex_convert(file_get_contents($include . '.tex'), $depth+1)
              . '<!--/INCLUDE: ' . $include . ' -->' . "\n", $content);
        }
    }
    
    latex_grep('@\\\\([\w]+)\s@imsU', 'LaTeX commands like \stuff (without commands)', $content);

    latex_grep('@\\\\([\w]+)(\{[^\}]*\})+@ims', 'LaTeX commands like \stuff{...} (with commands)', $content);

    if ($depth == 0) {
        arsort($texcommands);
        print_r($texcommands);
    }

    return $content;
}

function latex_grep($regexp, $desc, &$content) {
    global $texcommands;

    preg_match_all($regexp, $content, $m);

    if (is_array($m[1])) {
        foreach($m[1] AS $idx => $command) {
            if ($GLOBALS['debug']) echo "Found LaTEX $desc:\n   " . trim($m[0][$idx]) . "\n";

            if ($command == 'emph') {
                if ($GLOBALS['debug']) echo "<em> replacement.\n";
                $content = str_replace($m[0][$idx], '<em>' . trim($m[2][$idx]) . '</em>', $content);
                continue;
            }

            if ($command == 'cmd') {
                if ($GLOBALS['debug']) echo "<code> replacement.\n";
                $content = str_replace($m[0][$idx], '<code>' . trim($m[2][$idx]) . '</code>', $content);
                continue;
            }

            if ($command == 'index') {
                if ($GLOBALS['debug']) echo "<index> replacement, ignore.\n";
                continue;
            }


            @$texcommands[$command]++;

        }
    }

}

$debug = false;

$texcommands = array();
$base = file_get_contents('serendipity.tex');

$all = latex_convert($base);
$fp = fopen('index.txt', 'w');

if (!$fp) die('index.txt needs to be writable');
echo fwrite($fp, $all) . " bytes written to index.txt\n";

