<?php

namespace App\Controllers;

use App\Models\TicketModel;

class TicketController extends BaseController
{
    public function index()
    {
        $ticketModel = new TicketModel();

        $tickets = $ticketModel->findAll();

        return view ('tickets/index',['tickets' => $tickets]);
    }

    public function create()
    {
        return view ('tickets/create');
    }

    public function store()
    {
        $ticketModel = new TicketModel();

        $result = $ticketModel->insert([
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'priority' => $this->request->getPost('priority'),
            'status' => 'Open'
        ]);

        if ($result === false) {
            return view('tickets/create', [
                'validation' => $ticketModel->errors()
            ]);
        }

        session()->setFlashdata('success', 'Ticket created successfully.');
        return redirect()->to('/tickets');
    }

    public function show($id)
    {
        $ticketModel = new TicketModel();
        $ticket = $ticketModel->find($id);

        if(!$ticket){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Ticket not found.');
        }

        return view('tickets/show', ['ticket'=>$ticket]);
    }

    public function edit($id)
    {
        $ticketModel = new TicketModel();
        $ticket = $ticketModel->find($id);
        
        if(!$ticket){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Ticket not found.');
        }
        
        return view('tickets/edit', ['ticket'=>$ticket]);
    }

    public function update($id)
    {
        $ticketModel = new TicketModel();
        $ticket = $ticketModel->find($id);
        
        if(!$ticket){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Ticket not found.');
        }

        $result = $ticketModel->update($id, [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'priority' => $this->request->getPost('priority'),
            'status' => $this->request->getPost('status'),
        ]);

        if ($result === false) {
            return view('tickets/edit', [
                'ticket' => array_merge($ticket, $this->request->getPost()),
                'validation' => $ticketModel->errors()
            ]);
        }
        
        session()->setFlashdata('success', 'Ticket updated successfully.');
        return redirect()->to('/tickets/' . $id);
    }

    public function delete($id)
    {
        $ticketModel = new TicketModel();
        $ticket = $ticketModel->find($id);

        if(!$ticket){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Ticket not found.');
        }

        $result = $ticketModel->delete($id);
        if ($result === false) {
            throw new \RuntimeException('Failed to delete ticket.');
        }

        session()->setFlashdata('success', 'Ticket deleted successfully.');
        return redirect()->to('/tickets');
    }
}