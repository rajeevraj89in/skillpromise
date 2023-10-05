<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'main';
$route['(:any)'] = 'main/$1';
$route['404_override'] = '';
$route['skill-talk-slider'] = 'main/skill_talk_slider';
$route['assessment-center-slider'] = 'main/assessment_center_slider';
$route['employability-zone-slider'] = 'main/employability_zone_slider';
$route['about-us'] = 'main/about_us';
$route['contact-us'] = 'main/contact_us';
$route['privacy-policy'] = 'main/privacy_policy';
$route['terms-of-use'] = 'main/terms_of_use';
$route['our-values'] = 'main/our_values'; 
$route['our-benefits'] = 'main/our_benefits'; 
$route['news-letter'] = 'main/news_letter';
$route['sana-for-school'] = 'main/sana_for_school';
$route['sana-for-higher'] = 'main/sana_for_higher';
$route['sana-for-professionals'] = 'main/sana_for_professionals';
$route['learning-objectives-school'] = 'main/learning_objectives_school';
$route['program-benefits-school'] = 'main/program_benefits_school';
$route['course-content-school'] = 'main/course_content_school';

$route['learning-objectives-higher'] = 'main/learning_objectives_higher';
$route['program-benefits-higher'] = 'main/program_benefits_higher';
$route['course-content-higher'] = 'main/course_content_higher';

$route['learning-objectives-professional'] = 'main/learning_objectives_professional';
$route['program-benefits-professional'] = 'main/program_benefits_professional';
$route['course-content-professional'] = 'main/course_content_professional';

$route['blog'] = 'main/blog_main';
$route['blog-detail'] = 'main/blog_detail';
$route['my-cart'] = 'main/my_cart';
//======================================Api Routes ================================ //
$route['api/login'] = 'Api/index';
// ======================================End Api routes ========================//
//$route['translate_uri_dashes'] = FALSE;


//$route['(:num)'] = 'main/index/$1';
//$route['(:any)'] = 'main/index/$1';
//$request = $_SERVER['REQUEST_URI']; // Only add this for readability 
//if(!strpos($request, 'main/another_function') || !strpos($request, 'main/more_functions')) { 
//    $route['main/(:any)'] = 'main/$1'; }

//$route['(:any)'] = 'main/$1';
/*$route['main/(:any)'] = 'main/index/$1';*/



/* End of file routes.php */
/* Location: ./application/config/routes.php */
