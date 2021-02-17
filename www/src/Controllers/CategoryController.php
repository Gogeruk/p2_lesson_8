<?php

namespace Hillel\Controllers;

use Illuminate\Http\RedirectResponse;

class CategoryController
{

    public function table()
    {
        // go to table
        $categories = \Hillel\Model\Category::all();
        return view('pages/list-categories', ['categories' => $categories]);
    }

    public function create()
    {
        // go to create
        $data = request()->all();
        if (empty($data)) {
            $title = null;
            $slug = null;
        }else {
            $title = $data['title'];
            $slug = $data['slug'];
        }
        return view('pages/create-category', ['title' => $title, 'slug' => $slug]);
    }

    public function saveCreate()
    {
        // save created stuff
        $data = request()->all();
        $new_cat = new \Hillel\Model\Category();
        $new_cat ->title = $data['title'];
        $new_cat ->slug = $data['slug'];
        $new_cat ->save();

        return new RedirectResponse('/category');
    }

    public function update()
    {
        // go to update
        $data = request()->all();
        if (empty($data)) {
            $id = 1; //def val
            $title = null;
            $slug = null;
        }else {
            $id = $data['id'];
            $title = $data['title'];
            $slug = $data['slug'];
        }
        return view('pages/update-category', ['id' => $id, 'title' => $title, 'slug' => $slug]);
    }

    public function saveUpdate()
    {
        // update stuff
        $data = request()->all();
        if (!empty($data)) {
            $up_cat = \Hillel\Model\Category::find($data['id']);
            $up_cat ->title = $data['title'];
            $up_cat ->slug = $data['slug'];
            $up_cat->save();

            return new RedirectResponse('/category');
        }
    }

    public function delete()
    {
        // go to delete
        $data = request()->all();
        if (empty($data['id'])) {
            $id = null;
        }else {
            $id = $data['id'];
        }
        return view('pages/delete-category', ['id' => $id]);
    }

    public function saveDelete()
    {
        // delte stuff
        $data = request()->all();
        $category = \Hillel\Model\Category::find($data['id']);
        if($posts = $category->post) {
            foreach ($posts as $post) {
                $category->posts()->detach($category->id);
            }
            $category->delete();
        } else $category->delete();

        return new RedirectResponse('/category');
    }
}



?>
