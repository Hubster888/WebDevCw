<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CommentView extends Component
{
    /**
     * The comment title.
     *
     * @var string
     */
    public $title;

    /**
     * The comment content.
     *
     * @var string
     */
    public $content; 

    /**
     * The comment's author.
     *
     * @var string
     */
    public $author;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title="No Title", $content="No Content", $author="Unknown")
    {
        //
        $this->content = $content;
        $this->title = $title;
        $this->author = $author;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.comment-view');
    }
}
