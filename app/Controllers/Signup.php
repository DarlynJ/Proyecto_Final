<?php
namespace App\Controllers;

class Signup extends BaseController
{
    public function new()
    {
        return view("Signup/new");
    }

    public function create()
    {
        // Obtiene los datos del formulario y crea una nueva entidad de usuario
        $user = new \App\Entities\User($this->request->getPost());
        $model = new \App\Models\UserModel;

        // Comienza el proceso de activación
        $user->startActivation();

        // Inserta el usuario en la base de datos y verifica si pasa la validación
        if ($model->save($user)) {
            // Si se inserta correctamente, envía el correo de activación
            $this->sendActivationEmail($user);

            // Redirige a la página de éxito
            return redirect()->to("/{$this->locale}/signup/success")
                             ->with('success', lang('Signup.success_message'));
        } else {
            // Si hay errores de validación, regresa al formulario con los errores
            return redirect()->back()
                            ->with('errors', $model->errors())
                            ->with('warning', lang('App.messages.invalid'))
                            ->withInput();
        }
    }

    public function success()
    {
        return view('Signup/success');
    }

    public function activate($token)
    {
        $model = new \App\Models\UserModel;

        // Activa la cuenta del usuario con el token proporcionado
        $model->activateByToken($token);

        // Muestra la vista de cuenta activada
        return view('Signup/activated');
    }

    private function sendActivationEmail($user)
    {
        // Usa el servicio de correo electrónico de CodeIgniter para enviar el correo de activación
        $email = service('email');
        $email->setTo($user->email);
        $email->setSubject(lang('Signup.activation'));

        // Crea el mensaje de correo usando una vista
        $message = view('Signup/activation_email', [
            'token' => $user->token
        ]);

        $email->setMessage($message);

        // Enviar el correo
        if (!$email->send()) {
            log_message('error', 'No se pudo enviar el correo de activación a ' . $user->email);
        }
    }

    public function register()
{
    $data = [
        'name' => 'Darlyn Jamin Urizar Leiva',
        'email' => 'urizarjazmin130@gmail.com',
        'activation_hash' => '719225202c05917e1e1e91c52debb2e687bd45454541835352b10bc8438',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
        'password' => 'tu_contraseña', // Aquí pon la contraseña del usuario
    ];

    // Llama al método createUser del modelo
    if ($this->userModel->createUser($data)) {
        // Usuario creado exitosamente
        echo 'Usuario creado con éxito';
    } else {
        // Manejo de errores
        echo 'Error al crear el usuario';
    }
}

}

