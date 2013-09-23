<?php 
$user = $red->data->session->user; 
$page = $red->page;
?>

<div id="mainNav" class="navbar navbar-inverse" role="navigation">
	<div class="navbar-header">
		<?php $page->linkTo(array("href" => "home", "class" => "navbar-brand"), $red->page->image('monitor.png', false, array('id' =>'navImage'))."Monitaur");?>
	</div>
  <?php
  if ($user->authenticated){ ?>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="#">Logged In As: <?php echo $user->display;?></a></li>
      
      <?php
      if ($user->access == 'admin'){ ?>
        <li><?php $page->linkTo(array("href" => "admin"), "Admin");?></li>
      <?php
      } ?>
      
      <li><a id="logout">Sign Out</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Errors <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><?php $page->linkTo(array("href" => "errors/pending"),"Pending");?></li>
          <li><?php $page->linkTo(array("href" => "errors/acknowledged"),"Acknowledged");?></li>
          <li><?php $page->linkTo(array("href" => "errors/resolved"),"Resolved");?></li>
          <li><?php $page->linkTo(array("href" => "errors"),"All");?></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Alerts <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><?php $page->linkTo(array("href" => "alerts/pending"),"Pending");?></li>
          <li><?php $page->linkTo(array("href" => "alerts/acknowledged"),"Acknowledged");?></li>
          <li><?php $page->linkTo(array("href" => "alerts/resolved"),"Resolved");?></li>
          <li><?php $page->linkTo(array("href" => "alerts"),"All");?></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Notifications <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><?php $page->linkTo(array("href" => "notifications/pending"),"Pending");?></li>
          <li><?php $page->linkTo(array("href" => "notifications/resolved"),"Resolved");?></li>
          <li><?php $page->linkTo(array("href" => "notifications"),"All");?></li>
        </ul>
      </li>
    </ul>
    <?php 
    } ?>
</div>