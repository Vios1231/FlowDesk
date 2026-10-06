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

        $ticketModel->insert([
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'priority' => $this->request->getPost('priority'),
            'status' => 'Open'
        ]);

        return redirect()->to('/tickets');
    }

    public function show($id)
    {
        $ticketModel = new TicketModel();
        $ticket = $ticketModel->find($id);

        return view('tickets/show', ['ticket'=>$ticket]);
    }

    public function edit($id)
    {
        $ticketModel = new TicketModel();
        $ticket = $ticketModel->find($id);
        
        return view('tickets/edit', ['ticket'=>$ticket]);
    }

    public function update($id)
    {
        $ticketModel = new TicketModel();

        $ticketModel->update($id, [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'priority' => $this->request->getPost('priority'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('/tickets/' . $id);
    }

    public function delete($id)
    {
        $ticketModel = new TicketModel();

        $ticket = $ticketModel->delete($id);

        return redirect()->to('/tickets');
    }
}