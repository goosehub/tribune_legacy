tribune
=======

The Third Incarnation of Tribune

This project uses codeigniter as a php frameword, however it does not depend on it, and anybody that can write css, javascript, or php is encouraged to participate.


The root directory is named tribune. The controller, model, and view is found under application, and resources are under the root directory. Below is what is needed for the routes.php file found in application/config/routes.php.

| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['news/contribute'] = 'news/contribute';
$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';
$route['(:any)'] = 'pages/view/$1';
$route['news/s4s'] = 'news/s4s';
// functions can't start with a number, so fourchan instead of 4chan
$route['news/4chan'] = 'news/fourchan';
$route['news/www'] = 'news/www';
$route['news/opinion'] = 'news/opinion';
$route['news/advice'] = 'news/advice';
$route['news/reviews'] = 'news/reviews';
$route['news/interviews'] = 'news/interviews';
$route['news/investigations'] = 'news/investigations';
$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
/* End of file routes.php */

I will be adding more information to this file soon.
