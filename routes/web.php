<?php
route::get("/","main@index")->name('home');

route::get("/contacts","ContactController@contactList")->name('contacts');

route::get("/contact/ok","ContactController@contactOk")->name('contact-ok');

route::post('/contact/submit','ContactController@submit')->name('contact-submit');