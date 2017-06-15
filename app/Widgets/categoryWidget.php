<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class categoryWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $categories = \DB::table('categories')->get();
        return view('widgets.category_widget', [
            'config' => $this->config, 'categories' => $categories
        ]);
    }
}
