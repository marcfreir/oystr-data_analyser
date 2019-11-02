<?php
    /*
        Subject    : DATA ANALYSER – Linguagem PHP (OYSTR)
        Created on : 31-Oct-2019, 07:56:25 PM
        Author     : Marcos Freire
    */
?>

<?php
    
    // If the btn_go is pressed (store its value)
    if (isset($_POST['btn_go']))
    {
        // If the input text isn't NULL
        if (!$_POST['txt_siteurl'] == NULL)
        {
            // Gets the input text value
            $site_url = $_POST['txt_siteurl'];

            #################### - Validation for the HTML Version [start]- ####################
            $all_lines = file($site_url);
    
            if (is_array($all_lines))
            {
                $version = htmlspecialchars($all_lines[0]);
                session_start();
                if ($version = '<!DOCTYPE html>')
                {
                    $_SESSION['session_html_version'] = "HTML 5";
                }
                elseif ($version = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">')
                {
                    $_SESSION['session_html_version'] = "HTML 4.01 Strict";
                }
                elseif ($version = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">')
                {
                    $_SESSION['session_html_version'] = "HTML 4.01 Transitional";
                }
                elseif ($version = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">')
                {
                    $_SESSION['session_html_version'] = "HTML 4.01 Frameset";
                }
                elseif ($version = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">')
                {
                    $_SESSION['session_html_version'] = "XHTML 1.0 Strict";
                }
                elseif ($version = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">')
                {
                    $_SESSION['session_html_version'] = "XHTML 1.0 Transitional";
                }
                elseif ($version = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">')
                {
                    $_SESSION['session_html_version'] = "XHTML 1.0 Frameset";
                }
                elseif ($version = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">')
                {
                    $_SESSION['session_html_version'] = "XHTML 1.1";
                }
                else
                {
                    $_SESSION['session_html_version'] = "Couldn't be defined";
                }
            }
            else
            {
                $_SESSION['session_html_version'] = "Couldn't find anything";
                die;
            }
            #################### - Validation for the HTML Version [end]- ####################

            // Gets all the contents from the adress given (a valid URL)
            $str = file_get_contents($site_url);

            // Gets Webpage Title
            if (strlen($str) > 0)
            {
                $str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
                preg_match("/\<title\>(.*)\<\/title\>/i", $str, $title); // ignore case
                $title = $title[1];

                // Creates sessions for site_url and the title
                session_start();
                $_SESSION['session_result_site_url'] = $site_url;
                $_SESSION['session_result_site_title'] = $title;
            }

            // Gets All Webpage Links
            $doc = new DOMDocument; 
            @$doc->loadHTML($str); 
            
            $items = $doc->getElementsByTagName('a'); 
            foreach ($items as $value) 
            { 
                $attrs = $value->attributes; 
                $sec_url[] = $attrs->getNamedItem('href')->nodeValue;
            }
            $all_links = $sec_url;

            
            // Custom function
            function stristrarray($array, $str){
                // This array will hold the indexes of every
                // element that contains the substring.
                $indexes = array();
                foreach($array as $k => $v){
                    // If stristr, add the index to the
                    // $indexes array
                    if(stristr($v, $str)){
                        $indexes[] = $k;
                    }
                }
                return $indexes;
            }

            // Searching for the substring "#" will return one result.
            $result = stristrarray($all_links, '#');

            // Creates a session for site internal links
            $_SESSION['session_result_site_internal_links'] = count($result);
            // Creates a session for site external links
            $_SESSION['session_result_site_external_links'] = count($all_links) - count($result);

            // Returns to the page result.php
            header("location: ../result.php");
        }
        else
        {
            echo "Insert a valid URL";
            echo '<form action="../controllers/ControllerReturn.php" method="post">
            <input type="submit" name="btn_return" value="Return">
            </form>';
        }
    }
?>