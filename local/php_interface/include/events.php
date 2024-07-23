<?

/**
 * 404 ошибка для фильтра Kombox
 * http://filter.kombox.ru/docs/course/index.php?COURSE_ID=1&LESSON_ID=20
 */
AddEventHandler('main', 'OnEpilog', 'Redirect404');

/**
 * Работа с контентом после окончания буферизации
 */
AddEventHandler("main", "OnEndBufferContent", "changeContent");

/**
 * Работа с админкой
 */
AddEventHandler('main', 'OnProlog', 'OnPrologAdminHandler');


/**
 * Работа с мета-тегами
 */
AddEventHandler("main", "OnEpilog", "changeMetaTags");
