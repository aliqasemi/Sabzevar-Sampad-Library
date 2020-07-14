<?php
namespace App;

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


    public function calculate_arrays($gain , $query){
        $i = 0 ;
        if (strcmp($gain , '') == 0){
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
        else if (strcmp($gain , 'grade') == 0){
            $i = 0 ;
            $minings = \Illuminate\Support\Facades\DB::select('
                SELECT  `users`.`id` as `user_id` , `book_id` , `books`.`name` , `books`.`subject` ,  `users`.`grade` , `users`.`father_job`  , `lendings`.`ban_status` as `lend`
                FROM
                `lendings` , `users` , `books`
                WHERE
                `users`.`id` = `lendings`.`user_id`
                and
                `books`.`id` = `lendings`.`book_id`
                and
                `users`.`grade` = '.$query.'
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
        else if (strcmp($gain , 'subject') == 0){
            $i = 0 ;
            $minings = \Illuminate\Support\Facades\DB::select('
                SELECT  `users`.`id` as `user_id` , `book_id` , `books`.`name` , `books`.`subject` ,  `users`.`grade` , `users`.`father_job`  , `lendings`.`ban_status` as `lend`
                FROM
                `lendings` , `users` , `books`
                WHERE
                `users`.`id` = `lendings`.`user_id`
                and
                `books`.`id` = `lendings`.`book_id`
                and
                `books`.`subject` =  '.'"'.$query.'"'.'
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
        else if (strcmp($gain , 'father') == 0){
            $i = 0 ;
            $minings = \Illuminate\Support\Facades\DB::select('
                SELECT  `users`.`id` as `user_id` , `book_id` , `books`.`name` , `books`.`subject` ,  `users`.`grade` , `users`.`father_job`  , `lendings`.`ban_status` as `lend`
                FROM
                `lendings` , `users` , `books`
                WHERE
                `users`.`id` = `lendings`.`user_id`
                and
                `books`.`id` = `lendings`.`book_id`
                and
                `users`.`father_job` = '.'"'.$query.'"'.'
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

    }



    /**
     **/
    public function information_Data(){
        $yes_number = 2  ;
        $no_number = 2 ;
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

    public function information_data_subject(){
        for ($i = 0 ; $i < $this->getLength() ; $i++){
            $array[$i] = $this->getSubjects($i) ;
        }

        $unique = array() ;
        foreach ($array as $value){
            if (!in_array($value , $unique)){
                $unique[] = $value ;
                $subject[$value]['yes'] = 1 ;
                $subject[$value]['no'] = 1 ;
            }

        }

        for ($i = 0 ; $i < count($unique) ; $i++){
            for ($j = 0 ; $j < count($array) ; $j++){
                if (strcmp($this->getLends($j) , 'yes')) {
                    if (strcmp($unique[$i], $array[$j]) == 0)
                        $subject[$unique[$i]]['yes']++;
                }
                if (strcmp($this->getLends($j) , 'no')) {
                    if (strcmp($unique[$i], $array[$j]))
                        $subject[$unique[$i]]['no']++;
                }
            }
        }

        $subjects['total'] = 0 ;
        $subjects['yes'] = 0 ;
        $subjects['no'] = 0 ;

        foreach ($subject as $s){
            $subjects['total'] += $s['yes'] + $s['no'] ;
        }

        foreach ($subject as $s){
            $subjects['yes'] += $s['yes'] ;
        }

        foreach ($subject as $s){
            $subjects['no'] += $s['no'] ;
        }

        $result[]  = 0 ; $i = 0 ;

        foreach ($subject as $s){
            $result[$i] = (($s['yes'] + $s['no']) / $subjects['total'])*((-($s['yes']) / ($s['yes'] + $s['no'])) * log((($s['yes']) / ($s['yes'] + $s['no'])) , 2) + (-($s['no']) / ($s['yes'] + $s['no'])) * log((($s['no']) / ($s['yes'] + $s['no'])) , 2)) ;
            if(is_nan($result[$i]))
                $result[$i] = 0 ;
            $i++ ;
        }
        $results = 0 ;
        foreach ($result as $s){
            $results += $s ;
        }


        return $this->information_Data() - $results ;
    }

    public function information_data_father_job(){
        for ($i = 0 ; $i < $this->getLength() ; $i++){
            $array[$i] = $this->getFatherJobs($i) ;
        }

        $unique = array() ;
        foreach ($array as $value){
            if (!in_array($value , $unique)){
                $unique[] = $value ;
                $father[$value]['yes'] = 1 ;
                $father[$value]['no'] = 1 ;
            }

        }


        for ($i = 0 ; $i < count($unique) ; $i++){
            for ($j = 0 ; $j < count($array) ; $j++){
                if (strcmp($this->getLends($j) , 'yes')) {
                    if (strcmp($unique[$i], $array[$j]))
                        $father[$unique[$i]]['yes']++;
                }
                if (strcmp($this->getLends($j) , 'no')) {
                    if (strcmp($unique[$i], $array[$j]) == 0)
                        $father[$unique[$i]]['no']++;
                }
            }
        }

        $fathers['total'] = 0 ;
        $fathers['yes'] = 0 ;
        $fathers['no'] = 0 ;

        foreach ($father as $s){
            $fathers['total'] += $s['yes'] + $s['no'] ;
        }

        foreach ($father as $s){
            $fathers['yes'] += $s['yes'] ;
        }

        foreach ($father as $s){
            $fathers['no'] += $s['no'] ;
        }


        $result[]  = 0 ; $i = 0 ;

        foreach ($father as $s){
            $result[$i] = (($s['yes'] + $s['no']) / $fathers['total'])*((-($s['yes']) / ($s['yes'] + $s['no'])) * log((($s['yes']) / ($s['yes'] + $s['no'])) , 2) + (-($s['no']) / ($s['yes'] + $s['no'])) * log((($s['no']) / ($s['yes'] + $s['no'])) , 2)) ;
            if(is_nan($result[$i]))
                $result[$i] = 0 ;
            $i++ ;
        }
        $results = 0 ;
        foreach ($result as $s){
            $results += $s ;
        }


        return $this->information_Data() - $results ;
    }

    public function creat_tree(){
        $m = new Mining() ;

        $m->calculate_arrays('' , '');
        $gain['grade'] = $m->information_Data_grade() ;
        $gain['subject'] = $m->information_data_subject() ;
        $gain['father_job'] = $m->information_data_father_job() ;
        $i = 1 ;

        //$gain['grade'] > $gain['subject'] && $gain['grade'] >$gain['father_job']
        //$gain['subject'] > $gain['grade'] && $gain['subject'] >$gain['father_job']
        //$gain['father_job'] > $gain['grade'] && $gain['father_job'] >$gain['subject']
        if ($gain['grade'] > $gain['subject'] && $gain['grade'] >$gain['father_job']){
            //1

            $arr = [
                ['id'=>1, 'parent' => 0, 'name'=>'grade'],
            ] ;

            $tree = new BlueM\Tree($arr);

            for ($j = 1 ; $j < 4 ; $j++ ){
                $m->calculate_arrays('grade' , $j);


                $gain['subject'] = $m->information_data_subject() ;
                $gain['father_job'] = $m->information_data_father_job() ;
                if ($gain['subject'] > $gain['father_job']){
                    $i++ ;
                    $new_arr = [
                        ['id'=>$i , 'parent'=>$i - 1, 'name'=>'subject-'.$j.'-grade'],
                    ] ;

                    $arr = array_merge($arr, $new_arr);

                    $tree->rebuildWithData($arr);

                    $new_arr = [
                        ['id'=>$i + 1, 'parent'=>$i , 'name'=>'father_job-'.$j.'-grade'],
                    ] ;

                    $arr = array_merge($arr, $new_arr);

                    $tree->rebuildWithData($arr);

                }
                else{
                    $i++ ;
                    $new_arr = [
                        ['id'=>$i , 'parent'=>$i - 1, 'name'=>'father_job-'.$j.'-grade'],
                    ] ;

                    $arr = array_merge($arr, $new_arr);

                    $tree->rebuildWithData($arr);
                    $new_arr = [
                        ['id'=>$i + 1, 'parent'=>$i  , 'name'=>'subject-'.$j.'-grade'],
                    ] ;

                    $arr = array_merge($arr, $new_arr);

                    $tree->rebuildWithData($arr);


                }
            }

        }
        else if ($gain['subject'] > $gain['grade'] && $gain['subject'] >$gain['father_job']){
            //1

            $arr = [
                ['id'=>1, 'parent' => 0, 'name'=>'subject'],
            ] ;

            for ($j = 0 ; $j < $this->getLength() ; $j++){
                $array[$j] = $this->getSubjects($j) ;
            }

            $unique = array() ;
            foreach ($array as $value){
                if (!in_array($value , $unique)){
                    $unique[] = $value ;
                }

            }

            $tree = new \BlueM\Tree($arr);

            foreach ($unique as $data){

                $m->calculate_arrays('subject' , $data);

                $gain['grade'] = $m->information_Data_grade() ;
                $gain['father_job'] = $m->information_data_father_job() ;
                if ($gain['grade'] > $gain['father_job']){
                    $i++ ;
                    $new_arr = [
                        ['id'=>$i , 'parent'=>$i - 1, 'name'=>'grade-'.$data.'-subject'],
                    ] ;

                    $arr = array_merge($arr, $new_arr);

                    $tree->rebuildWithData($arr);

                    $new_arr = [
                        ['id'=>$i + 1, 'parent'=>$i , 'name'=>'father_job-'.$data.'-subject'],
                    ] ;

                    $arr = array_merge($arr, $new_arr);

                    $tree->rebuildWithData($arr);

                }
                else{
                    $i++ ;
                    $new_arr = [
                        ['id'=>$i , 'parent'=>$i - 1, 'name'=>'father_job-'.$data.'-subject'],
                    ] ;

                    $arr = array_merge($arr, $new_arr);

                    $tree->rebuildWithData($arr);
                    $new_arr = [
                        ['id'=>$i + 1, 'parent'=>$i  , 'name'=>'grade-'.$data.'-subject'],
                    ] ;

                    $arr = array_merge($arr, $new_arr);

                    $tree->rebuildWithData($arr);


                }
            }

        }

        else if ($gain['father_job'] > $gain['grade'] && $gain['father_job'] > $gain['subject']){
            //1

            $arr = [
                ['id'=>1, 'parent' => 0, 'name'=>'father_job'],
            ] ;

            for ($j = 0 ; $j < $this->getLength() ; $j++){
                $array[$j] = $this->getFatherJobs($j) ;
            }

            $unique = array() ;
            foreach ($array as $value){
                if (!in_array($value , $unique)){
                    $unique[] = $value ;
                }

            }

            $tree = new BlueM\Tree($arr);

            foreach ($unique as $data){

                $m->calculate_arrays('father_job' , $data);

                $gain['grade'] = $m->information_Data_grade() ;
                $gain['subject'] = $m->information_data_subject() ;
                if ($gain['grade'] > $gain['subject']){
                    $i++ ;
                    $new_arr = [
                        ['id'=>$i , 'parent'=>$i - 1, 'name'=>'grade-'.$data.'-father-job'],
                    ] ;

                    $arr = array_merge($arr, $new_arr);

                    $tree->rebuildWithData($arr);

                    $new_arr = [
                        ['id'=>$i + 1, 'parent'=>$i , 'name'=>'subject-'.$data.'-father-job'],
                    ] ;

                    $arr = array_merge($arr, $new_arr);

                    $tree->rebuildWithData($arr);

                }
                else{
                    $i++ ;
                    $new_arr = [
                        ['id'=>$i , 'parent'=>$i - 1, 'name'=>'subject-'.$data.'-father-job'],
                    ] ;

                    $arr = array_merge($arr, $new_arr);

                    $tree->rebuildWithData($arr);
                    $new_arr = [
                        ['id'=>$i + 1, 'parent'=>$i  , 'name'=>'grade-'.$data.'-father-job'],
                    ] ;

                    $arr = array_merge($arr, $new_arr);

                    $tree->rebuildWithData($arr);


                }
            }

        }

        //var_dump($tree);

        return $tree ;
    }

    public function DFS_Searching(){
        $result[] = "" ;
        $i = 0 ;
        $m = new Mining() ;

        $m->calculate_arrays('' , '');

        /*//$m->calculate_arrays('' , '');
        echo '<br>' ;
        echo $m->information_Data() ;
        echo '<br>' ;
        echo $m->information_Data_grade() ;
        echo '<br>' ;
        echo $m->information_data_subject() ;
        echo '<br>' ;
        echo $m->information_data_father_job() ;*/


        $tree = $m->creat_tree() ;

        $nodes = $tree->getNodes() ;
        foreach ($nodes as $item){
            if (!($item->hasChildren())){
                $result[$i] = ($item->toArray())["name"] ;
                $i++ ;
            }
        }

        //echo $node ;

        return $result ;

    }


}














