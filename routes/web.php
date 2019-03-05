<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
Route::get('save/zemtv', ['as' => 'zemtv', 'uses' => 'ScrapeController@saveZemtv']);


Route::group(['middleware' => ['web', 'auth', 'admin']], function () {
	//route for admin
	Route::get('admin', ['as' => 'admin', 'uses' => 'AdminHomeController@index']);
	Route::post('settings', ['as' => 'settings', 'uses' => 'AdminHomeController@settings']);
	Route::post('deleteSocial', ['as' => 'deleteSocial', 'uses' => 'AdminHomeController@deleteSocial']);
	Route::post('getSocial', ['as' => 'getSocial', 'uses' => 'AdminHomeController@getSocial']);
	Route::post('updateSocial', ['as' => 'updateSocial', 'uses' => 'AdminHomeController@updateSocial']);
	//route for user settings
	Route::get('profile', ['as' => 'profile', 'uses' => 'UserController@profile']);
	Route::get('userList', ['as' => 'userList', 'uses' => 'UserController@userList']);
	Route::get('addUser', ['as' => 'addUser', 'uses' => 'UserController@addUser']);
	Route::get('editUser/{userId}', ['as' => 'editUser', 'uses' => 'UserController@profile']);
	Route::get('deleteUser/{userId}', ['as' => 'deleteUser', 'uses' => 'UserController@deleteUser']);

	Route::post('updateProfile', ['as' => 'updateProfile', 'uses' => 'UserController@updateProfile']);
	Route::post('insertUser', ['as' => 'insertUser', 'uses' => 'UserController@insertUser']);
	//route for permissions
	Route::get('permissions', ['as' => 'permissions', 'uses' => 'PermissionController@index']);
	Route::get('roles', ['as' => 'manageRoles', 'uses' => 'PermissionController@manageRoles']);
	Route::get('deleteRole/{roleId}', ['as' => 'deleteRole', 'uses' => 'PermissionController@deleteRole']);

	Route::post('setModulePermissions', ['as' => 'set-module-permissions', 'uses' => 'PermissionController@setModulePermissions']);
	Route::post('saveRole', ['as' => 'saveRole', 'uses' => 'PermissionController@saveRole']);
	Route::post('getRole', ['as' => 'getRole', 'uses' => 'PermissionController@getRole']);
	Route::post('updateRole', ['as' => 'updateRole', 'uses' => 'PermissionController@updateRole']);
	//route for pages
	Route::get('pages', ['as' => 'pages', 'uses' => 'PageController@index']);
	Route::get('editPage/{pageId}', ['as' => 'editPage', 'uses' => 'PageController@editPage']);

	Route::post('setPageSettings', ['as' => 'setPageSettings', 'uses' => 'PageController@setPageSettings']);
	//Route::post('deleteAfterParty', ['as' => 'deleteAfterParty', 'uses' => 'AdminAfterPartyController@deleteAfterParty']);
	//route for website settings
	Route::get('websites', ['as' => 'websites', 'uses' => 'WebsitesController@index']);
	Route::get('addWebsite', ['as' => 'addWebsite', 'uses' => 'WebsitesController@addWebsite']);
	Route::get('editWebsite/{websiteId}', ['as' => 'editWebsite', 'uses' => 'WebsitesController@getWebsite']);

	Route::post('insertWebsite', ['as' => 'insertWebsite', 'uses' => 'WebsitesController@insertWebsite']);
	Route::post('deleteWebsite', ['as' => 'deleteWebsite', 'uses' => 'WebsitesController@deleteWebsite']);
	//route for categories settings
	Route::get('categories', ['as' => 'categories', 'uses' => 'CategoriesController@index']);
	Route::get('addCategory', ['as' => 'addCategory', 'uses' => 'CategoriesController@addCategory']);
	Route::get('editCategory/{categoryId}', ['as' => 'editCategory', 'uses' => 'CategoriesController@getCategory']);

	Route::post('insertCategory', ['as' => 'insertCategory', 'uses' => 'CategoriesController@insertCategory']);
	Route::post('deleteCategory', ['as' => 'deleteCategory', 'uses' => 'CategoriesController@deleteCategory']);
	//route for post settings
	Route::get('posts', ['as' => 'posts', 'uses' => 'PostsController@index']);
	Route::get('addPost', ['as' => 'addPost', 'uses' => 'PostsController@addPost']);
	Route::get('editPost/{postId}', ['as' => 'editPost', 'uses' => 'PostsController@getPost']);
	Route::get('pending', ['as' => 'pending', 'uses' => 'PostsController@pending']);
	Route::get('createThumb/{postId}/{videoId}', ['as' => 'createThumb', 'uses' => 'PostsController@createThumb']);

	Route::post('insertPost', ['as' => 'insertPost', 'uses' => 'PostsController@insertPost']);
	Route::post('deletePost', ['as' => 'deletePost', 'uses' => 'PostsController@deletePost']);
	//route for subscription settings
	Route::get('usersubscription', ['as' => 'usersubscription', 'uses' => 'SubscriptionController@index']);
	Route::get('emailToSubscribers', ['as' => 'emailToSubscribers', 'uses' => 'SubscriptionController@emailToSubscribers']);
	Route::get('addSubscriber', ['as' => 'addSubscriber', 'uses' => 'SubscriptionController@addSubscriber']);
	Route::get('editSubscriber/{subscriptionId}', ['as' => 'editSubscriber', 'uses' => 'SubscriptionController@getSubscriber']);
	Route::get('deleteSubscriber/{subscriptionId}', ['as' => 'deleteSubscriber', 'uses' => 'SubscriptionController@deleteSubscriber']);

	Route::post('insertSubscriber', ['as' => 'insertSubscriber', 'uses' => 'SubscriptionController@insertSubscriber']);
	//route for image upload via tinymce
	//Route::post('postAcceptor', ['as' => 'postAcceptor', 'uses' => 'GalleryController@postAcceptor']);
});
Route::group(['middleware' => ['web', 'auth']], function () {
	//route for profile settings
	Route::get('/settings', ['as' => 'settings', 'uses' => 'Frontend\UserController@index']);

	Route::post('userSettings', ['as' => 'userSettings', 'uses' => 'Frontend\UserController@userSettings']);
	//route for comments
	Route::post('postComment', ['as' => 'postComment', 'uses' => 'Frontend\CommentsController@postComment']);
	//route for deleting post by both admin or frontend side
	Route::post('deleteUserPost', ['as' => 'deleteUserPost', 'uses' => 'Frontend\PostsController@deleteUserPost']);
});
Auth::routes();
//routes for frontend
//route for home page
Route::get('/', ['as' => 'home', 'uses' => 'Frontend\MainController@index']);
//route for contact page
Route::get('/contact', ['as' => 'contact', 'uses' => 'Frontend\ContactController@index']);

