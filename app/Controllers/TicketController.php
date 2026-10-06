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
        $rule = [
            'title' => 'required|min_length[3]|max_length[255]',
            'description' => 'required|min_length[10]|max_length[500]',
            'priority' => 'required|in_list[Low, Medium, High]'
        ];

        if (!$this->validate($rule)) {
                return view('tickets/create', ['validation' => $this->validator]);
            }

        $ticketModel = new TicketModel();

        $ticketModel->insert([
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'priority' => $this->request->getPost('priority'),
            'status' => 'Open'
        ]);

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
        session()->setFlashdata('success', 'Ticket edit successfully.');
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

        if(!$ticket){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Ticket not found.');
        }

        session()->setFlashdata('success', 'Ticket deleted successfully.');
        return redirect()->to('/tickets');
    }
}