<?php
include "../../core/helpers/public_page.php";
Public_page::header();
?>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="sass.html">Sass</a></li>
    <li><a href="badges.html">Components</a></li>
    <li><a href="collapsible.html">Javascript</a></li>
    <li><a href="mobile.html">Mobile</a></li>
  </ul>

<div class="container">
    <form action="">
        <div class="input-field col s12 l6">
        <input type="text" id="first_name" class="validate">
        <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s12 l6">
        <input type="text" id="last_name" class="validate">
        <label for="last_name">Last Name</label>
        </div>
        <div class="input-field col s12">
        <input type="email" id="email" class="validate">
        <label for="email" data-error="wrong" data-success="right">Email</label>
        </div>
        <div class="input-field col s12">
        <textarea id="textarea1" class="materialize-textarea"></textarea>
        <label for="textarea1">Textarea</label>
        </div>
    </form>
</div>
<?php
Public_page::footer();
?>