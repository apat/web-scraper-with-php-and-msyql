<?php
// Load vendors
require '../vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(dirname(__DIR__));
$dotenv->load();

// Call dependences
require 'simple_html_dom.php';
require 'connector.php';
require 'utils.php';

// Create object
$utils = new Utils;

// Clear old results
mysqli_query($mysqli, "TRUNCATE TABLE `rooms`");

if ($result = $mysqli->query("SELECT id, source FROM `cities`")) {
    /* fetch object array */
    while ($row = mysqli_fetch_assoc($result)) {
      // Get values
      $city_id = $row['id'];
      $city_source = $row['source'];

      // Create DOM from URL or file
      $html = file_get_html($city_source, false, null, 0);

      // List of hotels
      $wrap_hotels = $html->find('div.prw_meta_hsx_responsive_listing');

      // Insert rooms retrieved
      foreach($wrap_hotels as $element) {
        // Get & set data into variables
        $hotel_name = $element->find('.property_title', 0)->plaintext;
        $hotel_price = $utils->format_price_to_int($element->find('.price', 0)->plaintext); // Remove format price
        $hotel_image_url = $utils->get_standar_image_url($element->find('.inner', 0)->attr);
        $hotel_href = $element->find('.photo-wrapper a', 0)->href;
        // Insert in database
        mysqli_query(
          $mysqli,
          "INSERT INTO `rooms` (city_id, name, price, image_url, href)
          VALUES ('$city_id', '$hotel_name', '$hotel_price', '$hotel_image_url', '$hotel_href')"
        );
      }
    }
    /* Free result set */
    $result->close();
}

/* Close connection */
$mysqli->close();

?>
