<?php

use App\Http\Controllers\AdminMessagingController;
use App\Http\Controllers\AdminNotificationController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminTransactionController;
use App\Http\Controllers\ClientFindTutorController;
use App\Http\Controllers\ClientProfileController;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HeadAdminController;
use App\Http\Controllers\HeadAdminDashController;
use App\Http\Controllers\HeadAdminMessagingController;
use App\Http\Controllers\HeadAdminNotificationController;
use App\Http\Controllers\HeadAdminTransactionController;
use App\Http\Controllers\HeadAdminTutorSessionsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageAdminController;
use App\Http\Controllers\ParentAssessmentController;
use App\Http\Controllers\ParentDashController;
use App\Http\Controllers\ParentMessagingController;
use App\Http\Controllers\ParentNotificationController;
use App\Http\Controllers\ParentPaymentController;
use App\Http\Controllers\ParentProfileController;
use App\Http\Controllers\ParentrMessagingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentWebhookController;
use App\Http\Controllers\PaymongoWebhookController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\StudentAssessmentController;
use App\Http\Controllers\TutorApplicationController;
use App\Http\Controllers\TutorAssessmentController;
use App\Http\Controllers\TutorDashController;
use App\Http\Controllers\TutorMessagingController;
use App\Http\Controllers\TutorNotificationController;
use App\Http\Controllers\TutorProfileController;
use App\Http\Controllers\TutorTransactionController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;





Route::get('/', [GuestController::class, 'home'])->name('home');

Route::get('/about', [GuestController::class, 'about'])->name('about');

Route::get('/program', [GuestController::class, 'program'])->name('program');

Route::get('/subject', [GuestController::class, 'subject'])->name('subject');

Route::get('/contact', [GuestController::class, 'contact'])->name('contact');

Route::get('/legal-center', [GuestController::class, 'legal'])->name('legal');

Route::get('/loadCMS', [GuestController::class, 'loadCMS'])->name('guest.cms.load');
Route::get('/loadAdvertisments', [GuestController::class, 'loadAdvertisements'])->name('guest.ads.load');

Route::get('/signup-choice', [GuestController::class, 'signUpChoice'])->name('choice');

//forget password
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'passwordEmail'])->name('password.email');
Route::get('/reset-password-{token}', [ForgotPasswordController::class, 'passwordReset'])->name('password.reset');

Route::post('/reset-password', [ForgotPasswordController::class, 'passwordUpdate'])->name('password.update');

Route::get('/email-verify-{id}-{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
//tutorSignUp
Route::get('/grad-choice', [SignUpController::class, 'underGradChoice'])->name('grad.choice');

Route::get('/signup-under-tutor', [SignUpController::class, 'signUpTutorUnder'])->name('signup.undertutor');
Route::post('/signup-under-tutor', [SignUpController::class, 'sendCreateTutorUnder']);


Route::get('/signup-grad-tutor', [SignUpController::class, 'signUpTutorGrad'])->name('signup.gradtutor');
Route::post('/signup-grad-tutor', [SignUpController::class, 'sendCreateTutorGrad']);


Route::get('/signup-tutor-preferences', [SignUpController::class, 'tutorPreference'])->name('tutor.preferences');
Route::post('/signup-tutor-preferences', [SignUpController::class, 'sendTutorPreference']);
//for the  dropdown Ajax
Route::get('/preference-data', [SignUpController::class, 'getGradeLevel'])->name('gradeLevel');
Route::get('/preference-subject-data', [SignUpController::class, 'getSubject'])->name('getSubject');



//clientSignUp
Route::get('/signup-client', [SignUpController::class, 'signUpClient'])->name('signup.client');
Route::post('/signup-client', [SignUpController::class, 'sendCreateClient']);

Route::get('/signup-client-preferences', [SignUpController::class, 'clientPreference'])->name('client.preferences');
Route::post('/signup-client-preferences', [SignUpController::class, 'sendClientPreference']);

//lOGIN
Route::get('/verify-email/{id}/{hash}', [VerificationController::class, 'verifyEmail'])->name('verify.email');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'sendLogin']);


