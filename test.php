<?php

    $all_lines = file('https://www.w3resource.com/');
    
    if (is_array($all_lines))
    {
        $version = htmlspecialchars($all_lines[0]);

        if ($version = '<!DOCTYPE html>')
        {
            echo "HTML 5";
        }
        elseif ($version = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">')
        {
            echo "HTML 4.01 Strict";
        }
        elseif ($version = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">')
        {
            echo "HTML 4.01 Transitional";
        }
        elseif ($version = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">')
        {
            echo "HTML 4.01 Frameset";
        }
        elseif ($version = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">')
        {
            echo "XHTML 1.0 Strict";
        }
        elseif ($version = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">')
        {
            echo "XHTML 1.0 Transitional";
        }
        elseif ($version = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">')
        {
            echo "XHTML 1.0 Frameset";
        }
        elseif ($version = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">')
        {
            echo "XHTML 1.1";
        }
        else
        {
            echo "Couldn't be defined";
        }
    }
    else
    {
        echo "Couldn't find anything";
        die;
    }


    /*if (is_array($all_lines))
    {
        if (in_array('<!DOCTYPE html>', htmlspecialchars($all_lines, 2), true))
        {
            echo "HTML 5";
        }
    }
    else {
        echo "Could'n find anything";
        die;
    }
    /*



    //foreach ($all_lines as $line_num => $line)
    //{
        //$site = htmlspecialchars($line);
        //$site_first = $site[0];
        //echo htmlspecialchars($line) . "<br>";
    //}
    //$site_first = $site[0];
    //print $site_first;


    /*$site = htmlspecialchars($all_lines, ENT_COMPAT,'ISO-8859-1', true);

    print $site;*/
?>