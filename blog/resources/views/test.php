<?php
class Mining {
    public $names , $subjects , $users_id , $books_id , $grades , $father_jobs ,$lends , $length ;

    /**
     * @return mixed
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param mixed $length
     */
    public function setLength($length): void
    {
        $this->length = $length;
    }

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
        $this->setLength($i);
    }

    /**
    **/
    public function information_Data(){
        $yes_number = 0  ;
        $no_number = 0 ;
        for ($i = 0 ; $i < $this->getLength() ; $i++){
           $lend[$i] = $this->getLends($i) ;
           if (strcmp($lend[$i] , 'yes'))
               $yes_number++ ;
           else
               $no_number++ ;
        }


        return -($yes_number / $this->getLength())*log($yes_number / $this->getLength() , 2) - ($no_number / $this->getLength())*log($no_number / $this->getLength() , 2);
    }

    public function information_Data_grade(){
        $grade1['yes'] = 1  ;
        $grade1['no'] = 1  ;
        $grade2['yes'] = 1 ;
        $grade2['no'] = 1 ;
        $grade3['yes'] = 1 ;
        $grade3['no'] = 1 ;
        for ($i = 0 ; $i < $this->getLength() ; $i++){
            if ($this->getGrades($i) == 1)
                if (strcmp($this->getLends($i) , 'yes'))
                    $grade1['yes']++ ;
                else
                    $grade1['no']++ ;
            elseif ($this->getGrades($i) == 2)
                if (strcmp($this->getLends($i) , 'yes'))
                    $grade2['yes']++ ;
                else
                    $grade2['no']++ ;
            else
                if (strcmp($this->getLends($i) , 'yes'))
                    $grade3['yes']++ ;
                else
                    $grade3['no']++ ;
        }

        $grade['total'] = $grade1['yes'] + $grade1['no'] + $grade2['yes'] + $grade2['no'] + $grade3['yes'] + $grade3['no'] ;
        $grade['yes'] = $grade1['yes'] + $grade2['yes'] + $grade3['yes'] ;
        $grade['no'] = $grade1['no'] + $grade2['no'] + $grade3['no'] ;
        $result1 = (($grade1['yes'] + $grade1['no']) / $grade['total'])*((-($grade1['yes']) / ($grade1['yes'] + $grade1['no'])) * log((($grade1['yes']) / ($grade1['yes'] + $grade1['no'])) , 2) + (-($grade1['no']) / ($grade1['yes'] + $grade1['no'])) * log((($grade1['no']) / ($grade1['yes'] + $grade1['no'])) , 2)) ;
        $result2 = (($grade2['yes'] + $grade2['no']) / $grade['total'])*((-($grade2['yes']) / ($grade2['yes'] + $grade2['no'])) * log((($grade2['yes']) / ($grade2['yes'] + $grade2['no'])) , 2) + (-($grade2['no']) / ($grade2['yes'] + $grade2['no'])) * log((($grade2['no']) / ($grade2['yes'] + $grade2['no'])) , 2)) ;
        $result3 = (($grade3['yes'] + $grade3['no']) / $grade['total'])*((-($grade3['yes']) / ($grade3['yes'] + $grade3['no'])) * log((($grade3['yes']) / ($grade3['yes'] + $grade3['no'])) , 2) + (-($grade3['no']) / ($grade3['yes'] + $grade3['no'])) * log((($grade3['no']) / ($grade3['yes'] + $grade3['no'])) , 2)) ;

        return $this->information_Data() - ($result1 + $result2 + $result3) ;

    }


}

 $m = new Mining() ;
 $m->calculate_arrays();
 echo $m->getLends(3) ;
 echo $m->information_Data() ;
 echo $m->information_Data_grade() ;