//ADMIN LOGIN
Route::get('/admin-login', [LoginController::class, 'adminIndex']);
Route::post('/admin-login', [LoginController::class, 'adminLogin'])->name('admin.login');


//logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/admin-logout', [LoginController::class, 'adminLogout'])->name('admin.logout');


//Route::post('/paymongo-webhook', [PaymongoWebhookController::class,'handleWebhook']);

Route::get('/payment', [PaymentController::class, 'pay'])->name('pay');

Route::post('/createinvoice', [PaymentController::class, 'createInvoice']);
Route::post('/webhook', [PaymentController::class, 'webhook']);

Route::group(['middleware' => 'back.history'], function () {

    //tutor page
    Route::group(['middleware' => 'tutor.auth'], function () {

        Route::get('/tutor-dashboard', [TutorDashController::class, 'index'])->name('tutor.dashboard');
        Route::get('/tutor-loadTutorSessions', [TutorDashController::class, 'loadTutorSessions'])->name('tutor.load.tutoring.sessions');
        Route::get('/tutor-countSessions', [TutorDashController::class, 'countSessions'])->name('tutor.count.tutoring.sessions');
        Route::get('/tutor-loadFeedbacks', [TutorDashController::class, 'loadFeedbacks'])->name('tutor.load.feedbacks');

        Route::post('/tutor-Termination', [TutorDashController::class, 'Terminate'])->name('terminate.session');

        Route::get('/tutor-profile', [TutorProfileController::class, 'index']);
        Route::get('/tutor-loadAvailability', [TutorProfileController::class, 'loadAvailability'])->name('tutor.load.availability');
        Route::get('/tutor-loadCredential', [TutorProfileController::class, 'loadCredential'])->name('tutor.load.credential');

        Route::post('/tutor-profile', [TutorProfileController::class, 'editProfile'])->name('tutor.profile');
        Route::post('/edit-tutor-preference', [TutorProfileController::class, 'updateTutorPreference'])->name('tutor.updatePreference');
        Route::post('/edit-tutor-credentials', [TutorProfileController::class, 'addCredential'])->name('tutor.credentials');

        Route::post('/delete-tutor-credentials', [TutorProfileController::class, 'deleteCredential'])->name('credential.delete');

        Route::post('/add-tutor-DayTime', [TutorProfileController::class, 'addDayTime'])->name('tutor.dayTime');

        Route::post('/delete-tutor-DayTime', [TutorProfileController::class, 'deleteAvailability'])->name('delete.availability');

        Route::get('/filter-tutor-DayTime', [TutorProfileController::class, 'dayTimeFilter'])->name('filter.availability');


        Route::get('/credentials-view', [TutorProfileController::class, 'credentialView'])->name('credential.view');

        Route::get('/tutor-applicants', [TutorApplicationController::class, 'index'])->name('tutor.apply');

        Route::post('/tutor-applicants-delete', [TutorApplicationController::class, 'deleteApplicant'])->name('applicant.delete');

        Route::post('/accept-email', [TutorApplicationController::class, 'acceptClient'])->name('tutor.applicants');

        Route::get('/tutor-notifications', [TutorNotificationController::class, 'index'])->name('tutor.notif');
        Route::get('/tutor-loadNotif', [TutorNotificationController::class, 'loadNotifs'])->name('tutor.load.notif');
        Route::get('/tutor-countNotif', [TutorNotificationController::class, 'countNotifs'])->name('tutor.count.notif');

        Route::post('/tutor-displayNotif', [TutorNotificationController::class, 'getNotifDetails'])->name('tutor.fetch.notif');
        Route::post('/tutor-deleteNotif', [TutorNotificationController::class, 'deleteNotif'])->name('tutor.delete.notif');

        Route::get('/tutor-messaging', [TutorMessagingController::class, 'index'])->name('tutor.message');
        Route::get('/tutor-LoadContacts', [TutorMessagingController::class, 'loadContacts'])->name('tutor.load.contacts');
        Route::get('/tutor-searchContacts', [TutorMessagingController::class, 'searchContacts'])->name('tutor.search.contacts');
        Route::get('/tutor-countMessage', [TutorMessagingController::class, 'countMessage'])->name('tutor.count.message');

        Route::post('/tutor-fetch-messages', [TutorMessagingController::class, 'fetchMessagesFromParent'])->name('tutor.fetch.Messages');
        Route::post('/tutor-send-message', [TutorMessagingController::class, 'sendMessageToParent'])->name('tutor.send.Message');

        //assessment
        Route::get('/tutor-assessment', [TutorAssessmentController::class, 'index'])->name('tutor.assessment');
        Route::get('/tutor-load-assessment', [TutorAssessmentController::class, 'loadAssessments'])->name('tutor.load.assessment');
        Route::get('/tutor-search-assessment', [TutorAssessmentController::class, 'searchAssessments'])->name('tutor.search.assessment');
        Route::get('/tutor-view-assessment', [TutorAssessmentController::class, 'viewAssessments'])->name('tutor.view.assessment');
        Route::get('/tutor-load-edit-assessment', [TutorAssessmentController::class, 'loadEditAssessment'])->name('tutor.load.edit.assessment');

        Route::post('/tutor-create-assessment', [TutorAssessmentController::class, 'createAssessment'])->name('tutor.create.assessment');
        Route::post('/tutor-delete-assessment', [TutorAssessmentController::class, 'deleteAssessment'])->name('tutor.delete.assessment');
        Route::post('/tutor-edit-assessment', [TutorAssessmentController::class, 'editAssessment'])->name('tutor.edit.assessment');
        Route::post('/tutor-grade-assessment', [TutorAssessmentController::class, 'gradeAssessment'])->name('tutor.grade.assessment');

        //transaction  
        Route::get('/tutor-transaction', [TutorTransactionController::class, 'index'])->name('tutor.transaction');
    });

    //parent page
    Route::group(['middleware' => 'custom.auth'], function () {

        Route::get('/parent-dashboard', [ParentDashController::class, 'index'])->name('parent.dashboard');
        Route::get('/parent-loadChildren', [ParentDashController::class, 'loadChildren'])->name('load.children');
        Route::get('/parent-check-sessions', [ParentDashController::class, 'checkFinishedSessions'])->name('load.finished.sessions');
        
        Route::post('/parent-loadTutorSessions', [ParentDashController::class, 'loadTutorSessions'])->name('load.tutoring.sessions');

        Route::post('/parent-requestTermination', [ParentDashController::class, 'requestTerminate'])->name('request.terminate.session');

        Route::get('/parent-profile', [ParentProfileController::class, 'index'])->name('parent.profile');
        Route::post('/parent-profile', [ParentProfileController::class, 'editProfilePic']);
        Route::post('/child-profile', [ParentProfileController::class, 'childPic'])->name('child.pic');
        Route::post('/update-child-profile', [ParentProfileController::class, 'updateChildProfile'])->name('child.update');
        Route::post('/update-student-preference', [ParentProfileController::class, 'updateStudentPreference'])->name('update.preference');

        Route::post('/parent-profile-child', [ParentProfileController::class, 'addChild'])->name('child.add');



        Route::get('/find-tutor', [ClientFindTutorController::class, 'index'])->name('parent.find.tutor');
        Route::post('/find-tutor-search', [ClientFindTutorController::class, 'findTutor'])->name('find.tutor');

        Route::get('/get-child-preference', [ClientFindTutorController::class, 'getPreference'])->name('preference.filter');

        Route::get('/getStartTimes', [ClientFindTutorController::class, 'getStartTimes'])->name('tutor.get.start.time');
        Route::get('/getEndTimes', [ClientFindTutorController::class, 'getEndTimes'])->name('tutor.get.end.time');

        Route::post('/find-tutor-book', [ClientFindTutorController::class, 'book'])->name('tutor.book');

        //bookings
        Route::get('/load-bookings', [ClientFindTutorController::class, 'loadBookings'])->name('parent.load.bookings');
        Route::post('/cancel-bookings', [ClientFindTutorController::class, 'cancelBooking'])->name('parent.cancel.bookings');


        Route::get('/parent-notifications', [ParentNotificationController::class, 'index'])->name('parent.notif');
        Route::get('/parent-loadNotif', [ParentNotificationController::class, 'loadNotifs'])->name('load.notif');
        Route::get('/parent-countNotif', [ParentNotificationController::class, 'countNotifs'])->name('count.notif');

        Route::post('/parent-displayNotif', [ParentNotificationController::class, 'getNotifDetails'])->name('fetch.notif');
        Route::post('/parent-deleteNotif', [ParentNotificationController::class, 'deleteNotif'])->name('delete.notif');

        Route::post('/parent-feedback', [ParentNotificationController::class, 'parentFeedback'])->name('parent.feedback');



        Route::get('/parent-messaging', [ParentMessagingController::class, 'index'])->name('parent.message');
        Route::get('/parent-LoadContacts', [ParentMessagingController::class, 'loadContacts'])->name('load.contacts');

        Route::get('/parent-searchContacts', [ParentMessagingController::class, 'searchContacts'])->name('search.contacts');
        Route::get('/parent-countMessage', [ParentMessagingController::class, 'countMessage'])->name('count.message');

        Route::post('/parent-fetch-messages', [ParentMessagingController::class, 'fetchMessagesFromTutor'])->name('fetch.Messages');
        Route::post('/parent-send-message', [ParentMessagingController::class, 'sendMessageToTutor'])->name('send.Message');


        //assessment
        Route::get('/parent-assessment', [ParentAssessmentController::class, 'index'])->name('parent.assessments');
        Route::get('/parent-load-assessment', [ParentAssessmentController::class, 'loadAssessment'])->name('parent.load.assessment');
        Route::get('/parent-load-hidden-assessment', [ParentAssessmentController::class, 'loadHiddenAssessment'])->name('parent.load.hidden.assessment');
        Route::get('/parent-display-assessment', [ParentAssessmentController::class, 'displayAssessment'])->name('parent.display.assessment');
        Route::get('/parent-hide-assessment', [ParentAssessmentController::class, 'hideAssessment'])->name('parent.hide.assessment');
        Route::post('/parent-submit-assessment', [ParentAssessmentController::class, 'submitAssessment'])->name('parent.submit.work');


        //transaction backup
        Route::get('/parent-transaction', [ParentPaymentController::class, 'index'])->name('parent.transaction');
        Route::get('/payment/success', [ParentPaymentController::class, 'paymentSuccess'])->name('payment.success');
        Route::get('/payment/failure', [ParentPaymentController::class, 'paymentFailed'])->name('payment.failure');
        Route::get('/load-payment-pendings', [ParentPaymentController::class, 'loadPaymentPending'])->name('parent.load.payment.pendings');
        Route::get('/transaction-details', [ParentPaymentController::class, 'getTransactionDetails'])->name('getTransactionDetails');
        Route::post('/submit-transaction-payment', [ParentPaymentController::class, 'submitTransactionPayment'])->name('submitTransactionPayment');
        Route::get('/payment-gcash', [ParentPaymentController::class, 'paymentLink'])->name('payment.link');
        Route::post('/send-gcash', [ParentPaymentController::class, 'sendPayment'])->name('send.payment');
    });

    //admin page
    Route::group(['middleware' => 'admin.auth'], function () {

        

        //dashboard
        Route::get('/admin-dashboard', [AdminProfileController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin-load-stats', [AdminProfileController::class, 'loadStats'])->name('admin.load.stats');
        Route::get('/admin-profile', [AdminProfileController::class, 'profile'])->name('admin.profile');
        //

        //profile
        Route::post('/admin-edit-profile', [AdminProfileController::class, 'editProfilePic'])->name('admin.profileEdit');
        //
        
        //tutors
        Route::get('/admin-view-tutors', [AdminProfileController::class, 'adminTutor'])->name('admin.tutor');
        Route::get('/admin-load-tutors', [AdminProfileController::class, 'loadTutors'])->name('admin.load.tutor');
        Route::get('/admin-view-search-tutors', [AdminProfileController::class, 'viewSearchTutors'])->name('admin.view.search.tutor');
        //

        //parents
        Route::get('/admin-view-parents', [AdminProfileController::class, 'adminParent'])->name('admin.parent');
        Route::get('/admin-load-parent', [AdminProfileController::class, 'loadParents'])->name('admin.load.parent');
        Route::get('/admin-search-parents', [AdminProfileController::class, 'searchParents'])->name('admin.search.parent');
        //
       
        //messaging
        Route::get('/admin-messaging', [AdminMessagingController::class, 'index'])->name('admin.message');
        Route::get('/admin-load-contacts', [AdminMessagingController::class, 'loadContacts'])->name('admin.load.contacts');
        Route::get('/admin-searchContacts', [AdminMessagingController::class, 'searchContacts'])->name('admin.search.contacts');
        Route::get('/admin-countMessage', [AdminMessagingController::class, 'countMessage'])->name('admin.count.message');

        Route::post('/admin-fetch-messages', [AdminMessagingController::class, 'fetchMessagesFromAdmins'])->name('admin.fetch.messages');
        Route::post('/admin-send-message', [AdminMessagingController::class, 'sendMessageToAdmins'])->name('admin.send.Message');
        //

        //notif
        Route::get('/admin-notifications', [AdminNotificationController::class, 'index'])->name('admin.notif');
        Route::get('/admin-loadNotif', [AdminNotificationController::class, 'loadNotifs'])->name('admin.load.notif');
        Route::get('/admin-countNotif', [AdminNotificationController::class, 'countNotifs'])->name('admin.count.notif');

        Route::post('/admin-displayNotif', [AdminNotificationController::class, 'getNotifDetails'])->name('admin.fetch.notif');
        Route::post('/admin-deleteNotif', [AdminNotificationController::class, 'deleteNotif'])->name('admin.delete.notif');
        //

        //verifications
        Route::get('/admin-tutor-verification', [AdminProfileController::class, 'adminVerification'])->name('admin.verify');
        Route::get('/admin-load-applicants', [AdminProfileController::class, 'loadApplicants'])->name('admin.load.verifications');
        Route::get('/admin-load-requirements', [AdminProfileController::class, 'loadRequirements'])->name('admin.load.requirements');
        Route::get('/admin-search-tutors', [AdminProfileController::class, 'searchTutors'])->name('admin.search.tutors');

        Route::post('/admin-verify-tutor', [AdminProfileController::class, 'verifyTutor'])->name('admin.verify.tutor');
        Route::post('/admin-decline-tutor', [AdminProfileController::class, 'declineTutor'])->name('admin.decline.tutor');
        Route::post('/admin-message-tutor', [AdminProfileController::class, 'messageTutor'])->name('admin.message.tutor');
        //

        //transaction
        Route::get('/admin-transaction', [AdminTransactionController::class, 'index'])->name('admin.transaction');
        Route::get('/admin-load-transactions', [AdminTransactionController::class, 'loadTransactions'])->name('admin.load.transactions');
        Route::get('/admin-search-transactions', [AdminTransactionController::class, 'searchTransactions'])->name('admin.search.transactions');
    });

    //head admin page
    Route::group(['middleware' => 'head.auth'], function () {

        //dashboard
        Route::get('/headadmin-dashboard', [HeadAdminDashController::class, 'index'])->name('headAdmin.dashboard');
        Route::get('/headadmin-stats', [HeadAdminDashController::class, 'countStats'])->name('headAdmin.count.stats');
        Route::get('/headadmin-load-announcements', [HeadAdminDashController::class, 'loadAnnouncements'])->name('headAdmin.load.announcements');
        Route::get('/headadmin-load-advertisements', [HeadAdminDashController::class, 'loadAdvertisements'])->name('headAdmin.load.advertisements');
        Route::get('/headadmin-load-edit-advertisements', [HeadAdminDashController::class, 'loadEditAdvertisement'])->name('headAdmin.load.edit.advertisements');

        Route::post('/headadmin-create-announcement', [HeadAdminDashController::class, 'createAnnouncement'])->name('headAdmin.create.announcement');
        Route::post('/headadmin-delete-announcement', [HeadAdminDashController::class, 'deleteAnnouncement'])->name('headAdmin.delete.announcement');
        Route::post('/headadmin-create-advertisement', [HeadAdminDashController::class, 'createAdvertisement'])->name('headAdmin.create.advertisement');
        Route::post('/headadmin-delete-advertisement', [HeadAdminDashController::class, 'deleteAdvertisement'])->name('headAdmin.delete.advertisement');
        Route::post('/headadmin-update-advertisement', [HeadAdminDashController::class, 'updateAdvertisement'])->name('headAdmin.update.advertisement');
        //

        //management actions
        Route::post('/headadmin-switch-user', [HeadAdminController::class, 'switchUser'])->name('headAdmin.switch.user');
        Route::post('/headadmin-message-user', [HeadAdminController::class, 'sendMessage'])->name('headAdmin.message.user');
        //

        //profile
        //Route::get('/headadmin-loadTutorSessions', [HeadAdminDashController:: class, 'loadTutorSessions'])->name('headadmin.load.tutoring.sessions');
        Route::get('/headadmin-profile', [HeadAdminController::class, 'index'])->name('headAdmin.profile');
        Route::post('/headadmin-edit-profile', [HeadAdminController::class, 'editProfilePic'])->name('headAdmin.profileEdit');
        //

        //tutorSessions
        Route::get('/headadmin-tutor-sessions', [HeadAdminTutorSessionsController::class, 'index'])->name('headAdmin.tutorSessions');
        Route::get('/headadmin-load-tutors-sessions', [HeadAdminTutorSessionsController::class, 'loadTutorSessions'])->name('headAdmin.load.tutorSessions');
        Route::get('/headadmin-countSessions', [HeadAdminTutorSessionsController::class, 'countSessions'])->name('headAdmin.count.tutoring.sessions');
        Route::get('/headadmin-loadfeedbacks-${sessionId}', [HeadAdminTutorSessionsController::class, 'loadFeedbacks'])->name('headAdmin.load.feedbacks');
        Route::get('/headAdmin-complete-sessions', [HeadAdminTutorSessionsController::class, 'getCompleteSessions'])->name('headAdmin.complete.sessions');
        
        //tutors
        Route::get('/headadmin-manage-tutor', [HeadAdminController::class, 'headAdminTutor'])->name('headAdmin.tutor');
        Route::get('/headadmin-load-tutors', [HeadAdminController::class, 'loadTutors'])->name('headAdmin.load.tutor');
        Route::get('/headadmin-search-tutor', [HeadAdminController::class, 'searchTutors'])->name('headAdmin.search.tutor');
        //

        //parents
        Route::get('/headadmin-manage-parents', [HeadAdminController::class, 'headAdminParent'])->name('headAdmin.parent');
        Route::get('/headadmin-load-parents', [HeadAdminController::class, 'loadParents'])->name('headAdmin.load.parents');
        Route::get('/headadmin-search-parent', [HeadAdminController::class, 'searchParents'])->name('headAdmin.search.parent');
        //

        //admins
        Route::get('/headadmin-manage-admin', [HeadAdminController::class, 'manageAdmin'])->name('headAdmin.admin');
        Route::get('/headadmin-load-admins', [HeadAdminController::class, 'loadAdmins'])->name('headAdmin.load.admins');
        Route::get('/headadmin-search-admin', [HeadAdminController::class, 'searchAdmins'])->name('headAdmin.search.admin');
        Route::post('/headadmin-add-admin', [HeadAdminController::class, 'addAdmin'])->name('headAdmin.add.admin');
        //

        //Route::get('/headadmin-tutor-data', [AdminProfileController::class, 'getNewTutors'])->name('getNewTutors');

        //messaging
        Route::get('/head-admin-messaging', [HeadAdminMessagingController::class, 'index'])->name('head.admin.message');
        Route::get('/head-admin-load-contacts', [HeadAdminMessagingController::class, 'loadContacts'])->name('head.admin.load.contacts');
        Route::get('/head-admin-searchContacts', [HeadAdminMessagingController::class, 'searchContacts'])->name('head.admin.search.contacts');
        Route::get('/head-admin-countMessage', [HeadAdminMessagingController::class, 'countMessage'])->name('head.admin.count.message');

        Route::post('/head-admin-fetch-messages', [HeadAdminMessagingController::class, 'fetchMessagesFromAdmins'])->name('head.admin.fetch.messages');
        Route::post('/head-admin-send-message', [HeadAdminMessagingController::class, 'sendMessageToAdmins'])->name('head.admin.send.Message');
        //

        /*child
        Route::get('/headadmin-view-child', [HeadAdminController::class, 'headAdminChild'])->name('headAdmin.child');
        Route::post('/headadmin-view-child', [HeadAdminController::class, 'deleteChild'])->name('headAdmin.childDelete');
        Route::post('/headadmin-deactivate-child', [HeadAdminController::class, 'deactivateChild'])->name('headAdmin.childDeactivate');
        */

        //notif
        Route::get('/headadmin-notifications', [HeadAdminNotificationController::class, 'index'])->name('headadmin.notif');
        Route::get('/headadmin-loadNotif', [HeadAdminNotificationController::class, 'loadNotifs'])->name('headadmin.load.notif');
        Route::get('/headadmin-countNotif', [HeadAdminNotificationController::class, 'countNotifs'])->name('headadmin.count.notif');

        Route::post('/headadmin-displayNotif', [HeadAdminNotificationController::class, 'getNotifDetails'])->name('headadmin.fetch.notif');
        Route::post('/headadmin-deleteNotif', [HeadAdminNotificationController::class, 'deleteNotif'])->name('headadmin.delete.notif');
        //

        //cms
        Route::get('/headadmin-cms', [CMSController::class, 'index'])->name('cms');
        Route::get('/headadmin-cms-load', [CMSController::class, 'loadContents'])->name('cms.load');
        Route::get('/headadmin-cms-fetch-topic', [CMSController::class, 'fetchTopics'])->name('cms.fetch.topic');
        Route::post('/headadmin-cms-update-content', [CMSController::class, 'updateContents'])->name('cms.update.content');
        Route::post('/headadmin-cms-update-org-content', [CMSController::class, 'updateOrgContent'])->name('cms.update.org.content');
        Route::post('/headadmin-cms-update-rates', [CMSController::class, 'updateRates'])->name('cms.update.rates');
        Route::post('/headadmin-cms-add-subject', [CMSController::class, 'addSubject'])->name('cms.add.subject');
        Route::post('/headadmin-cms-delete-subject', [CMSController::class, 'deleteSubject'])->name('cms.delete.subject');
        Route::post('/headadmin-cms-update-topic', [CMSController::class, 'updateTopics'])->name('cms.update.topic');
        Route::post('/headadmin-cms-delete-topic', [CMSController::class, 'deleteTopics'])->name('cms.delete.topic');
        Route::post('/headadmin-cms-update-subject-image', [CMSController::class, 'updateSubjectImage'])->name('cms.update.subject.image');
        //

        //transaction
        Route::get('/headadmin-transaction', [HeadAdminTransactionController::class, 'index'])->name('headadmin.transaction');
        Route::get('/headadmin-load-transaction', [HeadAdminTransactionController::class, 'loadTransactions'])->name('headadmin.load.transactions');
        Route::get('/headadmin-search-transaction', [HeadAdminTransactionController::class, 'searchTransactions'])->name('headadmin.search.transactions');
        
    });

    //xendit
    Route::post('/webhooks/payment', [ParentPaymentController::class, 'webhook']);
    Route::post('/payment/succeeded', [ParentPaymentController::class, 'paymentSucceeded']);
    //
    //message admin
    Route::get('/message-admin', [MessageAdminController::class, 'index'])->name('message.admin');
    Route::post('/send-admin', [MessageAdminController::class, 'sendMessage'])->name('admin.send');
    //settings page
    Route::get('/account-settings', [SettingsController::class, 'index'])->name('load.settings');
    Route::post('/settings-update-account', [SettingsController::class, 'updateAccount'])->name('update.account');
    Route::post('/settings-update-password', [SettingsController::class, 'updatePassword'])->name('update.password');
    Route::post('/settings-update-requirements', [SettingsController::class, 'updateRequirements'])->name('update.requirements');
});
