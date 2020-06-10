<?php
class Mining {
    public $names , $subjects , $users_id , $books_id , $grades , $father_jobs ,$lends ;

    /**
     * @param mixed $names
     * @param $index
     */
    public function setNames($names , $index): void
    {
        $this->names[$index] = $names;
    }

    /**
     * @param mixed $subjects
     * @param $index
     */
    public function setSubjects($subjects , $index): void
    {
        $this->subjects[$index] = $subjects;
    }

    /**
     * @param mixed $users_id
     * @param $index
     */
    public function setUsersId($users_id , $index): void
    {
        $this->users_id[$index] = $users_id;
    }

    /**
     * @param mixed $books_id
     * @param $index
     */
    public function setBooksId($books_id, $index): void
    {
        $this->books_id[$index] = $books_id;
    }

    /**
     * @param mixed $grades
     * @param $index
     */
    public function setGrades($grades, $index): void
    {
        $this->grades[$index] = $grades;
    }

    /**
     * @param mixed $father_jobs
     * @param $index
     */
    public function setFatherJobs($father_jobs, $index): void
    {
        $this->father_jobs[$index] = $father_jobs;
    }

    /**
     * @param mixed $lends
     * @param $index
     */
    public function setLends($lends, $index): void
    {
        $this->lends[$index] = $lends;
    }

    /**
     * @param $index
     * @return mixed
     */
    public function getNames($index)
    {
        return $this->names[$index];
    }

    /**
     * @param $index
     * @return mixed
     */
    public function getSubjects($index)
    {
        return $this->subjects[$index];
    }

    /**
     * @param $index
     * @return mixed
     */
    public function getUsersId($index)
    {
        return $this->users_id[$index];
    }

    /**
     * @param $index
     * @return mixed
     */
    public function getBooksId($index)
    {
        return $this->books_id[$index];
    }

    /**
     * @param $index
     * @return mixed
     */
    public function getGrades($index)
    {
        return $this->grades[$index];
    }

    /**
     * @param $index
     * @return mixed
     */
    public function getFatherJobs($index)
    {
        return $this->father_jobs[$index];
    }

    /**
     * @param $index
     * @return mixed
     */
    public function getLends($index)
    {
        return $this->lends[$index];
    }


    public function calculate_arrays(){
        $i = 0 ;
        $minings = \Illuminate\Support\Facades\DB::select('
                SELECT  `users`.`id` as `user_id` , `book_id` , `books`.`name` , `books`.`subject` ,  `users`.`grade` , `users`.`father_job`  , `lendings`.`ban_status` as `lend`
                FROM
                `lendings` , `users` , `books`
                WHERE
                `users`.`id` = `lendings`.`user_id`
                and
                `books`.`id` = `lendings`.`book_id`
            ') ;

        foreach ($minings as $mining) {


            $this->setNames($mining->name , $i);

            $this->setSubjects($mining->subject , $i);

            $this->setUsersId($mining->user_id , $i);

            $this->setBooksId($mining->book_id , $i);

            $this->setGrades($mining->grade , $i);

            $this->setFatherJobs($mining->father_job , $i);

            if ($mining->lend == 2)
                $this->setLends('yes' , $i);
            else
                $this->setLends('no' , $i);

            $i++ ;

        }
    }
}

 $m = new Mining() ;
 $m->calculate_arrays();
 echo $m->getNames(3) ;





