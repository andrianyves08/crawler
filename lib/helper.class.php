<?php
class Helpers extends SQLHelper
{

	function crawl_page($url,$depth=2){
	    if($depth>0)
	    {
	        $html = file_get_contents($url);
	        preg_match_all('~<a.*?href="(.*?)".*?>~',$html,$matches);
	        foreach($matches[1] as $newurl)
	        {
	            $this->crawl_page($newurl,$depth-1);
	        }
	        file_put_contents('../homepage.html',"\n\n".$html."\n\n",FILE_APPEND);
	    }
	}

	function getInternalLinks($url) {
	    $internalLinks = array();
	    $html = file_get_contents($url);

	    if ($html !== false) {
	        $dom = new DOMDocument();
	        @$dom->loadHTML($html);

	        $links = $dom->getElementsByTagName('a');

	        foreach ($links as $link) {
	            $href = $link->getAttribute('href');

	            // Check if the link is internal (starts with '/') or is from the same domain
	            if (strpos($href, '/') === 0 || parse_url($href, PHP_URL_HOST) === parse_url($url, PHP_URL_HOST)) {
	                $internalLinks[] = $href;
	            }
	        }
	    }

	    return $internalLinks;
	}

	function findLinksToHomePage($url) {
		$sitemap = '../sitemap.html';

		if (file_exists($sitemap)) {
			if (time()-filemtime($sitemap) > 1 * 3600) {
				unlink('../sitemap.html');
				unlink('../crawl-results.html');
				unlink('../homepage.html');
				$this->createFiles($url);
			}
		} else {
			$this->createFiles($url);
		}
	}

	function createFiles($url) {

	    $internalLinks = $this->getInternalLinks($url);

	    $crawl = '';
	    $links = '<ul>';
	    foreach ($internalLinks as $link) {
	    	$links .= "<li><a href=\"$link\">$link</a></li>";
	        $crawl .= '<tr>';
	        $crawl .= "<td ><a href=\"$link\">$link</a></td>";
	        $crawl .= '</tr>';
	    }
	    $links .= '</ul>';
	    
	    $parse_data['timestamp'] = 'now';
		$parse_data['crawl'] 	= $links;

		$id = $this->insert_all('tbl_crawl', $parse_data);

	    $sitemapHTML = '';
	    foreach ($internalLinks as $url => $lastmod) {
	        $sitemapHTML .= '<url>' . PHP_EOL;
	        $sitemapHTML .= '<loc>' . $url . '</loc>' . PHP_EOL;
	        $sitemapHTML .= '<lastmod>' . $lastmod . '</lastmod>' . PHP_EOL;
	        $sitemapHTML .= '<changefreq>weekly</changefreq>' . PHP_EOL;
	        $sitemapHTML .= '<priority>0.7</priority>' . PHP_EOL;
	        $sitemapHTML .= '</url>' . PHP_EOL;
	    }

	    file_put_contents('../sitemap.html', $sitemapHTML);
	    file_put_contents('../crawl-results.html', $crawl);
	}


	/*** VARKEYDUMP ***/
	function varkeydump(){	
		$length = 12;
		$characters = date("mdYgisu", time())."ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$characters .= strtolower("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
		$key = '';
		for ($p = 0; $p < $length; $p++) {	
			$key .= $characters[mt_rand(0, strlen($characters))];	
		}
		return $key;
	}

	function readable_date($var,$format="M d,Y"){
		return date($format, strtotime($var));
	}

	function readable_datetime($var,$format="M d,Y, h:i A"){
		return date($format, strtotime($var));
	}
}
?>