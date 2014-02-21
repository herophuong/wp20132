<?php
function input_text($name, $value = "")
{
  return '<input type="text" name="' . $name . '" value=\'' . $value . '\' />';
}

function input_gender($name, $value = "male")
{
  $check = function($gender, $value) {if ($gender == $value) return "checked";};
  $html = <<<EOD
  <label>
    <input type="radio" name="$name" value="male" {$check("male", $value)}/>
    Male
  </label>
  <label>
    <input type="radio" name="$name" value="female" {$check("female", $value)}/>
    Female
  </label>
EOD;
  return $html;
}

function input_job($name, $value = "")
{
  $jobs = array("Accountant", "Actor", "Athlete", "Dancer", "Designer", "Engineer", "Farmer", "Teacher");
  return input_select($jobs, $name, $value);
}

function input_hobbies($name, $value = "")
{
  $hobbies = array("Singing", "Gaming", "Movies", "Magic", "Singing", "Sewing", "Yoga", "Knitting");
  $check = function($option) use ($value) {
    if ($option == $value || (is_array($value) && in_array($option, $value))) return "checked";
  };
  $html = "";
  foreach ($hobbies as $hobbie) {
    $html .= <<<EOD
    <label>
        <input type="checkbox" name="{$name}" value="$hobbie" {$check($hobbie)}/>
        $hobbie
    </label>
    <br />
EOD;
  }
  return $html;
}

function input_skills($name, $value = "")
{
  $skills = array("Critical Thinking", "Problem Solving", "Active Listening", "Mathematics", "Programming", "Sales and Marketing");
  return input_select($skills, $name, $value, true);
}

function input_textarea($name, $value = "")
{
  $html = <<<EOD
  <textarea name="$name">
  $value
  </textarea>
EOD;
  return $html;
}

function input_password($name, $value="")
{
  $html = <<<EOD
  <input type="password" name="$name" value='$value' />
EOD;
  return $html;
}

function input_select($options, $name, $value = "", $multiple = false)
{
  if ($multiple)
    $html = "<select name=\"{$name}[]\" multiple>";
  else
    $html = "<select name=\"$name\">";
  
  foreach ($options as $option) {
    if ($value == $option || (is_array($value) && in_array($option, $value)))
      $html .= "<option value=\"$option\" selected>$option</option>";
    else
      $html .= "<option value=\"$option\">$option</option>";
  }
  $html .= "</select>";
  
  return $html;
}

$error = array();

function get_error($name)
{
  global $error;
  if (array_key_exists($name, $error))
    return "<span style='color: red;'>$error[$name]</span>";
}

function validate_present($value, $name)
{
  global $error;
  if (empty($value))
    $error[$name] = "This field is required!";
}

function validate_date($value, $name)
{
  global $error;
  $parts = explode("/", $value);
  if (!(count($parts) == 3 && checkdate($parts[1], $parts[0], $parts[2])))
    $error[$name] = "Birthday is invalid!";
}

function validate_code($code, $confirm, $name)
{
  global $error;
  if ($code != $confirm)
    $error[$name] = "Confirm code should be the same as secret code!";
}

function get_post_var($name, $default = NULL)
{
  $keys = preg_split('/[\]\[]{1,2}/', $name);
  $value = $_POST;
  foreach ($keys as $key) {
    if (empty($key))
      break;
    
    if (array_key_exists($key, $value)) {
      $value = $value[$key];
    } else {
      $value = $default;
      break;
    }
  }
  return $value; 
}

function is_post()
{
  return $_SERVER["REQUEST_METHOD"] == 'POST';
}

function is_valid()
{
  global $error;
  return empty($error);
}

function get_age($birthday)
{
  $parsed_date = date_parse_from_format("d/m/Y", $birthday);
  return (date('Y') - $parsed_date["year"]);
}

function format_birthday($birthday)
{
  $date = DateTime::createFromFormat("d/m/Y", $birthday);
  return $date->format("D, F d, Y");
}