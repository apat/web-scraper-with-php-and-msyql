<?php
/**
 *
 */
class Utils
{

  /**
   * @param String $price Value with MX$0,000 format
   *
   * @return Decimal
   */
  function format_price_to_int($price) {
    // Remove MX$ from price
    $result = substr($price, 3);
    // Remove comma from result
    return str_replace( ',', '', $result );
  }

  /**
   * @param Array $attr_image Attributes in array
   *
   * @return Image URL
   */
  function get_standar_image_url($attr_image) {
    // Return default
    $url_image = 'nothing';
    // Only for style attibutes
    if (isset($attr_image['style'])) {
      // Remove background-image:url( & ) from background-image:url(URL_DE_IMAGEN)
      // You can also use regex
      $url_image = substr($attr_image['style'], 21, -2);
    } else {
      // Nothing to do
      $url_image = $attr_image['data-lazyurl'];
    }
    // Return result
    return $url_image;
  }
}

 ?>
