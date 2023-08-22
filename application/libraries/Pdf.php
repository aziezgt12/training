<?php defined('BASEPATH') OR exit('No direct script access allowed');
 /**


* CodeIgniter PDF Library
 *
 * Generate PDF's in your CodeIgniter applications.
 *
 * @package         CodeIgniter
 * @subpackage      Libraries
 * @category        Libraries
 * @author          Chris Harvey
 * @license         MIT License
 * @link            https://github.com/chrisnharvey/CodeIgniter-PDF-Generator-Library



*/

// require_once(dirname(__FILE__) . '/dompdf_2/dompdf_config.inc.php');

class Pdf {
    function __construct() {
        include_once 'fpdf/FPDF.php';
    }
}
?>