Route::post('contactApplication', ['as' => 'contactApplication', 'uses' => 'Frontend\ContactController@contactApplication']);
//route for uploading video from frontend
Route::post('uploadVideo', ['as' => 'uploadVideo', 'uses' => 'Frontend\VideoController@uploadVideo']);
//route for privacy policy page
Route::get('/privacypolicy', ['as' => 'privacypolicy', 'uses' => 'Frontend\PrivacyPolicyController@index']);
//route for prize page
Route::get('/prize', ['as' => 'prize', 'uses' => 'Frontend\PrizeController@index']);
//route for terms and conditions page
Route::get('/termsandconditions', ['as' => 'termsandconditions', 'uses' => 'Frontend\TocController@index']);
//route for detail video page
Route::get('/video/{postId}', ['as' => 'video', 'uses' => 'Frontend\PostsController@video']);
//route for show all user videos page
Route::get('/user/{userId}', ['as' => 'showuservideos', 'uses' => 'Frontend\PostsController@showuservideos']);
//route for show all videos by tag page
Route::get('/videoTag/{tag}', ['as' => 'showtagvideos', 'uses' => 'Frontend\PostsController@showtagvideos']);
//route for show all videos by category page
Route::get('/vidcategory/{catId}', ['as' => 'showcatvideos', 'uses' => 'Frontend\PostsController@showcatvideos']);
//route for updating video view in video detail page
Route::post('updateVideoView', ['as' => 'updateVideoView', 'uses' => 'Frontend\PostsController@updateVideoView']);
//route for updating video likes/unlikes in video detail page
Route::post('updateVideoLikes', ['as' => 'updateVideoLikes', 'uses' => 'Frontend\PostsLikesController@updateVideoLikes']);
Route::post('updateVideoUnLikes', ['as' => 'updateVideoUnLikes', 'uses' => 'Frontend\PostsLikesController@updateVideoUnLikes']);
//route for user subscription
Route::post('subscription', ['as' => 'subscription', 'uses' => 'Frontend\SubscriptionController@index']);

Route::post('sendMailToSubscribers', ['as' => 'sendMailToSubscribers', 'uses' => 'SubscriptionController@sendMailToSubscribers']);
//route for video search
Route::post('search', ['as' => 'search', 'uses' => 'Frontend\PostsController@search']);
Route::get('search', ['as' => 'search', 'uses' => 'Frontend\MainController@index']);
//route for logout
Route::get('logout', 'Auth\LoginController@logout');
//route for error page
Route::get('pagenotfound', ['as' => 'pagenotfound', 'uses' => 'Frontend\ErrorController@pagenotfound']);
//route for show all videos page
Route::get('/{videoType}', ['as' => 'showallvideos', 'uses' => 'Frontend\PostsController@showAllVideos']);
