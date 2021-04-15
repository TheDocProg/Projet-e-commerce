<?php

function redirect($target)
{
  header("Location: $target");
  exit();
};
