<?php

namespace Erikcore;

class Core
{
  function debug($var)
  {
    echo '<pre>';
    print_r($var);
    echo '</pre>';
  }
}