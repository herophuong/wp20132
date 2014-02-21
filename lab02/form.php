<?php require 'functions.php'; ?>
<?php
  if (is_post()) {
    // Validate input
    validate_present(get_post_var("person_1[name]"), "person_1[name]");
    validate_present(get_post_var("person_2[name]"), "person_2[name]");
    validate_date(get_post_var("person_1[birthday]"), "person_1[birthday]");
    validate_date(get_post_var("person_2[birthday]"), "person_2[birthday]");
    validate_present(get_post_var("person_1[secret_code]"), "person_1[secret_code]");
    validate_present(get_post_var("person_2[secret_code]"), "person_2[secret_code]");
    validate_code(get_post_var("person_1[secret_code]"), get_post_var("person_1[confirm_code]"), "person_1[confirm_code]");
    validate_code(get_post_var("person_2[secret_code]"), get_post_var("person_2[confirm_code]"), "person_2[confirm_code]");
  }
?>
<html>
<head>
  <title>CV</title>
  <style type="text/css">
  body {
    font-family: "Arial", sans-serif;
  }
  .container {
    width: 960px;
    margin: auto;
  }
  table {
    border: 1px solid #ccc;
    width: 100%;
    border-collapse: collapse;
  }
  table td, th {
    border:1px solid #98bf21;
    padding:3px 7px 2px 7px;
  }
  table th {
    background-color:#A7C942;
    color:#ffffff;
    padding: 5px 0px;
  }
  table > thead > tr > th:first-child {
    visibility: hidden;
    width: 20%;
  }
  table > thead th:nth-child(2), table > thead th:nth-child(3) {
    width: 40%;
  }
  input[type="text"], input[type="password"], textarea {
    width: 100%;
  }
  header h1 {
    text-align: center;
    color: #6E8820;
  }
  </style>
