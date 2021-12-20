<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{

    public function index()
    {
        $model = model(NewsModel::class);

        $data = [
            'news'  => $model->getNews()
        ];

        echo view('templates/header');
        echo view('pages/home');
        echo view('templates/footer');
    }

    public function view($page = 'home')
    {
        if (! is_file(APPPATH . 'views/pages/' . $page . '.php')) {
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page);

        echo view('templates/header', $data);
        echo view('pages/' . $page, $data);
        echo view('templates/footer', $data);
    }


}
