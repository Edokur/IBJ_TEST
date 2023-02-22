<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Kelas_model;

class Kelas extends ResourceController
{
    use ResponseTrait;
    // all users
    public function index()
    {
        $Kelas = new Kelas_model();
        $data['title'] = $Kelas->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }
    // create
    public function create()
    {
        $Kelas = new Kelas_model();
        $data = [
            'title' => $this->request->getVar('title'),
            'course_category_id' => $this->request->getVar('course_category_id'),
        ];
        $Kelas->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Kelas berhasil ditambahkan.'
            ]
        ];
        return $this->respondCreated($response);
    }
    // single user
    public function show($id = null)
    {
        $Kelas = new Kelas_model();
        $data = $Kelas->where('id', $id)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
    // update
    public function update($id = null)
    {
        $Kelas = new Kelas_model();
        $id = $this->request->getVar('id');
        $data = [
            'title' => $this->request->getVar('title'),
            'course_category_id' => $this->request->getVar('course_category_id')
        ];
        $Kelas->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Kelas berhasil diubah.'
            ]
        ];
        return $this->respond($response);
    }
    // delete
    public function delete($id = null)
    {
        $Kelas = new Kelas_model();
        $data = $Kelas->where('id', $id)->delete($id);
        if ($data) {
            $Kelas->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Kelas berhasil dihapus.'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
}
