<?php
function input($id){
  $value = isset($_POST[$id]) ? $_POST[$id] : '';
  return "<input type='text' class='form-control' id='$id' name='$id' value='$value'>";
}
function textarea($id){
  $value = isset($_POST[$id]) ? $_POST[$id] : '';
  return "<textarea type='text' class='form-control' id='$id' name='$id'>$value</textarea>";
}
function select($id, $options = array()){
  $return = "<select class='form-select' id='$id' name='$id'>";
  foreach($options as $key => $value){
    $selected = '';
    if(isset($_POST[$id]) && $key == $_POST[$id]){
      $selected = ' selected="selected"';
    }
    $return .= "<option value='$key' $selected>$value</option>";
  }
  $return .= '</select>';
  return $return;
}