<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Keywords -->
    <meta name="description" content="KNR"/>
    <meta name="keywords" content="KNR"/>
    <title>County Data</title>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2, user-scalable=yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="theme-color" content="#85b7b1">
    <meta name="msapplication-navbutton-color" content="#85b7b1">
    <meta name="apple-mobile-web-app-status-bar-style" content="#85b7b1">

    <link rel="shortcut icon" type="image/x-icon" href="https://s22506.pcdn.co/wp-content/uploads/2017/10/favicon-1.ico">

    <link rel='stylesheet' id='font-awesome-css' href='/wp-content/themes/knr-legal/assets/fonts/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='ukie-font-css' href='/wp-content/themes/knr-legal/assets/fonts/font-ukie/css/font-ukie.css' type='text/css' media='all' />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow:100,200,300,400,500,600,700,800,900|Montserrat:100,200,300,400,500,600,700,800,900" >

    <link href="/wp-content/themes/knr-legal/assets/css/aos.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Style -->
    <link rel='stylesheet' id='bootstrap-css' href='/wp-content/themes/knr-legal/lib/bootstrap/css/bootstrap.min.css' type='text/css' media='all' />
    <!-- Maps Style -->
    <link href="/wp-content/themes/knr-legal/lib/jsmap/jsmaps/jsmaps.css" rel="stylesheet" type="text/css" />
    <!-- My Style -->
    <link rel='stylesheet' id='my-css-css' href='/wp-content/themes/knr-legal/assets/css/style.css' type='text/css' media='all' />
    <style>
        .canvasjs-chart-credit{
            display: none!important;
            color: transparent;
        }
    </style>

</head>

<body>

<?php




if ($_GET && !empty($_GET)) {

    if (isset($_GET['county']) && $_GET['county'] != '') {
        $name = $_GET['county'];
    } else {
        $name = 'adams';
    }
} else {
    $name = 'adams';
}

$json = file_get_contents('/wp-json/crime-stats/2023');
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
}
$key = searchForId($name, $counties);

$county = (array)$counties[$key];
$ohio_data = (array)($array->ohio_averages);

?>



