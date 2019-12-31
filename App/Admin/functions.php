<?php

use App\Models\Author;
use App\Models\News;

/**
 * Editing news.
 *
 * @param string  $newsHeadline    Editable news title.
 * @param string  $newsDescription Description of editable news.
 * @param integer $newsId          Id of editable news.
 * @param string  $authorName      Author of news.
 */
function editNews($newsHeadline, $newsDescription, $newsId, $authorName)
{
    if (!empty($newsId)) {
        $news = News::findById((int)$newsId);
        if (false === $news) {
            echo 'There is no such news!';
            exit;
        }
        if (is_int($news->author_id)) {
            $author = Author::findById($news->author_id);
        } else {
            $author = new Author();
        }
    } else {
        $news = new News();
        $author = new Author();
    }

    if (!empty($authorName)) {
        $author->name = trim(htmlspecialchars($authorName));
        $author->save();
    }

    $news->article = trim(htmlspecialchars($newsHeadline));
    $news->description = trim(htmlspecialchars($newsDescription));
    $news->author_id = $author->id;
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
        if (isset($news->author_id)) {
            $author = Author::findById($news->author_id);
            if (false !== $author) {
                $author->delete();
            }
        }
        $news->delete();
    }
}
