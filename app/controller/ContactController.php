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

    public function contactShow(request $req) {
        $id = $req->route('id');
        $contact = $this->model()->Contact->getContact($id);
        $files = $this->model()->File->getContactFiles($id);

        return View('contactShow',[
            'contact'=>$contact,
            'files'=>$files
        ]);
    }

	public function submit(request $req) {
        
        $req->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required'
        ]);
        
        $name = $req->input('name');
        $phone = $req->input('phone');
        $email = $req->input('email');
        $files = $req->file('files');
        
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
            if ($req->has('ajax'))
                return [
                    'success'=>true,
                    'redirect'=>route('contact-ok')
                ];
            else
                return redirect()->route('contact-ok');
        }
	}
}