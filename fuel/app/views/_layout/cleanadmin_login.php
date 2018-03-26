<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard HTML Template</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Tamerlan Soziev" name="author">
    <meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="favicon.png" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <!-- <link href="http://fast.fonts.net/cssapi/487b73f1-c2d1-43db-8526-db577e4c822b.css" rel="stylesheet" type="text/css"> -->
     
    <?php echo Asset::css(array(
        'select2/dist/css/select2.min.css',
        'bootstrap-daterangepicker/daterangepicker.css',
        'dropzone/dist/dropzone.css',
        'datatables.net-bs/css/dataTables.bootstrap.min.css',
        'fullcalendar/dist/fullcalendar.min.css',
        'perfect-scrollbar/css/perfect-scrollbar.min.css',
        'slick-carousel/slick/slick.css',
        'main.css@version=4.3.0',
 
    )); ?>
</head>

<body class="auth-wrapper">

                <?php if (\Messages::any()): ?>
                    <br/>
                    <?php foreach (array('success', 'info', 'warning', 'error') as $type): ?>

                        <?php foreach (\Messages::instance()->get($type) as $message): ?>
                            <div class="alert alert-<?= $message['type']; ?>">
                                <button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true"> ×</span></button>
                                <h4 class="alert-heading"><?= (isset($message['title'])) ? @$message['title']: "Alert !!!"; ?></h4>

                                  <?= $message['body']; ?>
                            </div>
                        <?php endforeach; ?>

                    <?php endforeach; ?>
                    <?php \Messages::reset(); ?>
                <?php endif; ?>

                <?php if (Session::get_flash('success')  OR Session::get_flash('error')): ?>
                <!-- <div class="wrapper"> -->
                    <div class="row">
                        <div class="col-md-3 col-md-offset-4">
                            

                        <?php if (Session::get_flash('success')): ?>
                            <div class="alert alert-success">
                                <strong>Success</strong>
                                <p>
                                <?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
                                </p>
                            </div>
                        <?php endif; ?>
                        <?php if (Session::get_flash('error')) : ?>
                            <div class="alert alert-danger">
                                <strong>Error</strong>
                                <p>
                                <?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
                                </p>
                            </div>
                        <?php endif; ?>
                        </div>

                    </div>
                <!-- </div>-->
                <?php endif; ?>
	

    <div class="all-wrapper menu-side with-pattern">
        <?= $content ?>
    </div>

    <?php echo Asset::js(array(
        "jquery/dist/jquery.min.js",
        "popper.js/dist/umd/popper.min.js",
        "moment/moment.js",
        "select2/dist/js/select2.full.min.js",
        "jquery-bar-rating/dist/jquery.barrating.min.js",
        "bootstrap-validator/dist/validator.min.js",
        
	    "perfect-scrollbar/js/perfect-scrollbar.jquery.min.js",
	    "tether/dist/js/tether.min.js",
	    "slick-carousel/slick/slick.min.js",
	    "bootstrap/js/dist/util.js",
	    "bootstrap/js/dist/alert.js",
	    "bootstrap/js/dist/button.js",
	    "bootstrap/js/dist/carousel.js",
	    "bootstrap/js/dist/collapse.js",
	    "bootstrap/js/dist/dropdown.js",
	    "bootstrap/js/dist/modal.js",
	    "bootstrap/js/dist/tab.js",
	    "bootstrap/js/dist/tooltip.js",
	    "bootstrap/js/dist/popover.js",
        'demo_customizer.js@version=4.3.0',
        'main.js@version=4.3.0',

 
    )); ?>
</body>

</html>