<?php
	defined('_JEXEC') or die;
?>
<div class="hidden">
    <div class="home-cards row">
  <div class="col-sm-8 no-gutters">
    <div class="card-holder">
      <a href="<?php echo $params->get('firsttablink'); ?>">
        <div class="text-holder"><?php echo $params->get('firsttabtitle'); ?></div>
        <img src="<?php echo $params->get('firsttabimg'); ?>" class="img-responsive">
      </a>
    </div>
  </div>
  <div class="col-sm-4 no-gutters">
    <div class="card-holder">
      <a href="<?php echo $params->get('secondtablink'); ?>">
        <div class="text-holder"><?php echo $params->get('secondtabtitle'); ?></div>
        <img src="<?php echo $params->get('secondtabimg'); ?>" class="img-responsive">
      </a>
    </div>
  </div>
</div>
<div class="home-cards row">
  <div class="col-sm-4 no-gutters">
    <div class="card-holder">
      <a href="<?php echo $params->get('thirdtablink'); ?>">
        <div class="text-holder"><?php echo $params->get('thirdtabtitle'); ?></div>
        <img src="<?php echo $params->get('thirdtabimg'); ?>" class="img-responsive">
      </a>
    </div>
  </div>
  <div class="col-sm-4 no-gutters">
    <div class="card-holder">
      <a href="<?php echo $params->get('fourthtablink'); ?>">
        <div class="text-holder"><?php echo $params->get('fourthtabtitle'); ?></div>
        <img src="<?php echo $params->get('fourthtabimg'); ?>" class="img-responsive">
      </a>
    </div>
  </div>
  <div class="col-sm-4 no-gutters">
    <div class="card-holder">
      <a href="<?php echo $params->get('fifthtablink'); ?>">
        <div class="text-holder"><?php echo $params->get('fifthtabtitle'); ?></div>
        <img src="<?php echo $params->get('fifthtabimg'); ?>" class="img-responsive">
      </a>
    </div>
  </div>
</div>
</div>

<div class="row">

  <div class="col-md-6 no-gutters">
    <div class="col-md-6 image-box">
      <a href="<?php echo $params->get('firsttablink'); ?>"><img src="<?php echo $params->get('firsttabimg'); ?>" class="img-responsive"></a>
    </div>
    <div class="col-md-6 text-box">
      <h3><i class="fa fa-clipboard" aria-hidden="true"></i> <?php echo $params->get('firsttabtitle'); ?></h3>
      <?php echo $params->get('firsttabdesc'); ?>
      <br />
      <a href="<?php echo $params->get('firsttablink'); ?>">Read More</a>
    </div>
  </div>
  <div class="col-md-6 no-gutters">
    <div class="col-md-6 image-box">
      <a href="<?php echo $params->get('secondtablink'); ?>"><img src="<?php echo $params->get('secondtabimg'); ?>" class="img-responsive"></a>
    </div>
    <div class="col-md-6 text-box">
      <h3><i class="fa fa-clipboard" aria-hidden="true"></i> <?php echo $params->get('secondtabtitle'); ?></h3>
      <?php echo $params->get('secondtabdesc'); ?>
      <br />
      <a href="<?php echo $params->get('secondtablink'); ?>">Read More</a>
    </div>
  </div>

</div>
<br />
<div class="row">

  <div class="col-md-6 no-gutters">
    <div class="col-md-6 text-box">
      <h3><i class="fa fa-clipboard" aria-hidden="true"></i> <?php echo $params->get('thirdtabtitle'); ?></h3>
      <?php echo $params->get('thirdtabdesc'); ?>
      <br />
      <a href="<?php echo $params->get('thirdtablink'); ?>">Read More</a>
    </div>
    <div class="col-md-6 image-box">
      <a href="<?php echo $params->get('thirdtablink'); ?>"><img src="<?php echo $params->get('thirdtabimg'); ?>" class="img-responsive"></a>
    </div>
  </div>
  <div class="col-md-6 no-gutters">
    <div class="col-md-6 text-box">
      <h3><i class="fa fa-clipboard" aria-hidden="true"></i> <?php echo $params->get('fourthtabtitle'); ?></h3>
      <?php echo $params->get('fourthtabdesc'); ?>
      <br />
      <a href="<?php echo $params->get('fourthtablink'); ?>">Read More</a>
    </div>
    <div class="col-md-6 image-box">
      <a href="<?php echo $params->get('fourthtablink'); ?>"><img src="<?php echo $params->get('fourthtabimg'); ?>" class="img-responsive"></a>
    </div>
  </div>

</div>
