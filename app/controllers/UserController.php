<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: UserController
 * 
 * Automatically generated via CLI.
 */
class UserController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->database();
        $this->call->model('UserModel');
    }

    public function show(){
        // Get search and pagination parameters
        $search = $this->io->get('search', '');
        $page = $this->io->get('page', 1);
        $per_page = 10;

        // Calculate offset
        $offset = ($page - 1) * $per_page;

        // Get users with search and pagination
        $data['users'] = $this->UserModel->get_users_with_search($search, $per_page, $offset);

        // Get total count for pagination
        $total_users = $this->UserModel->get_total_users($search);
        $data['total_users'] = $total_users;
        $data['total_pages'] = ceil($total_users / $per_page);
        $data['current_page'] = $page;
        $data['search'] = $search;
        $data['per_page'] = $per_page;

        // Initialize pagination
        if ($total_users > $per_page) {
            $this->call->library('Pagination');
            $this->pagination->initialize($total_users, $per_page, $page, 'users/show');
            $data['pagination_links'] = $this->pagination->paginate();
        }

        $this->call->view('show', $data);
    }

    public function create() {
        if($this->io->method() == 'post'){
            $lastname = $this->io->post('last_name');
            $firstname = $this->io->post('first_name');
            $email = $this->io->post('email');
            $data = array(
                'last_name' => $lastname,
                'first_name' => $firstname,
                'email' => $email
            );
            if($this->UserModel->insert($data)){
                redirect('/');
            } else {
                echo 'Something went wrong';
            }
        } else {
            $this->call->view('create');
        }
        
    }

    public function update($id) {
        $data['user'] = $this->UserModel->find($id);
        if($this->io->method() == 'post'){
            $lastname = $this->io->post('last_name');
            $firstname = $this->io->post('first_name');
            $email = $this->io->post('email');
            $data = array(
                'last_name' => $lastname,
                'first_name' => $firstname,
                'email' => $email
            );
            if($this->UserModel->update($id, $data)){
                redirect('/');
            } else {
                echo 'Something went wrong';
            }
        } else {
            $this->call->view('update', $data);
        }
    }

    public function delete($id){
        if($this->UserModel->delete($id)){
            redirect('/');
        } else {
            echo 'Something went wrong';
        }
    }
}