</head>
<body>
  <?php if (!is_post() || (is_post() && !is_valid())) { ?>
  <header>
    <h1>CV</h1>
  </header>
  <div class="container">
    <form method="POST" action="form.php">
      <table>
        <thead>
          <tr>
            <th width="20%"></th>
            <th width="40%">You</th>
            <th width="40%">Your mate</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>Name</th>
            <td>
              <?php echo input_text("person_1[name]", get_post_var("person_1[name]")); ?>
              <?php echo get_error("person_1[name]"); ?>
            </td>
            <td>
              <?php echo input_text("person_2[name]", get_post_var("person_2[name]")); ?>
              <?php echo get_error("person_2[name]"); ?>
            </td>
          </tr>
          <tr>
            <th>Gender</th>
            <td>
              <?php echo input_gender("person_1[gender]", get_post_var("person_1[gender]", "male"));?>
            </td>
            <td>
              <?php echo input_gender("person_2[gender]", get_post_var("person_2[gender]", "male"));?>
            </td>
          </tr>
          <tr>
            <th>Job</th>
            <td>
              <?php echo input_job("person_1[job]", get_post_var("person_1[job]")); ?>
            </td>
            <td>
              <?php echo input_job("person_2[job]", get_post_var("person_2[job]")); ?>
            </td>
          </tr>
          <tr>
            <th>Birthday (dd/mm/yyyy)</th>
            <td>
              <?php echo input_text("person_1[birthday]", get_post_var("person_1[birthday]")); ?>
              <?php echo get_error("person_1[birthday]"); ?>
            </td>
            <td>
              <?php echo input_text("person_2[birthday]", get_post_var("person_2[birthday]")); ?>
              <?php echo get_error("person_2[birthday]"); ?>
            </td>
          </tr>
          <tr>
            <th>Hobbies</th>
            <td>
              <?php echo input_hobbies("person_1[hobbies][]", get_post_var("person_1[hobbies]")); ?>
            </td>
            <td>
              <?php echo input_hobbies("person_2[hobbies][]", get_post_var("person_2[hobbies]")); ?>
            </td>
          </tr>
          <tr>
            <th>Skills</th>
            <td>
              <?php echo input_skills("person_1[skills]", get_post_var("person_1[skills]")); ?>
            </td>
            <td>
              <?php echo input_skills("person_2[skills]", get_post_var("person_2[skills]")); ?>
            </td>
          </tr>
          <tr>
            <th>Desire</th>
            <td>
              <?php echo input_textarea("person_1[desire]", get_post_var("person_1[desire]")); ?>
            </td>
            <td>
              <?php echo input_textarea("person_2[desire]", get_post_var("person_2[desire]")); ?>
            </td>
          </tr>
          <tr>
          <tr>
            <th>Secret Code</th>
            <td>
              <?php echo input_password("person_1[secret_code]"); ?>
              <?php echo get_error("person_1[secret_code]"); ?>
            </td>
            <td>
              <?php echo input_password("person_2[secret_code]"); ?>
              <?php echo get_error("person_2[secret_code]"); ?>
            </td>
          </tr>
          <tr>
            <th>Confirm Code</th>
            <td>
              <?php echo input_password("person_1[confirm_code]"); ?>
              <?php echo get_error("person_1[confirm_code]"); ?>
            </td>
            <td>
              <?php echo input_password("person_2[confirm_code]"); ?>
              <?php echo get_error("person_2[confirm_code]"); ?>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <th></th>
            <td colspan="2"><input type="submit" name="submit" value="Submit" /></td>
          </tr>
        </tfoot>
      </table>
    </form>
  </div>
  <?php } elseif (is_post()) { ?>
  <header>
    <h1>
      You and your <?php echo (get_post_var("person_2[gender]") == "female" ? "girl friend" : "boy friend"); ?>
    </h1>
  </header>
  <div class="container">
    <table>
      <thead>
        <tr>
          <th></th>
          <th>You</th>
          <th>Your mate</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>Full name</th>
          <td><?php echo get_post_var("person_1[name]"); ?></td>
          <td><?php echo get_post_var("person_2[name]"); ?></td>
        </tr>
        <tr>
          <th>Age</th>
          <td><?php echo get_age(get_post_var("person_1[birthday]")); ?></td>
          <td><?php echo get_age(get_post_var("person_2[birthday]")); ?></td>
        </tr>
        <tr>
          <th>Birthday</th>
          <td><?php echo format_birthday(get_post_var("person_1[birthday]")); ?></td>
          <td><?php echo format_birthday(get_post_var("person_2[birthday]")); ?></td>
        </tr>
        <tr>
          <th>Hobbies</th>
          <td>
            <ul>
              <?php foreach ((array) get_post_var("person_1[hobbies]") as $hobbie) { ?>
              <li><?php echo $hobbie; ?></li>
              <?php } ?>
            </ul>
          </td>
          <td>
            <ul>
              <?php foreach ((array) get_post_var("person_2[hobbies]") as $hobbie) { ?>
              <li><?php echo $hobbie; ?></li>
              <?php } ?>
            </ul>
          </td>
        </tr>
        <tr>
        <tr>
          <th>Skills</th>
          <td>
            <ul>
              <?php foreach ((array) get_post_var("person_1[skills]") as $skill) { ?>
              <li><?php echo $skill; ?></li>
              <?php } ?>
            </ul>
          </td>
          <td>
            <ul>
              <?php foreach ((array) get_post_var("person_2[skills]") as $skill) { ?>
              <li><?php echo $skill; ?></li>
              <?php } ?>
            </ul>
          </td>
        </tr>
        <tr>
          <th>Desire</th>
          <td>
            <?php echo get_post_var("person_1[desire]"); ?>
          </td>
          <td>
            <?php echo get_post_var("person_2[desire]"); ?>
          </td>
        </tr>
        <tr>
          <th></th>
          <td colspan="2">
          There are 
          <?php 
            $date_1 = DateTime::createFromFormat("d/m/Y", get_post_var("person_1[birthday]"));
            $date_2 = DateTime::createFromFormat("d/m/Y", get_post_var("person_2[birthday]"));
            echo (abs(($date_1->getTimeStamp() - $date_2->getTimeStamp()) / 60 / 60 / 24));
          ?>
          day(s) between your birthdays
          </td>
        </tr>
        <tr>
          <th></th>
          <td colspan="2">
          There are 
          <?php echo abs($date_1->format('Y') - $date_2->format('Y')); ?>
          years between your birthdays
          </td>
        </tr>
        <tr>
          <th></th>
          <td colspan="2">
          Your secret codes are
          <?php echo (get_post_var("person_1[secret_code]") == get_post_var("person_2[secret_code]") ? "the same" : "not the same"); ?>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <?php } ?>
</body>
</html>