<main class="interactive-map">
    <div class="wrapper accidents">
        <h1><?php echo $county['county']; ?> COUNTY</h1>
        <div class="statistic">
            <ul class="data-counties">
                <li><span>POPULATION:</span><?php echo number_format($county['population'], 0, '.', ','); ?></li>
                <li><span>TOTAL AREA:</span><?php echo number_format($county['size'], 1, '.', ','); ?> mi²</li>
            </ul>
            <div class="data">
                <?php if($county['id']){

                    $num = $county['id'];

                    switch (true):
                        case ((($num - 1) % 10) == 0 && $num != 11):
                            $prefix = 'st';
                            break;
                        case ((($num - 2) % 10) == 0 && $num != 12):
                            $prefix = 'nd';
                            break;
                        case ((($num - 3) % 10) == 0 && $num != 13):
                            $prefix = 'rd';
                            break;
                        default:
                            $prefix = 'th';
                    endswitch;

                } else {
                    $prefix = 'st';
                }


                ?>
                <h4><?php echo $county['county']; ?> COUNTY RANKS <span class="county-number" ><?php echo $county['id']; ?><sup><?php echo $prefix; ?>*</sup></span>OUT OF 88 OHIO COUNTIES</h4>
                <ul>
                    <li class="border-line"><span class="in-county">IN</span></li>
                    <li><span class="name">Accidents</span></li>
                    <li class="border-line"><span class="population">per<br><small>capita</small></span></li>
                </ul>
                <p>* the higher the ranking, the more accidents per capita</p>
                <img src="/wp-content/themes/knr-legal/images/keystone/county-speed.png" class="speed-diagram" alt="County">
                <img src="/wp-content/themes/knr-legal/images/keystone/arrow-light.png" class="arrow-diagram" alt="Arrow" data-aos="" data-county="<?php echo $county['id']; ?>">
                <span class="speed-text">ACCIDENTS <br>PER CAPITA</span>
            </div>
            <div class="count-accidents">
                <h4><?php echo $county['county']; ?> COUNTY HAD A TOTAL OF <br><span class="count number-bar" data-count="<?php echo $county['total_accidents']; ?>"></span> TRAFFIC ACCIDENTS IN 2023</h4>
                <img src="/wp-content/themes/knr-legal/images/keystone/count-accidents.png" alt="Accidents">
            </div>
        </div>

    </div>

    <div class="wrapper factors">
        <h2>CONTRIBUTING FACTORS</h2>
    </div>

    <div class="wrapper factor alcohol">
        <img src="/wp-content/themes/knr-legal/images/keystone/arrow-down.png" class="arrow-down" alt="Alcohol">
        <div class="left-col content">
            <ul>
                <li><span class="quotient number-bar" data-count="<?php echo $county['alcohol_percentage']; ?>"></span><span class="quotient">%</span></li>
                <li class="border-line"><span class="title-quotient">ALCOHOL <br>CONSUMPTION</span></li>
            </ul>
            <p><?php echo $county['alcohol_percentage']; ?>% of accidents in <?php echo $county['county']; ?> County involved a driver who was under the influence of alcohol.</p>
            <div class="diagram">
                <h4>ALCOHOL RELATED <br>ACCIDENTS</h4>
                <div id="container-1" style="height: 180px; width: 180px;" data-color="#85b7b1" data-title="Alcohol Related:" data-number="<?php echo $county['alcohol_percentage']; ?>"></div>
            </div>
        </div>
        <div class="right-col">
            <div class="factor-img">
                <img src="/wp-content/themes/knr-legal/images/keystone/alcohol.png" alt="Alcohol">
                <img src="/wp-content/themes/knr-legal/images/keystone/keys.png" class="keys" alt="Keys">
            </div>
        </div>
    </div>

    <div class="wrapper factor excessive-speed">
        <div class="left-col">
            <div class="factor-img">
                <picture>
                    <source media="(max-width: 575px)" srcset="/wp-content/themes/knr-legal/images/keystone/limit.png" alt="Speed">
                    <img src="/wp-content/themes/knr-legal/images/keystone/speds-bg.png" alt="Speed">
                </picture>
                <img src="/wp-content/themes/knr-legal/images/keystone/moto.png" class="moto" alt="Speed" data-aos="">
                <img src="/wp-content/themes/knr-legal/images/keystone/auto.png" class="auto" alt="Auto" data-aos="">
                <img src="/wp-content/themes/knr-legal/images/keystone/lim.png" class="limit" alt="Speed">
            </div>
        </div>
        <div class="right-col content">
            <ul>
                <li><span class="quotient number-bar" data-count="<?php echo $county['speed_percentage']; ?>"></span><span class="quotient">%</span></li>
                <li class="border-line"><span class="title-quotient">excessive <br>speed</span></li>
            </ul>
            <p><?php echo $county['speed_percentage']; ?>% of accidents in <?php echo $county['county']; ?> County involved a driver who was driving at a speed in excess of the limit.</p>
            <div class="diagram">
                <h4>excessive speed</h4>
                <div id="container-2" style="height: 180px; width: 180px;" data-color="#cb413c" data-title="Excessive Speed:" data-number="<?php echo $county['speed_percentage']; ?>"></div>
            </div>
        </div>
    </div>

    <div class="wrapper factor cell-phone">
        <div class="left-col content">
            <ul>
                <li><span class="quotient number-bar" data-count="<?php echo $county['phone_percentage']; ?>"></span><span class="quotient">%</span></li>
                <li class="border-line"><span class="title-quotient">cell phone <br>usage</span></li>
            </ul>
            <p><?php echo $county['phone_percentage']; ?>% of accidents in <?php echo $county['county']; ?> County involved a driver who was distracted by an electronic device.</p>
            <div class="diagram">
                <h4>distracted driving <br>ACCIDENTS</h4>
                <div id="container-3" style="height: 180px; width: 180px;" data-color="#85b7b1" data-title="Distracted Driving:" data-number="<?php echo $county['phone_percentage']; ?>"></div>
            </div>

        </div>
        <div class="right-col">
            <div class="factor-img">
                <picture>
                    <source media="(max-width: 1199px)" srcset="/wp-content/themes/knr-legal/images/keystone/phone-bg-2.png" alt="Speed">
                    <img src="/wp-content/themes/knr-legal/images/keystone/phone-bg.png" alt="Speed">
                </picture>
                <img src="/wp-content/themes/knr-legal/images/keystone/mann-auto.png" class="mann-auto" alt="Mann and phone" data-aos="">
                <img src="/wp-content/themes/knr-legal/images/keystone/mann.png" class="mann" alt="Mann" data-aos="">
            </div>
        </div>
    </div>

    <div class="wrapper factor fatality">
        <div class="left-col">
            <div class="factor-img">
                <picture>
                    <source media="(max-width: 1199px)" srcset="/wp-content/themes/knr-legal/images/keystone/fatality-2.png" alt="Speed">
                    <img src="/wp-content/themes/knr-legal/images/keystone/fatality-bg.png" alt="Speed">
                </picture>

            </div>
        </div>
        <div class="right-col content">
            <ul>
                <li><span class="quotient number-bar" data-count="<?php echo $county['injury_fatality_percentage']; ?>"></span><span class="quotient">%</span></li>
                <li class="border-line"><span class="title-quotient">injury or <br>fatality</span></li>
            </ul>
            <p><?php echo $county['injury_fatality_percentage']; ?>% of accidents in <?php echo $county['county']; ?> County resulted in an injury or fatality to the driver or passenger(s).</p>
            <div class="diagram">
                <h4>injury or fatality</h4>
                <div id="container-4" style="height: 180px; width: 180px;" data-color="#cb413c" data-title="Injury or fatality:" data-number="<?php echo $county['injury_fatality_percentage']; ?>"></div>
            </div>
        </div>
    </div>

    <div class="wrapper factor age-group">
        <div class="left-col">
            <h2>ACCIDENTS</h2>
            <h3>BY AGE GROUP</h3></div>
        <div class="right-col">
            <p>The graph below illustrates the age groups of individuals who have been involved in an accident during this time period.</p>
        </div>
        <div class="line-canvas">
            <!--<canvas id="myChart" width="400" height="400" data-aos=""></canvas>-->
            <div id="chartContainer" style="height: 300px; width: 100%;"></div>

        </div>

        <ul class="options-accidents">
            <li class="county"><h4><?php echo $county['county']; ?> COUNTY</h4></li>
            <li><h4>OHIO (ALL COUNTIES)</h4></li>
        </ul>

        <?php
            $sum = (int)$county['15_group'] + (int)$county['16_20_group'] + (int)$county['21_25_group'] + (int)$county['26_30_group'] + (int)$county['31_35_group'] + (int)$county['36_40_group'] + (int)$county['41_45_group'] + (int)$county['46_50_group'] + (int)$county['51_55_group'] + (int)$county['56_60_group'] + (int)$county['61_65_group'] + (int)$county['66_70_group'] + (int)$county['71_75_group'] + (int)$county['76_group'];
            $sum_state = (int)$ohio_data['15_group'] + (int)$ohio_data['16_20_group'] + (int)$ohio_data['21_25_group'] + (int)$ohio_data['26_30_group'] + (int)$ohio_data['31_35_group'] + (int)$ohio_data['36_40_group'] + (int)$ohio_data['41_45_group'] + (int)$ohio_data['46_50_group'] + (int)$ohio_data['51_55_group'] + (int)$ohio_data['56_60_group'] + (int)$ohio_data['61_65_group'] + (int)$ohio_data['66_70_group'] + (int)$ohio_data['71_75_group'] + (int)$ohio_data['76_group'];
        ?>

        <script>
            var name_county = "<?php echo $county['county']; ?> COUNTY";
            var data_county = [
                { y: <?php echo round((int)$county['15_group']/$sum*100); ?>, label:'0-15'},
                { y: <?php echo round((int)$county['16_20_group']/$sum*100); ?>, label:'16-20' },
                {y: <?php echo round((int)$county['21_25_group']/$sum*100); ?>, label:'21-25' },
                {y: <?php echo round((int)$county['26_30_group']/$sum*100); ?>, label:'26-30' },
                { y: <?php echo round((int)$county['31_35_group']/$sum*100); ?>, label:'31-35' },
                { y: <?php echo round((int)$county['36_40_group']/$sum*100); ?>, label:'36-40' },
                { y: <?php echo round((int)$county['41_45_group']/$sum*100); ?>, label:'41-45' },
                { y: <?php echo round((int)$county['46_50_group']/$sum*100); ?>, label:'46-50' },
                { y: <?php echo round((int)$county['51_55_group']/$sum*100); ?>, label:'51-55' },
                { y: <?php echo round((int)$county['56_60_group']/$sum*100); ?>, label:'56-60' },
                { y: <?php echo round((int)$county['61_65_group']/$sum*100); ?>, label:'61-65' },
                { y: <?php echo round((int)$county['66_70_group']/$sum*100); ?>, label:'66-70' },
                { y: <?php echo round((int)$county['71_75_group']/$sum*100); ?>, label:'71-75' },
                { y: <?php echo round((int)$county['76_group']/$sum*100); ?>, label:'76+' }
            ];
            var data_state = [
                { y: <?php echo round((int)$ohio_data['15_group']/$sum_state*100); ?>, label:'0-15'},
                { y: <?php echo round((int)$ohio_data['16_20_group']/$sum_state*100); ?>, label:'16-20' },
                { y: <?php echo round((int)$ohio_data['21_25_group']/$sum_state*100); ?>, label:'21-25' },
                { y: <?php echo round((int)$ohio_data['26_30_group']/$sum_state*100); ?>, label:'26-30' },
                { y: <?php echo round((int)$ohio_data['31_35_group']/$sum_state*100); ?>, label:'31-35' },
                { y: <?php echo round((int)$ohio_data['36_40_group']/$sum_state*100); ?>, label:'36-40' },
                { y: <?php echo round((int)$ohio_data['41_45_group']/$sum_state*100); ?>, label:'41-45' },
                { y: <?php echo round((int)$ohio_data['46_50_group']/$sum_state*100); ?>, label:'46-50' },
                { y: <?php echo round((int)$ohio_data['51_55_group']/$sum_state*100); ?>, label:'51-55' },
                { y: <?php echo round((int)$ohio_data['56_60_group']/$sum_state*100); ?>, label:'56-60' },
                { y: <?php echo round((int)$ohio_data['61_65_group']/$sum_state*100); ?>, label:'61-65' },
                { y: <?php echo round((int)$ohio_data['66_70_group']/$sum_state*100); ?>, label:'66-70' },
                { y: <?php echo round((int)$ohio_data['71_75_group']/$sum_state*100); ?>, label:'71-75' },
                { y: <?php echo round((int)$ohio_data['76_group']/$sum_state*100); ?>, label:'76+' }
            ];
        </script>

        <div class="table-age-group">
            <table>
                <tr>
                    <th>age</th>
                    <th class="county-table"><?php echo $county['county']; ?> COUNTY</th>
                    <th class="state-table">OHIO</th>
                </tr>
                <tr>
                    <td>0-15</td>
                    <td class="county-table"><?php echo round((int)$county['15_group']/$sum*100); ?>%</td>
                    <td class="state-table"><?php echo round((int)$ohio_data['15_group']/$sum_state*100); ?>%</td>
                </tr>
                <tr>
                    <td>16-20</td>
                    <td class="county-table"><?php echo round((int)$county['16_20_group']/$sum*100); ?>%</td>
                    <td class="state-table"><?php echo round((int)$ohio_data['16_20_group']/$sum_state*100); ?>%</td>
                </tr>
                <tr>
                    <td>21-25</td>
                    <td class="county-table"><?php echo round((int)$county['21_25_group']/$sum*100); ?>%</td>
                    <td class="state-table"><?php echo round((int)$ohio_data['21_25_group']/$sum_state*100); ?>%</td>
                </tr>
                <tr>
                    <td>26-30</td>
                    <td class="county-table"><?php echo round((int)$county['26_30_group']/$sum*100); ?>%</td>
                    <td class="state-table"><?php echo round((int)$ohio_data['26_30_group']/$sum_state*100); ?>%</td>
                </tr>
                <tr>
                    <td>31-35</td>
                    <td class="county-table"><?php echo round((int)$county['31_35_group']/$sum*100); ?>%</td>
                    <td class="state-table"><?php echo round((int)$ohio_data['31_35_group']/$sum_state*100); ?>%</td>
                </tr>
                <tr>
                    <td>36-40</td>
                    <td class="county-table"><?php echo round((int)$county['36_40_group']/$sum*100); ?>%</td>
                    <td class="state-table"><?php echo round((int)$ohio_data['36_40_group']/$sum_state*100); ?>%</td>
                </tr>
                <tr>
                    <td>41-45</td>
                    <td class="county-table"><?php echo round((int)$county['41_45_group']/$sum*100); ?>%</td>
                    <td class="state-table"><?php echo round((int)$ohio_data['41_45_group']/$sum_state*100); ?>%</td>
                </tr>
                <tr>
                    <td>46-50</td>
                    <td class="county-table"><?php echo round((int)$county['46_50_group']/$sum*100); ?>%</td>
                    <td class="state-table"><?php echo round((int)$ohio_data['46_50_group']/$sum_state*100); ?>%</td>
                </tr>
                <tr>
                    <td>51-55</td>
                    <td class="county-table"><?php echo round((int)$county['51_55_group']/$sum*100); ?>%</td>
                    <td class="state-table"><?php echo round((int)$ohio_data['51_55_group']/$sum_state*100); ?>%</td>
                </tr>
                <tr>
                    <td>56-60</td>
                    <td class="county-table"><?php echo round((int)$county['56_60_group']/$sum*100); ?>%</td>
                    <td class="state-table"><?php echo round((int)$ohio_data['56_60_group']/$sum_state*100); ?>%</td>
                </tr>
                <tr>
                    <td>61-65</td>
                    <td class="county-table"><?php echo round((int)$county['61_65_group']/$sum*100); ?>%</td>
                    <td class="state-table"><?php echo round((int)$ohio_data['61_65_group']/$sum_state*100); ?>%</td>
                </tr>
                <tr>
                    <td>66-70</td>
                    <td class="county-table"><?php echo round((int)$county['66_70_group']/$sum*100); ?>%</td>
                    <td class="state-table"><?php echo round((int)$ohio_data['66_70_group']/$sum_state*100); ?>%</td>
                </tr>
                <tr>
                    <td>71-75</td>
                    <td class="county-table"><?php echo round((int)$county['71_75_group']/$sum*100); ?>%</td>
                    <td class="state-table"><?php echo round((int)$ohio_data['71_75_group']/$sum_state*100); ?>%</td>
                </tr>
                <tr>
                    <td>76+</td>
                    <td class="county-table"><?php echo round((int)$county['76_group']/$sum*100); ?>%</td>
                    <td class="state-table"><?php echo round((int)$ohio_data['76_group']/$sum_state*100); ?>%</td>
                </tr>

            </table>
        </div>

    </div>
    <div class="wrapper factor age-group" style="background: #d0d0d0">
        <p>The information provided in this interactive map has been sourced from the Ohio Department of Public Safety. The information has not been modified but has been organized to provide visual representation of important data sets. This is a service of Kisling, Nestico & Redick.</p>
    </div>
