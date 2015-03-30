<?php

function paging($page, $page_rows, $pagination)
{
  
    $start = $pagination->start_index - 1;
    $end = $pagination->count + 1;

    //クエリー用のリミット
    $limit = 'LIMIT ' . $start.','. $end;

    return $limit;
   
}

