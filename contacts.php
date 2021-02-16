<?php include("showdata.php") ?>
<?php include("includes/header.php") ?>
<div class="container">
<h2><em>Contacts data section</em></h2>
<div class="panel-heading"><strong>Remote database contacts</strong></div>
  <div class="panel-body">
    <p>Here you can find the contacts that you or other user has been created. 
    This section is only informative.
    </p>
  </div>
  <table class="table table-bordered table-hover table-light">
    <tdead>
      <tr><em>
        <td>ID</td>
        <td>Name</td>
        <td>createdTime</td>
        <td>City</td>
        <td>Email</td>
        <td>Phone</td>
      </tr>
    </tdead>
    <tbody>
      <?php showdata(); ?>
    </tbody>
  </table>
</div>