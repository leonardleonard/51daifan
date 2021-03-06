<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ronghao
 * Date: 6/14/13
 * Time: 4:49 PM
 * To change this template use File | Settings | File Templates.
 */
include 'base.php';

class Recipes extends Base
{

    public function __construct()
    {
        parent::__construct();
        if ($this->is_sae) {
            $this->upload_path = 'images/recipe';
            $this->thumbnail_source_image_path = 'images/recipe/';
        } else {
            $this->upload_path = './uploads/';
            $this->thumbnail_source_image_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
        }
        $this->load->model('recipe_model');
    }

    public function index()
    {
        $data['active'] = 'recipes';
        $this->set_session_data($data);
        $recipes = $this->recipe_model->get_recipes();
        $data['recipes'] = $recipes;

        $this->load->view('templates/header', $data);
        $this->load->view('recipe/recipes', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create()
    {
        if (!$this->logged_in) {
            redirect('/account/login', 'refresh');
        }
        $data['title'] = '记录我家美食';
        $this->set_session_data($data);
        $this->load->view('templates/header', $data);
        $this->load->view('recipe/create');
        $this->load->view('templates/recipe_footer');
    }

    function do_create()
    {
        $name = $this->input->post('name');
        $describe = $this->input->post('describe');
        $images = $this->input->post('img');
        $pad_images = array_pad($images, 6, null);
        $user_id = $this->userid;
        $this->recipe_model->create($name, $describe, $user_id, $pad_images[0], $pad_images[1], $pad_images[2], $pad_images[3], $pad_images[4], $pad_images[5]);
        echo 'well';
    }

}