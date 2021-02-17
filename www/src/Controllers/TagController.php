<?php

namespace Hillel\Controllers;

use Illuminate\Http\RedirectResponse;

class TagController
{

    public function table()
    {
        // go to table
        $tags = \Hillel\Model\Tag::all();
        return view('pages/list-tags', ['tags' => $tags]);
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
        return view('pages/create-tag', ['title' => $title, 'slug' => $slug]);
    }

    public function saveCreate()
    {
        // save created stuff
        $data = request()->all();
        $new_tag = new \Hillel\Model\Tag();
        $new_tag ->title = $data['title'];
        $new_tag ->slug = $data['slug'];
        $new_tag ->save();

        return new RedirectResponse('/tag');
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
        return view('pages/update-tag', ['id' => $id, 'title' => $title, 'slug' => $slug]);
    }

    public function saveUpdate()
    {
        // update stuff
        $data = request()->all();
        if (!empty($data)) {
            $up_tag = \Hillel\Model\Tag::find($data['id']);
            $up_tag ->title = $data['title'];
            $up_tag ->slug = $data['slug'];
            $up_tag->save();

            return new RedirectResponse('/tag');
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
        return view('pages/delete-tag', ['id' => $id]);
    }

    public function saveDelete()
    {
        // delte stuff
        $data = request()->all();
        $tag = \Hillel\Model\Tag::find($data['id']);
        if($posts = $tag->posts) {
            foreach ($posts as $post) {
                $tag->posts()->detach($post->id);
            }
            $tag->delete();
        } else $tag->delete();

        return new RedirectResponse('/tag');
    }
}



?>
