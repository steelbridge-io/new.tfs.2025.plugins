<?php
$lowersacramento_updated		= get_post_meta(get_the_ID(), 'lowersacramento-updated', true);
$lowersacramento_report			= get_post_meta(get_the_ID(), 'lowersacramento-report', true);
$lowersacramento_hot_flies	= get_post_meta(get_the_ID(), 'lowersacramento-hot-flies', true);

$oasissprings_updated				= get_post_meta(get_the_ID(), 'oasissprings-updated', true);
$oasissprings_report				= get_post_meta(get_the_ID(), 'oasissprings-report', true);
$oasissprings_hot_flies			= get_post_meta(get_the_ID(), 'oasissprings-hot-flies', true);

$mccloudriver_updated				= get_post_meta(get_the_ID(), 'mccloudriver-updated', true);
$mccloudriver_report				= get_post_meta(get_the_ID(), 'mccloudriver-report', true);
$mccloudriver_hot_flies			= get_post_meta(get_the_ID(), 'mccloudriver-hot-flies', true);

$hatcreek_report_update			= get_post_meta(get_the_ID(), 'hatcreek-report-update', true);
$hatcreek_report						= get_post_meta(get_the_ID(), 'hatcreek-report', true);
$hatcreek_hot_flies					= get_post_meta(get_the_ID(), 'hatcreek-hot-flies', true);

$sugarcreek_updated					= get_post_meta(get_the_ID(), 'sugarcreek-updated', true);
$sugarcreek_report					= get_post_meta(get_the_ID(), 'surgarcreek-report', true);
$sugarcreek_hot_flies				= get_post_meta(get_the_ID(), 'sugarcreek-hot-flies', true);

$lewistonlake_updated				= get_post_meta(get_the_ID(), 'lewistonlake-updated', true);
$lewistonlake_report				= get_post_meta(get_the_ID(), 'lewistonlake-report', true);
$lewistonlake_hot_flies			= get_post_meta(get_the_ID(), 'lewistonlake-hot-flies', true);

$luklake_updated						= get_post_meta(get_the_ID(), 'luklake-updated', true);
$luklake_report							= get_post_meta(get_the_ID(), 'luklake-report', true);
$luklake_hot_flies					= get_post_meta(get_the_ID(), 'luklake-hot-flies', true);

$klamathriver_updated				= get_post_meta(get_the_ID(), 'klamathriver-updated', true);
$klamathriver_report				= get_post_meta(get_the_ID(), 'klamathriver-report', true);
$klamathriver_hot_flies			= get_post_meta(get_the_ID(), 'klamathriver-hot-flies', true);

$trinityriver_updated				= get_post_meta(get_the_ID(), 'trinityriver-updated', true);
$trinityriver_report				= get_post_meta(get_the_ID(), 'trinityriver-report', true);
$trinityriver_hot_flies			= get_post_meta(get_the_ID(), 'trinityriver-hot-flies', true);

$sugarcreek_updated					= get_post_meta(get_the_ID(), 'sugarcreek-updated', true);
$sugarcreek_report					= get_post_meta(get_the_ID(), 'sugarcreek-report', true);
$sugarcreek_hot_flies				= get_post_meta(get_the_ID(), 'sugarcreek-hot-flies', true); ?>




<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-body">
<div class="row" id="modal-style">
<div id="featuredreport1">
<div class="report-panel">
<div class="container-fluid">
<div class="row">

<div class="col-sm-6">
<h4>Sugar Creek Ranch</h4>
</div>
<div class="col-sm-6">
<h4><strong>Updated:&nbsp;</strong>

<!-- === BEGIN EDIT SECTION: DATE === -->

<?php echo $sugarcreek_updated; ?>

<!-- === END EDIT SECTION: DATE === -->

</h4>
</div>
</div>
</div>

<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<p><strong>Report:</strong>

<!-- === BEGIN EDIT SECTION: REPORT === -->

<?php echo $sugarcreek_report; ?>

<h1><?php echo $color_test; ?></h1>


<!-- === END EDIT SECTION: REPORT === -->

</p>

<p><strong>Hot Flies:&nbsp;</strong>

<!-- === BEGIN EDIT SECTION: HOT FLIES === -->

<?php echo $sugarcreek_hot_flies; ?>

<!-- === END EDIT SECTION: HOT FLIES === -->

</p>
<button data-dismiss="modal" class="close"><i class="fa fa-3x fa-times" aria-hidden="true"></i></button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
