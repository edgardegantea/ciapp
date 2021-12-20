<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;

class NewsController extends BaseController
{

    protected $helpers = ['url', 'form'];

    public function index()
    {
        $nModel = model(NewsModel::class);

        $data = [
            'news'  => $nModel->getNews(),
            'title' => 'Noticias'
            
        ];


        echo view('templates/header', $data);
        echo view('news/index', $data);
        echo view('templates/footer', $data);

    }

    public function show($slug = null)
    {
        
        $model = model(NewsModel::class);

        $data['new'] = $model->getNews($slug);

        if (empty($data['new'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('El elemento ' . $slug . ' no existe en la base de datos');
        }

        $data['title'] = $data['new']['title'];

        echo view('templates/header', $data);
        echo view('news/show', $data);
        echo view('templates/footer', $data);
    }


    public function create()
    {

        $model = model(NewsModel::class);

        if ($this->request->getMethod() === 'post' && $this->validate([
            'title' => 'required|min_length[3]|max_length[128]',
            'body'  => 'required'
        ])) {
            $model->save([
                'title' => $this->request->getPost('title'),
                'body'  => $this->request->getPost('body'),
                'slug'  => url_title($this->request->getPost('title'), '-', true)
            ]);

            return redirect()->to('news/');
            /*
            echo view('templates/header', $data);
            echo view('news/index', $data);
            echo view('templates/footer', $data);
            */
        } else {
            echo view('templates/header', ['title' => 'Registro de nueva noticia']);
            echo view('news/create');
            echo view('templates/footer');
        }
    }

}
