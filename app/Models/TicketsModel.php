<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketsModel extends Model
{
    protected $table = 'tickets';
    protected $returnType = 'object';
    protected $allowedFields = ['TicketID','usuario', 'Subject', 'Description', 'Status', 'Priority', 'CreatedByUserID', 'AssignedToUserID', 'CreatedTime', 'UpdatedTime']; // Asegúrate de incluir todos los campos permitidos en tus tickets

    public function get_all_tickets() {
        return $this->findAll();
    }

    public function obtenerTicketIDPorUsuario($ticketid)
    {
        $ticketid = $this->where('TicketID', $ticketid)->first(); // Obtener los datos del ticketid
        if ($ticketid) {
            return $ticketid; // Devolver los datos del ticketid
        } else {
            return null; // Devolver nulo si no se encuentra el ticketid
        }
    }

    public function countTodayTickets()
    {
        $today = date('Y-m-d');
        return $this->where('DATE(CreatedTime)', $today)->countAllResults();
    }
    
}