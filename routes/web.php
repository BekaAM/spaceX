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

Route::group([
'namespace' => 'Admin',
'middleware' => [

'App\Http\Middleware\AdminMiddleware',
//'App\Http\Middleware\MyLanguageMiddleware',
] 

], 

function ()
{

Route::get('/dashboard', 'PagesController@dashboard');
   

//Route::get('/user-profile-lite', 'PagesController@userProfile');
//Route::get('/errors', 'PagesController@errors');
//Route::get('/tables', 'PagesController@table');

//user Drag and Drop
Route::get('/user', 'UserController@user');
Route::get('/userData', 'UserController@userData')->name('user.data');
Route::post('user_sort','UserController@userUpdateOrder');
Route::POST('/multi-user-action','UserController@multiUserAction');
Route::get('/UserDelete/{id}','UserController@UserDelete');
//user Drag and Drop

//CategoryController
Route::get('/add-new-category', 'CategoryController@AddNewCategory');
Route::get('/categoryData', 'CategoryController@categoryData')->name('category.data');
Route::post('/add-category', 'CategoryController@Addcategory');
//--Edit
Route::post('category_sort','CategoryController@categoryUpdateOrder');
Route::post('/edit-category-{id}', 'CategoryController@CategoryUpdate');
//-------------------------Delete--------------------------------
Route::get('/CategoryDelete/{id}','CategoryController@CategoryDelete');
Route::POST('/multi-category-action','CategoryController@multiCategoryAction');
   


//CategoryController
//PostController

/* Route::get('/add-new-post', 'PostController@AddNewPost');
Route::post('/create-post', 'PostController@CreatePost');
Route::get('/table-post', 'PostController@TablePost');
Route::get('/components-blog-posts', 'PostController@blogPosts');
Route::get('/blog-posts', 'PostController@searchPost');

Route::get('/postData', 'PostController@postData')->name('post.data');
Route::get('/PostEdit/{id}', 'PostController@PostEdit');
Route::post('/edit-post-{id}', 'PostController@PostUpdated');
 //-------------------------Delete--------------------------------
Route::get('/PostDelete/{id}','PostController@PostDelete');
Route::POST('/multi-post-action','PostController@multiPostAction');
 */
//End PostController
//TeamController
Route::get('/add-new-team', 'TeamController@AddNewTeam');
Route::post('/add-team', 'TeamController@createTeam');
Route::post('/edit-team-{id}', 'TeamController@TeamUpdated');
Route::POST('/multi-team-action','TeamController@multiTeamAction');
Route::get('/teamData', 'TeamController@teamData')->name('team.data');
Route::get('/TeamDelete/{id}','TeamController@TeamDelete');
Route::post('team_sort','TeamController@teamUpdateOrder');
//End TeamController

//ServiceController
Route::get('/add-new-service', 'ServiceController@AddNewService');
Route::post('/add-service', 'ServiceController@createService');
Route::post('/edit-service-{id}', 'ServiceController@ServiceUpdated');
Route::POST('/multi-service-action','ServiceController@multiServiceAction');
Route::get('/serviceData', 'ServiceController@serviceData')->name('service.data');
Route::get('/ServiceDelete/{id}','ServiceController@ServiceDelete');
Route::post('service_sort','ServiceController@serviceUpdateOrder');
//End ServiceController
//FaqController
Route::get('/add-new-faq', 'FaqController@AddNewFaq');
Route::post('/add-faq', 'FaqController@createFaq');
Route::post('/edit-faq-{id}', 'FaqController@faqUpdated');
Route::POST('/multi-faq-action','FaqController@multiFaqAction');
Route::get('/faqData', 'FaqController@faqData')->name('faq.data');
Route::get('/FaqDelete/{id}','FaqController@FaqDelete');
Route::post('faq_sort','FaqController@faqUpdateOrder');
//End FaqController
//InformationController
Route::get('/add-new-information', 'InformationController@AddNewInformation');
Route::post('/add-Information', 'InformationController@createInformation');
Route::post('/edit-Information-{id}', 'InformationController@informationUpdated');
Route::POST('/multi-Information-action','InformationController@multiInformationAction');
Route::get('/informationData', 'InformationController@informationData')->name('information.data');
Route::get('/InformationDelete/{id}','InformationController@InformationDelete');
Route::post('information_sort','InformationController@informationUpdateOrder');
//End InformationController
//AboutController
Route::get('/add-new-about', 'AboutController@AddNewAbout');
Route::post('/add-about', 'AboutController@createAbout');
Route::post('/edit-about-{id}', 'AboutController@aboutUpdated');
Route::POST('/multi-about-action','AboutController@multiAboutAction');
Route::get('/aboutData', 'AboutController@aboutData')->name('about.data');
Route::get('/AboutDelete/{id}','AboutController@AboutDelete');
Route::post('about_sort','AboutController@aboutUpdateOrder');
//End AboutController
//MessagesController
Route::get('/add-new-messages', 'MessagesController@AddNewMessages');
Route::POST('/multi-messages-action','MessagesController@multiMessagesAction');
Route::get('/messageData', 'MessagesController@messagesData')->name('messages.data');
Route::get('/MessagesDelete/{id}','MessagesController@MessagesDelete');
Route::post('messages_sort','MessagesController@messagesUpdateOrder');
//End MessagesController
//SubscribeController
Route::get('/add-new-subscribe', 'SubscribeController@AddNewSubscribe');
Route::POST('/multi-subscribe-action','SubscribeController@multiSubscribeAction');
Route::get('/subscribeData', 'SubscribeController@SubscribeData')->name('subscribe.data');
Route::get('/SubscribeDelete/{id}','SubscribeController@SubscribeDelete');
Route::post('subscribe_sort','SubscribeController@subscribeUpdateOrder');
//End SubscribeController

//GalleryController
Route::get('/add-new-gallery', 'GalleryController@AddNewGallery');
Route::post('image/upload/store','GalleryController@fileStore');
Route::post('image/delete','GalleryController@fileDestroy');

Route::POST('/multi-gallery-action','GalleryController@multiGalleryAction');
Route::get('/galleryData', 'GalleryController@galleryData')->name('gallery.data');
Route::get('/GalleryDelete/{id}','GalleryController@GalleryDelete');
Route::post('gallery_sort','GalleryController@galleryUpdateOrder');
//End GalleryController 
});
Route::group([
    'namespace' => 'Frontend',
    'middleware' => [
    
    //'App\Http\Middleware\AdminMiddleware',
    //'App\Http\Middleware\MyLanguageMiddleware',
    ] 
    
    ], 
    
    function ()
    {
        Route::get('/aprove', 'PagesController@aprove');
        Route::get('/', 'PagesController@index');
        Route::get('/about', 'PagesController@about');
        Route::get('/contact', 'PagesController@contact');
        Route::post('/add-new-message', 'PagesController@createContact');
        Route::post('/add-new-subscribe', 'PagesController@createSubscribe');
        Route::get('/faq', 'PagesController@faq');
    });

Auth::routes();


