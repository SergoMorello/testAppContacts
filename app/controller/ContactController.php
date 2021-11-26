<?php

class ContactController extends controller {

    public function __construct() {
        $this->model('Contact');
        $this->model('File');
    }

    public function contactOk() {
        return View('contactOk');
    }

    public function contactList() {
        $contacts = $this->model()->Contact->list();
        return View('contactList',[
            'contacts'=>$contacts
        ]);
    }

	public function submit() {

        request::validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required'
        ]);

        $name = request::input('name');
        $phone = request::input('phone');
        $email = request::input('email');
        $files = request::file('files');
        
		if ($contact = $this->model()->Contact->create([
            'name'=>$name,
            'phone'=>$phone,
            'email'=>$email
        ])) {
            if ($files) {
                foreach($files as $file) {
                    $fileName = md5_file($file->getPath());
                    if ($file->storeAs('files', $fileName)) {
                        $this->model()->File->create([
                            'cid'=>$contact->id,
                            'file'=>$fileName,
                            'name'=>$file->name
                        ]);
                    }
                }
            }
            return redirect()->route('contact-ok');
        }
	}
}