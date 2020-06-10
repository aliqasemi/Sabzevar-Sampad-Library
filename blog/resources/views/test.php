<?php

$i = 0 ;
$minings = \Illuminate\Support\Facades\DB::select('
SELECT  `users`.`id` as `user_id` , `book_id` , `books`.`name` , `books`.`subject` ,  `users`.`grade` , `users`.`father_job`
FROM
`lendings` , `users` , `books`
WHERE
`users`.`id` = `lendings`.`user_id`
and
`books`.`id` = `lendings`.`book_id`
') ;

foreach ($minings as $mining) {
    $names[$i] =  $mining->name;
    $subjects[$i] =  $mining->subject;
    $users_id[$i] =  $mining->user_id;
    $books_id[$i] =  $mining->book_id;
    $grades[$i] =  $mining->grade;
    $father_jobs[$i] =  $mining->father_job;
    $i++ ;
}