</main>


<script type='text/javascript' src='/wp-content/themes/knr-legal/assets/js/jquery-3.2.1.min.js'></script>
<script type='text/javascript' src='/wp-content/themes/knr-legal/lib/bootstrap/js/bootstrap.min.js'></script>
<script type='text/javascript' src='/wp-content/themes/knr-legal/assets/js/keystone/jquery-ui.min.js'></script>
<script type='text/javascript' src='/wp-content/themes/knr-legal/assets/js/keystone/jquery.appear.js'></script>
<script type='text/javascript' src='/wp-content/themes/knr-legal/assets/js/keystone/jquery.countTo.js'></script>

<!-- Map scripts - add the below to your page -->
<!-- jsmaps-panzoom.js is optional if you are using enablePanZoom -->
<script src="/wp-content/themes/knr-legal/lib/jsmap/jsmaps/jsmaps-libs.js" type="text/javascript"></script>
<script src="/wp-content/themes/knr-legal/lib/jsmap/jsmaps/jsmaps-panzoom.js"></script>
<script src="/wp-content/themes/knr-legal/lib/jsmap/jsmaps/jsmaps.min.js" type="text/javascript"></script>
<script src="/wp-content/themes/knr-legal/lib/jsmap/maps/ohio.js" type="text/javascript"></script>

<!-- Scroll Animation -->
<script type='text/javascript' src='/wp-content/themes/knr-legal/assets/js/keystone/aos.js'></script>

<!-- Line CanvasJs Animation -->
<script type='text/javascript' src='/wp-content/themes/knr-legal/assets/js/keystone/canvasjs.min.js'></script>
<script type='text/javascript' src='/wp-content/themes/knr-legal/assets/js/keystone/jquery.animateNumber.min.js'></script>

<script type='text/javascript' src='/wp-content/themes/knr-legal/assets/js/scripts.js?ver=1.06'></script>

</body>
</html>