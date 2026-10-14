<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketModel extends Model
{
    protected $table = 'tickets';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'title',
        'description',
        'priority',
        'status'
    ];

    protected $validationRules = [
        'title' => 'required|min_length[3]|max_length[255]',
        'description' => 'required|min_length[10]|max_length[255]',
        'priority' => 'required|in_list[Low,Medium,High]',
        'status' => 'required|in_list[Open, In Progress, Resolved]'
    ];

    protected $validationMessages = [
        'title' => [
            'required' => 'Title is required',
            'min_length' => 'The minimal length is 3 letters',
            'max_length' => 'The maximal length is 255 letters'
        ],

        'description' => [
        'required' => 'Description is required.',
        'min_length' => 'Description must be at least 10 characters.'
        ],

        'priority' => [
            'required' => 'Priority is required.',
            'in_list' => 'Priority must be Low, Medium, or High.'
        ],

        'status' => [
            'required' => 'Status is required.',
            'in_list' => 'Status must be Open, In Progress, or Resolved.'
        ]
    ];
}
