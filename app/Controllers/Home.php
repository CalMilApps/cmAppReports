<?php namespace App\Controllers;

use App\Models\Usuarios;
use App\Models\TicketsModel;

class Home extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function dashboard()
    {

        
        
        $session_lg = session();
        $data['user_name'] = $session_lg->get('usuario_ac');

        $usuarioModel = new Usuarios();
        $usuario = $usuarioModel->obtenerRolPorUsuario($data['user_name']); // Por ejemplo

        // Asumiendo que el método obtenerUsuarioPorNombre devuelve un array con los datos del usuario, incluyendo el rol
        $data['role'] = $usuario['role'];

        $ticketsModel = new TicketsModel();
        $data['today_tickets_count'] = $ticketsModel->countTodayTickets();

        return view('dashboard', $data,);

    }

    public function register(){
        return view('register');
    }

    public function register_ac(){
        helper(['form']);

        $nuevoUsuario = new Usuarios();

      $data = [
        'usuario' => $this->request->getVar('usuario'),
        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        'email' => $this->request->getVar('email'),
        'role' => $this->request->getVar('role'),
      ];
      

      $nuevoUsuario->save($data);
      return redirect()->to('/');
    }

    public function login_ac(){
        helper(['form']);

        $session_lg = session();
        $nuevoUsuario = new Usuarios();

        $usuario_ac = $this->request->getVar('usuario_ac');
        $pass_ac = $this->request->getVar('pass_ac');

        $data = $nuevoUsuario->where('usuario', $usuario_ac)->first();
        
        if ($data){
            $pass_db = $data['password'];
            //$ver_pass = password_verify($pass_ac, $pass_db);
            if ($pass_ac == $pass_db){
                $ses_data = [
                    'usuario_ac' => $data['usuario'],
                    'email_ac' => $data['email'],
                    'logged_in' => TRUE
                ];
                $session_lg->set($ses_data);
                return redirect()->to('/dashboard');
            } else{
                return redirect()->to('/');
            }
        } else {
            return redirect()->to('/');
        }

    }   

    public function logout_ac(){
        $session_lg = session();
        $session_lg->destroy();
        return redirect()->to('/');
    }

    public function tickets(){

        $session_lg = session();
        $data['user_name'] = $session_lg->get('usuario_ac');

        $usuarioModel = new Usuarios();
        $usuario = $usuarioModel->obtenerRolPorUsuario($data['user_name']); // Por ejemplo

        $data['usuarios'] = $usuarioModel->findAll();
        
        // Asumiendo que el método obtenerUsuarioPorNombre devuelve un array con los datos del usuario, incluyendo el rol
        $data['role'] = $usuario['role'];

        // Cargar el modelo de Ticket_model
        $ticketModel = new TicketsModel(); // Asegúrate de que el modelo se llama Ticket_model

        // Obtener todos los tickets desde el modelo
        $data['tickets'] = $ticketModel->get_all_tickets();

        return view('tickets', $data);
    }

    public function newTicket(){

        $session_lg = session();
        $data['user_name'] = $session_lg->get('usuario_ac');

        $usuarioModel = new Usuarios();
        $ticketModel = new TicketsModel(); // Asegúrate de que el modelo

        $usuario = $usuarioModel->obtenerRolPorUsuario($data['user_name']); // Por ejemplo
        $data['usuarios'] = $usuarioModel->findAll();

        // Obtener todos los tickets desde el modelo
        $data['tickets'] = $ticketModel->get_all_tickets();



        // Asumiendo que el método obtenerUsuarioPorNombre devuelve un array con los datos del usuario, incluyendo el rol
        $data['role'] = $usuario['role'];

        return view('addticket', $data);
    }
    

}