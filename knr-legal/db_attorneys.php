<?php
require('../../..' . '/wp-config.php');
$wp->init();
$wp->parse_request();
$wp->query_posts();
$wp->register_globals();

global $wp_query;

$word = preg_replace("/[^A-Za-z0-9]/", " ", $_GET['word']);
$search_type = $_GET['search_type'];

$html = '';
$html .= '<li class="result">';
$html .= '<a href="urlString">';
$html .= '<div class="attorney-info">';
$html .= '<h3 id="searchResults">nameString</h3>';
$html .= '</div>';
$html .= '</a>';
$html .= '</li>';


// Check Length More Than One Character
if (strlen($word) >= 1 && $word !== ' ') {

    if ($wpdb->connect_errno) {
        printf("Connect failed: %s\n", $wpdb->connect_error);
        exit();
    } else {

        if ($search_type == "live") {

            $sql = 'SELECT loc.meta_value as location, photo.meta_value as photo_id, attorneypost.post_title as attorney_name,lastName.meta_value as attorney_last_name, photopost.guid as photo_guid, attorneypost.guid as attorney_guid,  attorneypost.post_name as attorney_info,  phone.meta_value as phone 
					FROM wp_posts attorneypost 
					JOIN wp_postmeta loc on loc.meta_key="attorney_location" and loc.post_id=attorneypost.ID 
					LEFT JOIN wp_postmeta photo on photo.meta_key="attorney_photo" and photo.post_id = attorneypost.Id 
					LEFT JOIN wp_posts photopost on photopost.ID = photo.meta_value 
					LEFT JOIN wp_postmeta phone on phone.meta_key="phone_number" and phone.post_id = loc.post_id 
					LEFT JOIN wp_postmeta lastName on lastName.meta_key="last_name" and attorneypost.ID = lastName.post_id  
					WHERE attorneypost.post_title like "%' . $word . '%"
                    AND attorneypost.post_status ="publish"
					ORDER BY attorney_last_name ASC';

            $result = $wpdb->get_results($sql);
            if (count($result) > 0) {
                foreach ($result as $row) {
                    // Format Output Strings And Hightlight Matches
                    $display_function = preg_replace("/" . $word . "/i", "<b class='highlight'>" . $word . "</b>", $row->location);
                    $display_name = preg_replace("/" . $word . "/i", "<b class='highlight'>" . $word . "</b>", $row->attorney_name);
                    $display_image = $row->photo_guid;
                    $display_url =  '/our-attorneys/'.$row->attorney_info.'/';

                    // Insert Name
                    $output = str_replace('nameString', $display_name, $html);

                    // Insert Function
                    $output = str_replace('functionString', $display_function, $output);

                    // Insert URL
                    $output = str_replace('urlString', $display_url, $output);

                    // Get Thumbnail
                    $output = str_replace('thumbnailString', $display_image, $output);

                    // Output
                    echo $output;
                }
            } else {

                $output = str_replace('urlString', 'javascript:void(0);', $html);
                $output = str_replace('nameString', '<b>No Results Found</b>', $output);
                $output = str_replace('functionString', '<em>Please search again</em>', $output);

                // Output
                echo $output;
                $wpdb->close();
            }

        }

        if ($search_type == "city") {
            if ($word == "all") {

                echo "<div><p class='attyFilterCrumb'><span class='redWhacks'>SEARCH RESULTS //</span> " . $word . "</p>";
                $sql = 'SELECT loc.post_id as location_post_id, photo.meta_value as photo_meta_value, attorneypost.post_title as attorney_name,lastName.meta_value as attorney_last_name, photopost.guid as photo_guid, attorneypost.guid as attorney_guid, attorneypost.post_name as attorney_info, phone.meta_value as phone, loc.meta_value as location
                    FROM wp_postmeta loc LEFT JOIN wp_postmeta photo on photo.meta_key="attorney_photo" and photo.post_id = loc.post_id 
                    JOIN wp_posts attorneypost on attorneypost.ID = loc.post_id 
                    LEFT JOIN wp_posts photopost on photopost.ID = photo.meta_value 
                    LEFT JOIN wp_postmeta phone on phone.meta_key="phone_number" and phone.post_id = loc.post_id 
                    LEFT JOIN wp_postmeta lastName on lastName.meta_key="last_name" and attorneypost.ID = lastName.post_id 
                    WHERE loc.meta_key = "attorney_location"
                    AND attorneypost.post_status ="publish"
                    ORDER BY attorney_last_name ASC';
            } else {

                echo "<div><p class='attyFilterCrumb'><span class='redWhacks'>SEARCH RESULTS //</span> " . $word . "</p>";

                $sql = 'SELECT loc.post_id as location_post_id, photo.meta_value as photo_meta_value, attorneypost.post_title as attorney_name, lastName.meta_value as attorney_last_name,  photopost.guid as photo_guid, attorneypost.guid as attorney_guid, attorneypost.post_name as attorney_info, phone.meta_value as phone, loc.meta_value as location
					FROM wp_postmeta loc LEFT JOIN wp_postmeta photo on photo.meta_key="attorney_photo" and photo.post_id = loc.post_id 
					JOIN wp_posts attorneypost on attorneypost.ID = loc.post_id 
					LEFT JOIN wp_posts photopost on photopost.ID = photo.meta_value 
					LEFT JOIN wp_postmeta phone on phone.meta_key="phone_number" and phone.post_id = loc.post_id 
					LEFT JOIN wp_postmeta lastName on lastName.meta_key="last_name" and attorneypost.ID = lastName.post_id 
					WHERE loc.meta_key = "attorney_location" AND loc.meta_value LIKE "%' . $word . '%" 
                    AND attorneypost.post_status ="publish"
					ORDER BY attorney_last_name ASC';
            }

            $result = $wpdb->get_results($sql);

            if (count($result) > 0) {
                foreach ($result as $row) {
                    echo "<div class='post_text_holder'>";
                    echo "<div class='post_text_inner'>";
                    echo "<div class='two_columns_66_33 clearfix attyListing'>";
                    echo "<div class='column1'>";
                    $image = get_field('attorney_photo', $row->location_post_id);
                    $image_url = $image['sizes']['all-people-img-small'];
                    echo "<div class='photo-attorney'><img src=" . $image_url . " alt=" . $row->attorney_name . "/></div>";
                    echo "<div class='info-attorney'>";
                    echo "<h4>" . $row->attorney_name . "</h4>";
                    echo "<p class='location'>" . $row->location . "</p>";
                    echo "<a class='button'  href='/our-attorneys/".$row->attorney_info."/' title=" . $row->attorney_name . ">View Profile</a>";
                    echo "</div>";
                    echo "</div><div class='column2'><p class='phone_number'><a href='tel:" . $row->phone . "'>" . $row->phone . "</a></p></div>
				                    </div>
								</div>
							</div>	";
                }
            } else {

                echo "<br> No results";
                echo "</div>";
                $wpdb->close();
            }

        }

        if ($search_type == "text") {
            echo "<div>SEARCH RESULTS // NAME";

            $sql = 'SELECT loc.post_id as location_post_id, loc.meta_value as location, photo.meta_value as photo_id, attorneypost.post_title as attorney_name,lastName.meta_value as attorney_last_name, photopost.guid as photo_guid, attorneypost.guid as attorney_guid,  attorneypost.post_name as attorney_info, phone.meta_value as phone 
					FROM wp_posts attorneypost 
					JOIN wp_postmeta loc on loc.meta_key="attorney_location" and loc.post_id=attorneypost.ID 
					LEFT JOIN wp_postmeta photo on photo.meta_key="attorney_photo" and photo.post_id = attorneypost.Id 
					LEFT JOIN wp_posts photopost on photopost.ID = photo.meta_value 
					LEFT JOIN wp_postmeta phone on phone.meta_key="phone_number" and phone.post_id = loc.post_id 
					LEFT JOIN wp_postmeta lastName on lastName.meta_key="last_name" and attorneypost.ID = lastName.post_id 
					WHERE attorneypost.post_title like "%' . $word . '%"
                    AND attorneypost.post_status ="publish"
					ORDER BY attorney_last_name ASC';

            $result = $wpdb->get_results($sql);

            if (count($result) > 0) {
                foreach ($result as $row) {
                    echo "<div class='post_text_holder'>";
                    echo "<div class='post_text_inner'>";
                    echo "<div class='two_columns_66_33 clearfix attyListing'>";
                    echo "<div class='column1'>";
                    $image = get_field('attorney_photo', $row->location_post_id);
                    $image_url = $image['sizes']['all-people-img-small'];
                    echo "<div class='photo-attorney'><img src=" . $image_url . " alt=" . $row->attorney_name . "/></div>";
                    echo "<div class='info-attorney'>";
                    echo "<h4>" . $row->attorney_name . "</h4>";
                    echo "<p class='location'>" . $row->location . "</p>";
                    echo "<a class='button'  href='/our-attorneys/".$row->attorney_info."/' title=" . $row->attorney_name . ">View Profile</a>";
                    echo "</div>";
                    echo "</div><div class='column2'><p class='phone_number'>" . $row->phone . "</p></div></div></div></div>";
                }
            } else {
                echo "<br> No results";
                echo "</div>";
                $wpdb->close();
            }
        }
    }
}

?>