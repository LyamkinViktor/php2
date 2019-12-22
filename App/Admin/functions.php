<?php

use App\Models\News;

/**
 * Editing news.
 *
 * @param string  $newsHeadline    Editable news title.
 * @param string  $newsDescription Description of editable news.
 * @param integer $newsId          Id of editable news.
 */
function editNews($newsHeadline, $newsDescription, $newsId)
{
    if (!empty($newsId)) {
        $news = News::findById((int)$newsId);
        if (false === $news) {
            echo 'There is no such news!';
            exit;
        }
    } else {
        $news = new News();
    }
    $news->article = trim(htmlspecialchars($newsHeadline));
    $news->description = trim(htmlspecialchars($newsDescription));
    $news->save();
}

/**
 * Delete news by id.
 *
 * @param integer $id
 */
function deleteNews($id)
{
    if (!empty((int)$id)) {
        $news = News::findById($id);
        if (false === $news) {
            echo 'There is no such news!';
            exit;
        }
        $news->delete();
    }
}
