<?php

  function formElement($icon,$placeholder,$name,$value,$attr){
    $element=" 
    <span class=\"input-group-text\" id=\"basic-addon1\"
    >$icon</span>
    <input
      type=\"text\"
      autocomplete=\"off\"
      name='$name'
      class=\"form-control\"
      placeholder='$placeholder'
      aria-label=\"Username\"
      aria-describedby=\"basic-addon1\"
      $attr
    />
    ";

  echo $element;
  }

  function btnElement($btnid,$class,$icon,$name){
    $element = "
    <button id='$btnid' name='$name' data-bs-toggle='tooltip' data-bs-placement='bottom' class='$class px-3 py-2 mx-2 rounded  border-0 crud-btn'>$icon</button>
    ";
    echo $element;
  }

?>