<?php

$total = count($DB->get_records_sql($query));
    $query .= " GROUP BY mdc.id LIMIT $limit OFFSET $offset";
    $getcourse = $DB->get_records_sql($query);


 if ($total>9) {


    $limitpage = $page+9;

    if ($page==1) {
      $disabled = 'disabled';
    }
    echo '<nav aria-label="...">
    <ul class="pagination justify-content-center">
    <li class="page-item '.$disabled.'">
    <a class="page-link" href="?page='.($prev).'" tabindex="-1">Previous</a>
    </li>
    ';
    if ($page!=1) {
      echo '<li class="page-item"><a class="page-link" href="?page='.$prev.'">'.($page-1).'</a> </li>';
    }

    for ($i=$page-1; $i <$limitpage ; $i++) { 
      if ($page-1==$i) {
        echo '<li class="page-item active">
        <a class="page-link" href="?page='.$i.'">'.($i+1).'<span class="sr-only">(current)</span></a>
        </li>';
      }else{
        echo ' <li class="page-item"><a class="page-link" href="?page='.$i.'">'.($i+1).'</a></li>';
      }


    }
    echo '<li class="page-item">
    <a class="page-link" href="?page='.($prev+2).'">Next</a>
    </li>
    </ul>
    </nav>';
  }
