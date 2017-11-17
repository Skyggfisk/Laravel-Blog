<?php

namespace App;

class Post
{
    public function getPosts($session)
    {
        if (!$session->has('posts')) {
            $this->createDummyData($session);
        }
        return $session->get('posts');
    }

    public function getPost($session, $id)
    {
        if (!$session->has('posts')) {
            $this->createDummyData();
        }
        return $session->get('posts')[$id];
    }

    public function addPost($session, $title, $content)
    {
        if (!$session->has('posts')) {
            $this->createDummyData();
        }
        $posts = $session->get('posts');
        array_push($posts, ['title' => $title, 'content' => $content]);
        $session->put('posts', $posts);
    }

    public function editPost($session, $id, $title, $content)
    {
        $posts = $session->get('posts');
        $posts[$id] = ['title' => $title, 'content' => $content];
        $session->put('posts', $posts);
    }

    private function createDummyData($session)
    {
        $posts = [
            [
                'title' => 'First Post',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ut lectus vel leo faucibus gravida. Morbi dignissim tellus id sapien efficitur, ut condimentum libero porttitor.'
            ],
            [
                'title' => 'Second Post',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ut lectus vel leo faucibus gravida. Morbi dignissim tellus id sapien efficitur, ut condimentum libero porttitor.'
            ],
            [
                'title' => 'Third Post',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ut lectus vel leo faucibus gravida. Morbi dignissim tellus id sapien efficitur, ut condimentum libero porttitor.'
            ]
        ];
        $session->put('posts', $posts);
    }
}