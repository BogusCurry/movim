<header>
    <ul class="list divided spaced">
        <li class="subheader">
            <p class="normal">
                {$c->__('page.chats')}
            </p>
        </li>
    </ul>
</header>

<ul id="chats_widget_list" class="list middle active divided spaced">
    {$c->prepareChats()}
</ul>

<div class="placeholder icon">
    <h1>{$c->__('chats.empty_title')}</h1>
    <h4>{$c->___('chats.empty', '<i class="material-icons">plus</i>', '<a href="'.$c->route('contact').'"><i class="material-icons">people</i> ', '</a>')}</h4>
</div>

<a class="button action color" onclick="MovimTpl.toggleActionButton()" title="{$c->__('button.chat')}">
    <i class="material-icons">add</i>
    <ul class="actions">
        <li onclick="Search_ajaxHttpRequest()" title="{$c->__('chats.add')}">
            <i class="material-icons">person_add</i>
        </li>
        <li onclick="Rooms_ajaxAdd()" title="{$c->__('rooms.add')}">
            <i class="material-icons">people</i>
        </li>
    </ul>
</a>
