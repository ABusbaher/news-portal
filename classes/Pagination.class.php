<?php
class Pagination{
    public $current_page;
    public $items_per_page;
    public $items_total_count;
    public function __construct($page=1,$items_per_page=5, $items_total_count=0){
        $this->current_page=(int)$page;
        $this->items_per_page=(int)$items_per_page;
        $this->items_total_count=(int)$items_total_count;
    }
    public function next(){
        return $this->current_page+1;
    }
    public function previous(){
        return $this->current_page-1;
    }
    public function page_total(){
        return ceil($this->items_total_count / $this->items_per_page);
    }
    public function has_previous(){
        return $this->previous() >= 1 ? true: false;
    }
    public function has_next(){
        return $this->next() <= $this->page_total() ? true: false;
    }
    public function offset(){
        return ($this->current_page-1)*$this->items_per_page;
    }
    public function render_pagination($page){
        if($this->page_total() >1){
            if($this->has_next()){
            echo "<li class='next'><a href='".$page . $this->next()."'>Next</a></li>";
            }

            for($i=1;$i<=$this->page_total();$i++){
                if($i==$this->current_page){
                    echo "<li class='active'><a href='".$page . $i."'>{$i}</a></li>";
                }else{
                    echo "<li class='inactive'><a href='".$page . $i."'>{$i}</a></li>";
                }
            }

            if($this->has_previous()){
                echo "<li class='previous'><a href='".$page . $this->previous()."'>Previous</a></li>";
            }
        } 
    }
}