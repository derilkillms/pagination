<?php

// SELECT MAX(id) AS id
// ,(array_agg(assignedby))[1] AS assignedby
// ,(array_agg(duration))[1] AS duration
// ,missiontype
// ,(array_agg(description))[1] AS description
// ,(array_agg(indicator1))[1] AS indicator1
// ,(array_agg(indicator2))[1] AS indicator2
// ,(array_agg(indicator3))[1] AS indicator3
// ,(array_agg(duedate))[1] AS duedate
// ,(array_agg(reward))[1] AS reward
// ,(array_agg(userassigned))[1] AS userassigned
// ,(array_agg(levelmission))[1] AS levelmission
// ,(array_agg(allemployee))[1] AS allemployee
// ,(array_agg(nrp))[1] AS nrp
// ,(array_agg(nrppersarea))[1] AS nrppersarea
// ,(array_agg(persarea))[1] AS persarea
// ,(array_agg(perssubarea))[1] AS perssubarea
// ,(array_agg(approvalstatus))[1] AS approvalstatus
// ,(array_agg(competencygroup))[1] AS competencygroup
// ,(array_agg(competencyname))[1] AS competencyname
// ,(array_agg(timecreated))[1] AS timecreated
// FROM {local_custommission} GROUP BY missiontype

$page = 1;
    $limit = 8;
    $offset = 0;
    if (isset($_GET['page'])) {
      $page = intval($_GET['page'])+1;
      $prev = intval($_GET['page'])-1;

      $offset = ($offset+$limit)*intval($_GET['page']);


  // echo $limit.'|'.$offset;
    }

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
