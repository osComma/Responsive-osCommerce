<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2018 osCommerce

  Released under the GNU General Public License
*/

  class breadcrumb {
    var $_trail;

    function __construct() {
      $this->reset();
    }

    function reset() {
      $this->_trail = array();
    }

    function add($title, $link = '') {
      $this->_trail[] = array('title' => $title, 'link' => $link);
    }

    function trail($separator = NULL) {
      $trail_string .= '<nav aria-label="breadcrumb">' . PHP_EOL;
        $trail_string .= '<ol class="breadcrumb">' . PHP_EOL;

        for ($i=0, $n=sizeof($this->_trail); $i<$n; $i++) {
          if (isset($this->_trail[$i]['link']) && tep_not_null($this->_trail[$i]['link'])) {
            $trail_string .= '<li class="breadcrumb-item"><a href="' . $this->_trail[$i]['link'] . '">' . $this->_trail[$i]['title'] . '</a></li>';
          } else {
            $trail_string .= '<li class="breadcrumb-item">' . $this->_trail[$i]['title'] . '</li>';
          }
        } 

        $trail_string .= '</ol>' . PHP_EOL;
      $trail_string .= '</nav>' . PHP_EOL;

      return $trail_string;
    }
  }
  