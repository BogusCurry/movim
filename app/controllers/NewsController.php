<?php

class NewsController extends BaseController {
    function load() {
        $this->session_only = true;
    }

    function dispatch() {
        $this->page->setTitle(__('title.news', APP_TITLE));
        
        $this->page->menuAddLink(__('page.home'), 'main');
        $this->page->menuAddLink(__('page.news'), 'news', true);
        $this->page->menuAddLink(__('page.explore'), 'explore');
        $this->page->menuAddLink(__('page.profile'), 'profile');
        $this->page->menuAddLink(__('page.media'), 'media');
        $this->page->menuAddLink(__('page.configuration'), 'conf', false, true);
        $this->page->menuAddLink(__('page.help'), 'help', false, true);
    }
}
