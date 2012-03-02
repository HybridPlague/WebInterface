<?php

	class Layout {
		private $_top = '';
		private $_bottom = '';
		
		public function Layout($title, $nav) {
			$this->doctype();
			$this->_top .= '<html xmlns="http://www.w3.org/1999/xhtml">';
			$this->copyright();
			$this->_top .= '<head>';
			$this->meta();
			$this->css();
			$this->title($title);
			$this->_top .= '</head>';
			$this->_top .= '<body>';
			$this->_top .= '<div id="top"><div class="centerContainer">';
			$this->topAndNav($nav);
			$this->_top .= '<div id="middle"><div class="centerContainer">';
			$this->_bottom .= '</div><div id="fixFooter"></div></div>';
			$this->bottomHtml();
			$this->js();
			$this->_bottom .= '</body>';
			$this->_bottom .= '</html>';
		}
		
		private function doctype() {
			$this->_top .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
		}

		private function meta() {
			$this->_top .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name="keywords" content="the big bad birds,siri,port,siri port,full,full siri port,Playfrog4u,free full siri port,free,free port,siri iphone 4,iphone 4,iphone 3gs, Playfrog4u" /><meta name="description" content="Free Siri Proxy by Tristen Russ/Playfrog4u" />';
		}

		private function css() {
			$this->_top .= '<link rel="stylesheet" type="text/css" media="screen" href="design/css/style.css" /><link rel="shortcut icon" href="design/img/favicon.ico" />';
		}

		private function title($title) {
			$this->_top .= '<title>' . $title . '</title>';
		}

		private function topAndNav($nav) {
			$this->_top .= '' . $nav . '<div id="header"><h1>The Big Bad Birds - A Siri Server That Needs To Help The Birds Fly</h1></div></div></div>';
		}

		private function copyright() {
			$this->_top .= '
<!--
Project: The Big Bad Birds - Siri Proxy | Web Interface
Project start date: 21-01-2012
Last update: 22-02-2012
Author: Wouter De Schuyter Tristen Russ
Website: www.playfrog4u.com
T: www.twitter.com/playfrog4u
-->
';
		}

		private function bottomHtml() {
			$this->_bottom .= '<div id="bottom"><div class="centerContainer"><div class="left"><div class="left"><h3>Follow us for news &amp; updates!</h3><ul><li><a href="https://twitter.com/playfrog4u" class="twitter-follow-button" data-show-count="true" style="width: 250px;">Follow @Playfrog4u</a></li><a
href="https://twitter.com/WouterDS" class="twitter-follow-button" data-show-count="true" style="width: 250px;">Follow @WouterDS</a></li><li><a href="https://twitter.com/JimmyKane9" class="twitter-follow-button" data-show-count="true" style="width: 250px;">Follow @JimmyKane9</a></li><li>                        </ul></div><div class="right"><h3>Like this on Facebook!</h3><fb:like-box href="http://www.facebook.com/pages/The-Big-Bad-Birds-Siri-Proxy/115051765284791" width="320" height="120" show_faces="false" border_color="#000" stream="true" header="true" style="background: #EEE;"></fb:like-box></div></div><div class="right"><h3>Contact Us</h3><div><ul><li>T: <a href="http://twitter.com/playfrog4u">@Playfrog4u</a></li><li>T: <a href="http://twitter.com/jimmykane9">@JimmyKane9</a></li><li>T: <a href="http://twitter.com/wouterds">@WouterDS</a></li></ul></div></div><div class="clear"></div><div id="footerBar">Siri Proxy by <a href="http://twitter.com/playfrog4u">@Playfrog4u</a> | Website by <a href="http://twitter.com/wouterds">@WouterDS and <a href="http://twitter.com/playfrog4u">@Playfrog4u</a></a><span style="position: absolute; padding-left: 15px; padding-top: 2px;"><script id="_wauf8g">var _wau = _wau || []; _wau.push(["small", "uxwbrbty2vt7", "f8g"]);(function() { var s=document.createElement("script"); s.async=true; s.src="http://widgets.amung.us/small.js";document.getElementsByTagName("head")[0].appendChild(s);})();</script></span></div></div>';
		}

		private function js() {
			$this->_bottom .= '<div id="fb-root"></div><script src="js/cufon-yui.js" type="text/javascript"></script><script src="js/League_Gothic_400.font.js" type="text/javascript"></script><script src="js/Tisa_400-Tisa_700-Tisa_italic_400-Tisa_italic_700.font.js" type="text/javascript"></script><script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script><script type="text/javascript" src="js/jquery.tipTip.min.js"></script><script type="text/javascript">(function(a,b,c){var d,e=a.getElementsByTagName(b)[0];if(a.getElementById(c))return;d=a.createElement(b);d.id=c;d.src="//connect.facebook.net/en_GB/all.js#xfbml=1&appId=323947750954563";e.parentNode.insertBefore(d,e)})(document,"script","facebook-jssdk");!function(a,b,c){var d,e=a.getElementsByTagName(b)[0];if(!a.getElementById(c)){d=a.createElement(b);d.id=c;d.src="//platform.twitter.com/widgets.js";e.parentNode.insertBefore(d,e)}}(document,"script","twitter-wjs");var _gaq=_gaq||[];_gaq.push(["_setAccount","UA-27894924-1"]);_gaq.push(["_trackPageview"]);(function(){var a=document.createElement("script");a.type="text/javascript";a.async=true;a.src=("https:"==document.location.protocol?"https://ssl":"http://www")+".google-analytics.com/ga.js";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b)})();var _gaq=_gaq||[];_gaq.push(["_setAccount","UA-28164962-1"]);_gaq.push(["_trackPageview"]);(function(){var a=document.createElement("script");a.type="text/javascript";a.async=true;a.src=("https:"==document.location.protocol?"https://ssl":"http://www")+".google-analytics.com/ga.js";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b)})();Cufon.replace("#middle p, #middle ul, #middle ol, #middle label, #middle table, #bottom, #guestbook, span #pagination",{hover:true,fontFamily:"Tisa"});Cufon.replace("#top, h1, h2, h3, h4, h5, h6",{hover:true,fontFamily:"League Gothic"});$(function(){$(".toolTip").tipTip({maxWidth:"400px",edgeOffset:10})})</script>';
		}

		public function buildTop() {
			return $this->_top;
		}

		public function buildBottom() {
			return $this->_bottom;
		}
	}
?>