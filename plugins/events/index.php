<?php

class events
{
    function get($limit = 3)
    {
        global $model;
        LoadModel('blog', 'blog');

        $events = $model->getByParam(
            new v_blog(),
            array(
                'language' => LANGUAGE,
                'rubrick' => 2
            ),
            'id',
            'desc',
            $limit
        );
        LoadView('blog', 'widget.events', $events);
    }
}