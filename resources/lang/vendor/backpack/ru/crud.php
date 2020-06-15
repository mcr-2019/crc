<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Backpack Crud Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the CRUD interface.
    | You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */

    // Forms
    'save_action_save_and_new' => 'Сохранить и создать новый',
    'save_action_save_and_edit' => 'Сохранить и редактировать',
    'save_action_save_and_back' => 'Сохранить и назад',
    'save_action_changed_notification' => 'Поведение по умолчанию после сохранения изменено.',

    // Create form
    'add' => 'Добавить',
    'back_to_all' => 'Назад ко всем ',
    'cancel' => 'Отмена',
    'add_a_new' => 'Добавить новый ',

    // Edit form
    'edit' => 'Редактировать',
    'save' => 'Сохранить',

    // Revisions
    'revisions' => 'Ревизии',
    'no_revisions' => 'Ревизии не найдены',
    'created_this' => 'created this',
    'changed_the' => 'changed the',
    'restore_this_value' => 'Restore this value',
    'from' => 'с',
    'to' => 'по',
    'undo' => 'Обратно',
    'revision_restored' => 'Ревизия успешно сохранена',

    // CRUD table view
    'all' => 'Все ',
    'in_the_database' => 'в базе данных',
    'list' => 'Список',
    'actions' => 'Действия',
    'preview' => 'Предпросмотр',
    'delete' => 'Удалить',
    'admin' => 'Админ',
    'details_row' => 'Это детализированный вид. Изменяйте как вам нужно.',
    'details_row_loading_error' => 'Ошибка при загрузке подробностей. Пожалуйста попробуйте ещё раз.',

    // Confirmation messages and bubbles
    'delete_confirm' => 'Вы уверены что хотите удалить этот элемент?',
    'delete_confirmation_title' => 'Элемент удалён',
    'delete_confirmation_message' => 'Элемент был успешно удалён',
    'delete_confirmation_not_title' => 'НЕ удалён',
    'delete_confirmation_not_message' => "Произошла ошибка, элемент возможно не был удалён",
    'delete_confirmation_not_deleted_title' => 'Не удалён',
    'delete_confirmation_not_deleted_message' => 'Ни чего не случилось, элемент не был удалён.',

    // DataTables translation
    'emptyTable' => 'Нет данных в таблице',
    'info' => 'Показано с _START_ по _END_ из _TOTAL_ элементов',
    'infoEmpty' => '',
    'infoFiltered' => '(отфильтровано из всего _MAX_ элементов)',
    'infoPostFix' => '',
    'thousands' => ',',
    'lengthMenu' => '_MENU_ элементов на странице',
    'loadingRecords' => 'Загрузка...',
    'processing' => 'Обработка...',
    'search' => 'Поиск: ',
    'zeroRecords' => 'Элементов не найдено',
    'paginate' => [
        'first' => 'Первая',
        'last' => 'Последняя',
        'next' => 'Следующая',
        'previous' => 'Предыдущая',
    ],
    'aria' => [
        'sortAscending' => ': активировать восходящую сортировку',
        'sortDescending' => ': активировать нисходящую сортировку',
    ],

    // global crud - errors
    'unauthorized_access' => 'Unauthorized access - you do not have the necessary permissions to see this page.',
    'please_fix' => 'Пожалуйста исправьте ошибки:',

    // global crud - success / error notification bubbles
    'insert_success' => 'Элемент был успешно добавлен.',
    'update_success' => 'Элемент был успешно изменён.',

    // CRUD reorder view
    'reorder' => 'Изменить порядок',
    'reorder_text' => 'Используйте drag&drop для изменения порядка.',
    'reorder_success_title' => 'Готово',
    'reorder_success_message' => 'Порядок сортировки был сохранён.',
    'reorder_error_title' => 'Ошибка',
    'reorder_error_message' => 'Порядок сортировки не был сохранён.',

    // CRUD yes/no
    'yes' => 'Да',
    'no' => 'Нет',

    // Fields
    'browse_uploads' => 'Менеджер файлов',
    'clear' => 'Очистить',
    'page_link' => 'Ссылка на страницу',
    'page_link_placeholder' => 'http://example.com/your-desired-page',
    'internal_link' => 'Внутренняя ссылка',
    'internal_link_placeholder' => 'Внутренняя ссылка. Например: \'admin/page\' (без кавычек)',
    'external_link' => 'Внешняя ссылка',
    'location_name_link' => 'Локация',
    'location_name_with_mirror_link' => 'Локация с зеркалом',
    'branch_office_link' => 'Регион',
    'choose_file' => 'Выберите файл',

    //Table field
    'table_cant_add' => 'Невозможно добавить новую :entity',
    'table_max_reached' => 'Максимальное количество в :max достигнуто',

    // File manager
    'file_manager' => 'Менеджер файлов',
];
