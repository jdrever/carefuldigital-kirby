<?php

return function ($site) {
    return $site->find('commons/guides')->index()->filterBy('template','in',['guide','guide-section','guide-task-introductions']);
};
?>