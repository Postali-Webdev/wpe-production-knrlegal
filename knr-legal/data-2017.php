<?php
/* Template Name: Data 2017 */
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Keywords -->
    <meta name="description" content="KNR"/>
    <meta name="keywords" content="KNR"/>
    <title>Interactive Ohio Traffic Data Map</title>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2, user-scalable=yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="theme-color" content="#85b7b1">
    <meta name="msapplication-navbutton-color" content="#85b7b1">
    <meta name="apple-mobile-web-app-status-bar-style" content="#85b7b1">


    <link rel="shortcut icon" type="image/x-icon" href="https://s22506.pcdn.co/wp-content/uploads/2017/10/favicon-1.ico">



    <link rel='stylesheet' id='font-awesome-css' href='<?php echo get_template_directory_uri(); ?>/assets_county/fonts/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css?ver=1.0' type='text/css' media='all' />
    <link rel='stylesheet' id='ukie-font-css' href='<?php echo get_template_directory_uri(); ?>/assets_county/fonts/font-ukie/css/font-ukie.css?ver=1.0' type='text/css' media='all' />
    <link href="https://fonts.googleapis.com/css?family=Barlow:100,200,300,400,500,600,700,800,900|Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel='stylesheet' id='bootstrap-css' href='<?php echo get_template_directory_uri(); ?>/assets_county/vendor/bootstrap/css/bootstrap.min.css?ver=1.0' type='text/css' media='all' />
    <!-- Maps Style -->
    <link href="<?php echo get_template_directory_uri(); ?>/assets_county/vendor/jsmap/jsmaps/jsmaps.css" rel="stylesheet" type="text/css" />
    <!-- My Style -->
    <link rel='stylesheet' id='my-css-css' href='<?php echo get_template_directory_uri(); ?>/assets_county/css/style.css?ver=1.0' type='text/css' media='all' />

</head>
<body>

<main class="interactive-map">
    <div class="wrapper bg-map">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-sm-12 col-lg-9">
                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets_county/images/ohio.png">
                    <h3 class="title">interactive ohio traffic data map</h3>
                    <p class="text-screen">Hover over a county to reveal the county name. Once the county name is visible, click on the county to get more information on accident statistics within that area. You can also scroll to the bottom of the page and select a county from the dropdown menu.</p>
                    <p class="responsive">Select a county from the drop-down menu below to find out more information regarding that county’s Ohio crash statistics.</p>
                    <div class="block-map">
                        <!-- Map html - add the below to your page -->
                        <div class="jsmaps-wrapper" id="ohio-map"></div>
                        <!-- End Map html -->
                    </div>

                    <div class="select-your-country">
                        <h4>YOU CAN ALSO select YOUR COUNTY BELOW</h4>
                        <label>
                            <?php $json = file_get_contents('https://www.knrlegal.com/wp-json/crime-stats/2023');
                            $array = json_decode($json);

                            $counties = $array->knr_info_2017;

                            function searchForId($name, $array) {
                                foreach ($array as $key => $val) {
                                    $val_county = strtolower($val->county);
                                    $val_county = str_replace(" ", "_", $val_county);
                                    if ($val_county == $name) {
                                        return $key;
                                    }
                                }
                                return null;
                            }; ?>
                            <select id="county_select" class="county-select">
                                <option value="">Select County</option>
                                <?php foreach ($counties as $county):
                                    $val_county = strtolower($county->county);
                                    $val_county = str_replace(" ", "_", $val_county); ?>
                                    <option value="/county?county=<?php echo $val_county; ?>"><?php echo $county->county; ?> County</option>
                                <?php endforeach; ?>
                            </select>
                        </label>
                        <a href="javascript:void(0);" target="_blank" class="btn open-info">Go</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/assets_county/js/jquery-3.2.1.min.js?ver=3.2.1'></script>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/assets_county/vendor/bootstrap/js/bootstrap.min.js?ver=1.0'></script>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/assets_county/js/jquery-ui.min.js'></script>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/assets_county/js/jquery.appear.js'></script>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/assets_county/js/jquery.countTo.js'></script>

<!-- Map scripts - add the below to your page -->
<!-- jsmaps-panzoom.js is optional if you are using enablePanZoom -->
<script src="<?php echo get_template_directory_uri(); ?>/assets_county/vendor/jsmap/jsmaps/jsmaps-libs.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets_county/vendor/jsmap/jsmaps/jsmaps-panzoom.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets_county/vendor/jsmap/jsmaps/jsmaps.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets_county/vendor/jsmap/maps/ohio.js" type="text/javascript"></script>



<!-- Diagram Animation -->
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/assets_county/js/highcharts.js'></script>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/assets_county/js/highcharts-3d.js'></script>

<!-- Scroll Animation -->
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/assets_county/js/aos.js'></script>

<!-- Line CanvasJs Animation -->
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/assets_county/js/canvasjs.min.js'></script>

<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/assets_county/js/scripts.js?ver=1.0'></script>

</body>
</html>