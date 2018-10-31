<?php

$template = get_theme_mod( 'colorlib_coming_soon_template_selection' );
$styles   = array(
	array(
		'name'     => 'main',
		'location' => 'css/main.css',
		'template' => $template,
	),
	array(
		'name'     => 'util',
		'location' => 'css/util.css',
		'template' => $template,
	)
);

colorlibStyleEnqueue( $styles );

$counter = get_theme_mod( 'colorlib_coming_soon_timer_option' );
$dates   = colorlibCounterDates( $counter );
wp_head();
?>

<div class="simpleslide100">
    <div class="simpleslide100-item bg-img1"
         style="background-image: url('<?php echo CSMM_URL . 'templates/' . $template; ?>/images/bg01.jpg');"></div>
    <div class="simpleslide100-item bg-img1"
         style="background-image: url('<?php echo CSMM_URL . 'templates/' . $template; ?>/images/bg02.jpg');"></div>
    <div class="simpleslide100-item bg-img1"
         style="background-image: url('<?php echo CSMM_URL . 'templates/' . $template; ?>/images/bg03.jpg');"></div>
</div>

<div class="size1 overlay1">
    <!--  -->
    <div class="w-full flex-w flex-sb-m p-l-65 p-r-80 p-t-22 p-b-185 p-lr-15-sm respon8">
        <div class="wrappic1 m-r-30 m-t-10 m-b-10">
            <a href="#"><img src="images/icons/logo.png" alt="LOGO"></a>
        </div>

        <div class="flex-w m-t-10 m-b-10">
            <a href="#" class="size2 m1-txt1 flex-c-m how-btn1 trans-04">
                Sign Up
            </a>
        </div>
    </div>

    <!--  -->
    <div class="flex-sb flex-row-rev where3-parent p-l-58 p-r-46 respon2">
        <!--  -->
        <div class="where3 wsize2 respon1">
            <h3 class="l1-txt2 p-b-30 respon6 respon7">
                Coming Soon
            </h3>

            <p class="m2-txt1 respon6">
                Follow us for update now!
            </p>

            <form class="contact100-form validate-form p-t-55 w-full">
                <div class="wrap-input100 validate-input m-lr-auto-lg" data-validate="Email is required: ex@abc.xyz">
                    <input class="s2-txt1 placeholder0 input100 trans-04" type="text" name="email"
                           placeholder="Email Address">

                    <button class="flex-c-m ab-t-r size4 s1-txt1 hov1 trans-04">
                        <i class="fa fa-paper-plane fs-15 cl0"></i>
                    </button>
                </div>
            </form>
        </div>

        <!--  -->
        <div class="flex-w flex-col cd100 p-t-34 respon3">
            <div class="flex-col wsize1 m-b-40 respon4">
                <span class="l1-txt1 p-b-30 days"><?php echo $dates['template']['days']; ?></span>
                <span class="s1-txt1"><?php echo _e( 'Days', 'colorlib-coming-soon' ); ?></span>
            </div>

            <div class="flex-col wsize1 m-b-40 respon4">
                <span class="l1-txt1 p-b-30 hours"><?php echo $dates['template']['hours']; ?></span>
                <span class="s1-txt1"><?php echo _e( 'Hours', 'colorlib-coming-soon' ); ?></span>
            </div>

            <div class="flex-col wsize1 m-b-40 respon4">
                <span class="l1-txt1 p-b-30 minutes"><?php echo $dates['template']['minutes']; ?></span>
                <span class="s1-txt1"><?php echo _e( 'Minutes', 'colorlib-coming-soon' ); ?></span>
            </div>

            <div class="flex-col wsize1 m-b-40 respon4">
                <span class="l1-txt1 p-b-30 seconds"><?php echo $dates['template']['seconds']; ?></span>
                <span class="s1-txt1"><?php echo _e( 'Seconds', 'colorlib-coming-soon' ); ?></span>
            </div>
        </div>

        <!--  -->
        <div class="flex-w flex-col where2 respon5">
            <a href="#" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-5">
                <i class="fa fa-facebook-official"></i>
            </a>

            <a href="#" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-5">
                <i class="fa fa-twitter-square"></i>
            </a>

            <a href="#" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-5">
                <i class="fa fa-pinterest-square"></i>
            </a>
        </div>

    </div>


</div>
<?php

$scripts = array(
	array(
		'name'     => 'popper',
		'location' => 'js/vendor/bootstrap/js/popper.js',
		'template' => 'global',
	),
	array(
		'name'     => 'bootstrap',
		'location' => 'js/vendor/bootstrap/js/bootstrap.min.js',
		'template' => 'global'
	),
	array(
		'name'     => 'popper',
		'location' => 'js/vendor/bootstrap/js/popper.js',
		'template' => 'global'
	),
	array(
		'name'     => 'select2',
		'location' => 'js/vendor/select2/select2.min.js',
		'template' => 'global'
	),
	array(
		'name'     => 'moment',
		'location' => 'js/vendor/countdowntime/moment.min.js',
		'template' => 'global'
	),
	array(
		'name'     => 'timezone',
		'location' => 'js/vendor/countdowntime/moment-timezone-with-data.min.js',
		'template' => 'global'
	),
	array(
		'name'     => 'coutdowntime',
		'location' => 'js/vendor/countdowntime/countdowntime.js',
		'template' => 'global'
	),
	array(
		'name'     => 'tilt',
		'location' => 'js/vendor/tilt/tilt.jquery.min.js',
		'template' => 'global'
	),
	array(
		'name'     => 'main',
		'location' => 'js/main.js',
		'template' => $template,
	),

);

colorlibScriptEnqueue( $scripts );

wp_footer();

?>

<script>
    jQuery('.cd100').countdown100({
        /*Set Endtime here*/
        /*Endtime must be > current time*/
        endtimeYear: <?php echo $dates['script']['year']; ?>,
        endtimeMonth: <?php echo $dates['script']['month']; ?>,
        endtimeDate: <?php echo $dates['script']['day']; ?>,
        endtimeHours: 23,
        endtimeMinutes: 0,
        endtimeSeconds: 0,
        timeZone: ""
        // ex:  timeZone: "America/New_York"
        //go to " http://momentjs.com/timezone/ " to get timezone
    });
</script>

<script>
    jQuery('.js-tilt').tilt({
        scale: 1.1
    })
</script>