<?php

namespace App\Controllers;
use Throwable;
class Home extends BaseController
{
    public function index($locale = '')
    {

        if ($locale === ''){
            session()->keepFlashdata('info');
            return redirect()->to($this->locale);
        }
        $this->request->setLocale($locale);

        session()->set('locale', $locale);

        return view('Home/index');
    }

     public function testEmail()
     {
        $email = service('email');
        $email->setTo('conectacomputadora4@gmail.com');
        $email->setSubject('A test email');
        $email->setMessage('<h1>Hello world</h1>');

        if ($email->send()){
            echo "Message sent";

        } else{

            echo $email->printDebugger();

        }

     }
}
